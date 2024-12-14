( function( window, document ) {
  function boxing_martial_arts_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const boxing_martial_arts_nav = document.querySelector( '.sidenav' );
      if ( ! boxing_martial_arts_nav || ! boxing_martial_arts_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...boxing_martial_arts_nav.querySelectorAll( 'input, a, button' )],
        boxing_martial_arts_lastEl = elements[ elements.length - 1 ],
        boxing_martial_arts_firstEl = elements[0],
        boxing_martial_arts_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && boxing_martial_arts_lastEl === boxing_martial_arts_activeEl ) {
        e.preventDefault();
        boxing_martial_arts_firstEl.focus();
      }
      if ( shiftKey && tabKey && boxing_martial_arts_firstEl === boxing_martial_arts_activeEl ) {
        e.preventDefault();
        boxing_martial_arts_lastEl.focus();
      }
    } );
  }
  boxing_martial_arts_keepFocusInMenu();
} )( window, document );