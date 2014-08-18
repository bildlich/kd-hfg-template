<?php
require_once(PATH_tslib.'class.tslib_pibase.php');

class user_sectionnavi extends tslib_pibase{
  	
  	function go($param, $conf){
  		
  		$navi='';
  		
  		//German navigation  		
  		$fields='uid,title';
  		$table='pages';
  		$where='deleted=0 AND hidden=0 AND nav_hide=0 AND doktype=1 AND pid='.$this->cObj->data[uid];
  		$sorting="sorting";
  		
  		//English
  		if($_GET['L']==2){
  			$fields='pages_language_overlay.pid,pages_language_overlay.title';
  			$table='pages_language_overlay, pages';
  			$where='pages_language_overlay.deleted=0 AND pages_language_overlay.hidden=0 AND pages.hidden=0 AND pages.deleted=0 AND pages.nav_hide=0  AND pages.doktype=1 AND pages.uid=pages_language_overlay.pid AND pages.pid='.$this->cObj->data[uid];
  			$sorting="pages.sorting";
  		}
  		
  		//SQL query
  		$res=$GLOBALS['TYPO3_DB']->exec_SELECTquery(
  			$fields,
  			$table,
  			$where,
  			'',
  			$sorting
  		); 
  		
  		//SQL result
  		while($erg=$GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){
  			if($_GET['L']==2)
  				$uid=$erg['pid'];
  			else
  				$uid=$erg['uid'];
  			$navi.='<li><a href="#section-'.$uid.'">'.$erg["title"].'</a></li>'."\n";
  		} 
  		
  		//Link for langugae change
  		if($_GET['L']==2)
	  		$link=$this->pi_linkToPage("Deutsch?", $GLOBALS['TSFE']->id, "", array("L"=>"0"));
  		else
	  		$link=$this->pi_linkToPage("English?", $GLOBALS['TSFE']->id, "", array("L"=>"2"));
  		
  		$link=$this->cObj->addParams($link,array('class'=>"ajax", "data-pageslug"=>"info"));
  		
  		
  		return '<nav class="sub-nav ajax-load-me" id="table-of-contents"><ul>'.$navi.'</ul>'.$link.'</nav>';
	}
}
?>