<?php

require_once(PATH_tslib.'class.tslib_pibase.php');
class tx_sdjmetadata_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_sdjmetadata_pi1';
	var $scriptRelPath = 'pi1/class.tx_sdjmetadata_pi1.php';
	var $extKey        = 'sdjmetadata';
	var $pi_checkCHash = true;
	
	function main($content, $conf)	{
		
		/* ---- Collect Metadata ----- */
		
		//Simple Pages		
		$title=$this->cObj->data['tx_sdjmetadata_title'];
		$description=$this->cObj->data['tx_sdjmetadata_description'];
		
		if(strlen(trim($title))==0)
			$title=$this->cObj->data['title'];
		
		//Projects
		if(isset($_GET['tx_sdjhfgkd20_detail'])){
			$repository=new SOUPDUJOUR\Sdjhfgkd20\Domain\Repository\ProjekteRepository();
			$data=$repository->findOneByUid($_GET['tx_sdjhfgkd20_detail']); 
			//echo "<pre>".htmlentities(print_r($data,true))."</pre>";
			
			//Title
			if(strlen(trim($data->metatitle))>0){
				$title=$data->metatitle;
			}else{
				$title="&bdquo;".$data->title."&ldquo;";
				$i=0;
				foreach($data->students as $student){
					if ($i==0) {
						$title .= " von "; 
					}
					if ($i > 0 && strlen($title.$nextname)>60) {	// Projekttitel + Studentennamen zusammen nicht länger als 60 Zeichen
						$title .= " u.a.";
						break;
					}
					if($i>0 && $i<count($data->students)-1)
						$title.=", ";
					elseif($i>0 && $i==count($data->students)-1)
						$title.=" und ";
					$nextname = $student->vorname." ".$student->nachname;
					$title.=$nextname;
					$i++;
				}
			}
			
			//Description
			$description=$data->metadescription;
		}
		
		//News
		if(isset($_GET['tx_sdjnews_article'])){
			$repository=new SOUPDUJOUR\Sdjnews\Domain\Repository\NewsRepository();
			$data=$repository->findOneByUid($_GET['tx_sdjnews_article']); 
			
			//Title
			if(strlen(trim($data->metatitle))>0){
				$title=$data->metatitle;
			}else{
				$title=$data->header;
			}
			
			//Description
			$description=$data->metadescription;
		}
		
		
		/* ---- OUTPUT ----- */
		
		//Title ending
		$connect=" - ";
		if(strlen($title)==0)
			$connect="";
		
		if(isset($_GET['tx_sdjhfgkd20_detail']))
			$title.=$connect.$conf['short-titleend']; // kürzerer Titel-Schluss für Projektseiten
		else
			$title.=$connect.$conf['titleend'];

		// Wenn die Title-Einstellung im Backend "NUR_ENDUNG" enthält, wird nur die Endung ausgegeben ($conf['titleend'])
		if (strstr($title, 'NUR_ENDUNG')) {
			$title = $conf['titleend'];
		}
				
		//Render to Template
		$meta='
			<title>'.$title.'</title>
			<meta name="description" content="'.$description.'" />
		';
		
		//Return
		return $meta;
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sdjmetadata/pi1/class.tx_sdjmetadata_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sdjmetadata/pi1/class.tx_sdjmetadata_pi1.php']);
}
?>