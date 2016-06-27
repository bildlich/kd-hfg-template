# Developer guide for the KD Website

## What this is code is about

This repository contains the website of the Communication Design department at HfG Karlsruhe (Karlsruhe University of Arts and Design). The website runs on Typo3.

## Transferring the project to you

This repo is currently maintained by Matthias Gieselmann. The nature of schools is that students and staff fluctuate. I am happy to hand the project over to you. Drop me an email. I can add you as a collaborator or transfer the repository to you.

## Whom to contact

The frontend code was created by and is currently maintained by Matthias Gieselmann. Backend code, on the other hand, has been maintained by Pascal Bremmer. The original design was created by Anna Cairns, Matthias Gieselmann, Igor Kuzmic, and Tais Sirote. They may provide the original design files (InDesign) so you can make changes from there.

For general questions about the website, contact the current website Hiwi of the Communication Design department or Juliane Hohlbaum (teaching assistant) or Indra Häussler (teaching assistant).

## Prerequisites

If you want to make changes to the frontend code, you need to understand (or learn):

  * [SASS](http://sass-lang.com/), a CSS preprocessor, and [Compass](http://compass-style.org/)
  * JavaScript and jQuery

If you want to make changes to the backend code, you need to understand:

  * PHP
  * Typo3
  * MySQL


In both cases, you need to understand:

  * Version control with [Git](http://git-scm.com/book/en/Getting-Started-About-Version-Control)
  * How to connect to a remote server with SSH keys

## Working copy

Do not develop on the remote server. Modifying a live website is bad practice, period. Instead, make changes on a working copy on your computer, test, and deploy afterwards. Here's how to setup the site on your machine:

1. The website runs on Typo3. Requirements can be found [here](http://typo3.org/typo3-cms/overview/requirements/). The gist is: You need PHP and MySQL. Set up your computer in a way this works, e.g. with [MAMP](http://www.mamp.info/).
2. Create a folder on your harddrive that will contain your working copy. In my case, it is located in `~/htdocs/kd-hfg-website/`
3. Clone this repository into the folder.
4. Add the Typo3 core files to you folder. [Download](http://sourceforge.net/projects/typo3/files/TYPO3%20Source%20and%20Dummy/) the appropriate version and place the folder inside your project: `…/kd-hfg-website/typo3`. The version of typo3 can be seen in the title tag of the admin area.
5. Media folders are not included in this repository because they cause unnecessary bloat. Copy them from the server through SFTP. Connect to the remote server ([details below](#if-you-have-to-transfer-individual-files-from-and-to-the-production-server)) and copy the missing folders (`/fileadmin/user_upload/`, `/uploads/`) to your local copy.
6. Another file is missing in the repository: `/typo3conf/LocalConfiguration.php`. Copy it from the server as well. We'll make some changes to it in a minute.
7. Download the MySQL database as a .sql file from the production server as [described here](#download-the-mysql-database).
8. Set up a local MySQL database named `kd_t3`. Import the .sql file. Tip: The file may be too big to import it through the browser (e.g. with phpMyAdmin). Use the MySql command line to import it anyway:


        mysql > CREATE DATABASE kd_t3;
        mysql > USE kd_t3;
        mysql > source path/to/your/file.sql;


9. Next we need to tell Typo3 how to connect to the local database. Do this by editing the file `/typo3conf/LocalConfiguration.php`.
10. Configure Typo3 so it knows where it's located. Login to the backend. In the middle column, select the page "Home" (the one with the  earth icon). In the left column, select "Template". In the right column, click the pen next to "Vollständigen Template-Datensatz bearbeiten." Under "setup", change the value of `config.baseURL` to something like `http://localhost:8888/kd-hfg-website/` (depending on how your local server is configured and where you have placed the working copy).
11. Open the website in the browser to see if everything is working.
12. If necessary, activate ImageMagick on your local server. Most likely you have to uncomment some line in you `php.ini`. Use Typo3's Install Tool to update the location of ImageMagick so it can transform images.

## Download the MySQL database

This is needed to run the website locally. It's also a good idea to do it every now and then just to have a backup.

1. Login to the admin area of the website at http://kd.hfg-karlsruhe.de/typo3
2. On the left, choose `phpMyAdmin -> Exportieren -> Ok`. A .sql file is being downloaded to your hard drive.

## Development workflow

1. Pull changes from this repository
2. Make your changes locally
3. Test locally
4. Commit your changes
5. Push them back to this repository
6. Use dploy to transfer the files to the production server at kd.hfg-karlsruhe.de
7. Test remotely

## Version Control

We use Git for version control. Naming the advantages of version control is beyond the scope of this document ([read more here](http://git-scm.com/book/en/Getting-Started-About-Version-Control)). In short: when groups work on software they need version control or things break. What you need to know is:

  * You have to understand Git to work on the website's code
  * You cannot just edit files on the server
  * Neither can you edit files locally and upload it to the server without committing it to the repository

Why is this important? Imagine you don't care about the whole repository stuff. You connect to the remote server and edit `style.css`. Next, your friend Klaus comes along. He cares about the repository. He checks it out and makes changes to `style.css`. But because you have not added your changes to the repository, he works with an outdated version of the file. When he deploys it, your changes are lost.

Tip: You can use Git on the command line but I recommend using [Tower](http://www.git-tower.com/). It is an interface that makes working with version control a lot easier. It's not free but well worth the price.

## Deployment

When you have committed your changes, don't upload the files manually. We use a service called [dploy](https://kd-hfg-template.dploy.io) to deploy the files from this repository straight to the server. Contact Matthias for access to dploy.

Some files will never be committed or deployed, namely `/typo3conf/LocalConfiguration.php` and all kinds of media files (images and videos). If you have to make changes to these, transfer them individually through SFTP as described below.

## If you have to transfer individual files from and to the production server

The only way to connect is through SFTP with Public Key Authentification (SSH). Create a SSH key pair if you don't already have one. Send Ionel Spanachi your public key and ask him to grant you access. *Be aware:* The keys stored on your computer work in lieu of a password. That's practical, but it also means that if your computer gets lost, anyone who finds it can log on to the server. Notify Ionel so he can revoke your key's access.

The server's address is `kd.hfg-karlsruhe.de`, you connect at port `22`. The website code is located at `/var/www/html`. Be careful not to make changes you don't fully understand.

## Coding Guidelines

### General Guidelines

* Comment your code. It matters.
* You need a tool to compile SASS as well as concatenate and minify JavaScript files. While you could do it on the command line I recommend [CodeKit](https://incident57.com/codekit/). Once set up, it works in the background. The developer does give a student discount, too.

### JavaScript

#### Which files to edit

The websites uses jQuery and a couple of plugins to work. All JS files can be found in `fileadmin/templates/js/`. The custom JS is stored in `scripts.js`. This is the only file you should edit.

#### Which JS files are served to the browser?

Plugins included, we use a dozen or so JS files. But because including many separate files is bad practice (lots of HTTP requests, you know the deal), we only serve 3 files:

  * jQuery (hosted on some CDN)
  * `jquery.history.js`, an awesome jQuery plugin that makes HTML5 history/state APIs available on all browsers
  * `combined-ck.js`. This contains all other jQuery plugins plus our very own custom JavaScript:
     * jQuery UI (needed for drag 'n' drop)
     * enquire.js (emit JS events based on browser size)
     * waypoints.js (emit JS events based on scrolling position)
     * Cycle2 (Slideshow)
     * Cycle2 swipe plugin (swip gestures in slideshow)
     * `scripts.js` **This is the only file we modify.** It contains our custom JS.

What does this mean for development? We only modify `scripts.js`. Then we concatenate the files, resulting in `combined-ck.js`. This file is also minified to save bandwidth. All of this happens automatically in CodeKit, so no headaches for us.

[Here's a screenshot](https://www.dropbox.com/s/kag7rl5vmmpb7vb/Screenshot%202014-08-13%2014.58.42.png) of my CodeKit setup for `combined-ck.js`.

#### File editing Dos and Don'ts

 * Do modify scripts.js
 * Don't modify plugin files directly, your changes will be overwritten on update
 * Don't forget to concatenate and minify. The browser will never see `scripts.js` directly, only `combined-ck.js`.

#### JS architecture

 * As I mentioned before, the app JS is included in `scripts.js`. The whole app is wrapped into an object called `K` and initialized at the bottom with `K.init({...});`. This is convenient: different parts of the app are methods inside `K` and can be re-used. For instance, to switch between stack and list mode on the projects overview, call `this.changeDisplayMode('mode-stack')` or `this.changeDisplayMode('mode-list')`.Consider using the same approach when modifying the app: If something is used in more than one place, create a method that does it.
 * As a general design goal, the site should work for people without JavaScript enabled. For instance, a link that loads content asynchronously should fall back to a standard link that loads the desired content even without JavaScript.
 * In several places, we use [custom Google Analytics events](https://developers.google.com/analytics/devguides/collection/analyticsjs/events) to understand visitor behaviour. For instance, we track how many project images and videos visitors have looked at by firing `ga('send', 'event', 'Projekt-Medien', 'view', el.tagName);`

### Stylesheets

#### Use SASS

The website uses [SASS](http://sass-lang.com/), a CSS pre-processor. This means you don't edit .css files directly. Instead, you edit `styles.scss` (located at `fileadmin/templates/sass/`). Compile this file to `fileadmin/templates/css/styles.css`. This is not the place to describe what's great about SASS. But it's a lot better than pure CSS.

*Note:* Editing the .css file is completely pointless. All changes will be overwritten once the .scss file is modified and compiled. Stick to the .scss.

#### Use Compass

The stylesheet imports [Compass](http://compass-style.org/), a CSS authoring framework. It provides a couple of useful mixins and takes care of the browser prefixes.

#### Style architecture

  * **Use variables:** Colors, font-sizes and metrics go into variables where possible. This makes us very flexible. For instance, to change the accent color (currently blue), all you need to do is change the variable `$accent-color-1`.
  * **Margin and padding:** Because of the special layered layout we don't use a grid system. Nevertheless, paddings and margins follow strict rules. For instance, the variable `$content-beginning-left` defines the distance between the main navigation on the left and the main text column of the page that is currently open. Stick to these rules to keep margins and paddings consistent across the site.
  * **Type sizes:** The whole site only uses three type sizes: s, m, and l. There are mixins that include the correct font-size and line-height. For instance, to style an element with small font-size, use

        .my-element {
          @include font-s;
        }

  * **Responsive Design:** The website is responsive, meaning the visitor's experience is good no matter what device he uses (cellphone, laptop, tv). Developing it [mobile-first](http://zurb.com/word/mobile-first) would have been good but we didn't. The stylesheet is structured desktop-first: All styles are created for desktops, then exceptions are made for smaller devices. Specifically, we have breakpoints for
     * **Desktop browsers** (> 1024px). Default design.
     * **Tablets and smaller PCs** (≤ 1024px). Target tablets: No hover, no drag'n'drop, bigger touch targets, smaller typography, layout adjustments, no videos in slideshows
     * **Smartphones and smaller tables** (≤ 799px). Completely different navigation to save space at the sides, no hover, no drag'n'drop, bigger touch targets, smaller typography, smaller images, still zoomable, less drop shadows, no videos in slideshows

  Delivering different designs for different browser sizes means: Whenever you change the design or add a feature, you have to design it for all of them. Sometimes this means creating a different design, like a bigger font-size for mobile readers or a different kind of navigation. Sometimes it means eliminating a feature entirely. For instance, we don't show the stacked project thumbnails to touchscreen users because drag 'n' drop does not work well on mobile browsers.

  For a complete list of devices the website has been tested with, see [this Document](https://docs.google.com/spreadsheet/ccc?key=0AoXTt6uiRDHWdFNwb3QzS3JxQW41TGdiVV9mT3NtWVE&usp=sharing).

### Supported browsers

Browsers we support (as of August 2014):

* Internet Explorer 9 and up
* Safari 6 and up
* Chrome 23 and up
* Firefox 26 and up
* Opera 12 and up
* iOs Safari 6 and up
* Android Browser 4.4 and up
