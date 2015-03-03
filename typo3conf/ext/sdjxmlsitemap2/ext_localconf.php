<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'SOUPDUJOUR.' . $_EXTKEY,
	'Pi1',
	array(
		'XMLSITEMAP' => 'list',
		
	),
	// non-cacheable actions
	array(
		'XMLSITEMAP' => 'list',
		
	)
);
