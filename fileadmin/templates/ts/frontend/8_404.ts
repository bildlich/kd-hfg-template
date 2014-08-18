#Header
page.config.additionalHeaders = HTTP/1.1 404 Not Found

#wrap first header as h2
lib.stdheader.stdWrap >
lib.stdheader.stdWrap.required = 1
lib.stdheader.stdWrap.dataWrap = |
lib.stdheader.10.1.dataWrap = <h2 class="ajax-error"><span>|</span></h2>
lib.stdheader.10.1.required = 1

page.bodyTag = <body data-pageslug="error-404">

page.20 = TEMPLATE
page.20 {
  template = FILE
  template.file = fileadmin/templates/tmp_404.html
  workOnSubpart = document
}

page.20.subparts{
  logo < temp.logo
  smallmenu < temp.smallnav
  smallname < temp.smallname
  smalllink < temp.smalllink
  404con < temp.con
}