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

$city = $_GET['city'];

$postCity = get_page_by_title($city, '', 'city');

$cityID = $postCity->ID;

if (is_front_page()) {
    get_template_part('global-templates/hero');
}

function displayLocations()
{
    $args = [
        'post_type' => 'city',
        'post_per_page' => '-1'
    ];
    $locations = new WP_Query($args);

    return $locations;
}
?>

<div class="wrapper" id="full-width-page-wrapper">

    <div class="<?php echo esc_attr($container); ?> events-page" id="content">

        <section class="current-meetup">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="header events-page__header">Aktualne MeetUpy</h2>
                </div>

                <?php
                $today = date('Ymd');
                $events = new WP_Query([
                    'post_type' => 'event',
                    'post_per_page' => 4,
                    'orderby' => 'meta_value_num',
                    'meta_key' => 'event_date_start',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => 'event_date_start',
                            'value' => $today,
                            'compare' => '>=',
                            'type' => 'numeric'
                        ), array(
                            'key' => 'related_cities',
                            'compare' => 'LIKE',
                            'value' => '"' . $cityID . '"'
                        )
                    )
                ]);

                ?>

                <div class="col-12 mt-5">
                    <div class="events-page__city-list-container">
                        <ul class="events-page__list-group d-flex align-items-center justify-content-center">

                            <?php

                            $locations = displayLocations();

                            while ($locations->have_posts()) {
                                $locations->the_post();
                            ?>
                            <a href="?city=<?php the_title(); ?>" class="events-page__list-link">
                                <li class="events-page__list-item"><?php the_title(); ?></li>
                            </a>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <!-- CURRENT MEETUPS -->
                <?php
                $counter = 0;
                $total = $events->post_count;
                while ($events->have_posts()) {
                    $events->the_post();
                ?>

                <?php if ($counter == 0) { ?>
                <div class="col-6 events-page__current mr-4">
                    <div class="row p-5 bg-white rounded">
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
                            <h2 class="header events__header-box events-page--white-color-header"><?php the_title(); ?>
                            </h2>
                            <p class="events__content-box-big"><?php echo wp_trim_words(get_the_content(), 10); ?></p>
                        </div>
                        <div class="col-6 mt-4">
                            <a href=""><button class="events__button-check">Sprawdź</button></a>
                        </div>
                        <div class="col-6 mt-4 d-flex justify-content-end">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_szary.svg" />
                        </div>
                    </div>
                    <?php } ?>

                    <?php if ($counter == 1) { ?>
                    <div class="row bg-white p-5 mt-3 rounded">
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
                <div class="col-6 events-page__current">
                    <?php } else if ($counter == 2) { ?>
                    <div class="row bg-white p-5 rounded">
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
                    <?php } else if ($counter == 3) { ?>
                    <div class="row p-5 bg-white rounded mt-3">
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
                            <p class="events__content-box-big"><?php echo wp_trim_words(get_the_content(), 10); ?></p>
                        </div>
                        <div class="col-6 mt-4">
                            <a href=""><button class="events__button-check">Sprawdź</button></a>
                        </div>
                        <div class="col-6 mt-4 d-flex justify-content-end">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_szary.svg" />
                        </div>
                    </div>
                    <?php } ?>
                    <?php $counter++;
                    if ($counter == $total) {
                        echo '</div>';
                    }
                } ?>

        </section>
        <!-- PAST MEETUPS -->
        <section class="past-meetup">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="header events-page__header">Przeszłe MeetUpy</h2>
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
                                <span class="events__button-date button d-flex align-items-center w-60"><img
                                        src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg"
                                        class="mr-2" width="15" />18.06.2020</span>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <h2 class="header events__header-box events-page__past--white-color-header">SecOps Online
                                MeetUp
                                #11</h2>
                            <p class="events__content-box-big events-page__past--content-color">It ensures that they are
                                kept up to date on any
                                developments and changes made to the structure or...</p>
                        </div>
                        <div class="col-6 mt-4">
                            <a href=""><button
                                    class="events__button-check events-page__past--button-bg">Sprawdź</button></a>
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
                                <span class="events__button-date button d-flex align-items-center w-60"><img
                                        src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg"
                                        class="mr-2" width="15" />18.06.2020</span>
                            </div>
                        </div>
                        <div class="col-6 mt-4">
                            <a href=""><button
                                    class="events__button-check events-page__past--button-bg">Sprawdź</button></a>
                        </div>
                        <div class="col-6 mt-4 d-flex justify-content-end"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/sygnet_fiolet.svg" /></div>
                    </div>
                </div>
                <div class="col-6 events-page__past">
                    <div class="row p-5 events-page__past--dark-purple-bg rounded">
                        <div class="col-6">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/ilustracja_onas.png" />
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <div>
                                <span class="events__button-date button d-flex align-items-center w-60"><img
                                        src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg"
                                        class="mr-2" width="15" />18.06.2020</span>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <h2 class="header events__header-box events-page__past--white-color-header">SecOps Online
                                MeetUp
                                #11</h2>
                            <p class="events__content-box-big events-page__past--content-color">It ensures that they are
                                kept up to date on any
                                developments and changes made to the structure or...</p>
                        </div>
                        <div class="col-6 mt-4">
                            <a href=""><button
                                    class="events__button-check events-page__past--button-bg">Sprawdź</button></a>
                        </div>
                        <div class="col-6 mt-4 d-flex justify-content-end">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_fiolet.svg" />
                        </div>
                    </div>
                    <div class="row events-page__past--dark-purple-bg mt-3 p-5 rounded">
                        <div class="col-6">
                            <h2 class="header events__header-box events-page__past--white-color-header">
                                SecOps Online MeetUp #10
                            </h2>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <div>
                                <span class="events__button-date button d-flex align-items-center w-60"><img
                                        src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg"
                                        class="mr-2" width="15" />18.06.2020</span>
                            </div>
                        </div>
                        <div class="col-6 mt-4">
                            <a href=""><button
                                    class="events__button-check events-page__past--button-bg">Sprawdź</button></a>
                        </div>
                        <div class="col-6 mt-4 d-flex justify-content-end"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/sygnet_fiolet.svg" /></div>
                    </div>

                </div>
            </div>
        </section>
        <!-- EVENTS PARTNERS -->
        <section class="partners-meetup">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="header events-page__header">Eventy partnerów</h2>
                </div>
                <div class="col-12 mt-5 mb-5">
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
                <div class="col-3 text-center">
                    <div class="events-page__partner-event-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/ovh.png"
                            class="events-page__partner-event-image" />
                        <h2 class="events-page__partner-event-title">OVHcloud Online MeetUp</h2>
                        <p class="events-page__partner-event-desc">Eleifend arcu tempus quam consequat nulla in.</p>
                        <div>
                            <span
                                class="events__button-date events-page__partner-event-button button d-flex align-items-center"><img
                                    src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg"
                                    class="mr-2" width="15" />18.06.2020</span>
                        </div>
                    </div>
                </div>
                <div class="col-3 text-center">
                    <div class="events-page__partner-event-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/ovh.png"
                            class="events-page__partner-event-image" />
                        <h2 class="events-page__partner-event-title">OVHcloud Online MeetUp</h2>
                        <p class="events-page__partner-event-desc">Eleifend arcu tempus quam consequat nulla in.</p>
                        <div>
                            <span
                                class="events__button-date events-page__partner-event-button button d-flex align-items-center"><img
                                    src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg"
                                    class="mr-2" width="15" />18.06.2020</span>
                        </div>
                    </div>
                </div>
                <div class="col-3 text-center">
                    <div class="events-page__partner-event-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/ovh.png"
                            class="events-page__partner-event-image" />
                        <h2 class="events-page__partner-event-title">OVHcloud Online MeetUp</h2>
                        <p class="events-page__partner-event-desc">Eleifend arcu tempus quam consequat nulla in.</p>
                        <div>
                            <span
                                class="events__button-date events-page__partner-event-button button d-flex align-items-center"><img
                                    src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg"
                                    class="mr-2" width="15" />18.06.2020</span>
                        </div>
                    </div>
                </div>
                <div class="col-3 text-center">
                    <div class="events-page__partner-event-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/ovh.png"
                            class="events-page__partner-event-image" />
                        <h2 class="events-page__partner-event-title">OVHcloud Online MeetUp</h2>
                        <p class="events-page__partner-event-desc">Eleifend arcu tempus quam consequat nulla in.</p>
                        <div>
                            <span
                                class="events__button-date events-page__partner-event-button button d-flex align-items-center"><img
                                    src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg"
                                    class="mr-2" width="15" />18.06.2020</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- BECOME SPONSOR -->
        <section class="become-sponsor">
            <div class="row">
                <div class="col-6">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/ilustracja_zostansponsorem.png" />
                </div>
                <div class="col-5 offset-1">
                    <h2 class="header-section-page">Zostań sponsorem</h2>
                    <p class="desc events-page__become-sponsor-desc">Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Bibendum donec ac tristique
                        ipsum in et.
                        Faucibus commodo aenean eu maecenas eget sed eleifend. Vitae duis dolor rhoncus nisi. Euismod
                        egestas amet sagittis leo molestie viverra neque. Tristique nulla consequat mauris, et
                        adipiscing
                        consequat nec.

                        Amet id velit ultricies dolor amet lacus. Auctor auctor quis volutpat, gravida est placerat
                        viverra.
                        Pulvinar in porttitor et tellus dictum consectetur. Eget felis amet curabitur at cum.</p>
                    <a href=""><button class="button events-page__become-sponsor-btn">Zostań sponsorem</button></a>
                </div>
            </div>
        </section>

    </div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();