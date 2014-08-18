<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2013 Pascal Bremmer <pascal@soup-du-jour.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
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
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */

require_once(PATH_tslib.'class.tslib_pibase.php');


/**
 * Plugin 'Simple Slideshow' for the 'sdjslideshow' extension.
 *
 * @author	Pascal Bremmer <pascal@soup-du-jour.de>
 * @package	TYPO3
 * @subpackage	tx_sdjslideshow
 */
class tx_sdjslideshow_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_sdjslideshow_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_sdjslideshow_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'sdjslideshow';	// The extension key.
	
	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $conf) {
		$this->conf = $conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
		$this->pi_USER_INT_obj = 1;	
		
		$path="uploads/tx_sdjslideshow/";
		$content="";
		$pics=explode(",",$this->cObj->data['tx_sdjslideshow_images']);
		foreach($pics as $pic){
			$iConf['file']=$path.$pic;
			$iConf['file.']['maxW']=$conf['maxW'];
			$url=$this->cObj->IMG_RESOURCE($iConf);
			$pic='<li style="background-image:url('.$url.')">';			
			$content.=$pic."\n";
		}
		return $content;
	}
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sdjslideshow/pi1/class.tx_sdjslideshow_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sdjslideshow/pi1/class.tx_sdjslideshow_pi1.php']);
}

?>