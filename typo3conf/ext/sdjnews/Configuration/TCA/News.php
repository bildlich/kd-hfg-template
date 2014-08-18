<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_sdjnews_domain_model_news'] = array(
	'ctrl' => $TCA['tx_sdjnews_domain_model_news']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, date, header, metatitle, metadescription, text',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1, date, header, text,--div--;Meta,metatitle, metadescription'),
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
				'foreign_table' => 'tx_sdjnews_domain_model_news',
				'foreign_table_where' => 'AND tx_sdjnews_domain_model_news.pid=###CURRENT_PID### AND tx_sdjnews_domain_model_news.sys_language_uid IN (-1,0)',
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
		'date' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjnews/Resources/Private/Language/locallang_db.xlf:tx_sdjnews_domain_model_news.date',
			'config' => array(
				'type' => 'input',
				'size' => 7,
				'eval' => 'date,required',
				'checkbox' => 1,
				'default' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
			),
		),
		'header' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjnews/Resources/Private/Language/locallang_db.xlf:tx_sdjnews_domain_model_news.header',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'metatitle' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjnews/Resources/Private/Language/locallang_db.xlf:tx_sdjnews_domain_model_news.metatitle',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'metaabstract' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjnews/Resources/Private/Language/locallang_db.xlf:tx_sdjnews_domain_model_news.metaabstract',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'metadescription' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjnews/Resources/Private/Language/locallang_db.xlf:tx_sdjnews_domain_model_news.metadescription',
			'config' => array(
				'type' => 'text',
				'cols' => 30,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'metakeywords' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjnews/Resources/Private/Language/locallang_db.xlf:tx_sdjnews_domain_model_news.metakeywords',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'text' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjnews/Resources/Private/Language/locallang_db.xlf:tx_sdjnews_domain_model_newsmedia.text',
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
		/*'media' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sdjnews/Resources/Private/Language/locallang_db.xlf:tx_sdjnews_domain_model_news.media',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_sdjnews_domain_model_newsmedia',
				'foreign_field' => 'news',
				'foreign_sortby' => 'sorting',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 1,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),*/
	),
);

?>