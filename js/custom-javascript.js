jQuery(document).ready(function ($) {
	$(".owl-carousel").owlCarousel({
		navClass: ["owl-prev", "owl-next"],
		nav: false,
		dots: false,
		items: 4,
		loop: true,
		autoHeight: true,
		autoplay: true,
		autoplayTimeout: 2500,
		autoplaySpeed: 1300,
		responsive: {
			0: { items: 2 },
			480: { items: 3 },
			768: { items: 4 },
		},
	});
});
