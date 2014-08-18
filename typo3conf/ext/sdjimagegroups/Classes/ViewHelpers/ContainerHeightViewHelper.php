<?php
class Tx_sdjimagegroups_ViewHelpers_ContainerHeightViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	/**
		* @param $images  Object Property
	 */	
	 	
	public function render($images){
	    $this->cObj = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tslib_cObj');
	    
	    $maxh=0;
	    foreach($images as $pic){
		    $w=str_replace("px","",$pic["imgwidth"]);
			$h=str_replace("px","",$pic["imgheight"]);
			$t=str_replace("px","",$pic["imgtop"]);
			
			$tops=strpos($t, "%");
			if(strlen($t)==0 || $tops!==false)
				$t=0;
			
			if(strlen($h)==0){
				if(strlen($w)==0)
					$w=650;
				$imageObj['img']='IMAGE';
				$imageObj['img.']['file']="uploads/tx_sdjimagegroups/".$pic["image"];
				$imageObj['img.']['file.']['width']=$w;
				$image=$this->cObj->IMG_RESOURCE($imageObj['img.']);
				$size=getimagesize($image);
				$h=$size[1];
			}
			
			$tandh=$t+$h;
			
			if($tandh>$maxh)
				$maxh=$tandh;
	    }


		
	    return 'height:'.$maxh.'px;';
	}
}
?> 