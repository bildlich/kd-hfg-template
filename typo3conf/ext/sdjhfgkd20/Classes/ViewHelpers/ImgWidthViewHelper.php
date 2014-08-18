<?php
class Tx_sdjhfgkd20_ViewHelpers_ImgWidthViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	/**
		* @param $image  String Property
	 */	
	
	public function render($image){
		$size=getimagesize($image);
		return $size[0]/($size[1]/210);
	}
}
?> 