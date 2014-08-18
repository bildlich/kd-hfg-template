[globalVar = TSFE:id = 4]
#deactivate content wrap
tt_content.stdWrap.innerWrap.cObject.default >

#render navi
temp.pn = TEMPLATE
temp.pn {
  template = FILE
  template.file = fileadmin/templates/tmp_projectnav.html
  workOnSubpart = document
}

#render subparts
page.20.subparts{
  projectcon < temp.con
  projectnav < temp.pn
  open3.value=open
  open4.value=right
}
page.bodyTag = <body data-pageslug="projects">
[global]


#Projects Details
[globalVar = GP:tx_sdjhfgkd20_detail >0] && [globalVar = TSFE:id = 4]
#deactivate content wrap
tt_content.stdWrap.innerWrap.cObject.default >

#render subparts
page.20.subparts{
  projectcon=TEXT
  projectnav=TEXT
  open3=TEXT
  open4=TEXT
  detailcon < temp.con
  open5.value=open
}
page.bodyTag = <body data-pageslug="project-details">
[global]