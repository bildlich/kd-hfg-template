<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_sdjhfgkd20_domain_model_projekte'] = array(
	'ctrl' => $TCA['tx_sdjhfgkd20_domain_model_projekte']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, title, year, mainimage, techniques, seminar, semester, description, metadescription, metatitle, teacher, students, media',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1, title, year, mainimage, techniques, seminar, semester, description,--div--;Lehrende und Studierende, teacher,students,--div--;Medien, media,--div--;Meta,metatitle, metadescription'),
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
				'foreign_table' => 'tx_sdjhfgkd20_domain_model_projekte',
				'foreign_table_where' => 'AND tx_sdjhfgkd20_domain_model_projekte.pid=###CURRENT_PID### AND tx_sdjhfgkd20_domain_model_projekte.sys_language_uid IN (-1,0)',
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
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_projekte.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'year' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_projekte.year',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int,required'
			),
		),
		'mainimage' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_projekte.mainimage',
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
		'techniques' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_projekte.techniques',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 5,
				'eval' => 'trim'
			),
		),		
		'students' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_projekte.students',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_sdjhfgkd20_domain_model_studierende',
				'foreign_table_where' => 'AND tx_sdjhfgkd20_domain_model_studierende.pid=27 ORDER BY tx_sdjhfgkd20_domain_model_studierende.nachname',
				'MM' => 'tx_sdjhfgkd20_projekte_studierende_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_sdjhfgkd20_domain_model_studierende',
							'pid' => '27',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		
		'seminar' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_projekte.seminar',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'semester' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_projekte.semester',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'description' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_projekte.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'script' => 'wizard_rte.php',
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
			'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]',
		),
		'metatitle' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_projekte.metatitle',
			'config' => array(
				'type' => 'input',
				'size' => 50,
				'eval' => 'trim'
			),
		),
		'metaabstract' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_projekte.metaabstract',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 5,
				'eval' => 'trim'
			),
		),
		'metadescription' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_projekte.metadescription',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 5,
				'eval' => 'trim'
			),
		),
		'metakeywords' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_projekte.metakeywords',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 5,
				'eval' => 'trim'
			),
		),
		'teacher' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_projekte.teacher',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_sdjhfgkd20_domain_model_lehrende',
				'foreign_table_where' => 'AND tx_sdjhfgkd20_domain_model_lehrende.pid=20 ORDER BY tx_sdjhfgkd20_domain_model_lehrende.sorting',
				'MM' => 'tx_sdjhfgkd20_projekte_lehrende_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_sdjhfgkd20_domain_model_lehrende',
							'pid' => '20',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		'media' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjhfgkd20/Resources/Private/Language/locallang_db.xlf:tx_sdjhfgkd20_domain_model_projekte.media',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_sdjhfgkd20_domain_model_media',
				'foreign_field' => 'projekte',
				'foreign_sortby' => 'sorting',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 1,
					'expandSingle' => 1,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
	),
);

?>