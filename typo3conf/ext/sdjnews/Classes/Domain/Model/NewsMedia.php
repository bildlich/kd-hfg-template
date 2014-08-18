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
class NewsMedia extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * text
	 *
	 * @var \string
	 */
	public $text;

	/**
	 * images
	 *
	 * @var \string
	 */
	public $images;

	/**
	 * imagecaption
	 *
	 * @var \string
	 */
	public $imagecaption;

	/**
	 * Returns the text
	 *
	 * @return \string $text
	 */
	public function getText() {
		return $this->text;
	}

	/**
	 * Sets the text
	 *
	 * @param \string $text
	 * @return void
	 */
	public function setText($text) {
		$this->text = $text;
	}

	/**
	 * Returns the images
	 *
	 * @return \string $images
	 */
	public function getImages() {
		return $this->images;
	}

	/**
	 * Sets the images
	 *
	 * @param \string $images
	 * @return void
	 */
	public function setImages($images) {
		$this->images = $images;
	}

	/**
	 * Returns the imagecaption
	 *
	 * @return \string $imagecaption
	 */
	public function getImagecaption() {
		return $this->imagecaption;
	}

	/**
	 * Sets the imagecaption
	 *
	 * @param \string $imagecaption
	 * @return void
	 */
	public function setImagecaption($imagecaption) {
		$this->imagecaption = $imagecaption;
	}

}
?>