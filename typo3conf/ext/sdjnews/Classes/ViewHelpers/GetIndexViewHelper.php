<?php
class Tx_sdjnews_ViewHelpers_GetIndexViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
        /**
		* @param $el  object Object
	 	* @param $prop	string Property
	 	*/	
        
        public function render($el,$prop) {
                echo $prop.":".$el[$prop]."<br>";
                if(is_object($el)) {
                        return $el->$prop;
                } elseif(is_array($el)) {
					if(array_key_exists($prop, $el)) {
						return $el[$prop];
					}
                }
                return NULL;
        }
}
?> 