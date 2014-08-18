<?php
require_once(PATH_tslib.'class.tslib_pibase.php');
class tx_sdjxmlmap_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_sdjxmlmap_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_sdjxmlmap_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'sdjxmlmap';	// The extension key.
	var $pi_checkCHash = true;
	
	function main($content, $conf)	{
		
		

		//standard pages
		$res=$GLOBALS['TYPO3_DB']->exec_SELECTquery(
  			'tstamp,uid,tx_sdjmetadata_xmlprio,tx_sdjmetadata_xmlinterval',
  			'pages',
  			'deleted=0 AND hidden=0 AND nav_hide=0 AND doktype=1 AND pid=3 OR uid=3',
  			'',
  			'uid'
  		); 

  		while($erg=$GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){
	  		$all[]=array(
	  			$this->cObj->typolink_URL(array('parameter'=>$erg['uid'])),
	  			date("Y-m-d",$erg['tstamp']),
	  			$erg['tx_sdjmetadata_xmlprio'],
	  			$erg['tx_sdjmetadata_xmlinterval']	
	  		);
		}
		
		//projekte
		$res=$GLOBALS['TYPO3_DB']->exec_SELECTquery(
  			'tstamp,uid',
  			'tx_sdjhfgkd20_domain_model_projekte',
  			'deleted=0 AND hidden=0 AND pid=16',
  			'',
  			'uid'
  		); 

  		while($erg=$GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){
	  		$all[]=array(
	  			$this->cObj->typolink_URL(array('parameter'=>4,"additionalParams"=>'&tx_sdjhfgkd20_detail='.$erg['uid'])),
	  			date("Y-m-d",$erg['tstamp']),
	  			0.3,
	  			"never"	
	  		);
		}
		
		//news
		$res=$GLOBALS['TYPO3_DB']->exec_SELECTquery(
  			'tstamp,uid,date',
  			'tx_sdjnews_domain_model_news',
  			'deleted=0 AND hidden=0 AND pid=19',
  			'',
  			'uid'
  		); 
  		
  		$years=array();
  		while($erg=$GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){
	  		$years[]=date("Y",$erg['date']);
	  		$all[]=array(
	  			$this->cObj->typolink_URL(array('parameter'=>5,"additionalParams"=>'&tx_sdjnews_article='.$erg['uid'])),
	  			date("Y-m-d",$erg['tstamp']),
	  			0.3,
	  			"never"	
	  		);
		}
		
		$years=array_unique($years);
		foreach($years as $year){
			if($year!==date("Y")){
				$all[]=array(
	  				$this->cObj->typolink_URL(array('parameter'=>5,"additionalParams"=>'&tx_sdjnews_year='.$year)),
	  				$year."-12-31",
	  				0.1,
	  				"never"	
	  			);
	  		}
		}
		
		//output
		$xml='<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
		foreach($all as $one){
			if(trim(strlen($one[2]))==0)
				$one[2]="0.5";
			if(trim(strlen($one[3]))==0)
				$one[3]="never";
			$xml.='<url>
				<loc>'.$GLOBALS['TSFE']->tmpl->setup['config.']['baseURL'].$one[0].'</loc>
				<lastmod>'.$one[1].'</lastmod>
				<priority>'.$one[2].'</priority>
				<changefreq>'.$one[3].'</changefreq>
			</url>';
		}
		
		$xml.='</urlset>';
		return $xml;
	}
}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sdjxmlmap/pi1/class.tx_sdjxmlmap_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sdjxmlmap/pi1/class.tx_sdjxmlmap_pi1.php']);
}
?>