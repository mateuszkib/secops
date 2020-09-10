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

// Get more events
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const currentCity = urlParams.get("currentCity");

let page = 1;
console.log(page);
let containerForAjaxData = document.querySelector(
	".current-meetup__load-ajax-data"
);
let arrowRightCurrent = document.querySelector(
	".events-page__current--arrow-right"
);
let arrowLeftCurrent = document.querySelector(
	".events-page__current--arrow-right"
);

function getBox1(event) {
	console.log(event);
	let box1 = `<div class="col-6 events-page__current events-page__current--arrow-left mr-4">
                    <div class="row p-5 bg-white rounded">
                        <div class="col-6">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/ilustracja_onas.png" />
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <div>
                                <span class="events__button-date button d-flex align-items-center w-60"><img
                                        src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg"
                                        class="mr-2" width="15" />${event.event_start_date}</span>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <h2 class="header events__header-box events-page--white-color-header">${event.title}
                            </h2>
                            <p class="events__content-box-big"></p>
                        </div>
                        <div class="col-6 mt-4">
                            <a href=""><button class="events__button-check">Sprawdź</button></a>
                        </div>
                        <div class="col-6 mt-4 d-flex justify-content-end">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_szary.svg" />
                        </div>
                    </div>`;
	return box1;
}

function getBox2(event) {
	let box2 = `<div class="row bg-white p-5 mt-3 rounded">
                        <div class="col-6">
                            <h2 class="header events__header-box">
                                <?php the_title(); ?>
                            </h2>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <div>
                                <span class="events__button-date button d-flex align-items-center w-60"><img
                                        src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg"
                                        class="mr-2" width="15" /><?php the_field('event_date_start'); ?></span>
                            </div>
                        </div>
                        <div class="col-6 mt-4">
                            <a href=""><button class="events__button-check">Sprawdź</button></a>
                        </div>
                        <div class="col-6 mt-4 d-flex justify-content-end"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/sygnet_szary.svg" />
                        </div>
                    </div>
                    </div>
                <div class="col-6 events-page__current events-page__current--arrow-right">`;
	return box2;
}

function getBox3(event) {
	let box3 = `<div class="row bg-white p-5 rounded">
                        <div class="col-6">
                            <h2 class="header events__header-box">
                                <?php the_title(); ?>
                            </h2>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <div>
                                <span class="events__button-date button d-flex align-items-center w-60"><img
                                        src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg"
                                        class="mr-2" width="15" /><?php the_field('event_date_start'); ?></span>
                            </div>
                        </div>
                        <div class="col-6 mt-4">
                            <a href=""><button class="events__button-check">Sprawdź</button></a>
                        </div>
                        <div class="col-6 mt-4 d-flex justify-content-end"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/sygnet_szary.svg" />
                        </div>
                    </div>`;
	return box3;
}

function getBox4(event) {
	let box4 = `<div class="row p-5 bg-white rounded mt-3">
                        <div class="col-6">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/ilustracja_onas.png" />
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <div>
                                <span class="events__button-date button d-flex align-items-center w-60"><img
                                        src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg"
                                        class="mr-2" width="15" /><?php the_field('event_date_start'); ?></span>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <h2 class="header events__header-box"><?php the_title(); ?></h2>
                            <p class="events__content-box-big"></p>
                        </div>
                        <div class="col-6 mt-4">
                            <a href=""><button class="events__button-check">Sprawdź</button></a>
                        </div>
                        <div class="col-6 mt-4 d-flex justify-content-end">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_szary.svg" />
                        </div>
                    </div>`;
	return box4;
}

arrowRightCurrent.addEventListener("click", function () {
	page++;
	jQuery.getJSON(
		`http://secops.local/wp-json/secops/v1/event?page=${page}&currentCity=${
			currentCity ? currentCity : "online"
		}`,
		(events) => {
			containerForAjaxData.innerHTML = `${events.map(
				(event, key) => `${key == 0 ? getBox1(event) : ""}
                ${key == 1 ? getBox2() : ""}
                ${key == 2 ? getBox3() : ""}
                ${key == 3 ? getBox4() : ""}
                ${key == events.length ? "</div>" : ""}
                `
			)}`;
		}
	);
});

arrowLeftCurrent.addEventListener("click", function () {});
