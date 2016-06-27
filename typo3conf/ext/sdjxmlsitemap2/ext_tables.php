<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'XML Sitemap'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'XML Sitemap');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_sdjxmlsitemap2_domain_model_xmlsitemap', 'EXT:sdjxmlsitemap2/Resources/Private/Language/locallang_csh_tx_sdjxmlsitemap2_domain_model_xmlsitemap.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sdjxmlsitemap2_domain_model_xmlsitemap');
$GLOBALS['TCA']['tx_sdjxmlsitemap2_domain_model_xmlsitemap'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:sdjxmlsitemap2/Resources/Private/Language/locallang_db.xlf:tx_sdjxmlsitemap2_domain_model_xmlsitemap',
		'label' => 'uid',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => '',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/XMLSITEMAP.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_sdjxmlsitemap2_domain_model_xmlsitemap.gif'
	),
);
