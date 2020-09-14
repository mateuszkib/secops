let aboutCommunity = document.querySelectorAll(".community__header-left");
let switchDivs = document.querySelectorAll(".my-collapse");

const getUrl = () =>
	location.protocol + "//" + location.host + location.pathname;

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

// Multimedia page - after click load gallery or film for event
let showGalleryMultimedia = document.querySelectorAll(
	".show-multimedia-gallery"
);
let showFilmMultimedia = document.querySelectorAll(".show-multimedia-film");
let splide = document.querySelector(".splide");
let splideList = document.querySelector(".splide__list");
let galleryEventsContainer = document.querySelector(
	".multimedia__gallery-events-container"
);
let filmEventsContainer = document.querySelector(
	".multimedia__film-events-container"
);

showGalleryMultimedia.forEach((element) => {
	element.addEventListener("click", (e) => {
		galleryEventsContainer.style.display = "block";
		jQuery.getJSON(
			secopsData.root_url +
				"/wp-json/secops/v1/multimedia?galleryID=" +
				element.dataset.id,
			(data) => {
				galleryEventsContainer.innerHTML = `
                <div id="splideGallery" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                ${
									data[0].photos.length
										? data[0].photos
												.map(
													(item) =>
														`<li class=splide__slide><img src="${item.multi_photo}" alt="image event"/></li>`
												)
												.join("")
										: "<p>Brak zdjęć z tego wydarzenia</p>"
								}
                        </ul>
                    </div>
                </div>`;
			}
		);
		setTimeout(() => {
			new Splide("#splideGallery").mount();
		}, 500);
	});
});

showFilmMultimedia.forEach((element) => {
	element.addEventListener("click", (e) => {
		filmEventsContainer.style.display = "block";
		jQuery.getJSON(
			secopsData.root_url +
				"/wp-json/secops/v1/multimedia?filmID=" +
				element.dataset.id,
			(data) => {
				filmEventsContainer.innerHTML = `<div id="splideFilm" class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide" data-splide-youtube="https://www.youtube.com/watch?v=${data[0].film}">
                            <img src="http://img.youtube.com/vi/${data[0].film}/maxresdefault.jpg">
                        </li>
                    </ul>
                </div>
            </div>`;
			}
		);
		setTimeout(() => {
			new Splide("#splideFilm").mount(window.splide.Extensions);
		}, 500);
	});
});

// Search multimedia on multimedia page
let searchMultimediaInputs = document.querySelectorAll(
	".multimedia-search-input"
);

searchMultimediaInputs.forEach((item) => {
	item.addEventListener("keydown", (e) => {
		if (e.keyCode == 13) {
			window.location.href = getUrl() + `?${e.target.name}=${e.target.value}`;
		}
	});
});

// Select city on multimedia
let select = document.querySelectorAll(".multimedia__select");

select.forEach((item) => {
	item.addEventListener("change", (e) => {
		let city = "";
		if (item.id.includes("film")) {
			city = e.target.options[e.target.selectedIndex].value;
			window.location.href = getUrl() + `?cityFilm=${city}`;
		} else if (item.id.includes("gallery")) {
			city = e.target.options[e.target.selectedIndex].value;
			window.location.href = getUrl() + `?cityGallery=${city}`;
		}
	});
});
