<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_sdjhfgkd20_domain_model_studierende'] = array(
	'ctrl' => $TCA['tx_sdjhfgkd20_domain_model_studierende']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, info, vorname, nachname, website',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1, info, vorname, nachname, website'),
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
				'foreign_table' => 'tx_sdjhfgkd20_domain_model_studierende',
				'foreign_table_where' => 'AND tx_sdjhfgkd20_domain_model_studierende.pid=###CURRENT_PID### AND tx_sdjhfgkd20_domain_model_studierende.sys_language_uid IN (-1,0)',
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
		'info' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_studierende.info',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('Nein', 0),
					array('Aktuell eingeschrieben', 1),
					array('Alumni', 2),
				),
				'size' => 1,
				'maxitems' => 1,
				'default' => '1',
				'eval' => 'required'
			),
		),
		'vorname' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_studierende.vorname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'nachname' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_studierende.nachname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'required'
			),
		),
		'bild' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_studierende.bild',
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
		'website' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_studierende.website',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
	),
);

?>