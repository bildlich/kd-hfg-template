<?php
sleep(1);
/* 
slugs:
	index
	projects
	news
	info
	info-en
	kontakt
	project-details
*/
if (!isset($_GET['slug']) || $_GET['slug'] == "") $_GET['slug'] = "index";
$slug = $_GET['slug'];
$lang = $_GET['lang'];
$year = $_GET['year'];
$projectID = $_GET['projectID'];

?>
<!doctype html>
<html lang="de-DE">
<head>
	<meta charset="utf-8">
	<title>
	<?php 
		if ($slug == "projects") echo "Projekte";
		elseif ($slug == "news") echo "News";
		elseif ($slug == "info") echo "Info";
		elseif ($slug == "project-details") echo "Projext YX";
		if ($slug != "index") echo " - ";
	?>
	Studiengang Kommunikationsdesign an der HfG Karlsruhe</title>
	<meta name="description" content="Studiengang Kommunikationsdesign, aktuelle Projekte und Informationen">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Karla:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/styles.css">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="icon" type="image/gif" href="img-ui/favicon.gif">
</head>
<body data-pageslug="<?=$slug; ?>">
<div id="loading-indicator"></div>
<div class="test"></div>
	<div id="info" class="page<?php echo " ".$later_pages; if ($slug == "info") {echo " open"; $later_pages = "right";}?>">
