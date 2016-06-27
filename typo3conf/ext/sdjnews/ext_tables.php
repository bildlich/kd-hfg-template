<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'News'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'News');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_sdjnews_domain_model_news', 'EXT:sdjnews/Resources/Private/Language/locallang_csh_tx_sdjnews_domain_model_news.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sdjnews_domain_model_news');
$TCA['tx_sdjnews_domain_model_news'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:sdjnews/Resources/Private/Language/locallang_db.xlf:tx_sdjnews_domain_model_news',
		'label' => 'date',
		'label_alt' => 'header',
        'label_alt_force' => 1,
        'default_sortby' => ' ORDER BY date DESC',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'date,header,metatitle,metaabstract,metadescription,metakeywords',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/News.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_sdjnews_domain_model_news.gif'
	),
);

/*\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_sdjnews_domain_model_newsmedia', 'EXT:sdjnews/Resources/Private/Language/locallang_csh_tx_sdjnews_domain_model_newsmedia.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sdjnews_domain_model_newsmedia');
$TCA['tx_sdjnews_domain_model_newsmedia'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:sdjnews/Resources/Private/Language/locallang_db.xlf:tx_sdjnews_domain_model_newsmedia',
		'label' => 'text',
		'label_alt' => 'images',
        'label_alt_force' => 1,
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'text,images,imagecaption,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/NewsMedia.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_sdjnews_domain_model_newsmedia.gif'
	),
);*/

?>