<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}
$tempColumns = array (
	'tx_sdjslideshow_images' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:sdjslideshow/locallang_db.xml:tt_content.tx_sdjslideshow_images',		
		'config' => array (
			'type' => 'group',
			'internal_type' => 'file',
			'allowed' => "jpg,png,gif",	
			'max_size' => "100000000000000",	
			'uploadfolder' => 'uploads/tx_sdjslideshow',
			'show_thumbs' => 1,	
			'size' => 10,	
			'minitems' => 0,
			'maxitems' => 100,
		)
	),
);


t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content',$tempColumns,1);


t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='layout,select_key,pages';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1']='tx_sdjslideshow_images;;;;1-1-1';


t3lib_extMgm::addPlugin(array(
	'LLL:EXT:sdjslideshow/locallang_db.xml:tt_content.list_type_pi1',
	$_EXTKEY . '_pi1',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif'
),'list_type');
?>