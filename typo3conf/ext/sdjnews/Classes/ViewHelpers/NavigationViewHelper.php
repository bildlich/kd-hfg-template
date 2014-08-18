<?php
class Tx_sdjnews_ViewHelpers_NavigationViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
        /**
		* @param $years  object Object
	 	*/	
        
        public function render($years) {        	
        	$i=0;
        	foreach($years as $y){
        		if($i>0)
        			$output[$i]['stamp']=$y;
        		$output[$i]['year']=$y;
        		$output[$i]['act']="";
        		if((isset($_GET['tx_sdjnews_year']) && $_GET['tx_sdjnews_year']==$y || !isset($_GET['tx_sdjnews_year']) && $i==0) && !isset($_GET['tx_sdjnews_article']))
        			$output[$i]['act']=" active";
        		$i++;
        	}
        	
        	if(!isset($_GET['tx_sdjnews_year'])){
        		$_GET['tx_sdjnews_year']=$output[0]['year'];
        	}
        	//If year is not set        	
			return $output;
        }
}
?> 