let aboutCommunity = document.querySelectorAll(".community__header-left");
let switchDivs = document.querySelectorAll(".my-collapse");

const changeTypeCommunity = (e) => {
	e.preventDefault();

	toggleDiv(e.target.dataset.target);

	aboutCommunity.forEach((element) => {
		element.classList.remove("community__header-left--active");
	});
	e.target.classList.add("community__header-left--active");
};

aboutCommunity.forEach((element) => {
	element.addEventListener("click", changeTypeCommunity);
});

toggleDiv = (element) => {
	switchDivs.forEach((el) => {
		el.classList.add("d-none");
		el.classList.remove("d-block");
	});
	document.querySelector(`.${element}`).classList.remove("d-none");
	document.querySelector(`.${element}`).classList.add("d-block");
};

/* CAROUSEL HOME PAGE */
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
