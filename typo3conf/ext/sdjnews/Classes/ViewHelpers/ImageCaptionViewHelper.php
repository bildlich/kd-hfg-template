<?php
class Tx_sdjnews_ViewHelpers_ImageCaptionViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	/**
		* @param $imgs string Property
		* @param $ics string Property
	 */	
					
	public function render($imgs,$ics){	    
	    $ics=explode("\n",$ics);	
		foreach($ics as $i){
			if(strlen(trim($i))>0)
				$ics2[]=$i;
		}
		
		$imgs=explode(",",$imgs);
		
		$data=array();
		$i=0;
		foreach($imgs as $img){
			if(isset($ics2[$i]))
				$data[$i]['caption']=$ics2[$i];
			$data[$i]['image']=$img;
			$i++;
		}
	    
	    return $data;        
	}
}
?> 