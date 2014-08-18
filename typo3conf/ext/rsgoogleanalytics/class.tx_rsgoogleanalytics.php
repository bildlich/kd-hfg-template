<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2005-2012	 Steffen Ritter (info@rs-websystems.de)
 *
 *  All rights reserved
 *
 *  This script is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; version 2 of the License.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/*
 * Inserts Google Analytics code into any page. Also uses hooks to add tracking code to external
 * or download links. Provides an API for adding custom tracking variables
 *
 * Originally inspired by m1_google_analytics.
 *
 * @author Steffen Ritter <info@rs-websystems.de>
 * @package TYPO3
 * @subpackage tx_rsgoogleanalytics
 */
class tx_rsgoogleanalytics implements t3lib_singleton {
	/**
	 * @var string
	 */
	var $trackerVar = 'pageTracker';

	/**
	 * Saves TypoScript config
	 */
	var $modConfig = array();

	/**
	 * @var array
	 */
	protected $commands = array();

	/**
	 * @var array
	 */
	protected $domainConfig = array();

	/**
	 * @var string
	 */
	protected $selectedDomain;

	/**
	 * @var array
	 */
	protected $eCommerce = array('items' => array(), 'transaction' => array());

	/**
	 * Constructs the system.
	 */
	public function __construct() {
		$this->modConfig = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_rsgoogleanalytics.'];

		if (t3lib_extmgm::isLoaded('naw_securedl')) {
			$this->specialFiles = 'naw';
		}
		if (t3lib_extmgm::isLoaded('dam_frontend')) {
			$this->specialFiles = 'dam_frontend';
		}
	}

	/**
	 * Returns the extension's TypoScript configuration
	 *
	 * @return array
	 */
	public function getModConfig() {
		return $this->modConfig;
	}

	/**
	 * Adds a GA command to the command list
	 *
	 * @param string $command The GA command
	 * @param int $key The key at which to add the command in the commands array (at the end if empty)
	 */
	public function addCommand($command, $key = 0) {
		$key = intval($key);
		if (empty($key)) {
			array_push($this->commands, $command);
		} else {
			$this->commands[$key] = $command;
		}
	}

