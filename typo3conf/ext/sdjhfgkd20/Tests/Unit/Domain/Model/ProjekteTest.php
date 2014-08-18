<?php

namespace SOUPDUJOUR\Sdjhfgkd20\Tests;
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
 * Test case for class \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Projekte.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage KD 2.0.
 *
 * @author Pascal Bremmer <pascal@soup-du-jour.de>
 */
class ProjekteTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Projekte
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Projekte();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() { 
		$this->fixture->setTitle('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitle()
		);
	}
	
	/**
	 * @test
	 */
	public function getYearReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getYear()
		);
	}

	/**
	 * @test
	 */
	public function setYearForIntegerSetsYear() { 
		$this->fixture->setYear(12);

		$this->assertSame(
			12,
			$this->fixture->getYear()
		);
	}
	
	/**
	 * @test
	 */
	public function getMainimageReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setMainimageForStringSetsMainimage() { 
		$this->fixture->setMainimage('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getMainimage()
		);
	}
	
	/**
	 * @test
	 */
	public function getTechniquesReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTechniquesForStringSetsTechniques() { 
		$this->fixture->setTechniques('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTechniques()
		);
	}
	
	/**
	 * @test
	 */
	public function getStudentsReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setStudentsForStringSetsStudents() { 
		$this->fixture->setStudents('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getStudents()
		);
	}
	
	/**
	 * @test
	 */
	public function getSeminarReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setSeminarForStringSetsSeminar() { 
		$this->fixture->setSeminar('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getSeminar()
		);
	}
	
	/**
	 * @test
	 */
	public function getSemesterReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setSemesterForStringSetsSemester() { 
		$this->fixture->setSemester('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getSemester()
		);
	}
	
	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription() { 
		$this->fixture->setDescription('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getDescription()
		);
	}
	
	/**
	 * @test
	 */
	public function getMetaabstractReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setMetaabstractForStringSetsMetaabstract() { 
		$this->fixture->setMetaabstract('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getMetaabstract()
		);
	}
	
	/**
	 * @test
	 */
	public function getMetadescriptionReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setMetadescriptionForStringSetsMetadescription() { 
		$this->fixture->setMetadescription('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getMetadescription()
		);
	}
	
	/**
	 * @test
	 */
	public function getMetakeywordsReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setMetakeywordsForStringSetsMetakeywords() { 
		$this->fixture->setMetakeywords('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getMetakeywords()
		);
	}
	
	/**
	 * @test
	 */
	public function getTeacherReturnsInitialValueForLehrende() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getTeacher()
		);
	}

	/**
	 * @test
	 */
	public function setTeacherForObjectStorageContainingLehrendeSetsTeacher() { 
		$teacher = new \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Lehrende();
		$objectStorageHoldingExactlyOneTeacher = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneTeacher->attach($teacher);
		$this->fixture->setTeacher($objectStorageHoldingExactlyOneTeacher);

		$this->assertSame(
			$objectStorageHoldingExactlyOneTeacher,
			$this->fixture->getTeacher()
		);
	}
	
	/**
	 * @test
	 */
	public function addTeacherToObjectStorageHoldingTeacher() {
		$teacher = new \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Lehrende();
		$objectStorageHoldingExactlyOneTeacher = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneTeacher->attach($teacher);
		$this->fixture->addTeacher($teacher);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneTeacher,
			$this->fixture->getTeacher()
		);
	}

	/**
	 * @test
	 */
	public function removeTeacherFromObjectStorageHoldingTeacher() {
		$teacher = new \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Lehrende();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($teacher);
		$localObjectStorage->detach($teacher);
		$this->fixture->addTeacher($teacher);
		$this->fixture->removeTeacher($teacher);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getTeacher()
		);
	}
	
	/**
	 * @test
	 */
	public function getMediaReturnsInitialValueForMedia() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getMedia()
		);
	}

	/**
	 * @test
	 */
	public function setMediaForObjectStorageContainingMediaSetsMedia() { 
		$medium = new \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media();
		$objectStorageHoldingExactlyOneMedia = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneMedia->attach($medium);
		$this->fixture->setMedia($objectStorageHoldingExactlyOneMedia);

		$this->assertSame(
			$objectStorageHoldingExactlyOneMedia,
			$this->fixture->getMedia()
		);
	}
	
	/**
	 * @test
	 */
	public function addMediumToObjectStorageHoldingMedia() {
		$medium = new \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media();
		$objectStorageHoldingExactlyOneMedium = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneMedium->attach($medium);
		$this->fixture->addMedium($medium);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneMedium,
			$this->fixture->getMedia()
		);
	}

	/**
	 * @test
	 */
	public function removeMediumFromObjectStorageHoldingMedia() {
		$medium = new \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($medium);
		$localObjectStorage->detach($medium);
		$this->fixture->addMedium($medium);
		$this->fixture->removeMedium($medium);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getMedia()
		);
	}
	
}
?>