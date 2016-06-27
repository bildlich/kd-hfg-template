<?php
namespace SOUPDUJOUR\Sdjhfgkd20\Domain\Repository;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Pascal Bremmer <pascal@soup-du-jour.de>, SOUP DU JOUR
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
 *
 *
 * @package sdjhfgkd20
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class ProjekteRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
	
	public function listMedia($id){
		$query=$this->createQuery();
		$query->statement('SELECT image FROM tx_sdjhfgkd20_domain_model_media WHERE hidden=0 AND deleted=0 AND projekte='.$id, array());
		$all=$query->execute();		
		return $all;
	}
	
	public function listBySorting($year){
		$pages=array();
		$pquery=$this->createQuery();
		$pquery->statement('SELECT uid FROM pages WHERE pid=16', array());
		$pquery->getQuerySettings()->setReturnRawQueryResult(TRUE);
		$pages=$pquery->execute();
				
		foreach($pages as $page){
			$page=trim($page['uid']);
			$query=$this->createQuery();
			$query->getQuerySettings()->setRespectStoragePage(FALSE);
			$query->matching($query->equals('pid', $page));
			$query->setOrderings(array("sorting" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
        	$all[]=$query->execute();
        }
        
        foreach($all as $entries){
        	foreach($entries as $entry){
	        	$posts[]=$entry;
        	}
        }
        
		return $posts;
	}	
	
	public function findOne($uid){
		$query=$this->createQuery();
		$query->getQuerySettings()->setRespectStoragePage(FALSE);
		$query->matching($query->equals('uid', $uid));
        $all=$query->execute();
        return $all[0];
	}
}
?>