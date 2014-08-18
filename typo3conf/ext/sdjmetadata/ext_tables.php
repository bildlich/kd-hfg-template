<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}
$tempColumns = array (
	'tx_sdjmetadata_title' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:sdjmetadata/locallang_db.xml:pages.tx_sdjmetadata_title',		
		'config' => array (
			'type' => 'input',	
			'size' => '30',
		)
	),
	'tx_sdjmetadata_abstract' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:sdjmetadata/locallang_db.xml:pages.tx_sdjmetadata_abstract',		
		'config' => array (
			'type' => 'text',
			'cols' => '30',	
			'rows' => '5',
		)
	),
	'tx_sdjmetadata_description' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:sdjmetadata/locallang_db.xml:pages.tx_sdjmetadata_description',		
		'config' => array (
			'type' => 'text',
			'cols' => '30',	
			'rows' => '5',
		)
	),
	'tx_sdjmetadata_keywords' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:sdjmetadata/locallang_db.xml:pages.tx_sdjmetadata_keywords',		
		'config' => array (
			'type' => 'text',
			'cols' => '30',	
			'rows' => '5',
		)
	),
	'tx_sdjmetadata_xmlprio' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:sdjmetadata/locallang_db.xml:pages.tx_sdjmetadata_xmlprio',		
		'config' => array (
			'type' => 'input',	
			'size' => '30',
		)
	),
	'tx_sdjmetadata_xmlinterval' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:sdjmetadata/locallang_db.xml:pages.tx_sdjmetadata_xmlinterval',		
		'config' => array (
			'type' => 'input',	
			'size' => '30',
		)
	),
);


t3lib_div::loadTCA('pages');
t3lib_extMgm::addTCAcolumns('pages',$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes('pages','--div--;Meta,tx_sdjmetadata_title;;;;1-1-1, tx_sdjmetadata_description,--div--;XML-Sitemap,tx_sdjmetadata_xmlprio;;;;1-1-1,tx_sdjmetadata_xmlinterval,');
?>