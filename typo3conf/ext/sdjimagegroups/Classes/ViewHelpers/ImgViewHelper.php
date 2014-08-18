<?php
class Tx_sdjimagegroups_ViewHelpers_ImgViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	/**
		* @param $image  string Property
		* @param $w  string Property
		* @param $h  string Property
		* @param $t  string Property
		* @param $r  string Property
		* @param $b  string Property
		* @param $l  string Property
	 */	
	 	
	public function render($image, $w, $h, $t, $r, $b, $l){
	    $this->cObj = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tslib_cObj');
	    
	    $w=str_replace("px","",$w);
	    $h=str_replace("px","",$h);
	   
	    if(strlen($w)==0)
	    	$w=650;
	    
	    $style="";
	    if(strlen($t)>0)
	    	$style.="top:".$t."; ";
	    if(strlen($r)>0)
	    	$style.="right:".$r."; ";
	    if(strlen($b)>0)
	    	$style.="bottom:".$b."; ";
	    if(strlen($l)>0)
	    	$style.="left:".$l."; ";
	    
	    if(strlen($h)>0)
	    	$style.="height:".$h."px; ";
	    
	    $style.="width:".$w."px;";
	   
		$imageObj['img']='IMAGE';
		$imageObj['img.']['file']="uploads/tx_sdjimagegroups/".$image;
		$imageObj['img.']['file.']['width']=$w;
		if(strlen($w)>0)
			$imageObj['img.']['file.']['height']=$h;
		$image=$this->cObj->IMG_RESOURCE($imageObj['img.']);
		
	    return '<img src="'.$image.'" style="'.$style.'" />';
	}
}
?> 