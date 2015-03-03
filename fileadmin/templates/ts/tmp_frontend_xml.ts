<INCLUDE_TYPOSCRIPT:source="file:fileadmin/templates/ts/frontend/0_basic.ts">
page=PAGE
page{
   typeNum = 0
   config.disableAllHeaderCode = 1
   config.additionalHeaders = Content-type:text/xml
   config.xhtml_cleaning = 0
 
   10 = TEXT
   10.value = <?xml version="1.0" encoding="utf-8" standalone="yes"?>
}

page.20 = USER
page.20 {
   userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
   vendorName = SOUPDUJOUR
   pluginName = Pi1
   extensionName = Sdjxmlsitemap2
 
   settings =< plugin.tx_sdjseoog.settings
   persistence =< plugin.tx_sdjseoog.persistence
   view =< plugin.tx_sdjseoog.view
}