	/**
	 * Adds the tracking code at the end of the body tag (pi Method called from TS USER_INT). further the method
	 * Adds some js code for downloads and external links if configured.
	 *
	 * @param string $content page content
	 * @param array $params Additional call parameters (unused for now)
	 * @return string Page content with google tracking code
	 */
	public function processTrackingCode($content, $params) {
			// return if the extension is not activated or no account is configured
		if (!$this->isActive()) {
			return $content;
		}
			// detect how the pageTitle should be rendered
		if ($this->modConfig['registerTitle'] == 'title') {
			$pageName = str_replace(array(CR, LF), '', trim($GLOBALS['TSFE']->page['title']));
		} elseif ($this->modConfig['registerTitle'] == 'rootline') {
			$rootline = $GLOBALS['TSFE']->sys_page->getRootLine($GLOBALS['TSFE']->page['uid']);
			$pageName = '';
			$rootlineLength = count($rootline);
			for ($i = 0; $i < $rootlineLength; $i++) {
				if ($rootline[$i]['is_siteroot'] == 0) {
					$title = str_replace(array(CR, LF), '', $rootline[$i]['title']);
					$pageName .= '/' . addslashes(trim($title));
				}
			}
		} else {
			$pageName = NULL;
		}

			// Hook for special treatment of the page name
		if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rsgoogleanalytics']['processPageName'])) {
			foreach($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['rsgoogleanalytics']['processPageName'] as $className) {
				$processor = &t3lib_div::getUserObj($className);
				$pageName = $processor->processPageName($pageName, $this);
			}
		}
		return $this->buildTrackingCode($pageName);
	}

	/**
	 * Generates the google tracking code (JS script at the end of the body tag).
	 *
	 * @param string $pageName Name of the page to register for tracking
	 * @return string JS tracking code
	 */
	protected function buildTrackingCode($pageName = NULL) {
		$codeTemplate = file_get_contents(t3lib_div::getFileAbsFileName($this->modConfig['templateFile']));
		$marker = array(
			'ACCOUNT' => $this->modConfig['account'],
			'TRACKER_VAR' => $this->trackerVar,
			'COMMANDS' => ''
		);

		if ($pageName === NULL) {
			$this->commands[999] = $this->buildCommand('trackPageview', array());
		} else {
			$this->commands[999] = $this->buildCommand('trackPageview', array($pageName));
		}

		$this->makeDomainConfiguration();
		$this->makeSearchEngineConfiguration(); // 100
		$this->makeSpecialVars(); // 300
		$this->makeDataTracking(); // 500
		$this->makeECommerceTracking(); // 2000

		ksort($this->commands);
		$marker['COMMANDS'] = implode("\n", $this->commands);
		$code = t3lib_parsehtml::substituteMarkerArray($codeTemplate, $marker, '###|###', TRUE, TRUE);

		return $code;
	}

	/**
	 * Generates Commands which are needed for sub/cross-domain-tracking.
	 * linkProcessing needs this to handle the domains, which should get a "link" tracker
	 *
	 * @return void
	 */
	protected function makeDomainConfiguration() {
			// If the domain configuration has already been handled, this array will not be empty
			// With this check we avoid handling the configuration twice
		if (count($this->domainConfig) == 0) {
			if ($this->modConfig['multipleDomains'] && $this->modConfig['multipleDomains'] != 'false') {
					// Extract the list of domains
				$this->domainConfig['multiple'] = t3lib_div::trimExplode(',', $this->modConfig['multipleDomains.']['domainNames'], TRUE);
				$numberOfDomains = count($this->domainConfig['multiple']);
					// If there's only one, use it as is
				if ($numberOfDomains == 1) {
					$this->selectedDomain = $this->domainConfig['multiple'][0];

					// If there are more than one, try to match to the current domain
				} elseif ($numberOfDomains > 1) {
					$currentDomain = t3lib_div::getIndpEnv('TYPO3_HOST_ONLY');
					for ($i = 0; $i < $numberOfDomains; $i++) {
						if (strstr($currentDomain, $this->domainConfig['multiple'][$i]) == $this->domainConfig['multiple'][$i]) {
							$this->selectedDomain = $this->domainConfig['multiple'][$i];
							break;
						}
					}
				}
				$this->commands[10] = $this->buildCommand('setDomainName', array((empty($this->selectedDomain)) ? 'none' : $this->selectedDomain));
				$this->commands[11] = $this->buildCommand('setAllowLinker', array(TRUE));

			} elseif ($this->modConfig['trackSubDomains'] && $this->modConfig['trackSubDomains'] != 'false') {
				$this->commands[10] = $this->buildCommand('setDomainName', array('.' . $this->modConfig['trackSubDomains.']['domainName']));
			}
		}
	}

	/**
	 * Generates Commands for tracking custom variables
	 *
	 * @return void
	 */
	protected function makeSpecialVars() {
		$x = 300;
			/** @var $cObj tslib_cObj */
		$cObj = t3lib_div::makeInstance('tslib_cObj');

			// Render CustomVars
		for ($i = 1; $i <= 5; $i++) {
			if (is_array($this->modConfig['customVars.'][$i . '.'])) {
				$data = $cObj->stdWrap('', $this->modConfig['customVars.'][$i . '.']);
				if (trim($data)) {
					$this->commands[$x] = $this->buildCommand(
						'setCustomVar',
						array(
							$i, $this->modConfig['customVars.'][$i . '.']['name'],
							$data, $this->modConfig['customVars.'][$i . '.']['scope']
						)
					);
				}
				$x++;
			}
		}

			// Render customSegment
		$currentValue = explode('.', $_COOKIE['__utmv']);
		$currentValue = $currentValue[1];
		$shouldBe = $cObj->stdWrap('', $this->modConfig['visitorSegment.']);
		if ($currentValue != $shouldBe && trim($shouldBe) !== '') {
			$this->commands[$x] = $this->buildCommand('setVar', array($shouldBe));
		}
	}

	/**
	 * Generates Commands for e-commerce tracking
	 *
	 * @return void
	 */
	protected function makeECommerceTracking() {
		if (!$this->modConfig['eCommerce.']['enableTracking']) {
			return;
		}

			// Should be after trackPageView()
		$i = 2000;
		foreach ($this->eCommerce['transaction'] AS $trans) {
			$this->commands[$i] = $this->buildCommand('addTrans', $trans);
			$i++;
		}
		foreach ($this->eCommerce['items'] AS $item) {
			$this->commands[$i] = $this->buildCommand('addItem', $item);
			$i++;
		}

		if (count($this->eCommerce['transaction']) > 0 || count($this->eCommerce['items']) > 0) {
			$this->commands[$i] = $this->buildCommand('trackTrans', array());
		}
	}

	/**
	 * Generates Commands related to search engine configuration
	 * @return void
	 */
	protected function makeSearchEngineConfiguration() {
			// Set keywords which should marked as redirect
		if ($this->modConfig['redirectKeywords']) {
			$keywords = t3lib_div::trimExplode(',', $this->modConfig['redirectKeywords'], 1);
			$i = 100;
			foreach ($keywords AS $val) {
				$this->commands[$i] = $this->buildCommand('addIgnoredOrganic', array($val));
				$i++;
			}
		}
			// which referrers should be handled as "own domain"
		if ($this->modConfig['redirectReferer']) {
			$domains = t3lib_div::trimExplode(',', $this->modConfig['redirectReferer'], 1);
			$i = 0;
			foreach ($domains AS $val) {
				$this->commands[$i] = $this->buildCommand('addIgnoredRef', array($val));
				$i++;
			}
		}
	}

	/**
	 * Generates Commands for data tracking
	 *
	 * @return void
	 */
	protected function makeDataTracking() {
		if ($this->modConfig['disableDataTracking.']['browserInfo']) {
			$this->commands[500] = $this->buildCommand('setClientInfo', array(FALSE));
		}
		if ($this->modConfig['disableDataTracking.']['flashTest']) {
			$this->commands[501] = $this->buildCommand('setDetectFlash', array(FALSE));
		}
		if ($this->modConfig['disableDataTracking.']['pageTitle']) {
			$this->commands[502] = $this->buildCommand('setDetectTitle', array(FALSE));
		}
		if ($this->modConfig['disableDataTracking.']['anonymizeIp']) {
			$this->commands[503] = $this->buildGatCommand('anonymizeIp', array());
		}
	}

	/**
	 * Assembles a single tracker command
	 *
	 * If the command needs to be applied to the global gat object, use the buildGatCommand() method instead.
	 *
	 * @param string $command The name of the command
	 * @param array $parameter The list of call parameters
	 * @return string The assembled JavaScript command
	 */
	public function buildCommand($command, array $parameter) {
			// Generate traditional code
		if (empty($this->modConfig['asynchronous'])) {
			$command = "\t" . $this->trackerVar . '._' . $command . '(' . implode(', ', $this->wrapJSParams($parameter)) . ');';

			// Generate asynchronous code
		} else {
			$command = "\t_gaq.push(['_" . $command . "'";
			if (count($parameter) > 0) {
				$command .= ', ' . implode(', ', $this->wrapJSParams($parameter));
			}
			$command .= ']);';
		}
		return $command;
	}

	/**
	 * Assembles a single command for the gat object
	 *
	 * A few commands (mostly anonymizeIp) refer to the global gat object, rather than the page tracker.
	 * This method handles these special needs.
	 *
	 * @param string $command The name of the command
	 * @param array $parameter The list of call parameters
	 * @return string The assembled JavaScript command
	 */
	public function buildGatCommand($command, array $parameter) {
			// Generate traditional code
		if (empty($this->modConfig['asynchronous'])) {
			$command = "\t" . '_gat._' . $command . '(' . implode(', ', $this->wrapJSParams($parameter)) . ');';

			// Generate asynchronous code
		} else {
			$command = "\t_gaq.push(['_gat._" . $command . "'";
			if (count($parameter) > 0) {
				$command .= ', ' . implode(', ', $this->wrapJSParams($parameter));
			}
			$command .= ']);';
		}
		return $command;
	}

	/**
	 * Wraps and escapes a list of parameters for proper usage in JavaScript
	 *
	 * @param array $parameter List of parameters to handle
	 * @return array The wrapped and escaped parameters
	 */
	protected function wrapJSParams(array $parameter) {
		for ($i = 0; $i < count($parameter); $i++) {
			if (is_bool($parameter[$i])) {
				$parameter[$i] = ($parameter[$i] ? 'true' : 'false');
			} else {
				$parameter[$i] = "'" . str_replace("'", "\'", $parameter[$i]) . "'";
			}
		}
		return $parameter;
	}

	/**
	 * This method checks whether the URL is in the list to track
	 *
	 * @param string $url filename (with directories from site root) which is linked
	 * @return boolean True if filename is in locations, false if not
	 */
	protected function checkURL($url) {
		$locations = t3lib_div::trimExplode(',', $this->modConfig['trackExternals.']['domainList'], 1);
		foreach ($locations as $location) {
			if (strpos($url, $location) !== FALSE) {
				return TRUE;
			}
		}
		return FALSE;
	}

	/**
	 * Checks whether the given URL should be considered as being cross-domain
	 *
	 * @param string $url The URL to check
	 * @return bool
	 */
	protected function isUrlCrossDomain($url) {
		$urlParts = parse_url($url);
			// Loop on all configured domains
		$numberOfDomains = count($this->domainConfig['multiple']);
		for ($i = 0; $i < $numberOfDomains; $i++) {
			$currentDomain = $this->domainConfig['multiple'][$i];
				// Stop at the first domain that matches and return true
			if ($currentDomain != $this->selectedDomain &&  strpos($urlParts['host'], $currentDomain)) {
				return TRUE;
			}
		}
		return FALSE;
	}

	/**
	 * This method checks whether the given file is in the paths to track
	 *
	 * @param string $file Filename (with directories from site root) which is linked
	 * @return boolean True if filename is in locations, false if not
	 */
	protected function checkFilePath($file) {
		$locations = t3lib_div::trimExplode(',', $this->modConfig['trackDownloads.']['folderList']);
		foreach ($locations as $location) {
			if (strpos($file, $location) !== FALSE) {
				return TRUE;
			}
		}
		return FALSE;
	}

	/**
	 * This method checks whether the given file if of a type to track
	 *
	 * @param string $file Filename (with directories from site root) which is linked
	 * @return boolean True if filename is in list, false if not
	 */
	protected function checkFileType($file) {
		$pathParts = pathinfo($file);
		return t3lib_div::inList($this->modConfig['trackDownloads.']['fileTypes'], $pathParts['extension']);
	}

	/**
	 * Checks whether filePath and Type is in allowed range
	 *
	 * @param string $file filename (with directories from site root) which is linked
	 * @return boolean True if filename is in locations and file type should be tracked, false if not
	 */
	protected function checkFile(&$file) {
		return $this->checkFilePath($file) && $this->checkFileType($file);

	}

	/**
	 * Hooks into TYPOLink generation
	 * Classic userFunc hook called in tslib/tslib_content.php
	 * Used to add Google Analytics tracking code to hyperlinks
	 *
	 * @param array $params TypoLink configuration
	 * @param tslib_cObj $reference Back-reference to the calling object
	 * @return void
	 */
	public function linkPostProcess(&$params, $reference) {
		if (!$this->isActive()) {
			return;
		}
			// Make sure the domain configuration has been handled
		$this->makeDomainConfiguration();

		$url = $params['finalTagParts']['url'];
		$function = FALSE;
		switch ($params['finalTagParts']['TYPE']) {
			case 'page':
					// If cross-domain linking is activated, check if the link is indeed cross-domain
					// Otherwise, nothing special needs to be done
				if (!empty($this->selectedDomain)) {
						// If typolink URL is cross-domain, add GA link code
					if ($this->isUrlCrossDomain($url)) {
						$function = 'RsGoogleAnalytics.crossDomainLink(this); return false;';
					}
				}
				break;
			case 'url' :
				if ( /*checkInMultiple($url)*/
					0) {
					$function = $this->buildCommand('link', array($url)) . 'return false;';
				} elseif ($this->modConfig['trackExternals'] && ($this->modConfig['trackExternals'] == '!ALL') || $this->checkURL($url)) {
					$function = $this->buildCommand('trackEvent', array('Leaving Site', 'External URL', $url));
				}
				break;
			case 'file':
				if ($this->modConfig['trackDownloads']) {
					$fileInfo = pathinfo($url);
					// TODO: provide hook where downloader extension can register their transformation function

					if ($this->modConfig['trackDownloads'] == '!ALL' || $this->checkFile($url)) {
						$function = $this->buildCommand('trackEvent', array('Download', $fileInfo['extension'], $url));
					}
				}
				break;
		}
		if (!stripos('onclick', $params['finalTagParts']['aTagParams']) && $function !== FALSE) {
			$function = str_replace('"', '\'', trim($function));
			$params['finalTagParts']['aTagParams'] .= ' onclick="' . $function . '"';
			$params['finalTag'] = str_replace('>', ' onclick="' . $function . '">', $params['finalTag']);
		}
	}

	/**
	 * adds an single Item to an eCommerce Transaction to be tracked
	 *
	 * @param string $orderId
	 * @param string $sku
	 * @param string $name
	 * @param string $category
	 * @param string $price
	 * @param string $quantity
	 * @return void
	 */
	public function addCommerceItem($orderId, $sku, $name, $category, $price, $quantity) {
		if (!$this->isActive() || !$this->modConfig['eCommerce.']['enableTracking']) {
			return;
		}

		if (isset($this->eCommerce['transaction'][$orderId])) {
			$this->eCommerce['items'][] = array(0 => $orderId, 1 => $sku, 2 => $name, 3 => $category, 4 => $price, 5 => $quantity);
		}
	}

	/**
	 * adds an e-commerce transaction to be tracked
	 *
	 * @param string $orderId
	 * @param string $storeName
	 * @param string $total
	 * @param string $tax
	 * @param string $shipping
	 * @param string $city
	 * @param string $state
	 * @param string $country
	 * @return void
	 */
	public function addCommerceTransaction($orderId, $storeName, $total, $tax, $shipping, $city, $state, $country) {
		if (!$this->isActive() || !$this->modConfig['eCommerce.']['enableTracking']) return;

		$this->eCommerce['transaction'][$orderId] = array(0 => $orderId, 1 => $storeName, 2 => $total, 3 => $tax, 4 => $shipping, 5 => $city, 6 => $state, 7 => $country);
	}

	/**
	 * Checks whether the plugin is active
	 *
	 * @return bool
	 */
	protected function isActive() {
		return intval($this->modConfig['active']) == 1 && trim($this->modConfig['account']) != '';
	}
}


if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/rsgoogleanalytics/class.tx_rsgoogleanalytics.php"]) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/rsgoogleanalytics/class.tx_rsgoogleanalytics.php"]);
}

?>