/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var mobile_toggle = document.querySelector('#header--mobile__toggle'),
		mobile_close = document.querySelector('#header--mobile__close'),
		mobile_overlay = document.querySelector('.header--mobile__overlay');

	mobile_toggle.addEventListener('click', function(){
		this.classList.add('open');
		document.querySelector('.header--mobile__container').classList.add('closing');
		document.querySelector('.header--mobile__container').classList.add('open');

	});

	mobile_close.addEventListener('click', function(){
		mobile_toggle.classList.remove('open');
		document.querySelector('.header--mobile__container').classList.remove('closing');
		setTimeout(function(){
			document.querySelector('.header--mobile__container').classList.remove('open');
		}, 450);
	});

	mobile_overlay.addEventListener('click', function(){
		mobile_toggle.classList.remove('open');
		document.querySelector('.header--mobile__container').classList.remove('closing');
		setTimeout(function(){
			document.querySelector('.header--mobile__container').classList.remove('open');
		}, 450);
	});


	var container, menu, links, i, len;

	container = document.getElementById( 'header-nav' );

	if ( !container ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}

	/**
	 * Toggles `focus` class to allow submenu access on tablets.
	 */

	var touchStartFn, i,
		parentLink = document.querySelector('.header--mobile__links').querySelectorAll( '.caret' );

	if ( 'ontouchstart' in window ) {
		touchStartFn = function( e ) {
			var menuItem = this.parentNode.parentNode, i;

			e.preventDefault();

			if ( ! menuItem.classList.contains( 'focus' ) ) {
				for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
					if ( menuItem === menuItem.parentNode.children[i] ) {
						continue;
					}
					menuItem.parentNode.children[i].classList.remove( 'focus' );
				}
				menuItem.classList.add( 'focus' );
			} else {
				menuItem.classList.remove( 'focus' );
			}
		};

		for ( i = 0; i < parentLink.length; ++i ) {
			parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
		}
	}

} )();
