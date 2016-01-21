<?php
namespace SOUPDUJOUR\Sdjhfgkd20links\Domain\Model;


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
 * Link
 */
class Link extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * image
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $image = NULL;

	/**
	 * bodytext
	 *
	 * @var string
	 */
	protected $bodytext = '';

	/**
	 * linktitle
	 *
	 * @var string
	 */
	protected $linktitle = '';

	/**
	 * linkurl
	 *
	 * @var string
	 */
	protected $linkurl = '';

	/**
	 * Returns the image
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets the image
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 * @return void
	 */
	public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image) {
		$this->image = $image;
	}

	/**
	 * Returns the bodytext
	 *
	 * @return string $bodytext
	 */
	public function getBodytext() {
		return $this->bodytext;
	}

	/**
	 * Sets the bodytext
	 *
	 * @param string $bodytext
	 * @return void
	 */
	public function setBodytext($bodytext) {
		$this->bodytext = $bodytext;
	}

	/**
	 * Returns the linktitle
	 *
	 * @return string $linktitle
	 */
	public function getLinktitle() {
		return $this->linktitle;
	}

	/**
	 * Sets the linktitle
	 *
	 * @param string $linktitle
	 * @return void
	 */
	public function setLinktitle($linktitle) {
		$this->linktitle = $linktitle;
	}

	/**
	 * Returns the linkurl
	 *
	 * @return string $linkurl
	 */
	public function getLinkurl() {
		return $this->linkurl;
	}

	/**
	 * Sets the linkurl
	 *
	 * @param string $linkurl
	 * @return void
	 */
	public function setLinkurl($linkurl) {
		$this->linkurl = $linkurl;
	}

}