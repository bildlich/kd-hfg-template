<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'SOUPDUJOUR.' . $_EXTKEY,
	'Pi3',
	array(
		'Studierende' => 'list',
		
	),
	// non-cacheable actions
	array(
		'Studierende' => '',
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'SOUPDUJOUR.' . $_EXTKEY,
	'Pi1',
	array(
		'Lehrende' => 'listbig, listsmall',
		
	),
	// non-cacheable actions
	array(
		'Lehrende' => '',
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'SOUPDUJOUR.' . $_EXTKEY,
	'Pi2',
	array(
		'Projekte' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Projekte' => '',
		
	)
);

?>