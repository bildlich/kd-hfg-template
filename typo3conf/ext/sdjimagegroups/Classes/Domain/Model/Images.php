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
class Images extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * image
	 *
	 * @var \string
	 */
	protected $image;

	/**
	 * imgwidth
	 *
	 * @var \string
	 */
	protected $imgwidth;

	/**
	 * imgheight
	 *
	 * @var \string
	 */
	protected $imgheight;

	/**
	 * imgtop
	 *
	 * @var \string
	 */
	protected $imgtop;

	/**
	 * imgright
	 *
	 * @var \string
	 */
	protected $imgright;

	/**
	 * imgbottom
	 *
	 * @var \string
	 */
	protected $imgbottom;

	/**
	 * imgleft
	 *
	 * @var \string
	 */
	protected $imgleft;

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
	 * Returns the imgwidth
	 *
	 * @return \string $imgwidth
	 */
	public function getImgwidth() {
		return $this->imgwidth;
	}

	/**
	 * Sets the imgwidth
	 *
	 * @param \string $imgwidth
	 * @return void
	 */
	public function setImgwidth($imgwidth) {
		$this->imgwidth = $imgwidth;
	}

	/**
	 * Returns the imgheight
	 *
	 * @return \string $imgheight
	 */
	public function getImgheight() {
		return $this->imgheight;
	}

	/**
	 * Sets the imgheight
	 *
	 * @param \string $imgheight
	 * @return void
	 */
	public function setImgheight($imgheight) {
		$this->imgheight = $imgheight;
	}

	/**
	 * Returns the imgtop
	 *
	 * @return \string $imgtop
	 */
	public function getImgtop() {
		return $this->imgtop;
	}

	/**
	 * Sets the imgtop
	 *
	 * @param \string $imgtop
	 * @return void
	 */
	public function setImgtop($imgtop) {
		$this->imgtop = $imgtop;
	}

	/**
	 * Returns the imgright
	 *
	 * @return \string $imgright
	 */
	public function getImgright() {
		return $this->imgright;
	}

	/**
	 * Sets the imgright
	 *
	 * @param \string $imgright
	 * @return void
	 */
	public function setImgright($imgright) {
		$this->imgright = $imgright;
	}

	/**
	 * Returns the imgbottom
	 *
	 * @return \string $imgbottom
	 */
	public function getImgbottom() {
		return $this->imgbottom;
	}

	/**
	 * Sets the imgbottom
	 *
	 * @param \string $imgbottom
	 * @return void
	 */
	public function setImgbottom($imgbottom) {
		$this->imgbottom = $imgbottom;
	}

	/**
	 * Returns the imgleft
	 *
	 * @return \string $imgleft
	 */
	public function getImgleft() {
		return $this->imgleft;
	}

	/**
	 * Sets the imgleft
	 *
	 * @param \string $imgleft
	 * @return void
	 */
	public function setImgleft($imgleft) {
		$this->imgleft = $imgleft;
	}

}
?>