<?php
namespace SOUPDUJOUR\Sdjhfgkd20links\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Pascal Bremmer <pascal@soup-du-jour.de>, SOUP DU JOUR
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
 * LinkController
 */
class LinkController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * linkRepository
	 *
	 * @var \SOUPDUJOUR\Sdjhfgkd20links\Domain\Repository\LinkRepository
	 * @inject
	 */
	protected $linkRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$links = $this->linkRepository->listBySorting();
		$this->view->assign('links', $links);
	}

}