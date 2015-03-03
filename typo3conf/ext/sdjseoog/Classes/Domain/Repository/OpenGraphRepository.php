<?php
namespace SOUPDUJOUR\Sdjseoog\Domain\Repository;


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
 * The repository for OpenGraph
 */
class OpenGraphRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
	public function getImage($pid){
		$query=$this->createQuery(); 
		$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		$query->getQuerySettings()->setRespectStoragePage(FALSE);
		$query->statement('SELECT identifier FROM sys_file,sys_file_reference WHERE sys_file.type=2 AND sys_file.storage=1 AND sys_file_reference.uid_local=sys_file.uid AND sys_file_reference.tablenames="pages" AND sys_file_reference.fieldname="image" AND sys_file_reference.sorting_foreign=1 AND sys_file_reference.table_local="sys_file" AND sys_file_reference.deleted=0 AND sys_file_reference.uid_foreign='.$pid);
		$posts=$query->execute();
		return $posts;	
	}
}