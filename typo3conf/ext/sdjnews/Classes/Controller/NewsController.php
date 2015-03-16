<?php
namespace SOUPDUJOUR\Sdjnews\Controller;

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
class NewsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * newsRepository
	 *
	 * @var \SOUPDUJOUR\Sdjnews\Domain\Repository\NewsRepository
	 * @inject
	 */
	protected $newsRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {		
		if(isset($_GET['tx_sdjnews_article'])){
			$this->forward('show', 'News', null, null);
		}else{
			$years=$this->newsRepository->listYears();
			if(isset($_GET['tx_sdjnews_year'])){
				$news = $this->newsRepository->findByGivenYear($_GET['tx_sdjnews_year']);
				$this->view->assign('newss', $news);
			}else{
				$news=$this->newsRepository->findByGivenYear($years[0]);
				$this->view->assign('newss', $news);
			}
			$this->view->assign('navi', $years);
			
			$this->view->assign('baseUrl', $GLOBALS['TSFE']->tmpl->setup['config.']['baseURL']);
		}
	}

	/**
	 * action show
	 *
	 * @return void
	 */
	public function showAction() {
		$news=$this->newsRepository->findOneByUid($_GET['tx_sdjnews_article']);		
		$this->view->assign('news', $news);
		
		$years=$this->newsRepository->listYears();
		$this->view->assign('navi', $years);
		
		$this->view->assign('baseUrl', $GLOBALS['TSFE']->tmpl->setup['config.']['baseURL']);
	}
}
?>