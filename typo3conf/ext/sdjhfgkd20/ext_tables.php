<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Lehrende: Anzeige der Datenbankdatensätze'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi2',
	'Projekte: Anzeige der Datenbankdatensätze'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi3',
	'Studierende: Anzeige der Datenbankdatensätze'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'KD 2.0.');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_sdjhfgkd20_domain_model_lehrende', 'EXT:sdjhfgkd20/Resources/Private/Language/locallang_csh_tx_sdjhfgkd20_domain_model_lehrende.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sdjhfgkd20_domain_model_lehrende');
$TCA['tx_sdjhfgkd20_domain_model_lehrende'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_lehrende',
		'label' => 'nachname',
		'label_alt' => 'vorname, titel',
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
		'searchFields' => 'anrede,titel,vorname,nachname,bild,description,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Lehrende.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_sdjhfgkd20_domain_model_lehrende.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_sdjhfgkd20_domain_model_studierende', 'EXT:sdjhfgkd20/Resources/Private/Language/locallang_csh_tx_sdjhfgkd20_domain_model_studierende.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sdjhfgkd20_domain_model_studierende');
$TCA['tx_sdjhfgkd20_domain_model_studierende'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_studierende',
		'label' => 'nachname',
		'label_alt' => 'vorname',
        'label_alt_force' => 1,
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'default_sortby' => ' ORDER BY nachname',
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
		'searchFields' => 'vorname,nachname,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Studierende.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_sdjhfgkd20_domain_model_studierende.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_sdjhfgkd20_domain_model_projekte', 'EXT:sdjhfgkd20/Resources/Private/Language/locallang_csh_tx_sdjhfgkd20_domain_model_projekte.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sdjhfgkd20_domain_model_projekte');
$TCA['tx_sdjhfgkd20_domain_model_projekte'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_projekte',
		'label' => 'title',
		'label_alt' => 'year',
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
		'searchFields' => 'title,year,mainimage,techniques,students,seminar,semester,description,metaabstract,metadescription,metakeywords,teacher,media,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Projekte.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_sdjhfgkd20_domain_model_projekte.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_sdjhfgkd20_domain_model_media', 'EXT:sdjhfgkd20/Resources/Private/Language/locallang_csh_tx_sdjhfgkd20_domain_model_media.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sdjhfgkd20_domain_model_media');
$TCA['tx_sdjhfgkd20_domain_model_media'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_media',
		'label' => 'title',
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
		'searchFields' => 'title,image,mp4,ogg,embed,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Media.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_sdjhfgkd20_domain_model_media.gif'
	),
);

$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1'] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($_EXTKEY.'_pi1', 'FILE:EXT:'.$_EXTKEY.'/Configuration/FlexForms/flexform_pi1.xml'); 
$TCA['tt_content']['types'][$_EXTKEY.'_pi1']['showitem']='CType;;4;button;1-1-1, header;;3;;2-2-2,pi_flexform;;;;1-1-1';
$TCA['tt_content']['columns']['pi_flexform']['config']['ds'][','.$_EXTKEY.'_pi1'] = 'FILE:EXT:'.$_EXTKEY.'/flexform_pi1.xml';
?>