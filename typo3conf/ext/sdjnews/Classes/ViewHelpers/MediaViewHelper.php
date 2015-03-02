<?php
class Tx_sdjnews_ViewHelpers_MediaViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	/**
		* @param $mdata  Object Property
	 */	
	
	public function render($mdata){
		//echo "<pre>".htmlentities(print_r($mdata,true))."</pre>";
		
		$i=0;
		
		$data=array();
		foreach($mdata as $m){
			//Text
			if(strlen($m->text)>5)
				$data[$i]['text']=$m->text;
			
			//Bilder
			$pics=explode(",",$m->images);
			$captions=explode("\n",$m->imagecaption);
			$j=0;
			foreach($pics as $pic){
				$data[$i]['image'][$j]["pic"]=$pic;
				if(strlen($captions[$j])>5)
					$data[$i]['image'][$j]["caption"]=$captions[$j];
				$j++;
			}
			$i++;
		}
		
		return $data;
	}
}
?> 