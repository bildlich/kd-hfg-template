<?php
class Tx_sdjhfgkd20_ViewHelpers_JsonViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	/**
		* @param $teacher  Object Property
		* @param $year  String Property
	 */	
	
	public function render($teacher,$year){
		//Start + Year
		$gb='{"all": "All", "year":"'.$year.'", "advisingPersons": '; 
		
		//Teacher
		foreach($teacher as $d){
			//echo "<pre>".htmlentities(print_r($d,true))."</pre>";
			$teachers[]='"'.$d->nachname.'"';
		}
		
		if(count($teachers)==1)
			$gb.=$teachers[0];
		else{
			$gb.="[";
			$i=0;
			foreach($teachers as $t){
				if($i>0)
					$gb.=',';
				$gb.=$t;
				$i++;
			}
			$gb.="]";
		}
		$gb.='}';
		
		return $gb;
	}
}
?> 