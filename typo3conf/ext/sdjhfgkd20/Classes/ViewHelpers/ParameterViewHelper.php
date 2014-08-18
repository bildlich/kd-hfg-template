<?php
class Tx_sdjhfgkd20_ViewHelpers_ParameterViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	/**
		* @param $index  string Property
	 */	
	
	public function render($index){
	    if(isset($_GET[$index]))
	    	return $_GET[$index];
	    return NULL;
	}
}
?> 