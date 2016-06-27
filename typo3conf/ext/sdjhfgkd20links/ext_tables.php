<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'SOUPDUJOUR.' . $_EXTKEY,
	'Pi1',
	'KD 2.0 Links'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'KD 2.0 Links');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_sdjhfgkd20links_domain_model_link', 'EXT:sdjhfgkd20links/Resources/Private/Language/locallang_csh_tx_sdjhfgkd20links_domain_model_link.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sdjhfgkd20links_domain_model_link');
