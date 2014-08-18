#wrap first header as h2
lib.stdheader.stdWrap >
lib.stdheader.stdWrap.required = 1
lib.stdheader.stdWrap.dataWrap = |
lib.stdheader.10.1.dataWrap = <h2><span>|</span></h2>
lib.stdheader.10.1.required = 1

#standard content wrapping
tt_content.stdWrap.innerWrap.cObject.default {
  	10.cObject.default.value = 
  	30.cObject.default.value = |
  	20 >
}

#content layout special
tt_content.stdWrap.innerWrap.cObject = CASE
tt_content.stdWrap.innerWrap.cObject {
  	key.field = layout
  	101 < tt_content.stdWrap.innerWrap.cObject.default
  	101.10.cObject.default.value = <div class="address"
  	101.30.cObject.default.value = >|</div>
  	102 < tt_content.stdWrap.innerWrap.cObject.default
  	102.10.cObject.default.value = <div class="small-left"
  	102.30.cObject.default.value = >|</div>
  	103 < tt_content.stdWrap.innerWrap.cObject.default
  	103.10.cObject.default.value = <div class="small-right"
  	103.30.cObject.default.value = >|</div>
  	104 < tt_content.stdWrap.innerWrap.cObject.default
  	104.10.cObject.default.value = <div class="small-print"
  	104.30.cObject.default.value = >|</div>
}

#remove p.bodytext
lib.parseFunc_RTE.nonTypoTagStdWrap.encapsLines {
	addAttributes.P.class >
}

#image wrapping & set sizes
tt_content.image.20.stdWrap.parseFunc.nonTypoTagStdWrap.HTMLparser.tags.img.fixAttrib {
    width.unset = 1
    height.unset = 1
}
tt_content.textpic.20.stdWrap.parseFunc.nonTypoTagStdWrap.HTMLparser.tags.img.fixAttrib {
    width.unset = 1
    height.unset = 1
}
lib.parseFunc_RTE.nonTypoTagStdWrap.HTMLparser.tags.img.fixAttrib {
    width.unset = 1
    height.unset = 1
}

#Allow embed (Youtube) HTML tags in the RTE
lib.parseFunc_RTE.allowTags := addToList(object,param,embed,iframe)