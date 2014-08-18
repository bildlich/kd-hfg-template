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
class Projekte extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	public $title;

	/**
	 * year
	 *
	 * @var \integer
	 * @validate NotEmpty
	 */
	protected $year;

	/**
	 * mainimage
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $mainimage;

	/**
	 * techniques
	 *
	 * @var \string
	 */
	protected $techniques;

	/**
	 * seminar
	 *
	 * @var \string
	 */
	protected $seminar;

	/**
	 * semester
	 *
	 * @var \string
	 */
	protected $semester;

	/**
	 * description
	 *
	 * @var \string
	 */
	protected $description;

	/**
	 * metaabstract
	 *
	 * @var \string
	 */
	protected $metaabstract;

	/**
	 * metatitle
	 *
	 * @var \string
	 */
	public $metatitle;
	
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
	 * teacher
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Lehrende>
	 */
	protected $teacher;
	
	/**
	 * students
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Studierende>
	 */
	public $students;

	/**
	 * media
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media>
	 */
	protected $media;

	/**
	 * __construct
	 *
	 * @return Projekte
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
		$this->teacher = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		
		$this->students = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		
		$this->media = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * Returns the year
	 *
	 * @return \integer $year
	 */
	public function getYear() {
		return $this->year;
	}

	/**
	 * Sets the year
	 *
	 * @param \integer $year
	 * @return void
	 */
	public function setYear($year) {
		$this->year = $year;
	}

	/**
	 * Returns the mainimage
	 *
	 * @return \string $mainimage
	 */
	public function getMainimage() {
		return "uploads/tx_sdjhfgkd20/".$this->mainimage;
	}

	/**
	 * Sets the mainimage
	 *
	 * @param \string $mainimage
	 * @return void
	 */
	public function setMainimage($mainimage) {
		$this->mainimage = $mainimage;
	}

	/**
	 * Returns the techniques
	 *
	 * @return \string $techniques
	 */
	public function getTechniques() {
		return $this->techniques;
	}

	/**
	 * Sets the techniques
	 *
	 * @param \string $techniques
	 * @return void
	 */
	public function setTechniques($techniques) {
		$this->techniques = $techniques;
	}

	/**
	 * Adds a Studierende
	 *
	 * @param \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Studierende $students
	 * @return void
	 */
	public function addStudents(\SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Studierende $students) {
		$this->students->attach($students);
	}

	/**
	 * Removes a Studierende
	 *
	 * @param \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Studierende $studentsToRemove The Studierende to be removed
	 * @return void
	 */
	public function removeStudents(\SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Studierende $studentsToRemove) {
		$this->students->detach($studentsToRemove);
	}

	/**
	 * Returns the students
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Studierende> $students
	 */
	public function getStudents() {
		return $this->students;
	}

	/**
	 * Sets the students
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Studierende> $students
	 * @return void
	 */
	public function setStudents(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $students) {
		$this->students = $students;
	}

	/**
	 * Returns the seminar
	 *
	 * @return \string $seminar
	 */
	public function getSeminar() {
		return $this->seminar;
	}

	/**
	 * Sets the seminar
	 *
	 * @param \string $seminar
	 * @return void
	 */
	public function setSeminar($seminar) {
		$this->seminar = $seminar;
	}

	/**
	 * Returns the semester
	 *
	 * @return \string $semester
	 */
	public function getSemester() {
		return $this->semester;
	}

	/**
	 * Sets the semester
	 *
	 * @param \string $semester
	 * @return void
	 */
	public function setSemester($semester) {
		$this->semester = $semester;
	}

	/**
	 * Returns the description
	 *
	 * @return \string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param \string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
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
	 * Returns the metatitle
	 *
	 * @return \string $metatitle
	 */
	public function getMetatitle() {
		return $this->metatitle;
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
	 * Adds a Lehrende
	 *
	 * @param \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Lehrende $teacher
	 * @return void
	 */
	public function addTeacher(\SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Lehrende $teacher) {
		$this->teacher->attach($teacher);
	}

	/**
	 * Removes a Lehrende
	 *
	 * @param \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Lehrende $teacherToRemove The Lehrende to be removed
	 * @return void
	 */
	public function removeTeacher(\SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Lehrende $teacherToRemove) {
		$this->teacher->detach($teacherToRemove);
	}

	/**
	 * Returns the teacher
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Lehrende> $teacher
	 */
	public function getTeacher() {
		return $this->teacher;
	}

	/**
	 * Sets the teacher
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Lehrende> $teacher
	 * @return void
	 */
	public function setTeacher(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $teacher) {
		$this->teacher = $teacher;
	}

	/**
	 * Adds a Media
	 *
	 * @param \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media $medium
	 * @return void
	 */
	public function addMedium(\SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media $medium) {
		$this->media->attach($medium);
	}

	/**
	 * Removes a Media
	 *
	 * @param \SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media $mediumToRemove The Media to be removed
	 * @return void
	 */
	public function removeMedium(\SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media $mediumToRemove) {
		$this->media->detach($mediumToRemove);
	}

	/**
	 * Returns the media
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media> $media
	 */
	public function getMedia() {
		return $this->media;
	}

	/**
	 * Sets the media
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SOUPDUJOUR\Sdjhfgkd20\Domain\Model\Media> $media
	 * @return void
	 */
	public function setMedia(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $media) {
		$this->media = $media;
	}

}
?>