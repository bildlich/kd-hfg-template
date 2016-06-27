<?php
namespace SOUPDUJOUR\Sdjseoog\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Pascal Bremmer <pascal@soup-du-jour.de>, SOUP DU JOUR
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * OpenGraphController
 */
class OpenGraphController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * openGraphRepository
	 *
	 * @var \SOUPDUJOUR\Sdjseoog\Domain\Repository\OpenGraphRepository
	 * @inject
	 */
	protected $openGraphRepository = NULL;
	
	/**
	 * projekteRepository
	 *
	 * @var \SOUPDUJOUR\Sdjhfgkd20\Domain\Repository\ProjekteRepository
	 * @inject
	 */
	protected $projekteRepository;
	
	/**
	 * newsRepository
	 *
	 * @var \SOUPDUJOUR\Sdjnews\Domain\Repository\NewsRepository
	 * @inject
	 */
	protected $newsRepository;
	
	
	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		/* ---- Collect Metadata ----- */
		$this->cObj=$this->configurationManager->getContentObject();	
		$base_url=substr($GLOBALS['TSFE']->tmpl->setup['config.']['baseURL'],0,-1);
		$site_url=$base_url.$_SERVER["REQUEST_URI"];
		$image="";
		
		//Simple Pages		
		if(!isset($_GET['tx_sdjhfgkd20_detail']) && !isset($_GET['tx_sdjnews_article'])){
			$title=$this->cObj->data['tx_sdjmetadata_title'];
			if(strlen(trim($title))==0)
				$title=$this->cObj->data['title'];
			$ogt=$title;
			$description=$this->cObj->data['tx_sdjmetadata_description'];
			$type="website";
			
			//Image
			$rootline=array_reverse($GLOBALS["TSFE"]->rootLine);
			$rootline[]=$this->cObj->data;
			$rootline=array_reverse($rootline);
			foreach($rootline as $page){				
				if(strlen(trim($page["tx_sdjseoog_image"]))>0){
					$img="uploads/tx_sdjseoog/".$page["tx_sdjseoog_image"];
					if(file_exists($img)){
						$image=$img;
						break;	
					}
				}
			}	
		}
			

		//Projects
		if(isset($_GET['tx_sdjhfgkd20_detail'])){
			$data=$this->projekteRepository->findOne($_GET['tx_sdjhfgkd20_detail']); 
			
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
			$ogt=$title;
			
			//Description
			$description=$data->metadescription;
			if(strlen($description)<10)
				$description=$this->shorten($data->description,140);
			
			//Type
			$type="article";
			
			//Image			
			$path="uploads/tx_sdjhfgkd20/";
			$img=$data->ogimage;
			if(file_exists($path.$img) && strlen($img)>0){
				$image=$path.$img;	
			}	
		}
		
		//News
		if(isset($_GET['tx_sdjnews_article'])){
			$data=$this->newsRepository->findOne($_GET['tx_sdjnews_article']); 
			//Title
			if(strlen(trim($data->metatitle))>0){
				$title=$data->metatitle;
			}else{
				$title=$data->header;
			}
			$ogt=$title;
			$description=$data->metadescription;
			if(strlen($description)<10)
				$description=$this->shorten($data->text,140);
			
			//Type
			$type="article";
			
			//Image
			$path="uploads/tx_sdjnews/";
			$img=$data->ogimage;
			if(file_exists($path.$img) && strlen($img)>0){
				$image=$path.$img;	
			}			
		}
		
		
		/* ---- OUTPUT ----- */
		
		//Title ending
		$connect=" - ";
		if(strlen($title)==0)
			$connect="";
		
		
		if(isset($_GET['tx_sdjhfgkd20_detail']))
			$title.=$connect.$this->settings['short-titleend']; // kürzerer Titel-Schluss für Projektseiten
		else
			$title.=$connect.$this->settings['titleend'];

		// Wenn die Title-Einstellung im Backend "NUR_ENDUNG" enthält, wird nur die Endung ausgegeben ($conf['titleend'])
		if (strstr($title, 'NUR_ENDUNG')) {
			$title = $this->settings['titleend'];
		}
				
		//Render to Template
		$meta='
			<title>'.$title.'</title>
			<meta name="description" content="'.$description.'" />
			<meta property="og:title" content="'.$ogt.'" />
			<meta property="og:description" content="'.$description.'" />
			<meta property="og:type" content="'.$type.'" />
			<meta property="og:url" content="'.$site_url.'" />
			<meta name="twitter:card" content="summary" />
			<meta name="twitter:title" content="'.$ogt.'" />
			<meta name="twitter:description" content="'.$description.'" />
			<meta name="twitter:url" content="'.$site_url.'" />
		';
		
		if(strlen($image)>0){
			$meta.='
			<meta property="og:image" content="'.$base_url."/".$image.'" />
			<meta name="twitter:image" content="'.$base_url."/".$image.'" />
			';
		}
				
		//Return
		$GLOBALS['TSFE']->additionalHeaderData[$this->extKey]=$meta;
		return "";
	}
	
	public function shorten($text,$chars){
		return $string = preg_replace("/[^ ]*$/", '', substr(strip_tags($text), 0,$chars))."...";
	}

}