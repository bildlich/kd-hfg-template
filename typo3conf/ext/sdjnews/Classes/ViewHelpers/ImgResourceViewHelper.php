<?php
class Tx_sdjnews_ViewHelpers_ImgResourceViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	/**
		* @param $image  string Property
		* @param $path  string Property
	 */	
	
	public function render($image,$path){
	    $this->cObj = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tslib_cObj');
	    $settings = $this->templateVariableContainer->get('settings');
	    $imageObj['img']='IMAGE';
		$imageObj['img.']['file']= $path.$image;
		$imageObj['img.']['file.']['width']=$settings['maxW'];
		$image=$this->cObj->IMG_RESOURCE($imageObj['img.']);
	    return $image;
	}
}
?> 