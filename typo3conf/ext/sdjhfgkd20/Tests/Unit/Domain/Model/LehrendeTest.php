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
 * Test case for class \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Lehrende.
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
class LehrendeTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Lehrende
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Lehrende();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getAnredeReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getAnrede()
		);
	}

	/**
	 * @test
	 */
	public function setAnredeForIntegerSetsAnrede() { 
		$this->fixture->setAnrede(12);

		$this->assertSame(
			12,
			$this->fixture->getAnrede()
		);
	}
	
	/**
	 * @test
	 */
	public function getTitelReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitelForStringSetsTitel() { 
		$this->fixture->setTitel('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitel()
		);
	}
	
	/**
	 * @test
	 */
	public function getVornameReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setVornameForStringSetsVorname() { 
		$this->fixture->setVorname('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getVorname()
		);
	}
	
	/**
	 * @test
	 */
	public function getNachnameReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setNachnameForStringSetsNachname() { 
		$this->fixture->setNachname('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getNachname()
		);
	}
	
	/**
	 * @test
	 */
	public function getBildReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setBildForStringSetsBild() { 
		$this->fixture->setBild('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getBild()
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
	
}
?>