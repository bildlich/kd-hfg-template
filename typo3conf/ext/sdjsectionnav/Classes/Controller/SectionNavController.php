<?php
namespace SOUPDUJOUR\Sdjsectionnav\Controller;


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
 * SectionNavController
 */
class SectionNavController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
	
	/**
	 * sectionNavRepository
	 *
	 * @var \SOUPDUJOUR\Sdjsectionnav\Domain\Repository\SectionNavRepository
	 * @inject
	 */
	protected $sectionNavRepository = NULL;
	
	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$this->view->assign('links', $this->sectionNavRepository->sectionNav());
		$this->view->assign('L', $_GET['L']);
		$this->view->assign('pageid', $GLOBALS['TSFE']->id);
	}
}