/**
 * File navigation.js.
 */

( function() {
	var mobile_container = document.querySelector('.header--mobile__container'),
		mobile_toggle = document.querySelector('#header--mobile__toggle'),
		mobile_close = mobile_container.querySelector('#header--mobile__close'),
		mobile_overlay = mobile_container.querySelector('.header--mobile__overlay');

	mobile_toggle.addEventListener('click', function(){
		this.classList.add('open');
		mobile_container.classList.add('closing');
		mobile_container.classList.add('open');
	});

	mobile_close.addEventListener('click', function(){
		mobile_toggle.classList.remove('open');
		mobile_container.classList.remove('closing');
		setTimeout(function(){
			mobile_container.classList.remove('open');
		}, 450);
	});

	mobile_overlay.addEventListener('click', function(){
		mobile_toggle.classList.remove('open');
		mobile_container.classList.remove('closing');
		setTimeout(function(){
			mobile_container.classList.remove('open');
		}, 450);
	});


	var container, menu, links, i, len;
	container = document.getElementById( 'header-nav' );
	if ( !container ) return;

	menu = container.getElementsByTagName( 'ul' )[0];
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.classList.add('nav-menu');
	}

	links = menu.getElementsByTagName( 'a' );

	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	function toggleFocus() {
		var self = this;

		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.classList.remove('focus');
				} else {
					self.classList.add('focus');
				}
			}
			self = self.parentElement;
		}
	}

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
