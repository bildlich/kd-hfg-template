<?php

namespace SOUPDUJOUR\Sdjimagegroups\Tests;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \SOUPDUJOUR\Sdjimagegroups\Domain\Model\ImageGroup.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Image Groups
 *
 */
class ImageGroupTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \SOUPDUJOUR\Sdjimagegroups\Domain\Model\ImageGroup
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \SOUPDUJOUR\Sdjimagegroups\Domain\Model\ImageGroup();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getImagesReturnsInitialValueForImages() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getImages()
		);
	}

	/**
	 * @test
	 */
	public function setImagesForObjectStorageContainingImagesSetsImages() { 
		$image = new \SOUPDUJOUR\Sdjimagegroups\Domain\Model\Images();
		$objectStorageHoldingExactlyOneImages = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneImages->attach($image);
		$this->fixture->setImages($objectStorageHoldingExactlyOneImages);

		$this->assertSame(
			$objectStorageHoldingExactlyOneImages,
			$this->fixture->getImages()
		);
	}
	
	/**
	 * @test
	 */
	public function addImageToObjectStorageHoldingImages() {
		$image = new \SOUPDUJOUR\Sdjimagegroups\Domain\Model\Images();
		$objectStorageHoldingExactlyOneImage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneImage->attach($image);
		$this->fixture->addImage($image);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneImage,
			$this->fixture->getImages()
		);
	}

	/**
	 * @test
	 */
	public function removeImageFromObjectStorageHoldingImages() {
		$image = new \SOUPDUJOUR\Sdjimagegroups\Domain\Model\Images();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($image);
		$localObjectStorage->detach($image);
		$this->fixture->addImage($image);
		$this->fixture->removeImage($image);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getImages()
		);
	}
	
}
?>