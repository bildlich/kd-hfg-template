<INCLUDE_TYPOSCRIPT:source="file:fileadmin/templates/ts/frontend/0_basic.ts">
page=PAGE
page{
   typeNum = 0
   config.disableAllHeaderCode = 1
   config.additionalHeaders = Content-type:text/xml
   config.xhtml_cleaning = 0
 
   10 = TEXT
   10.value = <?xml version="1.0" encoding="utf-8" standalone="yes"?>
   20=cObject
   20 < plugin.tx_sdjxmlmap_pi1
}