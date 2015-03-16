/* global History:true*/
/* //global Hyphenator:true*/
/* global DocumentTouch:true*/
/* global ga:true*/
/* global enquire:true*/
/* global console:true*/
/* global twttr:true*/
/* global FB:true*/
var K = {

	init: function(config) {
		K.config = config;
		$.ajaxSetup({
			cache: true,
			timeout: 20000 // 20 seconds
		});

		K.enableAjaxPageLoad();
		K.bindEvents();

		// get current page slug
		var slug = $('body').data('pageslug');
		K.touchDeviceMagic();
		K.setupPage(slug);

		enquire
			.register("screen and (max-width:"+K.config.screenWidthMobile+"px)", {

				// OPTIONAL
				// If supplied, triggered when a media query matches.
				match : function() {
					console.log('triggering mobile js');
					K.config.scrollSelector = "body";
					K.config.scrollOffsetTop = 50;
					// when on index page, forward to projects page
					if ($('body').data('pageslug') === 'index') {
						$('#smallscreen-menu ul li:first-child a').trigger('click');
					}
					// when on projects page, disable stack view
					if ($('body').data('pageslug') === 'projects') {
						$('#smallscreen-menu ul li:first-child a').trigger('click');
					}
				},

				// OPTIONAL
				// If supplied, triggered when the media query transitions
				// *from a matched state to an unmatched state*.
				unmatch : function() {
					console.log('left mobile js for desktop js');
					K.config.scrollSelector = ".scroll";
					K.config.scrollOffsetTop = 0;
				},

				// OPTIONAL
				// If supplied, triggered once, when the handler is registered.
				setup : function() {
					console.log('mobile js called for first time');
					// Create scroll up button
					$('body').append('<a class="btn-top" href="#top"></a>');
				},

				// OPTIONAL, defaults to false
				// If set to true, defers execution of the setup function
				// until the first time the media query is matched
				deferSetup : true,

				// OPTIONAL
				// If supplied, triggered when handler is unregistered.
				// Place cleanup code here
				destroy : function() {}
			});
	},

	/*
	Centers an object vertically inside their parent. Note:
	Images must be loaded before this works.
	*/
	centerVert: function($node) {
		var containerWidth= $node.width();
		var containerHeight = $node.parent().height();
		var nodeWidth = $node.data('width');
		var nodeHeight = $node.data('height');
		var nodeRatio = nodeHeight/nodeWidth;
		var nodeScaledHeight = nodeHeight;
		nodeScaledHeight = Math.min(containerWidth*nodeRatio,nodeHeight,containerHeight);
		var offset = Math.max(containerHeight/2-nodeScaledHeight/2-20,0);
		$node.children('img,video,embed,object,iframe').first().css({'top':offset,'height':nodeScaledHeight});
		/*
		var logObject = {
			containerWidth: containerWidth,
			containerHeight: containerHeight,
			nodeWidth: nodeWidth,
			nodeHeight: nodeHeight,
			nodeScaledHeight: nodeScaledHeight
		};
		console.log(logObject);
		*/
	},

	/*
	Switches projects page from stack mode to list mode
	and back
	*/
	changeDisplayMode: function(value) {
		// Position cards in stack view
		if (value === "mode-stack") {
			K.ele.cards.each(function(){
				K.positionCard($(this), K.config.filterKey);
			});
		}
		K.ele.stackArea
			.removeClass('mode-stack mode-list')
			.addClass(value);
	},

	/*
	Closes the full screen detail view
	*/
	closeDetails: function() {
		K.ele.projectDetails.removeClass('open');
		var $a = $('div.project-details a#btn-close');
		History.pushState({'what': 'page', 'newSlug': 'projects'}, "Projekte", $a.attr('href')); // Will have to change URI once we know the path to the projects page
	},

	/*
	Display project details that have previously been loaded
	by .loadProjectAjax()
	*/
	displayDetails: function() {
		/*
		On touch devices we don't show
		embedded videos, assuming they don't handle
		them well. This may change in the future
		(faster devices etc.).
		*/
		var slideSelector;
		var swipe;
		if (K.config.isTouchDevice === true) {
			slideSelector = '>li:not(.embed)';
			swipe = true;
		}
		else {
			slideSelector = '>li';
			swipe = false;
		}

		// Center first item vertically
		var $firstItem = $('#detail-slideshow'+slideSelector).first();
		K.centerVert($firstItem);
		K.ele.detailSlideshow
			.on('cycle-initialized', function() {
				K.ele.detailSlideshow.removeClass('loading');
			})
			.on('cycle-update-view', function(event, optionHash, slideOptionsHash, currentSlideEl) {
				var $media = $(currentSlideEl).children().eq(0);
				var el = $media.get(0);
				if (el.tagName === "VIDEO") {
					// on touch devices, add html5 media controls
					// (otherwise, iPad will not play anything)
					if (K.config.isTouchDevice) {
						console.log($(el));
						$(el).attr('controls','controls');
					}
					else {
						el.play();
					}
				}
				// Analytics
				ga('send', 'event', 'Projekt-Medien', 'view', el.tagName);
			})
			.on('cycle-after', function(event, optionHash, outgoingSlideEl) {
				var $media = $(outgoingSlideEl).children().eq(0);
				var el = $media.get(0);
				if (el.tagName === "VIDEO" && el.paused === false) {
					$media.css('diplay','none');
					el.pause();
				}
			})
			.on('cycle-next cycle-prev', function(event, optionHash) {
				// center media vertically
				var $slides = optionHash.slides;
				var walker = 0;
				if (event.type === 'cycle-next') { walker = 1; }
				else { walker = -1; }
				var $node = $($slides[(optionHash.currSlide) % $slides.length]);
				K.centerVert($node);
			})
			.on('cycle-destroyed', function() {
				$('#detail-slideshow video').each(function() {
					this.pause();
				});
			});

		K.ele.detailSlideshow
			.addClass('loading')
			.cycle({
				speed: 300,
				timeout: 3000,
				slides: slideSelector,
				paused: true,
				fx: 'scrollHorz',
				swipe: true,
				youtube: true
			});
	},

	/*
	Loads a page via ajax and displays it.
	Handles CSS transitions, spinner icon, user feedback etc.
	*/
	loadPageAjax: function(State, newSlug) {
		console.log('loadPageAjax', newSlug);
		// This variable will be filled with the loaded page content
		var $pageContent;

		var oldSlug = $('body').data('pageslug');
		/*
		Special case: are we are just closing the fullscreen view?
		*/
		if (oldSlug ==='project-details' && newSlug === 'projects') {
			K.tearDownPage('project-details');
			K.closeDetails();
			// if the project list has been loaded before
			// we don't need to make any ajax call at all
			if ($('#stack-area').length) {
				return;
			}
		}
		// This lets us read what page we are on at any moment
		$('body').data('pageslug', newSlug);
		var $newPage = $('.page#'+newSlug);
		var $deleteThis;
		$.ajax({
				url: State.url,
				dataType: "html",
				beforeSend: function() {
					// do CSS magic for transitions
					$('.page').removeClass('open translate-more translate-less');
					$newPage.nextAll('.page').addClass('right');
					$newPage.prevAll('.page').removeClass('right');
					$newPage.addClass('open').removeClass('right');
					// remove dynamic content from currently displayed page
					// but before that, wait a second so that the content can
					// fade out smoothly
					$deleteThis = $('.ajax-load-me');
				},
				success: function(data) {
					var $response=$(data);
					$pageContent = $response.find('.ajax-load-me');
					document.title = $response.filter('title').text();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					//$pageContent = '<div class="scroll ajax-error ajax-load-me"><article class="ajax-error"><p>:-/<br>Beim Laden der Seite ist ein Fehler aufgetreten. Bitte überprüfe deine Internetverbindung. Wenn das Problem bestehen bleibt, schreibe eine kurze Mail an kd-archiv <em>AT</em> hfg-karlsruhe.de</p><p>Danke!</p></article></div>';
					console.log('Ajax error function was called.', jqXHR, textStatus, errorThrown);
				},
				complete: function() {
					if (oldSlug === newSlug) {
						$deleteThis.remove();
						K.tearDownPage(oldSlug);
						$newPage.prepend($pageContent);
						K.setupPage(newSlug);
					}
					else {
						window.setTimeout(function() {
							$deleteThis.remove();
							K.tearDownPage(oldSlug);
							$newPage.prepend($pageContent);
							K.setupPage(newSlug);
						}, 500);
					}
				}
		});
	},

	/*
	Adds Twitter button to $element and loads the SDK if necessary.
	*/
	initTwitter: function($element, url) {
		// Append button html if it's not already here.
		if (!$($element).hasClass('added-twitter')) {
			$($element).append("<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\""+url+"\">Tweet</a> ");
			$($element).addClass('added-twitter');
		}
		// Load Twitter SDK if it's not already here.
		if (typeof twttr === "undefined") {
			$.getScript("https://platform.twitter.com/widgets.js");
		}
		else {
			twttr.widgets.load($element);
		}
	},
	/*
	Adds Facebook button to $element and loads the SDK if necessary.
	*/
	initFacebook: function($element, url) {
		// Append button html if it's not already here.
		if (!$($element).hasClass('added-facebook')) {
			$($element).append("<div class=\"fb-like\" data-href=\""+url+"\" data-layout=\"button_count\" data-action=\"like\" data-show-faces=\"false\" data-share=\"true\"></div> ");
			$($element).addClass('added-facebook');
		}
		// Load Facebook SDK if it's not already here.
		if (typeof FB === "undefined") {
			$('body').prepend('<div id="fb-root"></div>');
			$.getScript("http://connect.facebook.net/de_DE/all.js", function() {
				FB.init({
					xfbml: false, // don't render Like buttons immediately but only when we tell you to with .parse()
					version: 'v2.2'
					// Consider adding FB App id here.
				});
				FB.XFBML.parse($element);
			});
		}
		else {
			FB.XFBML.parse($element);
		}
	},

	/*
	Loads a project via ajax and displays it.
	This function is NOT called when a project
	is opened directly by its permalink
	*/
	loadProjectAjax: function(State) {
		// This variable will be filled with the loaded page content
		var $projectContent;
		$('body').data('pageslug', 'project-details');
		$.ajax({
				url: State.url,
				dataType: "html",
				beforeSend: function() {
					// open black full screen
					K.ele.projectDetails.addClass('open');
				},
				success: function(data) {
					var $response=$(data);
					$projectContent = $response.closest('.project-details').html();
					document.title = $response.filter('title').text();
				},
				error: function() {
					$projectContent = '<div class="ajax-error ajax-load-me"><p>:-/<br>Beim Laden der Seite ist ein Fehler aufgetreten. Bitte überprüfe deine Internetverbindung. Wenn das Problem bestehen bleibt, schreibe eine kurze Mail an kd-archiv <em>AT</em> hfg-karlsruhe.de</p><p>Danke!</p></div>';
					console.log('Ajax error function was called.');
				},
				complete: function() {
					// One more check. The user may have closed the full
					// screen in the meantime, maybe b/c loading took too long
					if (K.ele.projectDetails.hasClass('open')) {
						K.ele.projectDetails.html($projectContent);
						K.setupPage('project-details',true);
					}
				}
		});
	},

	/*
	Initializes History.js and binds Ajax request to statechange event
	*/
	enableAjaxPageLoad: function() {
		// Prepare
		var History = window.History; // Note: We are using a capital H instead of a lower h
		if ( !History.enabled ) {
			// History.js is disabled for this browser.
			return false;
		}
		// Bind Ajax request to StateChange Event
		History.Adapter.bind(window,'statechange',function() { // Note: We are using statechange instead of popstate
			var State = History.getState();
			// Determine whether we load A) new page or B) new project
			// We do this with the data object of the State
			//console.log('URL',State.url);
			//console.log('State',State.data);
			if (State.data.what === 'page') {
				K.loadPageAjax(State, State.data.newSlug);
			}
			else if (State.data.what === 'project') {
				K.loadProjectAjax(State);
			}
		});
		$( document ).ajaxStart(function() {
			$('body').addClass('loading');
		})
		.ajaxStop(function() {
			$('body').removeClass('loading');
		});
	},

	/*
	Moves a card to the top of a stack
	*/
	moveToFront: function($node) {
		$node
			.css('z-index',K.config.stackHighestZIndex)
			.addClass('addedZ');
		K.config.stackHighestZIndex++;
	},

	/*
	Sorts cards inside their stacks
	*/
	orderCards: function(displayMode) {
		// Change order of cards within each stack
		$('.stack').each(function() {
			var cardsArray = $(this).children('li').toArray();
			if (displayMode === 'mode-list') {
				cardsArray.sort(function(a, b) {
					return  $(b).data('pid') - $(a).data('pid');
				});
			}
			else if (displayMode === 'mode-stack') {
				cardsArray.sort(function(a, b) {
					return  $(a).data('pid') - $(b).data('pid');
				});
			}
			$(cardsArray).appendTo($(this));
		});
	},

	/*
	Positions a card randomly in the stack view
	*/
	positionCard: function($node, key) {
		var nodeWidth = $node.width();
		var nodeHeight = 240;
		var stackWidth = K.config.stackWidth;
		var stackHeight = K.config.stackHeight;
		// if card is the only one in the stack, position it centered
		if($node.is(':only-of-type')) {
			$node.css({
				left: stackWidth/2 - nodeWidth/2,
				top: (stackHeight-K.config.stackHeaderSpace)/2 - nodeHeight/2 + K.config.stackHeaderSpace
			});
			return;
		}
		// if card is in the main stack (not filtered) the stack should spread out more
		if (key === 'all') {
			stackWidth = K.config.mainStackWidth;
			stackHeight = K.config.mainStackHeight;
		}
		var offsetX = Math.floor(Math.random() * (stackWidth-nodeWidth));
		var offsetY = Math.floor(Math.random() * (stackHeight-K.config.stackHeaderSpace-nodeHeight))+K.config.stackHeaderSpace;
		$node.css({
			left: offsetX,
			top: offsetY
		});
	},

	/*
	Puts projects in lists according to a given criterion ('key')
	*/
	putCardsInStacks: function(key) {
			// delete clones
			$('.card.clone').remove();
			// move cards to new stack, create if doesn't exist
			K.ele.cards.each(function() {
				var $this = $(this);
				// remove CSS z-index that may have been added previously by clicking or dragging
				if ($this.hasClass('addedZ')) {
					$this
						.removeClass('addedZ')
						.css('z-index', '');
				}
				/*	When a key has multiple values, e.g. more than one advisingPerson
					we clone the card */
				if (typeof $this.data('sort-data')[key] === "object") {
					var values = $this.data('sort-data')[key];
					$.each(values, function(index, value) {
						var $element;
						if (index === 0) {
							$element = $this;
							$element.addClass('origin');
						}
						else {
							$element = $this.clone();
							$element.removeClass('origin').addClass('clone');
							$element.draggable();
						}
						if ($element.appendTo(K.stackObj(key, value)).length === 1) {
						}
						else {
							K.ele.stackArea.append("<ul class='stack key-"+key+"' data-sort-data='{\""+key+"\": \""+value+"\"}'><h2>"+value+"</h2></ul>")
							.find('ul').last().append($element);
						}
						// randomly position each card
						K.positionCard($element, key);
					});
				}
				// When a key has only a single value
				else {
					if ($this.appendTo(K.stackObj(key, $this.data('sort-data')[key])).length === 1) {
					}
					else {
						K.ele.stackArea.append("<ul class='stack key-"+key+"' data-sort-data='{\""+key+"\": \""+$this.data('sort-data')[key]+"\"}'><h2>"+$this.data('sort-data')[key]+"</h2></ul>").find('ul').last().append($this);
					}
					// randomly position each card
					K.positionCard($this, key);
				}
			});

			// delete old stacks
			$('.stack').not(K.stackObj(key)).remove();
			var stackArray = $('.stack').toArray();

			// sort stacks
			if (key !== 'all') {
				stackArray.sort(function(a,b) {
					a = $(a).data('sort-data')[key];
					b = $(b).data('sort-data')[key];
					return (a > b) ? 1 : (a < b) ? -1 : 0;
				});
			}
			if (key === "year") {
				stackArray.reverse();
			}
			// add the stacks back to DOM
			K.ele.stackArea.append(stackArray);
	},

	/*
	Performs an animated scroll to the top of the page
	*/
	scrollToTop:  function() {
		$(K.config.scrollSelector).animate({
			scrollTop: 0
		},'slow');
	},

	/*
	Runs when a page is loaded (no matter if normally or through ajax)
	*/
	setupPage: function(slug,noScroll) {
		console.log('setupPage', slug);
		// Analytics
		ga('send', 'pageview', window.location.pathname);
		// scroll scrollable container to top
		if (noScroll !== true) {
			$('.scroll').scrollTop(0);
		}

		// make waypoint for scroll-to-top button
		$('.page.open .scroll').waypoint(function(direction) {
			if (direction === 'down') {
				$('a.btn-top').addClass('show');
			}
			else if (direction === 'up') {
				$('a.btn-top').removeClass('show');
			}
		},{
			offset: -300
		});

		// do page-specific things
		if (slug ==='index') {
			K.ele = {
				slideShowContainer: $('#intro-slider')
			};
			if (K.ele.slideShowContainer.hasClass('cycle-paused')) {
				K.ele.slideShowContainer.cycle('resume');
			}
			else {
				$('#intro-slider').on( 'cycle-initialized', function() {
					$('#intro-slider').fadeIn();
				});
				$('#intro-slider').cycle({
					speed: 500,
					timeout: 3000,
					//loader: true,
					slides: '> li'
				});
			}
		}
		else if (slug === 'projects') {
			// grab some common elements
			K.ele = {
				cards: $('.card'),
				hiddenStack: $('#stack-area #hidden-stack'),
				projectDetails: $('.project-details'),
				stackArea: $('#stack-area')
			};
			// Stacks
			K.ele.hiddenStack.hide();
			// Make cards draggable
			if (K.config.isTouchDevice !== true) {
				K.ele.cards.draggable();
			}
			// Make sure the sorting and display mode are correct (last saved state)
			K.stackNavChange('order-by',K.config.filterKey);
			K.stackNavChange('show-as',K.config.displayMode);
		}
		else if (slug === 'project-details') {
			if (typeof K.ele !== "object") {
				K.ele = {};
			}
			K.ele.detailSlideshow = $('#detail-slideshow');
			K.ele.projectDetails = $('.project-details');
			K.displayDetails();
		}
		else if (slug === 'news') {
			// Social buttons are only rendered when they enter the viewport for performance.
			$('.social-buttons').waypoint(function() {
				var url = $(this).attr('data-url');
				K.initFacebook(this, url);
				K.initTwitter(this, url);
			},{
				context: K.config.scrollSelector,
				offset: 'bottom-in-view',
				triggerOnce: true
			});
		}
		else if (slug === 'info') {
			$('section').waypoint(function(direction) {
				$('.sub-nav a').removeClass('active');
				var linkID;
				if (direction === 'down') {
					linkID = this.id;
				}
				else if (direction === 'up') {
					linkID = $(this).prev('section').attr('id');
				}
				$('a[href="#' + linkID + '"]').addClass('active');
			},{
				context: '.scroll',
				offset: '150px'
			});
		}
	},

	/*
	Updates the sorting and view mode of the projects
	*/
	stackNavChange: function(menu, value) {
		K.ele.stackArea.fadeOut(400, function() {
			switch(menu) {
				case('order-by'): {
					K.config.filterKey = value;
					K.putCardsInStacks(value);
					break;
				}
				case('show-as'): {
					K.config.displayMode = value;
					K.changeDisplayMode(value);
					break;
				}
			}
			K.orderCards(value);
			K.ele.stackArea.fadeIn(400);
		});
		// Make sure the correct link is underlined
		$('#stack-nav ul.'+menu+' a').removeClass('active');
		$('#stack-nav ul.'+menu+' a[data-value='+value+']').addClass('active');
	},

	/*
	Finds the right <ul> element based on a key and, optionally, a value
	*/
	stackObj: function(key, value) {
		return $('.stack').filter(function() {
				if (typeof value !== 'undefined') {
					return $(this).data('sort-data')[key] === value;
				}
				else {
					return $(this).data('sort-data').hasOwnProperty(key);
				}
		});
	},

	/*
	Finds out if the website is displayed on a touch device
	and makes JS adjustments. This practice is debatable,
	see http://www.stucox.com/blog/you-cant-detect-a-touchscreen/
	for instance. For now we'll try if this approach is robust
	enough.
	*/
	touchDeviceMagic: function() {
		/*
		// Check for small screen, only when debugging
		var screenWidth = (window.innerWidth > 0) ? window.innerWidth : screen.width;
		$('.test').html(screenWidth);
		*/
		// Check for touch screen
		function is_touch_device() {
			var bool;
			if(('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch) {
				bool = true;
			}
			return bool;
		}

		if (is_touch_device()) {
			K.config.isTouchDevice = true;
			$('body').addClass('touch-device');
			K.config.displayMode = "mode-list";
		}

		else {
			K.config.isTouchDevice = false;
		}
	},

	/*
	Runs before a new page is loaded via ajax
	Useful for unbinding events etc
	*/
	tearDownPage: function(slug) {
		$.waypoints('destroy');

		// do page-specific things
		if (slug === 'index') {
			K.ele.slideShowContainer.cycle('goto', 0);
			K.ele.slideShowContainer.cycle('pause');
		}
		else if (slug === 'projects') {
				$('#detail-slideshow').cycle('destroy');
		}
		else if (slug === 'project-details') {
			$('#detail-slideshow').cycle('destroy');
			K.ele.projectDetails.children().not('#btn-close').remove();
		}
	},

	/*
	bind events to user interaction
	*/
	bindEvents: function() {
		/*
			1.	page-specific events
		*/
		// Intro Page
		$(document).on( 'click', 'div#index.open', function(e){
			e.preventDefault();
			// Check if ajax is already loading to prevent accidental double click confusion
			if (!$('body').hasClass('loading')) {
				$('div#projects .main-nav a').trigger('click');
			}
		});

		// Projects page
		$(document).on( 'click', '.card a', function(e){
			e.preventDefault();
			// Check if ajax is already loading to prevent accidental double click confusion
			if (!$('body').hasClass('loading')) {
				var href = $(this).attr('href');
				History.pushState({'what': 'project'}, "Projektdetails", href);
			}
			})
		.on( 'click', '.project-details #btn-close', function(e){
			e.preventDefault();
			K.closeDetails();
		})
		.on( 'click', '.project-details #btn-info', function(e){
			e.preventDefault();
			// Analytics
			ga('send', 'pageview', window.location.pathname+'project-words');
			$('#project-words').addClass('open');
		})
		.on( 'click', '#project-words', function(e){
			var $target = $(e.target);
			if ($target.is('a:not(#btn-words-close)')) {
				$target.attr('target', '_blank');
			}
			else {
				$('#project-words').removeClass('open');
			}
		})
		.on( 'click', '#stack-nav a', function(e){
			e.preventDefault();
			var menu=$(this).parent().parent().attr('data-menu');
			var value=$(this).data('value');
			K.stackNavChange(menu, value);
			// Analytics
			ga('send', 'event', 'Projekt-Filter', 'click', menu);
		})
		.on( 'mousedown', '.mode-stack li', function(){
				K.moveToFront($(this));
		})
		.on( 'dragstop', '.mode-stack li', function(){
			// Analytics
			ga('send', 'event', 'Projekt-DragNDrop', 'drag');
		});

		// Info page
		$(document).on('click', '#info .sub-nav li a', function(event) {
				event.preventDefault();
				var scrollOffsetTop = $('#info .sub-nav').offset().top + K.config.scrollOffsetTop;
				var id = $(this).attr('href');
				$(K.config.scrollSelector).animate({
					scrollTop:($(id).offset().top + $(K.config.scrollSelector).scrollTop() - scrollOffsetTop)
				},'slow');
			})
			.on('click', '#info #show-all-teachers', function(e) {
				e.preventDefault();
				var $a = $(this);
				var temp = $a.text();
				$a.text($a.data('switch-word'));
				$a.data('switch-word', temp);
				$('.teachers-list-small').toggleClass('open');
			})
			.on('click', '#info #show-alumni', function(e) {
				e.preventDefault();
				var $a = $(this);
				var temp = $a.text();
				$a.text($a.data('switch-word'));
				$a.data('switch-word', temp);
				$('.alumni-list').toggleClass('open');
			});

		/*
			2.	non-page-specific events
				(events that are needed across the whole site)
		*/
		$(document)
			.on( 'mouseenter', '.page:not(.open, .right)', function(){
					$(this).removeClass('translate-more')
						.nextAll('.page').addClass('translate-more');
					$(this).prevAll('.page').removeClass('translate-more');
				})
			.on( 'mouseleave', '.page:not(.open, .right)', function(){
				$('.page, .fixed').removeClass('translate-more');
				})
			.on( 'mouseenter', '.page.right', function(){
					$(this).prevAll('.right').addClass('translate-less');
					$(this).addClass('translate-less');
				})
			.on( 'mouseleave', '.page.right', function(){
					$(this).removeClass('translate-less').prev().removeClass('translate-less');
				})
			.on( 'click', '.page:not(.open)', function(){
				if (!$('body').hasClass('loading')) {
					var $a = $(this).find('.main-nav a');
					var newSlug = $a.data('pageslug');
					History.pushState({'what': 'page', 'newSlug': newSlug}, $a.text(), $a.attr('href'));
				}
				})
				// Ignore clicks on the blue link text. We handle these clicks with the above event.
				.on( 'click', '.page:not(.open) .main-nav a', function(event){
					event.preventDefault();
				})
			// All links with class .ajax are loaded asynchronously.
			.on( 'click', 'a.ajax', function(e){
				e.preventDefault();
				if (!$('body').hasClass('loading')) {
					var $a = $(this);
					var newSlug = $a.data('pageslug');
					History.pushState({'what': 'page', 'newSlug': newSlug}, $a.text(), $(this).attr('href'));
				}
				})
			.on( 'click', '.page.open .main-nav a', function(e){
				e.preventDefault();
				var $page = $(this).parent().parent().next('.page');
				$page.trigger('click');
				})
			.on( 'click', 'a.btn-top', function(e){
					e.preventDefault();
					K.scrollToTop();
				})
			.on( 'click', '.page:not(.open) a.logo', function(e){
					e.preventDefault();
				})
			.on( 'click', '.page.open a.logo', function(e){
					e.preventDefault();
					$('div#index .main-nav a').trigger('click');
				})

			/* Keyboard Shortcuts */
			.on( 'keydown', function(event){
				switch (event.which) {
					// Escape
					case 27: {
						// is text description open?
						if ($('#project-words').hasClass('open')) {
							$('#project-words').removeClass('open');
						}
						// is detail view open?
						else if (K.ele.projectDetails.hasClass('open')) {
							K.closeDetails();
						}
						break;
					}
					// Arrow left / j
					case 74:
					case 37: {
						// is detail view open?
						if ($('.project-details').hasClass('open')) {
							K.ele.detailSlideshow.cycle('prev');
						}
						// is intro screen open?
						else if ($('.page#index').hasClass('open')) {
							$('#intro-slider').cycle('prev');
						}
						break;
					}
					// Arrow right / k
					case 75:
					case 39: {
						// is detail view open?
						if ($('.project-details').hasClass('open')) {
							K.ele.detailSlideshow.cycle('next');
						}
						// is intro screen open?
						else if ($('.page#index').hasClass('open')) {
							$('#intro-slider').cycle('next');
						}
						break;
					}

				}
		});
		/*
			3. Events that are specific to small devices
		*/
		$(document)
			.on('click', '#btn-smallscreen-menu', function(e) {
				e.preventDefault();
				$('#smallscreen-menu nav').toggleClass('active');
			})
			.on('click', '#smallscreen-menu .bar', function(e) {
				e.preventDefault();
			})
			.on('click', '#smallscreen-menu nav a', function(e) {
				e.preventDefault();
				$('#smallscreen-menu nav').removeClass('active');
				$('.project-details').removeClass('open');
				$('#btn-smallscreen-menu').text($(this).text());
				var href = $(this).attr('href');
				var newSlug = $(this).data('pageslug');
				History.pushState({'what': 'page', 'newSlug': newSlug}, $(this).text(), href);
		});
	}
};


K.init({
	'filterKey': 'all',
	'displayMode': 'mode-stack',
	'mainStackWidth': 650,
	'mainStackHeight': 650,
	'stackWidth': 350,
	'stackHeight': 300,
	'stackHeaderSpace': 25,
	'stackLowestZIndex': 100,
	'stackHighestZIndex': 500,
	'screenWidthMobile' : 799,
	'scrollSelector' : '.scroll',
	'scrollOffsetTop': 0
});
