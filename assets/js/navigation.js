/* global boilerplate_theme_screenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area accessibility.
 */

( function( $ ) {
	var masthead, siteNavigation, siteHeader;

	function initMainNavigation( container ) {
		// Add dropdown toggle that displays child menu items.
		var dropdownToggle = $( '<button />', {
			'class': 'dropdown-toggle',
			'aria-expanded': false
		} ).append( $( '<span />', {
			'class': 'screen-reader-text',
			text: boilerplate_theme_screenReaderText.expand
		} ) );

		container.find( '.menu-item-has-children > a' ).after( dropdownToggle );

		// Toggle buttons and submenu items with active children menu items.
		container.find( '.current-menu-ancestor > button' ).addClass( 'toggled-on' );
		container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

		// Add menu items with submenus to aria-haspopup="true".
		container.find( '.menu-item-has-children' ).attr( 'aria-haspopup', 'true' );

		container.find( '.dropdown-toggle' ).click( function( e ) {
			var _this            = $( this ),
				screenReaderSpan = _this.find( '.screen-reader-text' );

			e.preventDefault();
			_this.toggleClass( 'toggled-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );

			// jscs:disable
			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			// jscs:enable
			screenReaderSpan.text( screenReaderSpan.text() === boilerplate_theme_screenReaderText.expand ? boilerplate_theme_screenReaderText.collapse : boilerplate_theme_screenReaderText.expand );
		} );
	}
	initMainNavigation( $( '.main-navigation' ) );

	masthead         = $( '#masthead' );
	siteHeader       = masthead.find( '.site-header' );
	siteNavigation   = masthead.find( '.site-navigation' );

	// Enable menu toggle for small screens.
	( function() {
		var menu, widgets, social, toggle;

		if ( ! siteNavigation ) {
			return;
		}

		toggle = siteNavigation.find( '.menu-toggle' );
		if ( ! toggle.length ) {
			return;
		}

		toggle.on( 'click.boilerplate_theme', function() {
			$( 'body' ).toggleClass( 'mobile-menu-active' );
			siteNavigation.toggleClass( 'toggled-on' );
		} );
	} )();

	// Fix sub-menus for touch devices and better focus for keyboard users.
	( function() {
		if ( ! siteNavigation || ! siteNavigation.children().length ) {
			return;
		}

		// Toggle `focus` class to allow sub-menus to open on focus.
		function toggleFocusClassFromLink() {
			var link = $( this );

			while ( link.length && ! link.hasClass( 'nav-menu' ) ) {
				if ( 'li' === link.prop( 'tagName' ).toLowerCase() ) {
					link.toggleClass( 'focus' );
				}
				link = link.parent();
			}
		}

		$( '.main-navigation' ).find( 'a' ).on( 'focus.boilerplate_theme blur.boilerplate_theme', toggleFocusClassFromLink );
	} )();
} )( jQuery );
