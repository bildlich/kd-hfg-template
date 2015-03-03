#Initiate Page
page=PAGE
page.typeNum = 0

#Viewport
page.meta {
  viewport=width=device-width, initial-scale=1
}

#CSS & Metadaten
page.headerData = COA
page.headerData {
  //CSS
  777 = TEXT
  777.value =<link href="http://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet" type="text/css" />
  778 = TEXT
  778.value =<link rel="stylesheet" href="fileadmin/templates/css/styles.css" type="text/css" />
  // Google Site verification
  779 = TEXT
  779.value =<meta name="google-site-verification" content="8Wm8u0WPBT8SIpNKdFPEaCxMtxwXhE0lR6UcihnHvJI" />
}

#Robots for info subpages
[PIDupinRootline = 6]
	page.meta.robots = noindex,nofollow
[global]

# Insert HTML5 compatibility for older browsers
[browser = msie]&&[version = <9]
page.includeJS {
  file1 = http://html5shiv.googlecode.com/svn/trunk/html5.js
  file1.external = 1
}
[end]

#Favicon
page.shortcutIcon = fileadmin/templates/img-ui/favicon.gif?v=2
