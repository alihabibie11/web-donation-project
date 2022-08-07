
  document.addEventListener( 'DOMContentLoaded', function() {
    var splide = new Splide( '.splide', {
        perPage    : 3,
		breakpoints: {
			1070: {
				perPage: 2,
			},
			640: {
				perPage: 1,
			},
        }
    } );
    splide.mount();
  } );