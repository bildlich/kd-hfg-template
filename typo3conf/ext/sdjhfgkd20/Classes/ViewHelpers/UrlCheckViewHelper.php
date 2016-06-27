<?php
class Tx_sdjhfgkd20_ViewHelpers_UrlCheckViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	/**
		* @param $url  Object Property
	 */	
	
	public function render($url){
		$newurl="";
		$pos=strpos($url, ".");
		if($pos===false){
		
		}else{
			if(substr($url,0,7)!=="http://" && substr($url,0,8)!=="https://"){
				$newurl="http://".$url;
			}else{
				$newurl=$url;
			}
		}
		
		return $newurl;
	}
}
?> 