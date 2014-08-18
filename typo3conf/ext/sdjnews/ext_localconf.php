<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'SOUPDUJOUR.' . $_EXTKEY,
	'Pi1',
	array(
		'News' => 'list, show',
		'NewsMedia' => '',
		
	),
	// non-cacheable actions
	array(
		'News' => '',
		'NewsMedia' => '',
		
	)
);

?>