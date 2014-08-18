<?php
namespace SOUPDUJOUR\Sdjnews\Domain\Model;

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
class News extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * date
	 *
	 * @var \DateTime
	 * @validate NotEmpty
	 */
	public $date;
	
	/**
	 * text
	 *
	 * @var \string
	 */
	public $text;

	/**
	 * header
	 *
	 * @var \string
	 */
	public $header;

	/**
	 * metatitle
	 *
	 * @var \string
	 */
	public $metatitle;

	/**
	 * metaabstract
	 *
	 * @var \string
	 */
	protected $metaabstract;

	/**
	 * metadescription
	 *
	 * @var \string
	 */
	public $metadescription;

	/**
	 * metakeywords
	 *
	 * @var \string
	 */
	protected $metakeywords;

	/**
	 * media
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SOUPDUJOUR\Sdjnews\Domain\Model\NewsMedia>
	 */
	protected $media;

	/**
	 * __construct
	 *
	 * @return News
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
		$this->media = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the date
	 *
	 * @return \DateTime $date
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * Sets the date
	 *
	 * @param \DateTime $date
	 * @return void
	 */
	public function setDate($date) {
		$this->date = $date;
	}

	/**
	 * Returns the header
	 *
	 * @return \string $header
	 */
	public function getHeader() {
		return $this->header;
	}

	/**
	 * Sets the header
	 *
	 * @param \string $header
	 * @return void
	 */
	public function setHeader($header) {
		$this->header = $header;
	}

	/**
	 * Returns the metatitle
	 *
	 * @return \string $metatitle
	 */
	public function getMetatitle() {
		return $this->metatitle;
	}

	/**
	 * Sets the metatitle
	 *
	 * @param \string $metatitle
	 * @return void
	 */
	public function setMetatitle($metatitle) {
		$this->metatitle = $metatitle;
	}

	/**
	 * Returns the metaabstract
	 *
	 * @return \string $metaabstract
	 */
	public function getMetaabstract() {
		return $this->metaabstract;
	}

	/**
	 * Sets the metaabstract
	 *
	 * @param \string $metaabstract
	 * @return void
	 */
	public function setMetaabstract($metaabstract) {
		$this->metaabstract = $metaabstract;
	}

	/**
	 * Returns the metadescription
	 *
	 * @return \string $metadescription
	 */
	public function getMetadescription() {
		return $this->metadescription;
	}

	/**
	 * Sets the metadescription
	 *
	 * @param \string $metadescription
	 * @return void
	 */
	public function setMetadescription($metadescription) {
		$this->metadescription = $metadescription;
	}

	/**
	 * Returns the metakeywords
	 *
	 * @return \string $metakeywords
	 */
	public function getMetakeywords() {
		return $this->metakeywords;
	}

	/**
	 * Sets the metakeywords
	 *
	 * @param \string $metakeywords
	 * @return void
	 */
	public function setMetakeywords($metakeywords) {
		$this->metakeywords = $metakeywords;
	}

	/**
	 * Adds a NewsMedia
	 *
	 * @param \SOUPDUJOUR\Sdjnews\Domain\Model\NewsMedia $medium
	 * @return void
	 */
	public function addMedium(\SOUPDUJOUR\Sdjnews\Domain\Model\NewsMedia $medium) {
		$this->media->attach($medium);
	}

	/**
	 * Removes a NewsMedia
	 *
	 * @param \SOUPDUJOUR\Sdjnews\Domain\Model\NewsMedia $mediumToRemove The NewsMedia to be removed
	 * @return void
	 */
	public function removeMedium(\SOUPDUJOUR\Sdjnews\Domain\Model\NewsMedia $mediumToRemove) {
		$this->media->detach($mediumToRemove);
	}

	/**
	 * Returns the media
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SOUPDUJOUR\Sdjnews\Domain\Model\NewsMedia> $media
	 */
	public function getMedia() {
		return $this->media;
	}

	/**
	 * Sets the media
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SOUPDUJOUR\Sdjnews\Domain\Model\NewsMedia> $media
	 * @return void
	 */
	public function setMedia(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $media) {
		$this->media = $media;
	}

}
?>