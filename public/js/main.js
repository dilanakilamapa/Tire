$(function() {
	if ( $('.owl-2').length > 0 ) {
        $('.owl-2').owlCarousel({
            center: false,
            items: 1,
            loop: true,
            stagePadding: 0,
            margin: 20,
            smartSpeed: 2000,
            autoplay: true,
            autoplayTimeout: 10000,
            nav: false,
            dots: false,
            pauseOnHover: false,
            responsive:{
                600:{
                    margin: 20,
                    nav: true,
                  items: 2
                },
                2000:{
                    margin: 20,
                    stagePadding: 0,
                    nav: true,
                  items: 2
                }
            }
        });            
  }
})