<?php
namespace SOUPDUJOUR\Sdjsectionnav\Domain\Repository;


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
 * The repository for SectionNav
 */
class SectionNavRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
	public function sectionNav(){
		
  		//English
  		if($_GET['L']==2){
  			$myquery='SELECT pages_language_overlay.pid,pages_language_overlay.title FROM pages_language_overlay, pages WHERE pages_language_overlay.deleted=0 AND pages_language_overlay.hidden=0 AND pages.hidden=0 AND pages.deleted=0 AND pages.nav_hide=0  AND pages.doktype=1 AND pages.uid=pages_language_overlay.pid AND pages.pid='.$GLOBALS['TSFE']->id.' ORDER BY pages.sorting';
  		}
  		//German
  		else{
	  		$myquery='SELECT uid,title FROM pages WHERE deleted=0 AND hidden=0 AND nav_hide=0 AND doktype=1 AND pid='.$GLOBALS['TSFE']->id.' ORDER BY sorting';
  		}
  		
  		$query=$this->createQuery();
		$query->statement($myquery, array());
		$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
        $all=$query->execute();
        
   		$posts=array();
  		foreach($all as $one){
	  		if($_GET['L']==0)
	  			$posts[]=array("title"=>$one["title"],"uid"=>$one["uid"]);
	  		else
	  			$posts[]=array("title"=>$one["title"],"uid"=>$one["pid"]);
  		}
  		
		return $posts;
	}
}