<?php
if ($slug == "info" && $lang != "en") {
?>
		<nav class="sub-nav ajax-load-me" id="table-of-contents">
			<ul>
				<li><a href="#section-1">Konzept</a></li>
				<li><a href="#section-2">Bewerben</a></li>
				<li><a href="#section-3">Lehrende</a></li>
				<li><a href="#section-4">Studierende</a></li>
				<li><a href="#section-5">Werkstätten</a></li>
				<li><a href="#section-6">Kontakt</a></li>
			</ul>
			<a href="index.php?slug=info&lang=en" class="ajax" data-pageslug="info">English?</a>
		</nav>
		<div class="scroll ajax-load-me">
			<section id="section-1">
				
				<p>Kommunikationsdesign ist die Gestaltung von Medien zur Vermittlung von Informationen. Kommunikationsdesigner gestalten Plakate, Bücher, Websites, Apps, Schriften und mehr. Ziel des Studiengangs Kommunikationsdesign an der HfG Karlsruhe ist es, Studenten die dazu nötigen technischen, ästhetischen und konzeptionellen Fähigkeiten zu vermitteln.</p>

				<p> Der Studiengang gliedert sich in ein Grundstudium, das mit einem Vordiplom abgeschlossen wird, und ein Hauptstudium, an dessen Ende die Diplomarbeit steht. Der Abschluss mit Diplom entspricht dem Grundverständnis der HfG: Freiraum für die Entwicklung theoretischer und praktischer Fertigkeiten und Fähigkeiten zu bieten und eine „Schule der Selbständigkeit“ zu sein. Hier herrscht die akademische Freiheit nicht-modularisierter Studiengänge.</p>
				<aside>
					<p>Die Hochschule für Gestaltung Karlsruhe wurde 1992 von Heinrich Klotz gegründet und befindet sich gemeinsam mit ZKM, dem Museum für Neue Kunst und der Städtischen Galerie in einer ehemaligen Munitionsfabrik mit großen Lichthöfen. Rektor ist seit 2001 Prof. Dr. Peter Sloterdijk.</p>
				</aside>
				<div class="image-group" style="height: 450px">
					<img src="img-content/2.jpg" style="width: 300px; left: -20px; top: 40px;">
					<img src="img-content/8.jpg" style="width:430px; right: 6%; top: 40px;">
				</div>

				<p>Nach einem ersten Jahr, das noch von Grundlagenkursen geprägt wird, beginnt das reine Projektstudium, d.h. das Studium baut sich aus frei wählbaren Projektseminaren und Workshops auf, die von Theorie- und Nebenfachkursen in anderen Fachbereichen ergänzt werden. Der Gruppenumfang bleibt dabei klein und ermöglicht ein möglichst intensives Arbeiten mit den festen Lehrenden (Professoren und Assistenten) und jährlich wechselnden Lehrbeauftragten, die die Struktur und die Lehre durch Seminare, Workshops und Vorträge ergänzen. Exkursionen zu Ausstellungen, Veranstaltungen, Kulturell einflussreichen oder interessanten Objekten finden regelmässig statt und sollen den Wissens- und Erfahrungshorizont der Studierenden erweitern.
				</p>
				<aside>
					<p>
					Studenten können in allen Fachbereichen Kurse belegen.<br>Folgende fünf Fachbereiche sind Teil der Hochschule:
					</p>
					<ol>
					<li>Kommunikationsdesign</li>
					<li>Produktdesign</li>
					<li>Ausstellungsdesign und Szenografie</li>
					<li>Kunstwissenschaft und Medientheorie</li>
					<li>Medienkunst</li>
					</ol>
				</aside>
				<p>Freiraum und Eigenverantwortung ist im Fachbereich gross, der eigene Antrieb wichtig und die Erkenntnis, dass ein persönlicher Standpunkt nur durch die eigene Person erarbeitet werden kann, ist essentiell. Nicht zuletzt durch die Verschränkung mit anderen Fachbereichen (interdisziplinäres Studium) muss man seine Arbeit als angehender Designer erproben und reflektieren.</p>

				<div class="image-group" style="height: 350px">
					<img src="img-content/13.jpg" style="width: 400px; left: 10%; top: 70px;">
					<img src="img-content/4.jpg" style="width: 180px; right: 10%; top: -20%;">
				</div>

				<a href="#table-of-contents" class="btn-top">nach oben</a>
			</section>
			<section id="section-2">
				<h2><span>Bewerben</span></h2>

				<p>Der Fachbereich Kommunikationsdesign nimmt von etwa 200-250 Bewerber/innen jedes Jahr ungefähr 10 bis 15 neue Student/innen auf.
				Um zu dem Studium zugelassen zu werden, müssen Bewerber/innen ein zweistufiges Auswahlverfahren absolvieren.
				Die erste Stufe besteht aus einer Mappenprüfung. Dazu müssen Bewerber/innen eine Mappe mit ca. 20 eigenen Arbeiten abgeben.
				In der zweiten Stufe werden ausgewählte Bewerber/innen zu einer Aufnahmeprüfung eingeladen, bei der einen Tag lang gestalterische Aufgaben bearbeitet werden und jede/r Bewerber/in zu einem persönlichen Bewerbungsgespräch eingeladen wird.
				Ausführliche Informationen zum Bewerbungsverfahren gibt es auf der <a href="http://www.hfg-karlsruhe.de/hochschule/bewerbung" target="_blank">Website der HfG Karlsruhe.</a></p>
				<aside>
					<h2>Persönliche Abgabe</h2>
					<p>
					XX.XX. - XX.XX.2014
					zwischen XX-XX Uhr
					Raum XXX
					Bewerbungszeitraum
					XXXXXX</p>
					<h2>Mappe</h2>
					<p>20 Arbeiten, Format frei, weitere Anforderungen
					und so weiter</p>
					<h2>Adresse für Mappe</h2>
					<p>HfG Karlsruhe,
					Lorenzstr. 15,
					76135 Karlsruhe</p>
					<h2>Eignungsprüfung</h2>
					<p>Nach erfolgreicher Mappenprüfung:
					Eintätige praktische Prüfung mit
					persönlichem Gespräch.</p>
					<h2>Studiengebühren</h2>
					<p>Es werden keine Studiengebuühren
					erhoben. Es fallen Verwaltungskosten +
					Studiticket an.</p>
				</aside>
				<a href="#table-of-contents" class="btn-top">nach oben</a>
			</section>
			<section id="section-3">
				<h2><span>Professoren und Lehrbeauftragte</span></h2>
				<ul class="teachers-list-big">
					<li class="col">
						<img src="img-content/9.jpg" class="teacher-portrait">
						<p>Urs Lehni leitet den Fachbereich. Er arbeitet als freiberuflicher Grafikdesigner in Zürich, wo er mit seinem Studio Lehni-Trueb hauptsächlich im Bereich der Kunst und Kultur gestaltet. Parallel dazu arbeitet er an selbst initiierten Projekten wie dem Verlag Rollo Press oder dem Projektraum Corner College. Seine Seminare an der Hochschule beschäftigen sich im weitesten Sinne mit der sich ständig änderenden Rolle des Grafikdesigners und versuchen sowohl konzeptionelle wie auch handwerkliche Inputs zu liefern.<br>
						<a href="http://rollo-press.com/" target="_blank">rollo-press.com</a></p>
					</li>
					<li class="col">
						<img src="img-content/9.jpg" class="teacher-portrait">
						<p>Chris Rehberger leitet das Berliner Designstudio Double Standards. Die Arbeiten, meist im Kulturbereich angesiedelt, sind vielfältig und bewegen sich von klassischer Kampagnen- und Markenbildentwicklung, über Schrift, bis hin zu Besucherleitsystemen und Raumgestaltung. Auch seine Initiativen an der Hochschule sind oft interdisziplinär angelegt, etwa bei gemeinsamen Projekten mit den Fachbereichen Szenografie und Fotografie.
						<br><a href="http://doublestandards.net" target="_blank">doublestandards.net</a></p>
					</li>
					<li class="col">
						<img src="img-content/9.jpg" class="teacher-portrait">
						<p>David Bennewith (New Zealand) is a graphic designer and design researcher based in Amsterdam. He works on both research-oriented and commissioned projects under the name 'Colophon', with particular interest and focus on the discipline of type design. As well as the HfG David also teaches typography at the Gerrit Rietveld Academie in Amsterdam.<br>
						<a href="http://colophon.info/" target="_blank">colophon.info</a></p>
					</li>				
					<li class="col">
						<img src="img-content/9.jpg" class="teacher-portrait">
						<p>Sereina Rothenberger betreibt in Zürich zusammen mit David Schatz das Studio Hammer. Zusätzlich zu Auftragsarbeiten im Kulturbereich realisiert sie freie Projekte im Bereich Buch- und Schriftgestaltung. 2010 bis 2013 dozierte sie am Master of Arts in Bereich Editorial Design an der Zürcher Hochschule der Künste.<br>
						<a href="http://hammer.to/" target="_blank">hammer.to</a></p>
					</li>
					<li class="col">
						<img src="img-content/9.jpg" class="teacher-portrait">
						<p>Indra Häußler ist derzeit künstlerische Assistentin am Fachbereich. Seit 1999 in Frankfurt am Main freiberuflich tätig, arbeitet sie zusammen mit verschiedenen Büros und realisiert Projekte in den Bereichen Buchgestaltung, Corporate Design und Ausstellungsbegleitende Gestaltung. 2005–2010 dozierte sie an der Hochschule Darmstadt zum Thema Typografie und Digitale Schrift.</p>
					</li>
					<li class="col">
						<img src="img-content/9.jpg" class="teacher-portrait">
						<p>Simoné Gier ist künstlerische Mitarbeiterin am Fachbereich Kommunikationsdesign. Nach ihrem Diplom in Kommunikationsdesign machte sie einen Master in Creative Communication & Brand Management. Neben der Tätigkeit am Fachbereich betreibt sie ein Label für Kletterbekleidung und eine Stofftierkollektion für bedrohte Arten.</p>
					</li>
				</ul>

				<div class="image-group" style="height: 380px">
					<img src="img-content/15.jpg" style="width: 400px; right: 230px; top:30px;">
				</div>

				<p>Alle Professoren, Mitarbeiter, Lehrbeauftragten und Gäste sind befristet angestellt. Das führt dazu, dass sich der Fachbereich in einem kontinuierlichen Wandel befindet und ständig den Kontakt zum aktuellen Geschehen in Bereichen wie Gestaltung, Kunst etc. hält — eine nahezu einzigartige Konstellation. Hier einige der Gäste aus den vergangenen Jahren:</p>
				<ul class="teachers-list-small">
					<li><a href="#">Martin Andereggen</a></li>
					<li><a href="#">Linus Bill</a></li>
					<li><a href="#">Paul Davis</a></li>
					<li><a href="#">Gergor Huber</a></li>
					<li>Ivan Sterzinger</li>
					<li>Sarah Illenberger</li>
					<li><a href="#">Philippe Karrer</a></li>
					<li>Johnson Kingston</li>
					<li>Louis Lüthi</li>
					<li><a href="#">Michael Malzach</a></li>
					<li>Andrew Nosnitzky</li>
					<li><a href="#">Noch eine Person</a></li>
					<li><a href="#">Noch eine Person</a></li>
					<li><a href="#">Noch eine Person</a></li>
					<li><a href="#">Noch eine Person</a></li>
					<li><a href="#">Noch eine Person</a></li>
					<li><a href="#">Noch eine Person</a></li>
					<li><a href="#">Noch eine Person</a></li>
					<li><a href="#">Noch eine Person</a></li>
					<li><a href="#">Noch eine Person</a></li>
					<li><a href="#">Noch eine Person</a></li>
					<li><a href="#">Noch eine Person</a></li>
					<li><a href="#">Noch eine Person</a></li>
				</ul>
				<a href="#" id="show-all-teachers" data-switch-word="–weniger">+mehr</a>
				<a href="#table-of-contents" class="btn-top">nach oben</a>
			</section>
			<section id="section-4">
				<h2><span>Studierende</span></h2>
				<p>Momentan sind an der Hochschule etwa 400 Studierende eingeschrieben, davon circa 110 in unserem Fachbereich Kommunikationsdesign. Das macht ihn zu einem der kleinsten Fachbereiche seiner Art in Deutschland. Es folgt eine Liste studentischer Portfolios.</p>
				<ul class="students-list-small">
					<li><a href="">Oren Richards</a></li>
					<li><a href="">Stacey Haynes</a></li>
					<li><a href="">Matthias Gieselmann</a></li>
					<li><a href="">Plato Vincent</a></li>
					<li><a href="">Allistair Taylor</a></li>
					<li><a href="">Maris Calderon</a></li>
					<li><a href="">Lorena Garcia Castro</a></li>
					<li><a href="">Kerry Patrick</a></li>
					<li><a href="">Vernon Trevino</a></li>
					<li><a href="">Malachi Lawrence</a></li>
					<li><a href="">Tanner Booker</a></li>
					<li><a href="">Blythe Carson</a></li>
					<li><a href="">Regina Dunlap</a></li>
					<li><a href="">Halla Huber</a></li>
					<li><a href="">Aurelia Bowers</a></li>
					<li><a href="">Flavia Cook</a></li>
					<li><a href="">Aiko Bean</a></li>
					<li><a href="">Xander Summers</a></li>
					<li><a href="">Jaden Finley</a></li>
					<li><a href="">Octavia Cross</a></li>
					<li><a href="">Colorado Reed</a></li>
					<li><a href="">Blair Solis</a></li>
					<li><a href="">Tad Pickett</a></li>
					<li><a href="">Walter Hoffman</a></li>
					<li><a href="">Inga Strong</a></li>
					<li><a href="">Gabriel Garner</a></li>
					<li><a href="">Wyoming Horton</a></li>
					<li><a href="">Jerome Reilly</a></li>
					<li><a href="">Neville Smith</a></li>
					<li><a href="">Colby Robinson</a></li>
				</ul>
				<a href="#" id="show-alumni" data-switch-word="–Alumni">+Alumni</a>
				<ul class="alumni-list">
					<li><a href="">Oren Richards</a></li>
					<li><a href="">Stacey Haynes</a></li>
					<li><a href="">Matthias Gieselmann</a></li>
					<li><a href="">Plato Vincent</a></li>
					<li><a href="">Allistair Taylor</a></li>
					<li><a href="">Maris Calderon</a></li>
					<li><a href="">Lorena Garcia Castro</a></li>
					<li><a href="">Kerry Patrick</a></li>
					<li><a href="">Vernon Trevino</a></li>
					<li><a href="">Malachi Lawrence</a></li>
					<li><a href="">Tanner Booker</a></li>
					<li><a href="">Blythe Carson</a></li>
					<li><a href="">Regina Dunlap</a></li>
					<li><a href="">Halla Huber</a></li>
				</ul>
				<a href="#table-of-contents" class="btn-top">nach oben</a>
			</section>
			<section id="section-5">
				<h2><span>Werkstätten und Arbeitsplätze</span></h2>
				<p>Studierende haben Zugang zu den unterschiedlichsten Werkstätten einer hervorragend ausgestatteten Hochschule. Der Fachbereich Kommunikationsdesign verfügt über ein Fotostudio, eine Siebdruckwerkstatt, einen Plotterraum sowie ein großes Studio zum Arbeiten. Darüberhinaus können alle Werkstätten der anderen Fachbereiche genutzt werden, wie etwa die Holz-, Metall- und Elektrowerkstätten oder die Sound-, Film- und Schnittwerkstatt. Eine Bibliothek, die mit dem Zentrum für Kunst und Medien geteilt wird, ermöglicht die Beschäftigung mit aktueller Fachliteratur.</p>				
				<p><img src="img-content/11.jpg" class="big-image"></p>	
				<aside><p>Fotostudio</p></aside>						
				<p><img src="img-content/12.jpg" class="big-image"></p>
				<aside><p>Siebdruckwerkstatt</p></aside>
				<a href="#table-of-contents" class="btn-top">nach oben</a>
			</section>
			<section id="section-6">
				<h2><span>Kontakt</span></h2>
				<div class="contact">
					<div class="address">
						Staatliche Hochschule<br>
						für Gestaltung Karlsruhe<br>
						Lorenzstr. 15<br>
						76135 Karlsruhe<br>
						Tel	+49 721 8203 - 0<br>
						Fax	+49 721 8203 - 2159<br>
						<a href="mailto:hochschule@hfg-karlsruhe.de">hochschule@hfg-karlsruhe.de</a>
					</div>
					<div class="small-left">
						<h3>Ansprechpartner</h3>
						<p>Sekretariat Kommunikationsdesign,
							<br>zuständig für Anfragen über den Fachbereich:
							<br>
							Frau Sokoll, <a href="mailto:ssokoll@hfg­-karlsruhe.de">ssokoll@hfg­-karlsruhe.de</a><br>
							Telefon: +49 721 8203­2245<br>
							Öffnungszeiten:
							Mo­–Do 10.00–12.00 Uhr,
							Freitag geschlossen
							</p>
							<p>Studentensektretariat,<br>
							zuständig für Anfragen von Studierenden:
							<br>
							Frau Eisenmenger, <a href="mailto:eisenmenger@hfg­-karlsruhe.de">eisenmenger@hfg­-karlsruhe.de</a><br>
							Telefon: +49 721 8203­2369
							<br>
							Öffnungszeiten:
							Mo­–Do 10.00–12.00 Uhr, nachmittags nur nach Absprache, Freitag geschlossen
						</p>
					</div>
					<div class="small-right">
						<h3>Anfahrt</h3>
						<p>
						Mit der Straßenbahn:<br>
						Ab Hauptbahnhof mit Linie 2 (Richtung Lessingstraße) bis zur Haltestelle ZKM. Die HfG liegt in Fahrtrichtung links.Vom Zentrum aus mit Linie 5 (Richtung Rheinhafen) bis zur Haltestelle Lessingstraße.
						</p>
						<p>
						Mit dem PKW:<br>
						Von der Autobahn (A5), Ausfahrt Karlsruhe Mitte, über die Südtangente, Ausfahrt 4 ZKM, auf der Brauerstrasse an der Europahalle vorbei (Richtung Innenstadt),dann die nächste Möglichkeit links in die Südendstrasse, daraufhin die erste Abzweigung rechts in die Lorenzstrasse.
						</p>
					</div>
				</div>
				<div class="image-group" style="height: 500px">
					<img src="img-content/16.jpg" style="width: 500px; left:5%; top:40px">
				</div>					
				<a href="#table-of-contents" class="btn-top">nach oben</a>
			</section>
			<section id="section-7" class="small-print">
				<h2><span>Impressum</span></h2>
				<p>Die Staatliche Hochschule für Gestaltung Karlsruhe ist eine Körperschaft des Öffentlichen
				Rechts. Sie wird durch ihren Rektor Prof. Dr. Peter Sloterdijk gesetzlich vertreten. Die zuständige
				Aufsichtsbehörde ist das Ministerium für Wissenschaft, Forschung und Kunst Baden-Württemberg,
				Postfach 10 34 53, 70029 Stuttgart. Inhaltlich Verantwortlicher gemäss $6 MDStV: Peter Sloterdijk</p>
				
				<h2><span>Haftungshinweis</span></h2>
				<p>Trotz sorgfältiger inhaltlicher Kontrolle übernehmen wir keine Haftung für die Inhalte externer
				Links. Für den Inhalt der verlinkten Seiten sind ausschliesslich deren Betreiber verantwortlich.</p>
				
				<h2><span>Urheberhinweis</span></h2>
				<p>Konzept und Gestaltung: Anna Cairns, Matthias Gieselmann, Igor Kuzmic, Tais Sirote. Betreuung: Indra Häußler, Urs Lehni. Projektfotos von Anna Cairns oder den jeweiligen Studierenden. Alle anderen Fotos, wenn nicht anders angegeben, von Evi Künstle.</p>
				</p>
			</section>
		</div>
<?php 
} // end if ($slug == "info" && $lang != "en") 
?>
<?php
if ($slug == "info" && $lang == "en") {
?>
		<nav class="sub-nav ajax-load-me" id="table-of-contents">
			<ul>
				<li><a href="#section-1">Concept</a></li>
				<li><a href="#section-2">Application</a></li>
				<li><a href="#section-3">Teachers</a></li>
				<li><a href="#section-4">Students</a></li>
				<li><a href="#section-5">Workshops</a></li>
				<li><a href="#section-6">Contact</a></li>
			</ul>
			<a href="index.php?slug=info" class="ajax" data-pageslug="info">Deutsch?</a>
		</nav>
		<div class="scroll ajax-load-me">
			<section id="section-1">
				<p>Totally English! The big brown fox jumps over the lazy dog. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim.</p>
				<div class="image-group" style="height: 310px">
					<img src="img-content/1.jpg" style="width: 230px; left: -20px; top: 10px;">
					<img src="img-content/2.jpg" style="left: 300px; top: 40px;">
				</div>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, idpulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quisvelit. Nulla facilisi. Nulla libero. Vivamus pharetra posuere sapien. Nam consectetuer. Sed aliquam, nunc eget euismod ullamcorper, lectus nunc ullamcorper orci, fermentum bibendum enim nibh eget ipsum. Donec porttitor ligula eu dolor. Maecena
				s vitae nulla consequat libero cursus venenatis. Nam magna enim, accumsan eu, blandit sed, blandit a, eros.
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit. Nulla facilisi. Nulla libero. V
				<aside>
					<h2>English aside</h2>
					<p>The crazy horse jumps over the lazy dog</p>
				</aside>
				<p>ivamus pharetra posuere sapien. Nam consectetuer. Sed aliquam, nunc eget euismod ullamcorper, lectus nunc ullamcorper orci, fermentum bibendum enim nibh eget ipsum. Donec porttitor ligula eu dolor. Maecenas vitae nulla consequat libero cursus venenatis. Nam magna enim, accumsan eu, blandit sed, blandit a, eros.</p>
				<aside>
					<img src="img-content/5.jpg">
				</aside>
				<a href="#table-of-contents" class="btn-top">go to top</a>
			</section>
			<section id="section-2">
				<h2><span>Application</span></h2>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit. Nulla facilisi. Nulla libero. Vivamus pharetra posuere sapien. Nam consectetuer. Sed aliquam, nunc eget euismod ullamcorper, lectus nunc ullamcorper orci, fermentum bibendum enim nibh eget ipsum. Donec porttitor ligula eu dolor. Maecenas vitae nulla consequat libero cursus venenatis. Nam magna enim, accumsan eu, blandit sed, blandit a, eros.</p>
				<a href="#table-of-contents" class="btn-top">go to top</a>
			</section>
			<section id="section-3">
				<h2><span>Teaching staff</span></h2>
				<div class="tables three-col">
					<div class="col">
						<img src="http://placehold.it/170x170" class="round-portrait">
						<p>A little description about one of the Professors. You know, not more than 100 words. Otherwise it will be too much I am afraid.
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida.</p>
					</div>
					<div class="col">
						<img src="http://placehold.it/170x170" class="round-portrait">
						<p>A little description about one of the Professors. You know, not more than 100 words. Otherwise it will be too much I am afraid.
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida.</p>
					</div>
					<div class="col">
						<img src="http://placehold.it/170x170" class="round-portrait">
						<p>A little description about one of the Professors. You know, not more than 100 words. Otherwise it will be too much I am afraid.
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
					</div>
				</div>
				<div class="tables three-col">
					<div class="col">
						<img src="http://placehold.it/170x170" class="round-portrait">
						<p>A little description about one of the Professors. You know, not more than 100 words. Otherwise it will be too much I am afraid.
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida.</p>
					</div>
					<div class="col">
						<img src="http://placehold.it/170x170" class="round-portrait">
						<p>A little description about one of the Professors. You know, not more than 100 words. Otherwise it will be too much I am afraid.
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida.</p>
					</div>
					<div class="col">
						<img src="http://placehold.it/170x170" class="round-portrait">
						<p>A little description about one of the Professors. You know, not more than 100 words. Otherwise it will be too much I am afraid.
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
					</div>
				</div>
				<a href="#table-of-contents" class="btn-top">go to top</a>
			</section>
			<section id="section-4">
				<h2><span>Students</span></h2>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
				<div class="tables three-col">
					<ul class="col">
					<li><a href="">Oren Richards</a></li>
					<li><a href="">Stacey Haynes</a></li>
					<li><a href="">Fitzgerald Sharp</a></li>
					<li><a href="">Plato Vincent</a></li>
					<li><a href="">Allistair Taylor</a></li>
					<li><a href="">Maris Calderon</a></li>
					<li><a href="">Macey Bowman</a></li>
					<li><a href="">Kerry Patrick</a></li>
					<li><a href="">Vernon Trevino</a></li>
					<li><a href="">Malachi Lawrence</a></li>
					</ul>
					<ul class="col">
					<li><a href="">Tanner Booker</a></li>
					<li><a href="">Blythe Carson</a></li>
					<li><a href="">Regina Dunlap</a></li>
					<li><a href="">Halla Huber</a></li>
					<li><a href="">Aurelia Bowers</a></li>
					<li><a href="">Flavia Cook</a></li>
					<li><a href="">Aiko Bean</a></li>
					<li><a href="">Xander Summers</a></li>
					<li><a href="">Jaden Finley</a></li>
					<li><a href="">Octavia Cross</a></li>
					</ul>
					<ul class="col">
					<li><a href="">Colorado Reed</a></li>
					<li><a href="">Blair Solis</a></li>
					<li><a href="">Tad Pickett</a></li>
					<li><a href="">Walter Hoffman</a></li>
					<li><a href="">Inga Strong</a></li>
					<li><a href="">Gabriel Garner</a></li>
					<li><a href="">Wyoming Horton</a></li>
					<li><a href="">Jerome Reilly</a></li>
					<li><a href="">Neville Smith</a></li>
					<li><a href="">Colby Robinson</a></li>
					</ul>
				</div>
				<a href="#table-of-contents" class="btn-top">go to top</a>
			</section>
			<section id="section-5">
				<h2><span>Workshops and workspaces</span></h2>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis.</p>
				<p><img src="http://placehold.it/650x300" class="big-image"></p>
				<aside>A little description about one of the Workshops. You know, not more than 100 words. Otherwise it will be too much I am afraid.
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, idpulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum.</aside>
				<p><img src="http://placehold.it/650x300" class="big-image"></p>
				<aside>A little description about one of the Workshops. You know, not more than 100 words. Otherwise it will be too much I am afraid.
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, idpulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum.</aside>
				<p><img src="http://placehold.it/650x300" class="big-image"></p>
				<aside>A little description about one of the Workshops. You know, not more than 100 words. Otherwise it will be too much I am afraid.
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, idpulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum.</aside>
				<p><img src="http://placehold.it/650x300" class="big-image"></p>
				<aside>A little description about one of the Workshops. You know, not more than 100 words. Otherwise it will be too much I am afraid.
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, idpulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum.</aside>
				<p><img src="http://placehold.it/650x300" class="big-image"></p>
				<aside>A little description about one of the Workshops. You know, not more than 100 words. Otherwise it will be too much I am afraid.
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, idpulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum.</aside>
				<a href="#table-of-contents" class="btn-top">go to top</a>
			</section>
			<section id="section-6">
				<h2><span>Contact</span></h2>

				<a href="#table-of-contents" class="btn-top">go to top</a>
			</section>
		</div>
<?php 
} // end if ($slug == "info" && $lang == "en") 
?>
		<a class="logo" href="index.php?slug=index">
			Kommunikationsdesign<br>
			an der HfG Karlsruhe
		</a>
		<h2 class="main-nav"><a href="index.php?slug=info" data-pageslug="info">Info</a></h2>
	</div>

	<div id="news" class="page<?php echo " ".$later_pages; if ($slug == "news") {echo " open"; $later_pages = "right";}?>">
