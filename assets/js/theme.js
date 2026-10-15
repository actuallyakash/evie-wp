document.documentElement.classList.add( 'js' );

document.addEventListener( 'DOMContentLoaded', function () {
	'use strict';

	const navbar = document.querySelector( '.navbar' );
	const navConverter = document.getElementById( 'navConverter' );

	function updateNavbar() {
		if ( ! navbar || ! navConverter ) {
			return;
		}

		const threshold = navConverter.getBoundingClientRect().top + window.scrollY - 60;
		navbar.classList.toggle( 'navbar--extended', window.scrollY <= threshold );
	}

	updateNavbar();
	window.addEventListener( 'scroll', updateNavbar, { passive: true } );
	window.addEventListener( 'resize', updateNavbar );

	const searchModal = document.getElementById( 'eviewpSearchModal' );
	const searchButtons = Array.from( document.querySelectorAll( '.search-btn' ) );

	if ( searchModal && searchButtons.length ) {
		const closeButton = searchModal.querySelector( '.close' );
		const searchInput = searchModal.querySelector( '.search-input' );
		let searchTrigger = null;

		function getModalControls() {
			return Array.from( searchModal.querySelectorAll( 'button, input, a[href], [tabindex]:not([tabindex="-1"])' ) );
		}

		function openSearch( event ) {
			searchTrigger = event.currentTarget;
			searchModal.classList.add( 'modal-active' );
			searchModal.setAttribute( 'aria-hidden', 'false' );
			searchButtons.forEach( function ( button ) {
				button.setAttribute( 'aria-expanded', 'true' );
			} );
			document.body.classList.add( 'eviewp-modal-open' );
			searchInput.focus();
		}

		function closeSearch() {
			if ( ! searchModal.classList.contains( 'modal-active' ) ) {
				return;
			}

			searchModal.classList.remove( 'modal-active' );
			searchModal.setAttribute( 'aria-hidden', 'true' );
			searchButtons.forEach( function ( button ) {
				button.setAttribute( 'aria-expanded', 'false' );
			} );
			document.body.classList.remove( 'eviewp-modal-open' );

			if ( searchTrigger && document.contains( searchTrigger ) ) {
				searchTrigger.focus();
			}
		}

		searchButtons.forEach( function ( button ) {
			button.addEventListener( 'click', openSearch );
		} );

		closeButton.addEventListener( 'click', closeSearch );
		searchModal.addEventListener( 'click', function ( event ) {
			if ( event.target === searchModal ) {
				closeSearch();
			}
		} );

		searchModal.addEventListener( 'keydown', function ( event ) {
			if ( event.key === 'Escape' ) {
				event.preventDefault();
				closeSearch();
				return;
			}

			if ( event.key !== 'Tab' ) {
				return;
			}

			const controls = getModalControls();
			const first = controls[ 0 ];
			const last = controls[ controls.length - 1 ];

			if ( event.shiftKey && document.activeElement === first ) {
				event.preventDefault();
				last.focus();
			} else if ( ! event.shiftKey && document.activeElement === last ) {
				event.preventDefault();
				first.focus();
			}
		} );
	}

	const desktopMenu = document.querySelector( '.navbar-container ul' );
	const mobileMenu = document.getElementById( 'eviewp-mobile-menu' );
	const navToggle = document.getElementById( 'nav-toggle' );

	if ( desktopMenu && mobileMenu && navToggle ) {
		mobileMenu.innerHTML = desktopMenu.outerHTML;
		mobileMenu.querySelector( 'ul' ).removeAttribute( 'id' );
		const mobileLinks = Array.from( mobileMenu.querySelectorAll( 'a' ) );
		const openIcon = navToggle.querySelector( '.nav-open' );
		const closeIcon = navToggle.querySelector( '.nav-close' );

		function setNavigationState( isOpen ) {
			mobileMenu.classList.toggle( 'opened', isOpen );
			mobileMenu.classList.toggle( 'closed', ! isOpen );
			mobileMenu.setAttribute( 'aria-hidden', String( ! isOpen ) );
			navToggle.setAttribute( 'aria-expanded', String( isOpen ) );
			openIcon.hidden = isOpen;
			closeIcon.hidden = ! isOpen;
			mobileLinks.forEach( function ( link ) {
				if ( isOpen ) {
					link.removeAttribute( 'tabindex' );
				} else {
					link.setAttribute( 'tabindex', '-1' );
				}
			} );
		}

		setNavigationState( false );
		navToggle.addEventListener( 'click', function () {
			setNavigationState( navToggle.getAttribute( 'aria-expanded' ) !== 'true' );
		} );

		mobileLinks.forEach( function ( link ) {
			link.addEventListener( 'click', function () {
				setNavigationState( false );
			} );
		} );

		window.addEventListener( 'resize', function () {
			if ( window.matchMedia( '(min-width: 992px)' ).matches ) {
				setNavigationState( false );
			}
		} );

		document.addEventListener( 'keydown', function ( event ) {
			if ( event.key === 'Escape' && navToggle.getAttribute( 'aria-expanded' ) === 'true' ) {
				setNavigationState( false );
				navToggle.focus();
			}
		} );
	} else if ( navToggle ) {
		navToggle.hidden = true;
	}
} );
