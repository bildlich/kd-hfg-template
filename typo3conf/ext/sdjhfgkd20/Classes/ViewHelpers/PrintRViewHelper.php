<?php
class Tx_sdjhfgkd20_ViewHelpers_PrintRViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	/**
		* @param $d  Object Property
	 */	
	
	public function render($d){
		return "<pre>".htmlentities(print_r($d,true))."</pre>";
	}
}
?> 