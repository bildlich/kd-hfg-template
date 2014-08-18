<?php
class Tx_sdjnews_ViewHelpers_YearViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	/**
		* @param $date  Datetime Property
	 */	
	
	public function render($date){
		return $date->format('Y');
	}
}
?> 