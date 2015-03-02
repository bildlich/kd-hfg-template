<?php
namespace SOUPDUJOUR\Sdjnews\Controller;

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
class NewsMediaController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$newsMedias = $this->newsMediaRepository->findAll();
		$this->view->assign('newsMedias', $newsMedias);
	}

	/**
	 * action show
	 *
	 * @param \SOUPDUJOUR\Sdjnews\Domain\Model\NewsMedia $newsMedia
	 * @return void
	 */
	public function showAction(\SOUPDUJOUR\Sdjnews\Domain\Model\NewsMedia $newsMedia) {
		$this->view->assign('newsMedia', $newsMedia);
	}

	/**
	 * action new
	 *
	 * @param \SOUPDUJOUR\Sdjnews\Domain\Model\NewsMedia $newNewsMedia
	 * @dontvalidate $newNewsMedia
	 * @return void
	 */
	public function newAction(\SOUPDUJOUR\Sdjnews\Domain\Model\NewsMedia $newNewsMedia = NULL) {
		$this->view->assign('newNewsMedia', $newNewsMedia);
	}

	/**
	 * action create
	 *
	 * @param \SOUPDUJOUR\Sdjnews\Domain\Model\NewsMedia $newNewsMedia
	 * @return void
	 */
	public function createAction(\SOUPDUJOUR\Sdjnews\Domain\Model\NewsMedia $newNewsMedia) {
		$this->newsMediaRepository->add($newNewsMedia);
		$this->flashMessageContainer->add('Your new NewsMedia was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \SOUPDUJOUR\Sdjnews\Domain\Model\NewsMedia $newsMedia
	 * @return void
	 */
	public function editAction(\SOUPDUJOUR\Sdjnews\Domain\Model\NewsMedia $newsMedia) {
		$this->view->assign('newsMedia', $newsMedia);
	}

	/**
	 * action update
	 *
	 * @param \SOUPDUJOUR\Sdjnews\Domain\Model\NewsMedia $newsMedia
	 * @return void
	 */
	public function updateAction(\SOUPDUJOUR\Sdjnews\Domain\Model\NewsMedia $newsMedia) {
		$this->newsMediaRepository->update($newsMedia);
		$this->flashMessageContainer->add('Your NewsMedia was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \SOUPDUJOUR\Sdjnews\Domain\Model\NewsMedia $newsMedia
	 * @return void
	 */
	public function deleteAction(\SOUPDUJOUR\Sdjnews\Domain\Model\NewsMedia $newsMedia) {
		$this->newsMediaRepository->remove($newsMedia);
		$this->flashMessageContainer->add('Your NewsMedia was removed.');
		$this->redirect('list');
	}

}
?>