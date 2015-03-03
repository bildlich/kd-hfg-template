# -------------- Content Configuration --------------- #

# ------- Common Content ------- #

#logo
temp.logo=TEXT
temp.logo.value = <a href="./" class="logo">Kommunikationsdesign<br />an der HfG Karlsruhe</a>

#page navigation
temp.homelink=TEXT
temp.homelink.value = <h2 class="main-nav"><a href="./" data-pageslug="index">Willkommen</a></h2>

temp.infolink=TEXT
temp.infolink{
  value = Info
  typolink.parameter = 6
  typolink.additionalParams=&L=0
  typolink.ATagParams=data-pageslug="info"
  wrap=<h2 class="main-nav">|</h2>
}

temp.projectlink=TEXT
temp.projectlink{
  value = Projekte
  typolink.parameter = 4
  typolink.additionalParams=&L=0
  typolink.ATagParams=data-pageslug="projects"
  wrap=<h2 class="main-nav">|</h2>
}

temp.newslink=TEXT
temp.newslink{
  value = News
  typolink.parameter = 5
  typolink.additionalParams=&L=0
  typolink.ATagParams=data-pageslug="news"
  wrap=<h2 class="main-nav">|</h2>
}

temp.indexlink=TEXT
temp.indexlink{
  value = Index
  typolink.parameter = 3
  typolink.additionalParams=&L=0
  typolink.ATagParams=data-pageslug="index"
  wrap=<h2 class="main-nav">|</h2>
}

#standard content
temp.con = CONTENT
temp.con {
    table = tt_content
    select.orderBy = sorting
    select.where = colPos=7
    select.languageField = sys_language_uid
}

#index content
temp.indexcon=CONTENT
temp.indexcon{
  table=tt_content
  select{
    languageField=sys_language_uid
    selectFields=image
    where=colPos=7
    orderBy = sorting
    pidInList=3
  }
  
  renderObj=COA
  renderObj{   
    10 = FILES
	10 {
		references {
			fieldName = image
		}
		renderObj = COA
		renderObj {
			10 = IMG_RESOURCE
			10 {
				file.import.data = file:current:publicUrl
				file.maxW < config.homeMaxW
				stdWrap.wrap = <li style="background-image:url(|)"></li>
			}
		}
    }
  }
}

#Smallmenu
temp.smallnav= HMENU
temp.smallnav{
  special = directory
  special.value=3    
  entryLevel = 0
}

temp.smallnav.1=TMENU
temp.smallnav.1{  
    noBlur=1
    expAll=1
    NO=1
    ACT=1
    ACT.ATagParams=class="active" data-pageslug="projects" || class="active" data-pageslug="news" || class="active" data-pageslug="info"
    NO.ATagParams=data-pageslug="projects" || data-pageslug="news" || data-pageslug="info"
    NO.wrapItemAndSub=<li>|</li>
    ACT.wrapItemAndSub=<li>|</li>
}

#Smallname
temp.smallname=TEXT
temp.smallname.value=Kommunikationsdesign<br />an der HfG Karlsruhe

#Smalllink
temp.smalllink=TEXT
temp.smalllink.field=title
temp.smalllink.typolink.parameter.data = TSFE:id
temp.smalllink.typolink.ATagParams=id="btn-smallscreen-menu"


# ------ Connect Template ------ #

page.20 = TEMPLATE
page.20 {
  template = FILE
  template.file = fileadmin/templates/tmp_all.html
  workOnSubpart = document
}

page.20.subparts{
  infolink < temp.infolink
  projectlink < temp.projectlink
  indexlink < temp.indexlink
  newslink < temp.newslink
  homelink < temp.homelink
  logo < temp.logo
  smallmenu < temp.smallnav
  smallname < temp.smallname
  smalllink < temp.smalllink
  indexcon < temp.indexcon
  
  #Overwrite
  open1=TEXT
  open2=TEXT
  open3=TEXT
  open4=TEXT
  open5=TEXT
  newscon=TEXT
  infocon=TEXT
  projectcon=TEXT
  detailcon=TEXT
  infonav=TEXT
  projectnav=TEXT
}