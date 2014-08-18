<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Image Group'
);

$tempColumns= array(
	'tx_sdjimagegroups_images' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:sdjimagegroups/Resources/Private/Language/locallang_db.xlf:tx_sdjimagegroups_domain_model_imagegroup.images',
		'config' => array(
		    'type' => 'inline',
		    'foreign_table' => 'tx_sdjimagegroups_domain_model_images',
		    'foreign_field' => 'imagegroup',
		    'maxitems'      => 9999,
		    'appearance' => array(
		    	'collapseAll' => 0,
		    	'levelLinksPosition' => 'top',
		    	'showSynchronizationLink' => 1,
		    	'showPossibleLocalizationRecords' => 1,
		    	'showAllLocalizationLink' => 1
		    ),
		),
	),
);




t3lib_div::loadTCA("tt_content"); 
t3lib_extMgm::addTCAcolumns("tt_content",$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes("tt_content","tx_sdjimagegroups_images"); 
$TCA['tt_content']['types']["sdjimagegroups_pi1"]['showitem'] = '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general, --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.header;header,tx_sdjimagegroups_images';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Image Groups');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tt_content', 'EXT:sdjimagegroups/Resources/Private/Language/locallang_csh_tt_content.xlf');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tt_content');


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_sdjimagegroups_domain_model_images', 'EXT:sdjimagegroups/Resources/Private/Language/locallang_csh_tx_sdjimagegroups_domain_model_images.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sdjimagegroups_domain_model_images');
$TCA['tx_sdjimagegroups_domain_model_images'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:sdjimagegroups/Resources/Private/Language/locallang_db.xlf:tx_sdjimagegroups_domain_model_images',
		'label' => 'image',
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
		'searchFields' => 'image,imgwidth,imgheight,imgtop,imgright,imgbottom,imgleft,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Images.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_sdjimagegroups_domain_model_images.gif'
	),
);

?>