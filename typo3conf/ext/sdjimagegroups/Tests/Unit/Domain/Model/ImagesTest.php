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
 * Test case for class \SOUPDUJOUR\Sdjimagegroups\Domain\Model\Images.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Image Groups
 *
 */
class ImagesTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \SOUPDUJOUR\Sdjimagegroups\Domain\Model\Images
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \SOUPDUJOUR\Sdjimagegroups\Domain\Model\Images();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getImageReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setImageForStringSetsImage() { 
		$this->fixture->setImage('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getImage()
		);
	}
	
	/**
	 * @test
	 */
	public function getImgwidthReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setImgwidthForStringSetsImgwidth() { 
		$this->fixture->setImgwidth('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getImgwidth()
		);
	}
	
	/**
	 * @test
	 */
	public function getImgheightReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setImgheightForStringSetsImgheight() { 
		$this->fixture->setImgheight('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getImgheight()
		);
	}
	
	/**
	 * @test
	 */
	public function getImgtopReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setImgtopForStringSetsImgtop() { 
		$this->fixture->setImgtop('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getImgtop()
		);
	}
	
	/**
	 * @test
	 */
	public function getImgrightReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setImgrightForStringSetsImgright() { 
		$this->fixture->setImgright('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getImgright()
		);
	}
	
	/**
	 * @test
	 */
	public function getImgbottomReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setImgbottomForStringSetsImgbottom() { 
		$this->fixture->setImgbottom('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getImgbottom()
		);
	}
	
	/**
	 * @test
	 */
	public function getImgleftReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setImgleftForStringSetsImgleft() { 
		$this->fixture->setImgleft('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getImgleft()
		);
	}
	
}
?>