<?php
namespace SOUPDUJOUR\Sdjxmlsitemap2\Domain\Repository;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014
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
 * The repository for XMLSITEMAPs
 */
class XMLSITEMAPRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
	
	
	public function buildXml(){
		//pages		
		$query=$this->createQuery(); 
		$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		$query->statement('SELECT tstamp,uid,tx_sdjmetadata_xmlprio,tx_sdjmetadata_xmlinterval FROM pages WHERE deleted=0 AND hidden=0 AND nav_hide=0 AND doktype=1 AND pid=3 OR uid=3 ORDER BY uid');
		$posts=$query->execute();

		foreach($posts as $erg){
			$all[]=array(
				"uid"=>$erg['uid'],
				"date"=>date("Y-m-d",$erg['tstamp']),
				"rel"=>$erg['tx_sdjmetadata_xmlprio'],
				"act"=>$erg['tx_sdjmetadata_xmlinterval']	
			);
		}
		
		//projekte
		$query=$this->createQuery(); 
		$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		$query->statement('SELECT uid FROM pages WHERE pid=16');
		$posts=$query->execute();
		
  		$pwhere="";
  		foreach($posts as $erg){
			$pwhere.="pid=".$erg["uid"]." OR ";
		}
		
		
		$query=$this->createQuery(); 
		$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		$query->statement('SELECT tstamp,uid FROM tx_sdjhfgkd20_domain_model_projekte WHERE deleted=0 AND hidden=0 AND ('.substr($pwhere,0,-4).') ORDER BY uid');
		$posts=$query->execute();

		foreach($posts as $erg){
			$all[]=array(
				"uid"=>4,
				"projekt"=>$erg['uid'],
				"date"=>date("Y-m-d",$erg['tstamp']),
				"rel"=>0.3,
				"act"=>"never"	
			);
		}
		
		//news  		
  		$query=$this->createQuery(); 
		$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		$query->statement('SELECT tstamp,uid,date FROM tx_sdjnews_domain_model_news WHERE deleted=0 AND hidden=0 AND pid=19 ORDER BY uid');
		$posts=$query->execute();
		
		$years=array();
		foreach($posts as $erg){
			$years[]=date("Y",$erg['date']);
			$all[]=array(
				"uid"=>5,
				"news"=>$erg['uid'],
				"date"=>date("Y-m-d",$erg['tstamp']),
				"rel"=>0.3,
				"act"=>"never"	
			);
		}
		
		$years=array_unique($years);
		foreach($years as $year){
			if($year!==date("Y")){
				$all[]=array(
					"uid"=>5,
					"jahr"=>$year,
					"date"=>$year."-1-1",
					"rel"=>0.1,
					"act"=>"never"	
				);
			}
		}
		
		$i=0;
		foreach($all as $one){
			if(!isset($one['rel']) || strlen($one['rel'])==0)
				$all[$i]["rel"]="0.5";
			if(!isset($one['act']) || strlen($one['act'])==0)
				$all[$i]["rel"]="never";
			
			$i++;	
		}
		
		//output
		return $all;
	}
}