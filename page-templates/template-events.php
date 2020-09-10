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

function displayLocations($kindEvent)
{
    $html = '';

    $args = [
        'post_type' => 'city',
        'post_per_page' => '-1'
    ];
    $locations = new WP_Query($args);

    while ($locations->have_posts()) {
        $active = false;
        $class = '';
        $locations->the_post();
        $slug = get_post_field('post_name'); //online
        $title = get_the_title(); // Online


        if ((isset($_GET[$kindEvent]) && $_GET[$kindEvent] == $slug)) {
            $active = true;
        } else if (!isset($_GET[$kindEvent]) && $slug === 'online') {
            $active = true;
        }

        if ($active) {
            $class = 'active';
        }

        $html .= "<li class='events-page__list-item events-page__list-item--{$class}'><a href='?{$kindEvent}={$slug}' class='events-page__list-link'>{$title}</a></li>";
    }
    return $html;
}
?>

<div class="wrapper" id="full-width-page-wrapper">

    <div class="<?php echo esc_attr($container); ?> events-page" id="content">

        <section class="current-meetup">
            <div class="row current-meetup__load-ajax-data">
                <div class="col-12 text-center">
                    <h2 class="header events-page__header">Aktualne MeetUpy</h2>
                </div>

                <?php

                $today = date('Ymd');
                $currentEvents = new WP_Query([
                    'post_type' => 'event',
                    'posts_per_page' => 4,
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
                            'value' => '"' . getCityID("currentCity") . '"'
                        )
                    )
                ]);

                ?>

                <div class="col-12 mt-5">
                    <div class="events-page__city-list-container">
                        <ul class="events-page__list-group d-flex align-items-center justify-content-center">
                            <?php
                            echo displayLocations('currentCity');
                            ?>
                        </ul>
                    </div>
                </div>
                <!-- CURRENT MEETUPS -->
                <?php
                $counter = 0;
                $total = $currentEvents->post_count;

                if ($currentEvents->have_posts()) {
                    while ($currentEvents->have_posts()) {
                        $currentEvents->the_post();
                ?>

                <?php if ($counter == 0) { ?>
                <div class="col-6 events-page__current events-page__current--arrow-left mr-4">
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
                <div class="col-6 events-page__current events-page__current--arrow-right">
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
                    }
                } else { ?>
                    <div class="row w-100 d-flex justify-content-center">
                        <h2 class="header events-page__header">Nie odnaleziono żadnych eventów</h2>
                    </div>
                    <?php }
                wp_reset_postdata();
                    ?>
                </div>
            </div>
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
                            <?php echo displayLocations('pastCity'); ?>
                        </ul>
                    </div>
                </div>

                <?php

                $today = date('Ymd');
                $pastEvents = new WP_Query([
                    'post_type' => 'event',
                    'post_per_page' => 4,
                    'orderby' => 'meta_value_num',
                    'meta_key' => 'event_date_start',
                    'order' => 'ASC',
                    'paged' => 1,
                    'meta_query' => array(
                        array(
                            'key' => 'event_date_start',
                            'value' => $today,
                            'compare' => '<',
                            'type' => 'numeric'
                        ), array(
                            'key' => 'related_cities',
                            'compare' => 'LIKE',
                            'value' => '"' . getCityID("pastCity") . '"'
                        )
                    )
                ]);


                $counter = 0;
                $total = $pastEvents->post_count;


                if ($pastEvents->have_posts()) {
                    while ($pastEvents->have_posts()) {
                        $pastEvents->the_post();
                ?>

                <?php if ($counter == 0) { ?>
                <div class="col-6 events-page__past mr-4">
                    <div class="row events-page__past--dark-purple-bg p-5 rounded">
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
                            <h2 class="header events__header-box events-page__past--white-color-header">
                                <?php the_title(); ?>
                            </h2>
                            <p class="events__content-box-big events-page__past--content-color">
                                <?php echo wp_trim_words(get_the_content(), 10); ?></p>
                        </div>
                        <div class="col-6 mt-4">
                            <a href=""><button
                                    class="events__button-check events-page__past--button-bg">Sprawdź</button></a>
                        </div>
                        <div class="col-6 mt-4 d-flex justify-content-end">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_fiolet.svg" />
                        </div>
                    </div>
                    <?php } ?>

                    <?php if ($counter == 1) { ?>
                    <div class="row events-page__past--dark-purple-bg p-5 mt-3 rounded">
                        <div class="col-6">
                            <h2 class="header events__header-box events-page__past--white-color-header">
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
                            <a href=""><button
                                    class="events__button-check events-page__past--button-bg">Sprawdź</button></a>
                        </div>
                        <div class="col-6 mt-4 d-flex justify-content-end"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/sygnet_fiolet.svg" /></div>
                    </div>

                </div>
                <div class="col-6 events-page__past">
                    <?php } else if ($counter == 2) { ?>
                    <div class="row events-page__past--dark-purple-bg p-5 rounded">
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
                            <h2 class="header events__header-box events-page__past--white-color-header">
                                <?php the_title(); ?>
                            </h2>
                            <p class="events__content-box-big events-page__past--content-color">
                                <?php echo wp_trim_words(get_the_content(), 10); ?></p>
                        </div>
                        <div class="col-6 mt-4">
                            <a href=""><button
                                    class="events__button-check events-page__past--button-bg">Sprawdź</button></a>
                        </div>
                        <div class="col-6 mt-4 d-flex justify-content-end">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_fiolet.svg" />
                        </div>
                    </div>
                    <?php } else if ($counter == 3) { ?>
                    <div class="row events-page__past--dark-purple-bg mt-3 p-5 rounded">
                        <div class="col-6">
                            <h2 class="header events__header-box events-page__past--white-color-header">
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
                            <a href=""><button
                                    class="events__button-check events-page__past--button-bg">Sprawdź</button></a>
                        </div>
                        <div class="col-6 mt-4 d-flex justify-content-end"><img
                                src="<?php echo get_template_directory_uri(); ?>/images/sygnet_fiolet.svg" /></div>
                    </div>
                    <?php } ?>
                    <?php $counter++;
                        if ($counter == $total) {
                            echo '</div>';
                        }
                    }
                } else { ?>
                    <div class="row w-100 d-flex justify-content-center">
                        <h2 class="header events-page__header">Nie odnaleziono żadnych eventów</h2>
                    </div>
                    <?php }
                wp_reset_postdata();
                    ?>
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
                            <?php echo displayLocations('partnersCity'); ?>
                        </ul>
                    </div>
                </div>
                <?php

                $eventsPartners = new WP_Query([
                    'post_type' => 'event-partners',
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
                            'value' => '"' .  getCityID("partnersCity") . '"'
                        )
                    )
                ]);

                if ($eventsPartners->have_posts()) {
                    while ($eventsPartners->have_posts()) {
                        $eventsPartners->the_post();     ?>
                <div class="col-3 text-center">
                    <div class="events-page__partner-event-box">
                        <div class="col-12">
                            <img src="<?php the_field('logo'); ?>" class="events-page__partner-event-image" />
                            <h2 class="events-page__partner-event-title"><?php the_title(); ?></h2>
                            <p class="events-page__partner-event-desc"><?php the_field('short_description'); ?></p>
                            <div class="col-8 offset-2">
                                <span
                                    class="events__button-date events-page__partner-event-button button d-flex align-items-center"><img
                                        src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg"
                                        class="mr-2" width="15" /><?php the_field('event_date_start'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }
                } else { ?>
                <div class="row w-100 d-flex justify-content-center">
                    <h2 class="header events-page__header">Nie odnaleziono żadnych eventów</h2>
                </div>
                <?php }
                wp_reset_postdata();
                ?>

            </div>
        </section>
        <!-- BECOME SPONSOR -->
        <section class="become-sponsor">
            <div class="row">
                <div class="col-6">
                    <img src="<?php the_field('become_sponsor_logo'); ?>" />
                </div>
                <div class="col-5 offset-1">
                    <h2 class="header-section-page"><?php the_field('become_sponsor_title'); ?></h2>
                    <p class="desc events-page__become-sponsor-desc"><?php the_field('become_sponsor_content'); ?></p>
                    <?php the_field('become_sponsor_button'); ?>
                </div>
            </div>
        </section>

    </div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();