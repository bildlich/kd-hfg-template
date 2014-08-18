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
class Studierende extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * info
	 *
	 * @var \integer
	 * @validate NotEmpty
	 */
	public $info;
	

	/**
	 * vorname
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	public $vorname;

	/**
	 * nachname
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	public $nachname;
	
	/**
	 * website
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	public $website;

	/**
	 * Returns the info
	 *
	 * @return \integer $info
	 */
	public function getInfo() {
		return $this->info;
	}
	
	/**
	 * Sets the info
	 *
	 * @param \integer $info
	 * @return void
	 */
	public function setInfo($info) {
		$this->info = $info;
	}
	

	/**
	 * Returns the vorname
	 *
	 * @return \string $vorname
	 */
	public function getVorname() {
		return $this->vorname;
	}

	/**
	 * Sets the vorname
	 *
	 * @param \string $vorname
	 * @return void
	 */
	public function setVorname($vorname) {
		$this->vorname = $vorname;
	}

	/**
	 * Returns the nachname
	 *
	 * @return \string $nachname
	 */
	public function getNachname() {
		return $this->nachname;
	}

	/**
	 * Sets the nachname
	 *
	 * @param \string $nachname
	 * @return void
	 */
	public function setNachname($nachname) {
		$this->nachname = $nachname;
	}
	
	/**
	 * Returns the website
	 *
	 * @return \string $website
	 */
	public function getWebsite() {
		return $this->website;
	}

	/**
	 * Sets the website
	 *
	 * @param \string $website
	 * @return void
	 */
	public function setWebsite($website) {
		$this->website = $website;
	}

}
?>