<?php
if ($slug == "news" && $year != "2013") {
?>
	<nav class="sub-nav ajax-load-me">
		<ul>
			<li><a href="index.php?slug=news&year=2014" class="active ajax" data-pageslug="news">2014</a></li>
			<li><a href="index.php?slug=news&year=2013" class="ajax" data-pageslug="news">2013</a></li>
		</ul>
	</nav>
	<div class="scroll ajax-load-me">
		<article>
			<div class="date">10.07.2014</div>
			<h2><a href="">Sommerloch 2014: Wahnsinn!</a></h2>
			<p><img src="http://placehold.it/650x400" class="big-image"></p>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit. Nulla facilisi. Nulla libero. Vivamus pharetra posuere sapien. Nam consectetuer. Sed aliquam, nunc eget euismod ullamcorper, lectus nunc ullamcorper orci, fermentum bibendum enim nibh eget ipsum. Donec porttitor ligula eu dolor. Maecenas vitae nulla consequat libero cursus venenatis. Nam magna enim, accumsan eu, blandit sed, blandit a, eros.</p>
		</article>
		<a href="#table-of-contents" class="btn-top">nach oben</a>
		<article>
			<div class="date">10.07.2014</div>
			<h2>Noch ein anderer News-Eintrag</h2>
			<p><img src="http://placehold.it/650x400" class="big-image"></p>
			<aside>Eine Bildunterschrift kann es bei Bedarf auch geben</aside>
			<p><img src="http://placehold.it/650x800" class="big-image"></p>
			<aside>Eine Bildunterschrift kann es bei Bedarf auch geben</aside>
			<aside>Eine Bildunterschrift kann es bei Bedarf auch geben</aside>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit. Nulla facilisi. Nulla libero. Vivamus pharetra posuere sapien. Nam consectetuer. Sed aliquam, nunc eget euismod ullamcorper, lectus nunc ullamcorper orci, fermentum bibendum enim nibh eget ipsum. Donec porttitor ligula eu dolor. Maecenas vitae nulla consequat libero cursus venenatis. Nam magna enim, accumsan eu, blandit sed, blandit a, eros.</p>
		</article>
		<a href="#table-of-contents" class="btn-top">nach oben</a>
	</div>
<?php
} // end if ($slug == "news" && $year != "2013")
else if ($slug == "news" && $year == "2013") {
?>
	<nav class="sub-nav ajax-load-me">
		<ul>
			<li><a href="index.php?slug=news&year=2014" class="ajax" data-pageslug="news">2014</a></li>
			<li><a href="index.php?slug=news&year=2013" class="active ajax" data-pageslug="news">2013</a></li>
		</ul>
	</nav>
	<div class="scroll ajax-load-me">
		<article>
			<div class="date">10.07.2013</div>
			<h2>Sommerloch 2013: Eröffnung!</h2>
			<p><img src="http://placehold.it/650x400" class="big-image"></p>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit. Nulla facilisi. Nulla libero. Vivamus pharetra posuere sapien. Nam consectetuer. Sed aliquam, nunc eget euismod ullamcorper, lectus nunc ullamcorper orci, fermentum bibendum enim nibh eget ipsum. Donec porttitor ligula eu dolor. Maecenas vitae nulla consequat libero cursus venenatis. Nam magna enim, accumsan eu, blandit sed, blandit a, eros.</p>
		</article>
		<a href="#table-of-contents" class="btn-top">nach oben</a>
		<article>
			<div class="date">10.07.2013</div>
			<h2>News-Eintrag mit mehreren Fotos</h2>
			<p><img src="http://placehold.it/650x400" class="big-image"></p>
			<aside>Eine Bildunterschrift kann es bei Bedarf auch geben</aside>
			<p><img src="http://placehold.it/650x800" class="big-image"></p>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit. Nulla facilisi. Nulla libero. Vivamus pharetra posuere sapien. Nam consectetuer. Sed aliquam, nunc eget euismod ullamcorper, lectus nunc ullamcorper orci, fermentum bibendum enim nibh eget ipsum. Donec porttitor ligula eu dolor. Maecenas vitae nulla consequat libero cursus venenatis. Nam magna enim, accumsan eu, blandit sed, blandit a, eros.</p>
		</article>
		<a href="#table-of-contents" class="btn-top">nach oben</a>
	</div>
<?php
} // end if ($slug == "news" && $year == "2013")
?>
		<a class="logo" href="index.php?slug=index">
			Kommunikationsdesign<br>
			an der HfG Karlsruhe
		</a>
		<h2 class="main-nav"><a href="index.php?slug=news" data-pageslug="news">News</a></h2>
  </div>
  <div id="projects" class="page<?php echo " ".$later_pages; if ($slug == "projects" || $slug == "project-details") {echo " open"; $later_pages = "right";}?>">
