<?php
namespace SOUPDUJOUR\Sdjhfgkd20\Controller;

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
class LehrendeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * lehrendeRepository
	 *
	 * @var \SOUPDUJOUR\Sdjhfgkd20\Domain\Repository\LehrendeRepository
	 * @inject
	 */
	protected $lehrendeRepository;

	/**
	 * action listbig
	 *
	 * @return void
	 */
	public function listbigAction() {
		$lehrendes = $this->lehrendeRepository->listBySorting();
		$this->view->assign('lehrendes', $lehrendes);
	}
	
	/**
	 * action listsmall
	 *
	 * @return void
	 */
	public function listsmallAction() {
		$lehrendes = $this->lehrendeRepository->listBySorting();
		$this->view->assign('lehrendes', $lehrendes);
	}
}
?>