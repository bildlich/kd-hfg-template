<?php
class Tx_sdjnews_ViewHelpers_GetDataViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	/**
		* @param $index  string Property
	 */	
	
	public function render($index){
	    $data['pid']=$GLOBALS['TSFE']->id;
	    $data['lid']==$GLOBALS['TSFE']->sys_language_uid;
	    
	    return $data[$index];           
	}
}
?> 