<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'SDJ TQ SEO Open Graph'
);

$pagesColumns = array(
    'tx_sdjseoog_image' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:sdjseoog/Resources/Private/Language/locallang_db.xlf:tx_sdjseoog_domain_model_opengraph.image',
		'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_sdjseoog',
				'show_thumbs' => 1,
				'size' => 1,
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'disallowed' => '',
				'minitems' => 0,
				'maxitems' => 1, 
			),
	),
	'tx_sdjmetadata_title' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:sdjseoog/Resources/Private/Language/locallang_db.xlf:tx_sdjseoog_domain_model_opengraph.title',		
		'config' => array (
			'type' => 'input',	
			'size' => '30',
		)
	),
	'tx_sdjmetadata_abstract' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:sdjseoog/Resources/Private/Language/locallang_db.xlf:tx_sdjseoog_domain_model_opengraph.abstract',		
		'config' => array (
			'type' => 'text',
			'cols' => '30',	
			'rows' => '5',
		)
	),
	'tx_sdjmetadata_description' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:sdjseoog/Resources/Private/Language/locallang_db.xlf:tx_sdjseoog_domain_model_opengraph.description',		
		'config' => array (
			'type' => 'text',
			'cols' => '30',	
			'rows' => '5',
		)
	),
	'tx_sdjmetadata_keywords' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:sdjseoog/Resources/Private/Language/locallang_db.xlf:tx_sdjseoog_domain_model_opengraph.keywords',		
		'config' => array (
			'type' => 'text',
			'cols' => '30',	
			'rows' => '5',
		)
	),
	'tx_sdjmetadata_xmlprio' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:sdjseoog/Resources/Private/Language/locallang_db.xlf:tx_sdjseoog_domain_model_opengraph.xmlprio',		
		'config' => array (
			'type' => 'input',	
			'size' => '30',
		)
	),
	'tx_sdjmetadata_xmlinterval' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:sdjseoog/Resources/Private/Language/locallang_db.xlf:tx_sdjseoog_domain_model_opengraph.xmlinterval',		
		'config' => array (
			'type' => 'input',	
			'size' => '30',
		)
	),
);
t3lib_div::loadTCA('pages');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $pagesColumns, 1);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    '--div--;SEO & Social Media;,tx_sdjmetadata_title,tx_sdjmetadata_description,tx_sdjmetadata_xmlprio,tx_sdjmetadata_xmlinterval,tx_sdjseoog_image',
    '1,4,7,3'
);
?>