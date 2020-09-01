<?php

/**
 * Template Name: Template Events
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');

if (is_front_page()) {
    get_template_part('global-templates/hero');
}
?>

<div class="wrapper" id="full-width-page-wrapper">

    <div class="<?php echo esc_attr($container); ?> events-page" id="content">

        <div class="row">

            <div class="col-12 text-center">
                <h2 class="header events-page__header">Aktualne MeetUpy</h2>
            </div>
            <div class="col-12 mt-5">
                <div class="events-page__city-list-container">
                    <ul class="events-page__list-group d-flex align-items-center justify-content-center">
                        <li class="events-page__list-item">Online</li>
                        <li class="events-page__list-item">Warszawa</li>
                        <li class="events-page__list-item">Kraków</li>
                        <li class="events-page__list-item">Lublin</li>
                        <li class="events-page__list-item">Poznań</li>
                        <li class="events-page__list-item">Wrocław</li>
                        <li class="events-page__list-item">Szczecin</li>
                    </ul>
                </div>
            </div>
            <div class="col-6 events-page__current mr-4">
                <div class="row p-5 bg-white rounded">
                    <div class="col-6">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/ilustracja_onas.png" />
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <div>
                            <span class="events__button-date button d-flex align-items-center w-60"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" />18.06.2020</span>
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <h2 class="header events__header-box events-page--white-color-header">SecOps Online MeetUp #11</h2>
                        <p class="events__content-box-big">It ensures that they are kept up to date on any
                            developments and changes made to the structure or...</p>
                    </div>
                    <div class="col-6 mt-4">
                        <a href=""><button class="events__button-check">Sprawdź</button></a>
                    </div>
                    <div class="col-6 mt-4 d-flex justify-content-end">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_szary.svg" />
                    </div>
                </div>
                <div class="row bg-white p-5 mt-3 rounded">
                    <div class="col-6">
                        <h2 class="header events__header-box">
                            SecOps Online MeetUp #10
                        </h2>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <div>
                            <span class="events__button-date button d-flex align-items-center w-60"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" />18.06.2020</span>
                        </div>
                    </div>
                    <div class="col-6 mt-4">
                        <a href=""><button class="events__button-check">Sprawdź</button></a>
                    </div>
                    <div class="col-6 mt-4 d-flex justify-content-end"><img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_szary.svg" /></div>
                </div>
            </div>
            <div class="col-6 events-page__current">
                <div class="row bg-white p-5 rounded">
                    <div class="col-6">
                        <h2 class="header events__header-box">
                            SecOps Online MeetUp #10
                        </h2>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <div>
                            <span class="events__button-date button d-flex align-items-center w-60"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" />18.06.2020</span>
                        </div>
                    </div>
                    <div class="col-6 mt-4">
                        <a href=""><button class="events__button-check">Sprawdź</button></a>
                    </div>
                    <div class="col-6 mt-4 d-flex justify-content-end"><img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_szary.svg" /></div>
                </div>
                <div class="row p-5 bg-white rounded mt-3">
                    <div class="col-6">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/ilustracja_onas.png" />
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <div>
                            <span class="events__button-date button d-flex align-items-center w-60"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" />18.06.2020</span>
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <h2 class="header events__header-box">SecOps Online MeetUp #11</h2>
                        <p class="events__content-box-big">It ensures that they are kept up to date on any
                            developments and changes made to the structure or...</p>
                    </div>
                    <div class="col-6 mt-4">
                        <a href=""><button class="events__button-check">Sprawdź</button></a>
                    </div>
                    <div class="col-6 mt-4 d-flex justify-content-end">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_szary.svg" />
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                <h2 class="header events__header">Przeszłe MeetUpy</h2>
            </div>
            <div class="col-12 mt-5">
                <div class="events-page__city-list-container">
                    <ul class="events-page__list-group d-flex align-items-center justify-content-center">
                        <li class="events-page__list-item">Online</li>
                        <li class="events-page__list-item">Warszawa</li>
                        <li class="events-page__list-item">Kraków</li>
                        <li class="events-page__list-item">Lublin</li>
                        <li class="events-page__list-item">Poznań</li>
                        <li class="events-page__list-item">Wrocław</li>
                        <li class="events-page__list-item">Szczecin</li>
                    </ul>
                </div>
            </div>
            <div class="col-6 events-page__past mr-4">
                <div class="row events-page__past--dark-purple-bg p-5 rounded">
                    <div class="col-6">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/ilustracja_onas.png" />
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <div>
                            <span class="events__button-date button d-flex align-items-center w-60"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" />18.06.2020</span>
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <h2 class="header events__header-box events-page__past--white-color-header">SecOps Online MeetUp #11</h2>
                        <p class="events__content-box-big">It ensures that they are kept up to date on any
                            developments and changes made to the structure or...</p>
                    </div>
                    <div class="col-6 mt-4">
                        <a href=""><button class="events__button-check">Sprawdź</button></a>
                    </div>
                    <div class="col-6 mt-4 d-flex justify-content-end">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_fiolet.svg" />
                    </div>
                </div>
                <div class="row events-page__past--dark-purple-bg p-5 mt-3 rounded">
                    <div class="col-6">
                        <h2 class="header events__header-box events-page__past--white-color-header">
                            SecOps Online MeetUp #10
                        </h2>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <div>
                            <span class="events__button-date button d-flex align-items-center w-60"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" />18.06.2020</span>
                        </div>
                    </div>
                    <div class="col-6 mt-4">
                        <a href=""><button class="events__button-check">Sprawdź</button></a>
                    </div>
                    <div class="col-6 mt-4 d-flex justify-content-end"><img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_fiolet.svg" /></div>
                </div>
            </div>
            <div class="col-6 events-page__past">
                <div class="row events-page__past--dark-purple-bg p-5 rounded">
                    <div class="col-6">
                        <h2 class="header events__header-box events-page__past--white-color-header">
                            SecOps Online MeetUp #10
                        </h2>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <div>
                            <span class="events__button-date button d-flex align-items-center w-60"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" />18.06.2020</span>
                        </div>
                    </div>
                    <div class="col-6 mt-4">
                        <a href=""><button class="events__button-check">Sprawdź</button></a>
                    </div>
                    <div class="col-6 mt-4 d-flex justify-content-end"><img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_fiolet.svg" /></div>
                </div>
                <div class="row p-5 events-page__past--dark-purple-bg rounded mt-3">
                    <div class="col-6">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/ilustracja_onas.png" />
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <div>
                            <span class="events__button-date button d-flex align-items-center w-60"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" />18.06.2020</span>
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <h2 class="header events__header-box events-page__past--white-color-header">SecOps Online MeetUp #11</h2>
                        <p class="events__content-box-big">It ensures that they are kept up to date on any
                            developments and changes made to the structure or...</p>
                    </div>
                    <div class="col-6 mt-4">
                        <a href=""><button class="events__button-check">Sprawdź</button></a>
                    </div>
                    <div class="col-6 mt-4 d-flex justify-content-end">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_fiolet.svg" />
                    </div>
                </div>
            </div>
        </div><!-- .row end -->

    </div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
