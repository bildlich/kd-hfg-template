<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_sdjimagegroups_domain_model_images'] = array(
	'ctrl' => $TCA['tx_sdjimagegroups_domain_model_images']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, image, imgwidth, imgheight, imgtop, imgright, imgbottom, imgleft',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1, image, imgwidth, imgheight, imgtop, imgright, imgbottom, imgleft'),
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
				'foreign_table' => 'tx_sdjimagegroups_domain_model_images',
				'foreign_table_where' => 'AND tx_sdjimagegroups_domain_model_images.pid=###CURRENT_PID### AND tx_sdjimagegroups_domain_model_images.sys_language_uid IN (-1,0)',
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
				'size' => 1,
				'max' => 1,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'image' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjimagegroups/Resources/Private/Language/locallang_db.xlf:tx_sdjimagegroups_domain_model_images.image',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_sdjimagegroups',
				'show_thumbs' => 1,
				'size' => 1,
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'disallowed' => '',
			),
		),
		'imgwidth' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjimagegroups/Resources/Private/Language/locallang_db.xlf:tx_sdjimagegroups_domain_model_images.imgwidth',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'imgheight' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjimagegroups/Resources/Private/Language/locallang_db.xlf:tx_sdjimagegroups_domain_model_images.imgheight',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'imgtop' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjimagegroups/Resources/Private/Language/locallang_db.xlf:tx_sdjimagegroups_domain_model_images.imgtop',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'imgright' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjimagegroups/Resources/Private/Language/locallang_db.xlf:tx_sdjimagegroups_domain_model_images.imgright',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'imgbottom' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjimagegroups/Resources/Private/Language/locallang_db.xlf:tx_sdjimagegroups_domain_model_images.imgbottom',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'imgleft' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjimagegroups/Resources/Private/Language/locallang_db.xlf:tx_sdjimagegroups_domain_model_images.imgleft',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'imagegroup' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);

?>