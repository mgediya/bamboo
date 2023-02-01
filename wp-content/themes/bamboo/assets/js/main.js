require('slick-carousel');

$('.ts-testimonial').slick({
	dots: false,
	infinite: false,
	speed: 300,
	slidesToShow: 2,
	slidesToScroll: 1,
	responsive: [
		{
		  breakpoint: 992,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: true,
			arrows: false
		  }
		}
	  ]
});



import "./device-menu.js";
import "./scripts.js";
