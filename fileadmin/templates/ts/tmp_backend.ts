# ------------- RTE ------------- #
RTE.default {    

	#Markup options
	enableWordClean = 1
	removeTrailingBR = 1
	removeComments = 1
	removeTags = center, sdfield
	enableAccessibilityIcons=0
	
	#CSS
	contentCSS = fileadmin/templates/css/rte.css
	useCSS = 1
	
	#Buttons die gezeigt/versteckt werden
	showButtons ( 
	    class, formatblock, bold, italic, left, orderedlist, unorderedlist, insertcharacter, link, table, findreplace, chMode, removeformat, undo, redo,toggleborders, tableproperties, rowproperties, rowinsertabove, rowinsertunder, rowdelete, rowsplit, columninsertbefore, columninsertafter, columndelete, columnsplit,chMode, cellproperties, celllinsertbefore, cellinsertafter, celldelete, cellsplit, cellmerge, showhelp, image
	)
	
	hideButtons(
	 	fontstyle, strikethrough, lefttoright, righttoleft, textindicator, emoticon, user, underline, subscript, superscript, center, right, outdent, indent, spellcheck, inserttag, justifyfull, acronym, about, textcolor, fontsize, bgcolor,  copy, cut, paste,textstyle, textstylelabel,blockstylelabel,blockstyle
	)
	
	#Hält die RTE Icons gegroupt zusammen
	keepButtonGroupTogether=1
	
	#blendet Statusbar in htmlarea ein
	showStatusBar=1
}

## nicht benoetigte Klassen entfernen 
RTE.default.proc.allowedClasses := removeFromList(csc-frame-frame1, csc-frame-frame2, important, name-of-person, detail) 
RTE.default.buttons.blockstyle.tags.div.allowedClasses := removeFromList(csc-frame-frame1, csc-frame-frame2) 
RTE.classes := removeFromList(csc-frame-frame1, csc-frame-frame2, important, name-of-person, detail)

## Allow class to manually avoid hyphenation
RTE.default.proc.allowedClasses := addToList(donthyphenate) 
RTE.classes := addToList(donthyphenate) 

# Entfernt das Bild vor den Links
RTE.classesAnchor {
	internalLink {
	        class = internal-link
	        type = page
	        image >
	}
	externalLink {
	        class = external-link
	        type = url
	        image >
	}
	externalLinkInNewWindow {
	        class = external-link-new-window
	        type = url
	        image >
	}
	internalLinkInNewWindow {
	        class = internal-link-new-window
	        type = page
	        image >
	}
	download {
	        class = download
	        type = file
	        image >
	}
	mail {
	        class = mail
	        type = mail
	        image >
	}
}

#Allow new tags
RTE.default.proc {
  allowTags := addToList(object,param,embed,iframe)
  allowTagsOutside := addToList(object,embed,iframe)
  entryHTMLparser_db.allowTags < RTE.default.proc.allowTags
}

# Allow embed (Youtube) HTML tags in the RTE
lib.parseFunc_RTE.allowTags := addToList(object,param,embed,iframe)

# Use same processing as on entry to database to clean content pasted into the editor
RTE.default.enableWordClean.HTMLparser < RTE.default.proc.entryHTMLparser_db

# FE RTE configuration (htmlArea RTE only)
RTE.default.FE < RTE.default
RTE.default.FE.userElements >
RTE.default.FE.userLinks >

# Breite des RTE in Fullscreen-Ansicht
TCEFORM.tt_content.bodytext.RTEfullScreenWidth=100%

# ------------- Layouts ------------- #
#Layouts
TCEFORM.pages.layout.removeItems = 1,2,3
TCEFORM.tt_content.section_frame.altLabels.0 = Normal
TCEFORM.tt_content.section_frame.removeItems = 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26

TCEFORM.tt_content.layout{
	addItems {
		101 = Zweispaltig
		102 = Small Left
		103 = Small Right
		104 = Small
	}
}
TCEFORM.tt_content.layout.removeItems = 1,2,3,4,5,6

#block style elements rte
RTE.default {
	buttons.formatblock.removeItems = pre,address,article,blockquote,footer,header,nav,section,div
	buttons.formatblock.items {
      	aside.label = Marginalie
      	h1.label = Überschrift 1 (H1)
      	h2.label = Überschrift 2 (H2)
      	h3.label = Überschrift 3 (H3)
      	h4.label = Überschrift 4 (H4)
      	h5.label = Überschrift 5 (H5)
      	h6.label = Überschrift 6 (H6)
      	p.label = Absatz
   }
   buttons.formatblock.items.div.addClass = image-group
}

#image classes rte
RTE {
    default {
    	showTagFreeClasses = 1
		buttons.image.properties.removeItems= align, border, class, clickenlarge, float, title
    }
    classes {
        big-image{
            name = Big Image
            value = width:100%;
        }
    } 
}

#Image sizes
RTE.default.buttons.image.options.magic.maxWidth=650
RTE.default.buttons.image.options.magic.maxHeight=10000 
RTE.default.buttons.image.options.plain.maxWidth=650 
RTE.default.buttons.image.options.plain.maxHeight=10000


# ------------- Cache Handling ------------- #
mod.SHARED.colPos_list = 0,2
TCEMAIN.clearCacheCmd = all