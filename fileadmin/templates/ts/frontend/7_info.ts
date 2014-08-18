[globalVar = TSFE:id = 6]
#Navi
includeLibs.stripanchorpath = typo3conf/user_sectionnavi.php
temp.infonav = USER_INT
temp.infonav{
  	userFunc=user_sectionnavi->go
}


#kumulierter Inhalt der Unterseiten
temp.infocon=COA
temp.infocon {
	10 = CONTENT
	10 {
		table = tt_content
		select {
			orderBy = sorting
			where = colPos=7
			languageField = sys_language_uid
		}
	}
	20 = CONTENT
	20 {
		table = pages
		select {
			orderBy = sorting
		}
		renderObj = COA
		renderObj {
			10 = CONTENT
			10 {
				table = tt_content
				select {
					pidInList.field = uid
					orderBy = sorting
					where = colPos=7
					andWhere = sys_language_uid=0					
				}
				insertData = 1
				stdWrap.dataWrap=<section id="section-{field:uid}">|</section>
			}
			
		}
		stdWrap.dataWrap=<div class="scroll ajax-load-me">|</div>
	}
}
[global]

#Englisch Content
[globalVar = TSFE:id = 6] && [globalVar = GP:L = 2]
temp.infocon.20.renderObj.10.select.andWhere = sys_language_uid=2
[global]

#Output
[globalVar = TSFE:id = 6]
#render subparts
page.20.subparts{
  infocon < temp.infocon
  infonav < temp.infonav
  open1.value=open
  open2.value=right
  open3.value=right
  open4.value=right
}
page.bodyTag = <body data-pageslug="info">
[global]