<?php
if ($slug == "projects") {
?>
<nav id="stack-nav" class="sub-nav ajax-load-me">
	<h3 class="order-by">Sortierung</h3>
	<ul class="order-by" data-menu="order-by">
		<li><a href="" class='active' data-value='all'>Keine</a></li>
		<li><a href="" data-value='advisingPersons'>Lehrende</a></li>
		<li><a href="" data-value='year'>Jahr</a></li>
	</ul>
	<h3 class="show-as">Darstellung</h3>
	<ul class="show-as" data-menu="show-as">
		<li><a href="" class='active' data-value='mode-stack'>Stapel</a></li>
		<li><a href="" data-value='mode-list'>Liste</a></li>
	</ul>
</nav>
	<div class="scroll ajax-load-me">
<div id="stack-area" class="mode-stack">
			<ul id="hidden-stack">
<li class='card' data-pid='1' data-sort-data='{"all": "All", "year": "2013", "advisingPersons": "Rehberger"}' style="width:166px; height: 210px">
	<a href="index.php?slug=project-details&projectID=1">
	<img src="img-thumb/Cover_Bauwelt.jpg" width="166" height="210">
	</a>
</li>

<li class='card' data-pid='2' data-sort-data='{"all": "All", "year": "2013", "advisingPersons": "Lehni"}' style="width:149px; height: 210px">
	<a href="index.php?slug=project-details&projectID=1">
	<img src="img-thumb/Cover_einmalzwei.jpg" width="149" height="210">
	</a>
</li>

<li class='card' data-pid='3' data-sort-data='{"all": "All", "year": "2012", "advisingPersons": "Lehni"}' style="width:130px; height: 210px">
	<a href="index.php?slug=project-details&projectID=2">
	<img src="img-thumb/Cover_Essais.jpg" width="130" height="210">
	</a>
</li>

<li class='card' data-pid='4' data-sort-data='{"all": "All", "year": "2013", "advisingPersons": ["Kryenbühl", "Weiss"]}' style="width:149px; height: 210px">
	<a href="index.php?slug=project-details&projectID=1">
	<img src="img-thumb/Cover_Im-besten-Fall-lesbar.jpg" width="149" height="210">
	</a>
</li>

<li class='card' data-pid='5' data-sort-data='{"all": "All", "year": "2013", "advisingPersons": "Lehni"}' style="width:166px; height: 210px">
	<a href="index.php?slug=project-details&projectID=1">
	<img src="img-thumb/Cover_Liebe-und-so.jpg" width="166" height="210">
	</a>
</li>

<li class='card' data-pid='6' data-sort-data='{"all": "All", "year": "2011", "advisingPersons": "Lehni"}' style="width:133px; height: 210px">
	<a href="index.php?slug=project-details&projectID=1">
	<img src="img-thumb/Cover_Munitionsfabrik-21.jpg" width="133" height="210">
	</a>
</li>

<li class='card' data-pid='7' data-sort-data='{"all": "All", "year": "2010", "advisingPersons": "Baier"}' style="width:292px; height: 210px">
	<a href="index.php?slug=project-details&projectID=2">
	<img src="img-thumb/Cover_Palliativ.jpg" width="292" height="210">
	</a>
</li>

<li class='card' data-pid='8' data-sort-data='{"all": "All", "year": "2013", "advisingPersons": "Haas"}' style="width:151px; height: 210px">
	<a href="index.php?slug=project-details&projectID=1">
	<img src="img-thumb/Cover_Retrogames.jpg" width="151" height="210">
	</a>
</li>

<li class='card' data-pid='9' data-sort-data='{"all": "All", "year": "2012", "advisingPersons": "Baier"}' style="width:151px; height: 210px">
	<a href="index.php?slug=project-details&projectID=1">
	<img src="img-thumb/Cover_Sehen-und-gesehen-werden.jpg" width="151" height="210">
	</a>
</li>

<li class='card' data-pid='10' data-sort-data='{"all": "All", "year": "2013", "advisingPersons": "Lehni"}' style="width:129px; height: 210px">
	<a href="index.php?slug=project-details&projectID=2">
	<img src="img-thumb/Cover_Stichtag.jpg" width="129" height="210">
	</a>
</li>

<li class='card' data-pid='11' data-sort-data='{"all": "All", "year": "2013", "advisingPersons": ["Rehberger", "Rothenberger"]}' style="width:178px; height: 210px">
	<a href="index.php?slug=project-details&projectID=1">
	<img src="img-thumb/Cover_The-Fly.jpg" width="178" height="210">
	</a>
</li>

<li class='card' data-pid='12' data-sort-data='{"all": "All", "year": "2011", "advisingPersons": ["Rehberger", "Lehni"]}' style="width:135px; height: 210px">
	<a href="index.php?slug=project-details&projectID=2">
	<img src="img-thumb/Cover_Tricks-and-Tools.jpg" width="135" height="210">
	</a>
</li>

<li class='card' data-pid='13' data-sort-data='{"all": "All", "year": "2012", "advisingPersons": "Gaessner"}' style="width:149px; height: 210px">
	<a href="index.php?slug=project-details&projectID=1">
	<img src="img-thumb/Cover_Type-Nerd-Session.jpg" width="149" height="210">
	</a>
</li>

<li class='card' data-pid='14' data-sort-data='{"all": "All", "year": "2013", "advisingPersons": "Rehberger"}'  style="width:149px; height: 210px">
	<a href="index.php?slug=project-details&projectID=2">
	<img src="img-thumb/Cover_Versuche.png" width="149" height="210">
	</a>
</li>

<li class='card' data-pid='15' data-sort-data='{"all": "All", "year": "2013", "advisingPersons": "Lehni"}' style="width:153px; height: 210px">
	<a href="index.php?slug=project-details&projectID=1">
	<img src="img-thumb/Cover_Vier-Wochen.jpg" width="153" height="210">
	</a>
</li>
			</ul>
		</div>
	</div>
<?php
} // end if ($slug == "projects" || $slug == "project-details")
?>
		<a class="logo" href="index.php?slug=index">
			Kommunikationsdesign<br>
			an der HfG Karlsruhe
		</a>
		<h2 class="main-nav"><a href="index.php?slug=projects" data-pageslug="projects">Projekte</a></h2>
 	</div>	
 	<div id="index" class="page<?php  echo " ".$later_pages; if ($slug == "index") echo " open"; ?>">
	<h2 class="main-nav">
		<a href="index.php?slug=index" data-pageslug="index">Willkommen</a>
	</h2>
