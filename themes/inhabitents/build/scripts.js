/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

// ( function( $ ) {

// 	// Site title and description.
// 	wp.customize( 'blogname', function( value ) {
// 		value.bind( function( to ) {
// 			$( '.site-title a' ).text( to );
// 		} );
// 	} );
// 	wp.customize( 'blogdescription', function( value ) {
// 		value.bind( function( to ) {
// 			$( '.site-description' ).text( to );
// 		} );
// 	} );

// 	// Header text color.
// 	wp.customize( 'header_textcolor', function( value ) {
// 		value.bind( function( to ) {
// 			if ( 'blank' === to ) {
// 				$( '.site-title, .site-description' ).css( {
// 					'clip': 'rect(1px, 1px, 1px, 1px)',
// 					'position': 'absolute'
// 				} );
// 			} else {
// 				$( '.site-title, .site-description' ).css( {
// 					'clip': 'auto',
// 					'position': 'relative'
// 				} );
// 				$( '.site-title a, .site-description' ).css( {
// 					'color': to
// 				} );
// 			}
// 		} );
// 	} );
// } )( jQuery );

const header = document.querySelector("#masthead");
const contentDiv = document.getElementById("no-sidebar-page-layout");
let differentTopBarRequired = false;

if (
  contentDiv.classList.contains("single-adventure") ||
  contentDiv.classList.contains("home") ||
  contentDiv.classList.contains("about-us")
) {
  differentTopBarRequired = true;
  header.classList.add("site-header-static");
}

window.addEventListener("scroll", function() {
  if (differentTopBarRequired === true) {
    if (pageYOffset >= window.innerHeight) {
      header.classList.remove("site-header-static");
    } else if (pageYOffset < window.innerHeight) {
      header.classList.add("site-header-static");
    }
  }
});

