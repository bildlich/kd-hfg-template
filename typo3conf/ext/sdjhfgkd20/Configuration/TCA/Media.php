<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_sdjhfgkd20_domain_model_media'] = array(
	'ctrl' => $TCA['tx_sdjhfgkd20_domain_model_media']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'title, image, mp4, ogg, embed',
	),
	'types' => array(
		'1' => array('showitem' => 'title,--div--;Bild,image,--div--;oder Video, mp4, ogg,--div--;oder Embed, embed'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_sdjhfgkd20_domain_model_media',
				'foreign_table_where' => 'AND tx_sdjhfgkd20_domain_model_media.pid=###CURRENT_PID### AND tx_sdjhfgkd20_domain_model_media.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_media.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'image' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_media.image',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_sdjhfgkd20',
				'show_thumbs' => 1,
				'size' => 1,
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'disallowed' => '',
				'minitems' => 0,
				'maxitems' => 1, 
			),
		),
		'mp4' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_media.mp4',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_sdjhfgkd20',
				'allowed' => 'mp4',
				'disallowed' => '',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1, 
			),
		),
		'ogg' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_media.ogg',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_sdjhfgkd20',
				'allowed' => 'ogg',
				'disallowed' => '',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1, 
			),
		),
		'embed' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_media.embed',
			'config' => array(
				'type' => 'input',
				'size' => 70,
				'eval' => 'trim'
			),
		),
		'projekte' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);

?>