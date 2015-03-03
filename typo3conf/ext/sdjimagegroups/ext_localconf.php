<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'SOUPDUJOUR.' . $_EXTKEY,
	'Pi1',
	array(
		'ImageGroup' => 'list, show',
		'Images' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'ImageGroup' => '',
		'Images' => '',
		
	),
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:sdjimagegroups/Configuration/TypoScript/pageTsConfig.ts">');

?>