/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var container, button, menu, links, i, len;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};

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
	( function( container ) {
		var touchStartFn, i,
			parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

		if ( 'ontouchstart' in window ) {
			touchStartFn = function( e ) {
				var menuItem = this.parentNode, i;

				if ( ! menuItem.classList.contains( 'focus' ) ) {
					e.preventDefault();
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
	}( container ) );
} )();

/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
( function() {
	var isIe = /(trident|msie)/i.test( navigator.userAgent );

	if ( isIe && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var id = location.hash.substring( 1 ),
				element;

			if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
				return;
			}

			element = document.getElementById( id );

			if ( element ) {
				if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
} )();

//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImN1c3RvbWl6ZXIuanMiLCJoZWFkZXJTdHlsaW5nLmpzIiwibmF2aWdhdGlvbi5qcyIsInNraXAtbGluay1mb2N1cy1maXguanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUMxQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ3RCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDMUdBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJmaWxlIjoic2NyaXB0cy5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8qKlxuICogRmlsZSBjdXN0b21pemVyLmpzLlxuICpcbiAqIFRoZW1lIEN1c3RvbWl6ZXIgZW5oYW5jZW1lbnRzIGZvciBhIGJldHRlciB1c2VyIGV4cGVyaWVuY2UuXG4gKlxuICogQ29udGFpbnMgaGFuZGxlcnMgdG8gbWFrZSBUaGVtZSBDdXN0b21pemVyIHByZXZpZXcgcmVsb2FkIGNoYW5nZXMgYXN5bmNocm9ub3VzbHkuXG4gKi9cblxuLy8gKCBmdW5jdGlvbiggJCApIHtcblxuLy8gXHQvLyBTaXRlIHRpdGxlIGFuZCBkZXNjcmlwdGlvbi5cbi8vIFx0d3AuY3VzdG9taXplKCAnYmxvZ25hbWUnLCBmdW5jdGlvbiggdmFsdWUgKSB7XG4vLyBcdFx0dmFsdWUuYmluZCggZnVuY3Rpb24oIHRvICkge1xuLy8gXHRcdFx0JCggJy5zaXRlLXRpdGxlIGEnICkudGV4dCggdG8gKTtcbi8vIFx0XHR9ICk7XG4vLyBcdH0gKTtcbi8vIFx0d3AuY3VzdG9taXplKCAnYmxvZ2Rlc2NyaXB0aW9uJywgZnVuY3Rpb24oIHZhbHVlICkge1xuLy8gXHRcdHZhbHVlLmJpbmQoIGZ1bmN0aW9uKCB0byApIHtcbi8vIFx0XHRcdCQoICcuc2l0ZS1kZXNjcmlwdGlvbicgKS50ZXh0KCB0byApO1xuLy8gXHRcdH0gKTtcbi8vIFx0fSApO1xuXG4vLyBcdC8vIEhlYWRlciB0ZXh0IGNvbG9yLlxuLy8gXHR3cC5jdXN0b21pemUoICdoZWFkZXJfdGV4dGNvbG9yJywgZnVuY3Rpb24oIHZhbHVlICkge1xuLy8gXHRcdHZhbHVlLmJpbmQoIGZ1bmN0aW9uKCB0byApIHtcbi8vIFx0XHRcdGlmICggJ2JsYW5rJyA9PT0gdG8gKSB7XG4vLyBcdFx0XHRcdCQoICcuc2l0ZS10aXRsZSwgLnNpdGUtZGVzY3JpcHRpb24nICkuY3NzKCB7XG4vLyBcdFx0XHRcdFx0J2NsaXAnOiAncmVjdCgxcHgsIDFweCwgMXB4LCAxcHgpJyxcbi8vIFx0XHRcdFx0XHQncG9zaXRpb24nOiAnYWJzb2x1dGUnXG4vLyBcdFx0XHRcdH0gKTtcbi8vIFx0XHRcdH0gZWxzZSB7XG4vLyBcdFx0XHRcdCQoICcuc2l0ZS10aXRsZSwgLnNpdGUtZGVzY3JpcHRpb24nICkuY3NzKCB7XG4vLyBcdFx0XHRcdFx0J2NsaXAnOiAnYXV0bycsXG4vLyBcdFx0XHRcdFx0J3Bvc2l0aW9uJzogJ3JlbGF0aXZlJ1xuLy8gXHRcdFx0XHR9ICk7XG4vLyBcdFx0XHRcdCQoICcuc2l0ZS10aXRsZSBhLCAuc2l0ZS1kZXNjcmlwdGlvbicgKS5jc3MoIHtcbi8vIFx0XHRcdFx0XHQnY29sb3InOiB0b1xuLy8gXHRcdFx0XHR9ICk7XG4vLyBcdFx0XHR9XG4vLyBcdFx0fSApO1xuLy8gXHR9ICk7XG4vLyB9ICkoIGpRdWVyeSApO1xuIiwiY29uc3QgaGVhZGVyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIiNtYXN0aGVhZFwiKTtcbmNvbnN0IGNvbnRlbnREaXYgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcIm5vLXNpZGViYXItcGFnZS1sYXlvdXRcIik7XG5sZXQgZGlmZmVyZW50VG9wQmFyUmVxdWlyZWQgPSBmYWxzZTtcblxuaWYgKFxuICBjb250ZW50RGl2LmNsYXNzTGlzdC5jb250YWlucyhcInNpbmdsZS1hZHZlbnR1cmVcIikgfHxcbiAgY29udGVudERpdi5jbGFzc0xpc3QuY29udGFpbnMoXCJob21lXCIpIHx8XG4gIGNvbnRlbnREaXYuY2xhc3NMaXN0LmNvbnRhaW5zKFwiYWJvdXQtdXNcIilcbikge1xuICBkaWZmZXJlbnRUb3BCYXJSZXF1aXJlZCA9IHRydWU7XG4gIGhlYWRlci5jbGFzc0xpc3QuYWRkKFwic2l0ZS1oZWFkZXItc3RhdGljXCIpO1xufVxuXG53aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcihcInNjcm9sbFwiLCBmdW5jdGlvbigpIHtcbiAgaWYgKGRpZmZlcmVudFRvcEJhclJlcXVpcmVkID09PSB0cnVlKSB7XG4gICAgaWYgKHBhZ2VZT2Zmc2V0ID49IHdpbmRvdy5pbm5lckhlaWdodCkge1xuICAgICAgaGVhZGVyLmNsYXNzTGlzdC5yZW1vdmUoXCJzaXRlLWhlYWRlci1zdGF0aWNcIik7XG4gICAgfSBlbHNlIGlmIChwYWdlWU9mZnNldCA8IHdpbmRvdy5pbm5lckhlaWdodCkge1xuICAgICAgaGVhZGVyLmNsYXNzTGlzdC5hZGQoXCJzaXRlLWhlYWRlci1zdGF0aWNcIik7XG4gICAgfVxuICB9XG59KTtcbiIsIi8qKlxuICogRmlsZSBuYXZpZ2F0aW9uLmpzLlxuICpcbiAqIEhhbmRsZXMgdG9nZ2xpbmcgdGhlIG5hdmlnYXRpb24gbWVudSBmb3Igc21hbGwgc2NyZWVucyBhbmQgZW5hYmxlcyBUQUIga2V5XG4gKiBuYXZpZ2F0aW9uIHN1cHBvcnQgZm9yIGRyb3Bkb3duIG1lbnVzLlxuICovXG4oIGZ1bmN0aW9uKCkge1xuXHR2YXIgY29udGFpbmVyLCBidXR0b24sIG1lbnUsIGxpbmtzLCBpLCBsZW47XG5cblx0Y29udGFpbmVyID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoICdzaXRlLW5hdmlnYXRpb24nICk7XG5cdGlmICggISBjb250YWluZXIgKSB7XG5cdFx0cmV0dXJuO1xuXHR9XG5cblx0YnV0dG9uID0gY29udGFpbmVyLmdldEVsZW1lbnRzQnlUYWdOYW1lKCAnYnV0dG9uJyApWzBdO1xuXHRpZiAoICd1bmRlZmluZWQnID09PSB0eXBlb2YgYnV0dG9uICkge1xuXHRcdHJldHVybjtcblx0fVxuXG5cdG1lbnUgPSBjb250YWluZXIuZ2V0RWxlbWVudHNCeVRhZ05hbWUoICd1bCcgKVswXTtcblxuXHQvLyBIaWRlIG1lbnUgdG9nZ2xlIGJ1dHRvbiBpZiBtZW51IGlzIGVtcHR5IGFuZCByZXR1cm4gZWFybHkuXG5cdGlmICggJ3VuZGVmaW5lZCcgPT09IHR5cGVvZiBtZW51ICkge1xuXHRcdGJ1dHRvbi5zdHlsZS5kaXNwbGF5ID0gJ25vbmUnO1xuXHRcdHJldHVybjtcblx0fVxuXG5cdG1lbnUuc2V0QXR0cmlidXRlKCAnYXJpYS1leHBhbmRlZCcsICdmYWxzZScgKTtcblx0aWYgKCAtMSA9PT0gbWVudS5jbGFzc05hbWUuaW5kZXhPZiggJ25hdi1tZW51JyApICkge1xuXHRcdG1lbnUuY2xhc3NOYW1lICs9ICcgbmF2LW1lbnUnO1xuXHR9XG5cblx0YnV0dG9uLm9uY2xpY2sgPSBmdW5jdGlvbigpIHtcblx0XHRpZiAoIC0xICE9PSBjb250YWluZXIuY2xhc3NOYW1lLmluZGV4T2YoICd0b2dnbGVkJyApICkge1xuXHRcdFx0Y29udGFpbmVyLmNsYXNzTmFtZSA9IGNvbnRhaW5lci5jbGFzc05hbWUucmVwbGFjZSggJyB0b2dnbGVkJywgJycgKTtcblx0XHRcdGJ1dHRvbi5zZXRBdHRyaWJ1dGUoICdhcmlhLWV4cGFuZGVkJywgJ2ZhbHNlJyApO1xuXHRcdFx0bWVudS5zZXRBdHRyaWJ1dGUoICdhcmlhLWV4cGFuZGVkJywgJ2ZhbHNlJyApO1xuXHRcdH0gZWxzZSB7XG5cdFx0XHRjb250YWluZXIuY2xhc3NOYW1lICs9ICcgdG9nZ2xlZCc7XG5cdFx0XHRidXR0b24uc2V0QXR0cmlidXRlKCAnYXJpYS1leHBhbmRlZCcsICd0cnVlJyApO1xuXHRcdFx0bWVudS5zZXRBdHRyaWJ1dGUoICdhcmlhLWV4cGFuZGVkJywgJ3RydWUnICk7XG5cdFx0fVxuXHR9O1xuXG5cdC8vIEdldCBhbGwgdGhlIGxpbmsgZWxlbWVudHMgd2l0aGluIHRoZSBtZW51LlxuXHRsaW5rcyAgICA9IG1lbnUuZ2V0RWxlbWVudHNCeVRhZ05hbWUoICdhJyApO1xuXG5cdC8vIEVhY2ggdGltZSBhIG1lbnUgbGluayBpcyBmb2N1c2VkIG9yIGJsdXJyZWQsIHRvZ2dsZSBmb2N1cy5cblx0Zm9yICggaSA9IDAsIGxlbiA9IGxpbmtzLmxlbmd0aDsgaSA8IGxlbjsgaSsrICkge1xuXHRcdGxpbmtzW2ldLmFkZEV2ZW50TGlzdGVuZXIoICdmb2N1cycsIHRvZ2dsZUZvY3VzLCB0cnVlICk7XG5cdFx0bGlua3NbaV0uYWRkRXZlbnRMaXN0ZW5lciggJ2JsdXInLCB0b2dnbGVGb2N1cywgdHJ1ZSApO1xuXHR9XG5cblx0LyoqXG5cdCAqIFNldHMgb3IgcmVtb3ZlcyAuZm9jdXMgY2xhc3Mgb24gYW4gZWxlbWVudC5cblx0ICovXG5cdGZ1bmN0aW9uIHRvZ2dsZUZvY3VzKCkge1xuXHRcdHZhciBzZWxmID0gdGhpcztcblxuXHRcdC8vIE1vdmUgdXAgdGhyb3VnaCB0aGUgYW5jZXN0b3JzIG9mIHRoZSBjdXJyZW50IGxpbmsgdW50aWwgd2UgaGl0IC5uYXYtbWVudS5cblx0XHR3aGlsZSAoIC0xID09PSBzZWxmLmNsYXNzTmFtZS5pbmRleE9mKCAnbmF2LW1lbnUnICkgKSB7XG5cblx0XHRcdC8vIE9uIGxpIGVsZW1lbnRzIHRvZ2dsZSB0aGUgY2xhc3MgLmZvY3VzLlxuXHRcdFx0aWYgKCAnbGknID09PSBzZWxmLnRhZ05hbWUudG9Mb3dlckNhc2UoKSApIHtcblx0XHRcdFx0aWYgKCAtMSAhPT0gc2VsZi5jbGFzc05hbWUuaW5kZXhPZiggJ2ZvY3VzJyApICkge1xuXHRcdFx0XHRcdHNlbGYuY2xhc3NOYW1lID0gc2VsZi5jbGFzc05hbWUucmVwbGFjZSggJyBmb2N1cycsICcnICk7XG5cdFx0XHRcdH0gZWxzZSB7XG5cdFx0XHRcdFx0c2VsZi5jbGFzc05hbWUgKz0gJyBmb2N1cyc7XG5cdFx0XHRcdH1cblx0XHRcdH1cblxuXHRcdFx0c2VsZiA9IHNlbGYucGFyZW50RWxlbWVudDtcblx0XHR9XG5cdH1cblxuXHQvKipcblx0ICogVG9nZ2xlcyBgZm9jdXNgIGNsYXNzIHRvIGFsbG93IHN1Ym1lbnUgYWNjZXNzIG9uIHRhYmxldHMuXG5cdCAqL1xuXHQoIGZ1bmN0aW9uKCBjb250YWluZXIgKSB7XG5cdFx0dmFyIHRvdWNoU3RhcnRGbiwgaSxcblx0XHRcdHBhcmVudExpbmsgPSBjb250YWluZXIucXVlcnlTZWxlY3RvckFsbCggJy5tZW51LWl0ZW0taGFzLWNoaWxkcmVuID4gYSwgLnBhZ2VfaXRlbV9oYXNfY2hpbGRyZW4gPiBhJyApO1xuXG5cdFx0aWYgKCAnb250b3VjaHN0YXJ0JyBpbiB3aW5kb3cgKSB7XG5cdFx0XHR0b3VjaFN0YXJ0Rm4gPSBmdW5jdGlvbiggZSApIHtcblx0XHRcdFx0dmFyIG1lbnVJdGVtID0gdGhpcy5wYXJlbnROb2RlLCBpO1xuXG5cdFx0XHRcdGlmICggISBtZW51SXRlbS5jbGFzc0xpc3QuY29udGFpbnMoICdmb2N1cycgKSApIHtcblx0XHRcdFx0XHRlLnByZXZlbnREZWZhdWx0KCk7XG5cdFx0XHRcdFx0Zm9yICggaSA9IDA7IGkgPCBtZW51SXRlbS5wYXJlbnROb2RlLmNoaWxkcmVuLmxlbmd0aDsgKytpICkge1xuXHRcdFx0XHRcdFx0aWYgKCBtZW51SXRlbSA9PT0gbWVudUl0ZW0ucGFyZW50Tm9kZS5jaGlsZHJlbltpXSApIHtcblx0XHRcdFx0XHRcdFx0Y29udGludWU7XG5cdFx0XHRcdFx0XHR9XG5cdFx0XHRcdFx0XHRtZW51SXRlbS5wYXJlbnROb2RlLmNoaWxkcmVuW2ldLmNsYXNzTGlzdC5yZW1vdmUoICdmb2N1cycgKTtcblx0XHRcdFx0XHR9XG5cdFx0XHRcdFx0bWVudUl0ZW0uY2xhc3NMaXN0LmFkZCggJ2ZvY3VzJyApO1xuXHRcdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHRcdG1lbnVJdGVtLmNsYXNzTGlzdC5yZW1vdmUoICdmb2N1cycgKTtcblx0XHRcdFx0fVxuXHRcdFx0fTtcblxuXHRcdFx0Zm9yICggaSA9IDA7IGkgPCBwYXJlbnRMaW5rLmxlbmd0aDsgKytpICkge1xuXHRcdFx0XHRwYXJlbnRMaW5rW2ldLmFkZEV2ZW50TGlzdGVuZXIoICd0b3VjaHN0YXJ0JywgdG91Y2hTdGFydEZuLCBmYWxzZSApO1xuXHRcdFx0fVxuXHRcdH1cblx0fSggY29udGFpbmVyICkgKTtcbn0gKSgpO1xuIiwiLyoqXG4gKiBGaWxlIHNraXAtbGluay1mb2N1cy1maXguanMuXG4gKlxuICogSGVscHMgd2l0aCBhY2Nlc3NpYmlsaXR5IGZvciBrZXlib2FyZCBvbmx5IHVzZXJzLlxuICpcbiAqIExlYXJuIG1vcmU6IGh0dHBzOi8vZ2l0LmlvL3ZXZHIyXG4gKi9cbiggZnVuY3Rpb24oKSB7XG5cdHZhciBpc0llID0gLyh0cmlkZW50fG1zaWUpL2kudGVzdCggbmF2aWdhdG9yLnVzZXJBZ2VudCApO1xuXG5cdGlmICggaXNJZSAmJiBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCAmJiB3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lciApIHtcblx0XHR3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lciggJ2hhc2hjaGFuZ2UnLCBmdW5jdGlvbigpIHtcblx0XHRcdHZhciBpZCA9IGxvY2F0aW9uLmhhc2guc3Vic3RyaW5nKCAxICksXG5cdFx0XHRcdGVsZW1lbnQ7XG5cblx0XHRcdGlmICggISAoIC9eW0EtejAtOV8tXSskLy50ZXN0KCBpZCApICkgKSB7XG5cdFx0XHRcdHJldHVybjtcblx0XHRcdH1cblxuXHRcdFx0ZWxlbWVudCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCBpZCApO1xuXG5cdFx0XHRpZiAoIGVsZW1lbnQgKSB7XG5cdFx0XHRcdGlmICggISAoIC9eKD86YXxzZWxlY3R8aW5wdXR8YnV0dG9ufHRleHRhcmVhKSQvaS50ZXN0KCBlbGVtZW50LnRhZ05hbWUgKSApICkge1xuXHRcdFx0XHRcdGVsZW1lbnQudGFiSW5kZXggPSAtMTtcblx0XHRcdFx0fVxuXG5cdFx0XHRcdGVsZW1lbnQuZm9jdXMoKTtcblx0XHRcdH1cblx0XHR9LCBmYWxzZSApO1xuXHR9XG59ICkoKTtcbiJdfQ==
