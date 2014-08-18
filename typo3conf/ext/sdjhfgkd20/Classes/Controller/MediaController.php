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
class MediaController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * mediaRepository
	 *
	 * @var \SOUPDUJOUR\Sdjhfgkd20\Domain\Repository\MediaRepository
	 * @inject
	 */
	protected $mediaRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$medias = $this->mediaRepository->findAll();
		$this->view->assign('medias', $medias);
	}

	/**
	 * action show
	 *
	 * @param \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media $media
	 * @return void
	 */
	public function showAction(\SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media $media) {
		$this->view->assign('media', $media);
	}

	/**
	 * action new
	 *
	 * @param \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media $newMedia
	 * @dontvalidate $newMedia
	 * @return void
	 */
	public function newAction(\SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media $newMedia = NULL) {
		$this->view->assign('newMedia', $newMedia);
	}

	/**
	 * action create
	 *
	 * @param \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media $newMedia
	 * @return void
	 */
	public function createAction(\SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media $newMedia) {
		$this->mediaRepository->add($newMedia);
		$this->flashMessageContainer->add('Your new Media was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media $media
	 * @return void
	 */
	public function editAction(\SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media $media) {
		$this->view->assign('media', $media);
	}

	/**
	 * action update
	 *
	 * @param \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media $media
	 * @return void
	 */
	public function updateAction(\SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media $media) {
		$this->mediaRepository->update($media);
		$this->flashMessageContainer->add('Your Media was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media $media
	 * @return void
	 */
	public function deleteAction(\SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media $media) {
		$this->mediaRepository->remove($media);
		$this->flashMessageContainer->add('Your Media was removed.');
		$this->redirect('list');
	}

}
?>