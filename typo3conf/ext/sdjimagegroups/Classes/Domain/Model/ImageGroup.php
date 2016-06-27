<?php
namespace SOUPDUJOUR\Sdjimagegroups\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 
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
 * @package sdjimagegroups
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class ImageGroup extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * images
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SOUPDUJOUR\Sdjimagegroups\Domain\Model\Images>
	 */
	protected $images;

	/**
	 * __construct
	 *
	 * @return ImageGroup
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->images = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Images
	 *
	 * @param \SOUPDUJOUR\Sdjimagegroups\Domain\Model\Images $image
	 * @return void
	 */
	public function addImage(\SOUPDUJOUR\Sdjimagegroups\Domain\Model\Images $image) {
		$this->images->attach($image);
	}

	/**
	 * Removes a Images
	 *
	 * @param \SOUPDUJOUR\Sdjimagegroups\Domain\Model\Images $imageToRemove The Images to be removed
	 * @return void
	 */
	public function removeImage(\SOUPDUJOUR\Sdjimagegroups\Domain\Model\Images $imageToRemove) {
		$this->images->detach($imageToRemove);
	}

	/**
	 * Returns the images
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SOUPDUJOUR\Sdjimagegroups\Domain\Model\Images> $images
	 */
	public function getImages() {
		return $this->images;
	}

	/**
	 * Sets the images
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SOUPDUJOUR\Sdjimagegroups\Domain\Model\Images> $images
	 * @return void
	 */
	public function setImages(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $images) {
		$this->images = $images;
	}

}
?>