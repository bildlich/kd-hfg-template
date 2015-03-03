<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'SOUPDUJOUR.' . $_EXTKEY,
	'Pi1',
	array(
		'SectionNav' => 'list',
		
	),
	// non-cacheable actions
	array(
		'SectionNav' => 'list',
		
	)
);
