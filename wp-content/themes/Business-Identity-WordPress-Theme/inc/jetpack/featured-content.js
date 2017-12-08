/**
 * Featured Content Slider for Jetpack v1.1.0
 *
 * When Slider design is chosen in the WordPress Customizer, we'll load in custom JS
 * to do all the heavy lifting for Featured Content. This script will only be loaded
 * when more than 1 Jetpack featured content article is retrieved.
 *
 * @link      http://jetpack.me/support/featured-content/
 * @license   GNU General Public License v2 or later
 * @author    Philip Arthur Moore <philip@pressbuild.com>
 * @copyright Professional Themes 2013-2015
 */
( function( $, undefined ) {
	// Retrieve Featured Slider defaults from the theme, passed by wp_localize_script. If they do not exist, set sensible defaults for the slider.
	var               featuredContent = {},
	                         defaults = {
	                         	       height: 480,
	                         	     previous: 'Previous Slide',
	                         	         next: 'Next Slide',
	                         	        slide: 'Slide',
	                         	      gutterW: 20,
	                         	      anchorW: 70,
	                         	    viewportW: 1440,
	                         	previousnextW: 50,
	                         	        speed: 0
	                         };
	           featuredContent.height = ( window.jetpackFC && window.jetpackFC.height ) ? window.jetpackFC.height : defaults.height;
	         featuredContent.previous = ( window.jetpackFC && window.jetpackFC.previous ) ? window.jetpackFC.previous : defaults.previous;
	             featuredContent.next = ( window.jetpackFC && window.jetpackFC.next ) ? window.jetpackFC.next : defaults.next;
	            featuredContent.slide = ( window.jetpackFC && window.jetpackFC.slide ) ? window.jetpackFC.slide : defaults.slide;
	          featuredContent.gutterW = ( window.jetpackFC && window.jetpackFC.gutterW ) ? window.jetpackFC.gutterW : defaults.gutterW;
	          featuredContent.anchorW = ( window.jetpackFC && window.jetpackFC.anchorW ) ? window.jetpackFC.anchorW : defaults.anchorW;
	        featuredContent.viewportW = ( window.jetpackFC && window.jetpackFC.viewportW ) ? window.jetpackFC.viewportW : defaults.viewportW;
	    featuredContent.previousnextW = ( window.jetpackFC && window.jetpackFC.previousnextW ) ? window.jetpackFC.previousnextW : defaults.previousnextW;
	            featuredContent.speed = ( window.jetpackFC && window.jetpackFC.speed ) ? window.jetpackFC.speed : defaults.speed;

	/**
	 * DOM-ready scripts.
	 */
	function documentScripts() {
		/**
		 * Set up JS variables for use with Featured Content.
		 */
		var        $body = $( 'body' ), // document body
		// tap or click support
			supportTouch = false, // used in device detection
		// flag for checking if slider has been manually transitioned
			    isManual = false,
		// featured content elements and helper classes
			   featuredc = 'featured-content',                // helper class for featured content
			         $fc = $( '#' + featuredc ),              // featured content section
			    $article = $( '#' + featuredc + ' article' ), // featured content article
			     contain = 'fc-contain',                      // featured content container in slim views
			    fcholder = 'fc-holder',                       // helper class for featured content holder
			 prevcontrol = 'previous-slide-controller',       // helper class for previous slide controller
			 nextcontrol = 'next-slide-controller',           // helper class for next slide controller
			 slideanchor = 'slide-anchor',                    // helper class for article slide anchors
			     visible = 'visible',                         // helper class for visible articles
			     clicked = 'clicked',                         // helper class for clicked anchors
			       cover = 'cover',                           // helper class for articles with featured images
			    hascover = 'has-a-cover',                     // helper class for controls against articles with cover images
			    fcheight = featuredContent.height,            // sensible default height of featured content in pixels
			     fcspeed = featuredContent.speed,             // the speed of the slider (manual, slow, normal, or fast)
		// button text
			 previousbtn = featuredContent.previous, // previous slide button text
			     nextbtn = featuredContent.next,     // next slide button text
			    slidebtn = featuredContent.slide,    // slide anchor button
		// controllers
			         gut = featuredContent.gutterW,                                            // default anchor gutter width
			         anc = featuredContent.anchorW,                                            // default anchor width
			          vp = featuredContent.viewportW,                                          // default assumed viewport width
			          pn = featuredContent.previousnextW,                                      // default previous and next controller square dimensions
			      acount = $article.length,                                                    // number of FC posts available in the slider
			     agutter = ( gut / ( vp * acount ) ) * 100,                                    // anchor gutters
			     anchorw = ( anc / ( vp * acount ) ) * 100,                                    // anchor widths
			        slot = agutter + anchorw,                                                  // space taken up by an anchor and its gutter
			         pos = ( ( ( ( 1 / acount ) * 100 ) - ( acount * slot ) ) + agutter ) / 2; // anchor positions

		/**
		 * Check for the type of device being used (tap or click)
		 */
		if ( 'ontouchstart' in window ) { // detect touch support
			supportTouch = 'touchstart'; // iOS and Android
		}
		else {
			supportTouch = 'click'; // Browsers
		}

		/**
		 * Build the Featured Content slider.
		 */
		// Retrieve all article heights in order to determine the tallest one.
		var allArticleHeights = $article.map( function() {
			if ( 0 < $(this).height() ) {
				return $(this).height();
			}
			else {
				return featuredContent.height;
			}
		} ).get();
		// Grab the tallest article height
		fcheight = Math.max.apply( Math, allArticleHeights );

		$fc.css( {
			  'height' : fcheight + 'px',
			   'width' : acount * 100 + '%',
			'overflow' : 'hidden'
		} );
		$fc.wrap( '<div class="' + contain + '"></div>' );
		$( '.' + contain ).css( {
			'overflow' : 'hidden',
			   'width' : '100%',
			  'height' : fcheight + 'px'
		} );
		$fc.wrapInner( '<div class="' + fcholder + '"></div>' );
		$( '.' + fcholder ).css( {
			'height' : '100%',
			 'width' : '100%'
		} );
		$( '.' + fcholder ).prepend( '<button id="' + prevcontrol + '"><span class="genericon genericon-collapse"></span><span class="screen-reader-text">' + previousbtn + '</span></button>' );
		$( '#' + prevcontrol ).css( {
			    'height' : ( pn / fcheight ) * 100 + '%',
			     'width' : featuredContent.previousnextW + 'px',
			       'top' : ( ( fcheight - featuredContent.previousnextW ) / 2 ) + 'px',
			      'left' : '0'
		} );
		if ( $body.hasClass( 'rtl' ) ) {
			$( '#' + prevcontrol ).css( {
				 'left' : 'auto',
				'right' : '0'
			} );
		}
		$( '.' + fcholder ).append( '<button id="' + nextcontrol + '"><span class="genericon genericon-collapse"></span><span class="screen-reader-text">' + nextbtn + '</span></button>' );
		$( '#' + nextcontrol ).css( {
			    'height' : ( pn / fcheight ) * 100 + '%',
			     'width' : featuredContent.previousnextW + 'px',
			       'top' : ( ( fcheight - featuredContent.previousnextW ) / 2 ) + 'px',
			      'left' : 'auto',
			     'right' : 100 - ( 1 / acount ) * 100 + '%'
		} );
		if ( $body.hasClass( 'rtl' ) ) {
			$( '#' + nextcontrol ).css( {
				 'left' : 100 - ( 1 / acount ) * 100 + '%',
				'right' : 'auto'
			} );
		}
		// Build in sensible styles for all slides.
		$article.css( {
			 'float' : 'left',
			'height' : fcheight + 'px',
			 'width' : ( 1 / acount ) * 100 + '%'
		} );
		if ( $body.hasClass( 'rtl' ) ) {
			$article.css( {
				'float' : 'right'
			} );
		}
		// Build an anchor on the fly for each slide.
		$article.each( function( index ) {
			$( this ).after( '<button class="' + slideanchor + ' ' + $( this ).attr( 'id' ) + '"><span>' + slidebtn + '</span></button>' );
			if ( $body.hasClass( 'rtl' ) ) {
				$( this ).next().css( {
					'width' : anchorw + '%',
					'right' : pos + ( slot * index ) + '%'
				} );
			} else {
				$( this ).next().css( {
					'width' : anchorw + '%',
					 'left' : pos + ( slot * index ) + '%'
				} );
			}
		} );
		// Add in starting helper classes for slider.
		if ( $body.hasClass( 'rtl' ) ) {
			$article.first().addClass( visible ).css( {
				'right' : '0'
			} );
		} else {
			$article.first().addClass( visible ).css( {
				'left' : '0'
			} );
		}
		$article.first().next().addClass( clicked );
		if ( $article.first().hasClass( cover ) ) {
			$fc.addClass( hascover );
		}

		/**
		 * Build previous slide controller interactions.
		 */
		var previousInteraction = function() {
			// Turn off automatic slide timer when user has manually intervened.
			if ( true === isManual && 'undefined' !== typeof interval ) {
				clearInterval(interval);
			}

			// Grab the currently visible slide's index position.
			var    index = $article.index( $( '.' + visible ) ),
			    previous = index - 1;
			if ( -1 === previous ) {
				previous = acount - 1;
			}

			// Remove all clicked classes from anchors.
			$( '#' + featuredc + ' .' + slideanchor + '.' + clicked ).removeClass( clicked );
			// Add clicked class to the previous slide's anchor.
			$article.eq( previous ).next().addClass( clicked );
			// Remove all visible classes from articles.
			if ( $body.hasClass( 'rtl' ) ) {
				$article.removeClass( visible ).css( {
					'right' : ''
				} );
			} else {
				$article.removeClass( visible ).css( {
					'left' : ''
				} );
			}
			// Add visible class to the previous article.
			if ( $body.hasClass( 'rtl' ) ) {
				$article.eq( previous ).addClass( visible ).css( {
					'right' : ( ( 1 / acount ) * -100 ) * previous + '%'
				} );
			} else {
				$article.eq( previous ).addClass( visible ).css( {
					'left' : ( ( 1 / acount ) * -100 ) * previous + '%'
				} );
			}
			// Temporarily ditch has a cover detection.
			$fc.removeClass( hascover );
			// Detect if clicked slide has a cover image or not.
			if ( $article.eq( previous ).hasClass( cover ) ) {
				$fc.addClass( hascover );
			}
		};

		$( '#' + prevcontrol ).on( supportTouch, function( e ) {
			e.preventDefault(); // prevent event from carrying out its default functionality
			e.stopPropagation(); // prevent event propagation
			if ( false === isManual ) {
				isManual = true;
			}
			previousInteraction();
		} );

		/**
		 * Build next slide controller interactions.
		 */
		var nextInteraction = function() {
			// Turn off automatic slide timer when user has manually intervened.
			if ( true === isManual && 'undefined' !== typeof interval ) {
				clearInterval(interval);
			}

			// Grab the currently visible slide's index position.
			var    index = $article.index( $( '.' + visible ) ),
			        next = index + 1;
			if ( next === acount ) {
				next = 0 ;
			}

			// Remove all clicked classes from anchors.
			$( '#' + featuredc + ' .' + slideanchor ).removeClass( clicked );
			// Add clicked class to the next slide's anchor.
			$article.eq( next ).next().addClass( clicked );
			// Remove all visible classes from articles.
			if ( $body.hasClass( 'rtl' ) ) {
				$article.removeClass( visible ).css( {
					'right' : ''
				} );
			} else {
				$article.removeClass( visible ).css( {
					'left' : ''
				} );
			}
			// Add visible class to the next article.
			if ( $body.hasClass( 'rtl' ) ) {
				$article.eq( next ).addClass( visible ).css( {
					'right' : ( ( 1 / acount ) * -100 ) * next + '%'
				} );
			} else {
				$article.eq( next ).addClass( visible ).css( {
					'left' : ( ( 1 / acount ) * -100 ) * next + '%'
				} );
			}
			// Temporarily ditch has a cover detection.
			$fc.removeClass( hascover );
			// Detect if clicked slide has a cover image or not.
			if ( $article.eq( next ).hasClass( cover ) ) {
				$fc.addClass( hascover );
			}
		};

		$( '#' + nextcontrol ).on( supportTouch, function( e ) {
			e.preventDefault(); // prevent event from carrying out its default functionality
			e.stopPropagation(); // prevent event propagation
			if ( false === isManual ) {
				isManual = true;
			}
			nextInteraction();
		} );

		/**
		 * Build slider click anchor interactions.
		 */
		$( 'button.' + slideanchor ).on( supportTouch, function( e ) {
			e.preventDefault(); // prevent event from carrying out its default functionality
			e.stopPropagation(); // prevent event propagation
			isManual = true;

			// Turn off automatic slide timer when user has manually intervened.
			if ( 'undefined' !== typeof interval ) {
				clearInterval(interval);
			}

			// Bail if the thing that's being clicked on already has a clicked class.
			if ( $( this ).hasClass( clicked ) ) {
				return;
			}

			// Remove all clicked classes from anchors.
			$( '#' + featuredc + ' .' + slideanchor ).removeClass( clicked );
			// Add clicked class to currently clicked anchor.
			$( this ).addClass( clicked );
			// Remove all visible classes from articles.
			if ( $body.hasClass( 'rtl' ) ) {
				$article.removeClass( visible ).css( {
					'right' : ''
				} );
			} else {
				$article.removeClass( visible ).css( {
					'left' : ''
				} );
			}
			var index = $( this ).prev().index( '#' + featuredc + ' article' );
			// Add visible class to previous sibling article of the anchor.
			if ( $body.hasClass( 'rtl' ) ) {
				$( this ).prev().addClass( visible ).css( {
					'right' : ( ( 1 / acount ) * -100 ) * index + '%'
				} );
			} else {
				$( this ).prev().addClass( visible ).css( {
					'left' : ( ( 1 / acount ) * -100 ) * index + '%'
				} );
			}
			// Featured image detection.
			$fc.removeClass( hascover );
			if ( $( this ).prev().hasClass( cover ) ) {
				$fc.addClass( hascover );
			}
		} );

		// Keyboard Navigation
		$body.keyup( function ( e ) {
			e.preventDefault();
			e.stopPropagation();
			isManual = true;

			// Turn off automatic slide timer when user has manually intervened.
			if ( 'undefined' !== typeof interval ) {
				clearInterval(interval);
			}

			if ( 37 === e.keyCode ) { // left key interactions
				previousInteraction();
			} else if ( 39 === e.keyCode ) { // right key interactions
				nextInteraction();
			}
		} );

		// Slider Transitions
		if ( 0 < fcspeed ) {
			var interval;
			interval = setInterval( nextInteraction, fcspeed );
		}
	} // end documentScripts()

	// Load scripts when the DOM is ready.
	$( document )
		.ready( documentScripts );

} )( jQuery );