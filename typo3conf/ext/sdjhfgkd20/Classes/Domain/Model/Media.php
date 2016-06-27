<?php
namespace SOUPDUJOUR\Sdjhfgkd20\Domain\Model;

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
class Media extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	public $title;

	/**
	 * image
	 *
	 * @var \string
	 */
	public $image;

	/**
	 * mp4
	 *
	 * @var \string
	 */
	public $mp4;

	/**
	 * ogg
	 *
	 * @var \string
	 */
	public $ogg;

	/**
	 * embed
	 *
	 * @var \string
	 */
	public $embed;
	
	/**
	 * sorting
	 *
	 * @var \string
	 */
	public $sorting;

	
	/**
	 * Returns the title
	 *
	 * @return \string $title
	 */
	public function getSorting() {
		return $this->sorting;
	}
	
	/**
	 * Returns the title
	 *
	 * @return \string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param \string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the image
	 *
	 * @return \string $image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets the image
	 *
	 * @param \string $image
	 * @return void
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * Returns the mp4
	 *
	 * @return \string $mp4
	 */
	public function getMp4() {
		return $this->mp4;
	}

	/**
	 * Sets the mp4
	 *
	 * @param \string $mp4
	 * @return void
	 */
	public function setMp4($mp4) {
		$this->mp4 = $mp4;
	}

	/**
	 * Returns the ogg
	 *
	 * @return \string $ogg
	 */
	public function getOgg() {
		return $this->ogg;
	}

	/**
	 * Sets the ogg
	 *
	 * @param \string $ogg
	 * @return void
	 */
	public function setOgg($ogg) {
		$this->ogg = $ogg;
	}

	/**
	 * Returns the embed
	 *
	 * @return \string $embed
	 */
	public function getEmbed() {
		return $this->embed;
	}

	/**
	 * Sets the embed
	 *
	 * @param \string $embed
	 * @return void
	 */
	public function setEmbed($embed) {
		$this->embed = $embed;
	}

}
?>