<?php
if ($slug == "index") {
?>
<?php 
} // end if ($slug == "index") 
?>
		<div id="intro-slider">
			<img src="img-intro/2.JPG">
			<img src="img-intro/6.JPG">
			<img src="img-intro/8.JPG">
			<img src="img-intro/1.JPG">
			<img src="img-intro/3.JPG">
			<img src="img-intro/4.JPG">
			<img src="img-intro/5.JPG">
			<img src="img-intro/7.JPG">
			<img src="img-intro/9.JPG">
			<img src="img-intro/10.JPG">
			<img src="img-intro/11.JPG">
		</div>
	<a class="logo" href="index.php?slug=index">
			Kommunikationsdesign<br>
			an der HfG Karlsruhe
	</a>
</div>
 	<div class="project-details<?php if ($slug == "project-details") echo " open";?>">
		<a id="btn-close" href="index.php?slug=projects"><img src="img-ui/x-1.png"></a>
<?php
if ($slug == "project-details" && $projectID != "2") {
?>
		<h1 class="project-title">Bauwelt</h1>
		<a id="btn-info"><img src="img-ui/plus-1.png">&nbsp;Info</a>	
		<ul id="detail-slideshow">
			<div class="cycle-prev">
				<span id="btn-previous-img"><img src="img-ui/arrleft-3.png"></span>
			</div>
			<div class="cycle-next">
				<span id="btn-next-img"><img src="img-ui/arrright-3.png"></span>
			</div>
			<li class="video">
				<video preload="auto" loop="">
					<source src="img-detail/MVI_8580-gedreht-komp1_2.mp4" type="video/mp4">
					<source src="img-detail/MVI_8580-gedreht-komp1_2.ogg" type="video/ogg">
				</video>
			</li>
			<li><img src="img-detail/IMG_8582_edit.jpg"></li>
			<li><img src="img-detail/IMG_8583_edit.jpg"></li>
			<li><img src="img-detail/IMG_8584_edit.jpg"></li>
			<li><img src="img-detail/IMG_8585_edit.jpg"></li>
			<li><img src="img-detail/IMG_8586_edit.jpg"></li>
			<li><img src="img-detail/IMG_8587_edit.jpg"></li>
			<li><img src="img-detail/IMG_8588_edit.jpg"></li>
			<li><img src="img-detail/IMG_8589_edit.jpg"></li>
			<li><img src="img-detail/IMG_8590_edit.jpg"></li>
			<li><img src="img-detail/IMG_8591_edit.jpg"></li>
			<li><img src="img-detail/IMG_8592_edit.jpg"></li>
		</ul>
		<div id="project-words">
			<a id="btn-words-close"><img src="img-ui/minus-1.png">&nbsp;Info</a>
	  		<h1 class="project-title">Bauwelt</h1>
			<div id="project-description">
				<p>Oscar Wildes Roman The Picture of Dorian Gray von 1891 beschreibt den moralischen Niedergang des Protagonisten, dessen Portrait an seiner statt altert. Idee der Neuinterpretation ist, Grays Metamorphose typografisch erlebbar zu machen.</p>
				<p>Mit fortschreitender Handlung verfällt die Schrift und löst sich nach und nach auf. Am Buchende verbleibt nur ein beinahe illustratives Muster aus Typofragmenten. Aussagen anderer Romanfiguren an den Kapitelanfängen unterstreichen den Verfall des Protagonisten. Das Wilde-Zitat auf dem Buchcover illustriert Grays zerrissene Persönlichkeit: So, wie sein Inneres und Äußeres eine Trennung erfahren – und nur zusammen das „ganze Bild“ ergeben –, ist auch die Schrift nur lesbar, wenn der bedruckte transparente Umschlag exakt aufliegt.</p>
			</div>
			<dl id="project-meta">
				<dt>Studierende/r</dt>
				<dd>Dinah Lohrer</dd>
				<dt>Seminar</dt>
				<dd>From Gutenberg to Lulu</dd>
				<dt>Lehrende/r</dt>
				<dd>Urs Lehni</dd>
				<dt>Technische Details</dt>
				<dd>240mm x 300mm, 134 Seiten, Fadenheftung</dd>
				<dt>Semester</dt>
				<dd>WS 2012/2013</dd>
			</dl>
		</div>
<?php
} // end if ($slug == "project-details" && $projectID != "2")
if ($slug == "project-details" && $projectID == "2") {
?>
		<h1 class="project-title">Torten &amp; Pfeiler</h1>
		<a id="btn-info"><img src="img-ui/plus-1.png">&nbsp;Info</a>	
		<ul id="detail-slideshow">
			<div class="cycle-prev">
				<span id="btn-previous-img"><img src="img-ui/arrleft-3.png"></span>
			</div>
			<div class="cycle-next">
				<span id="btn-next-img"><img src="img-ui/arrright-3.png"></span>
			</div>
			<li class="video">
				<video preload="auto" loop="">
					<source src="img-detail/movingportraits_preview.mp4" type="video/mp4">
					<source src="img-detail/movingportraits_preview.ogg" type="video/ogg">
				</video>
			</li>
			<li class="video embed">
				<object width="640" height="480"><param name="movie" value="//www.youtube-nocookie.com/v/RTobV-Gnv-8?version=3&amp;hl=en_US&amp;rel=0"></param><param name="showinfo"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="//www.youtube-nocookie.com/v/RTobV-Gnv-8?version=3&amp;hl=en_US&amp;rel=0&amp;showinfo=0" type="application/x-shockwave-flash" width="640" height="480" allowscriptaccess="always" allowfullscreen="true"></embed></object>
			</li>
			<li class="video embed">
<!-- This version of the embed code is no longer supported. Learn more: https://vimeo.com/s/tnm --> <object width="854" height="480"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=17084347&amp;force_embed=1&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=#0000ff&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=17084347&amp;force_embed=1&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=0000ff&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="854" height="480"></embed></object>
			</li>
			<li><img src="img-detail/1.jpg"></li>
			<li><img src="img-detail/2.jpg"></li>
		</ul>
		<div id="project-words">
			<a id="btn-words-close"><img src="img-ui/minus-1.png">&nbsp;Info</a>
	  		<h1 class="project-title">Torten &amp; Pfeiler</h1>
			<div id="project-description">
				<p>Oscar Wildes Roman The Picture of Dorian Gray von 1891 beschreibt den moralischen Niedergang des Protagonisten, dessen Portrait an seiner statt altert. Idee der Neuinterpretation ist, Grays Metamorphose typografisch erlebbar zu machen.</p>
				<p>Mit fortschreitender Handlung verfällt die Schrift und löst sich nach und nach auf. Am Buchende verbleibt nur ein beinahe illustratives Muster aus Typofragmenten. Aussagen anderer Romanfiguren an den Kapitelanfängen unterstreichen den Verfall des Protagonisten. Das Wilde-Zitat auf dem Buchcover illustriert Grays zerrissene Persönlichkeit: So, wie sein Inneres und Äußeres eine Trennung erfahren – und nur zusammen das „ganze Bild“ ergeben –, ist auch die Schrift nur lesbar, wenn der bedruckte transparente Umschlag exakt aufliegt.</p>
			</div>
			<dl id="project-meta">
				<dt>Studierende/r</dt>
				<dd>Dinah Lohrer</dd>
				<dt>Seminar</dt>
				<dd>From Gutenberg to Lulu</dd>
				<dt>Lehrende/r</dt>
				<dd>Urs Lehni</dd>
				<dt>Technische Details</dt>
				<dd>240mm x 300mm, 134 Seiten, Fadenheftung</dd>
				<dt>Semester</dt>
				<dd>WS 2012/2013</dd>
			</dl>
		</div>
<?php
} // end if ($slug == "project-details" && $projectID == "2")
?>
	</div>
	<div id="smallscreen-menu">
		<nav>
			<ul>
				<li><a href="index.php?slug=projects" data-pageslug="projects">Projekte</a></li>
				<li><a href="index.php?slug=news" data-pageslug="news">News</a></li>
				<li><a href="index.php?slug=info" data-pageslug="info">Info</a></li>
			</ul>
		</nav>
		<div class="bar"> 
			<a href="" id="btn-smallscreen-menu"><?=$slug;?><!-- Hier soll der ausgeschriebene Name der Seite stehen, z.B. "Projekte" --></a>
			<h1>Kommunikationsdesign<br>an der HfG Karlsruhe</h1>
		</div>
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="js/history.js/scripts/bundled/html4+html5/jquery.history.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script src="js/jquery.cycle2.min.js"></script>
	<script src="js/jquery.cycle2.swipe.min.js"></script>
	<script src="js/waypoints.min.js"></script>
	<script src="js/scripts.js"></script>
</body>
</html>