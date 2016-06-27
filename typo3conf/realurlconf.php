<?php 
$TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT'] = array(
        'init' => array(
            'enableCHashCache' => 1,
            'appendMissingSlash' => 'ifNotFile,redirect[301]',
            'enableUrlDecodeCache' => 1,
            'enableUrlEncodeCache' => 1,
            'respectSimulateStaticURLs' => 0,
            'postVarSet_failureMode'=>''
         ),
    'redirects_regex' => array (
    
    ),
    'preVars' => array(
                        array(
                                'GETvar' => 'no_cache',
                                'valueMap' => array(
                                    'no_cache' => 1,
                                ),
                                'noMatch' => 'bypass',
                        ),
                         array(
                             'GETvar' => 'L',
                             'valueMap' => array(
                                                'en' => '2',
                                        ),
                                'noMatch' => 'bypass',
                        ),
                ),
     'pagePath' => array(
            'type' => 'user',
            'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
            'spaceCharacter' => '-',
            'languageGetVar' => 'L',
            'expireDays' => 7,
            'rootpage_id' => 3,
        ),


      'postVarSets' => array(
            '_DEFAULT' => array(
                'jahr' => array(
                    array(
                        'GETvar' => 'tx_sdjnews_year',
                        ),
                    ),
                'artikel' => array(
                    array(
                        'GETvar' => 'tx_sdjnews_article',
                        'lookUpTable' => array(
                            'table' => 'tx_sdjnews_domain_model_news',
                            'id_field' => 'uid',
                            'alias_field' => 'header',
                            'addWhereClause' => ' AND NOT deleted AND NOT hidden',
                            'useUniqueCache' => 1,
                            'useUniqueCache_conf' => array(
                                'strtolower' => 1,
                                'spaceCharacter' => '-',
                                ),
                            ),
                        ),
                    ),
				 'detail' => array(
                    array(
                        'GETvar' => 'tx_sdjhfgkd20_detail',
                        'lookUpTable' => array(
                            'table' => 'tx_sdjhfgkd20_domain_model_projekte',
                            'id_field' => 'uid',
                            'alias_field' => 'title',
                            'addWhereClause' => ' AND NOT deleted AND NOT hidden',
                            'useUniqueCache' => 1,
                            'useUniqueCache_conf' => array(
                                'strtolower' => 1,
                                'spaceCharacter' => '-',
                                ),
                            ),
                        ),
                    ),
                ),
            ),

      'fileName' => array(
            'defaultToHTMLsuffixOnPrev'=>0,
            'index' => array(
            ),
        ),
 );
?>