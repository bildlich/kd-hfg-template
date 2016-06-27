<?php
class Tx_sdjhfgkd20_ViewHelpers_ImgResourceViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	/**
		* @param $image  string Property
	 */	
	 	
	public function render($image){
	    $this->cObj = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tslib_cObj');
	    $settings = $this->templateVariableContainer->get('settings');
	    $imageObj['img']='IMAGE';
		$imageObj['img.']['file']= $image;
		$imageObj['img.']['file.']['maxW']=$settings['projectsdetail_maxW'];
		$image=$this->cObj->IMG_RESOURCE($imageObj['img.']);
	    return $image;
	}
}
?> 