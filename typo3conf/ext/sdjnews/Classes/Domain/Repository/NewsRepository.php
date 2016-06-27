<?php
namespace SOUPDUJOUR\Sdjnews\Domain\Repository;

/***************************************************************
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
 *
 *
 * @package sdjnews
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class NewsRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	protected $defaultOrderings = array(
    	'date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
	); 

	public function findByGivenYear($year){
		$first=mktime(0, 0, 0, 1, 1, $year);
		$last=mktime(0, 0, 0, 1, 1, $year+1);
		$query=$this->createQuery();
		$query->matching(
        	$query->logicalAnd(
                $query->lessThan('date', $last),
                $query->greaterThan('date', $first)
               )
        );
		
		$query->setOrderings(array("date" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
        $posts=$query->execute();
		
		return $posts;
	}
	
	public function listYears(){
		$all=$this->findAll();
		$years=array();
		foreach($all as $a){
		    $years[]=$a->date->format("Y");
		}
		$years=array_unique($years);
		rsort($years);
		return $years;
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