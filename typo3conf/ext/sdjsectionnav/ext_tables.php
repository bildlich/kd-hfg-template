<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

/*
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Section Navi'
);
*/

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Section Navi');
?>