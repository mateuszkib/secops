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
        $slug = get_post_field('post_name');
        $title = get_the_title();


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
    wp_reset_postdata();
    return $html;
}

function getCityID($parametr)
{
    $defaultCityID = 93;
    if ($_GET[$parametr]) {
        $post = get_page_by_path($_GET[$parametr], '', 'city');
        $cityID = $post->ID;
    } else {
        $cityID = $defaultCityID;
    }

    return $cityID;
}
?>

<div class="wrapper" id="full-width-page-wrapper">

    <div class="<?php echo esc_attr($container); ?> events-page" id="content">
        <?php function paginateEventsArrows($direction, int $page)
        {

            if ($direction == 'left') {
                --$page;
            } else {
                ++$page;
            }
            return $page;
        }

        ?>
        <section class="current-meetup" id="current-events">
            <div class="row position-relative">
                <?php
                $paged1 = isset($_GET['paged1']) ? (int) $_GET['paged1'] : 1;
                $paged2 = isset($_GET['paged2']) ? (int) $_GET['paged2'] : 1;
                $paged3 = isset($_GET['paged3']) ? (int) $_GET['paged3'] : 1;

                $today = date('Ymd');
                $currentEvents = new WP_Query([
                    'post_type' => 'event',
                    'posts_per_page' => 4,
                    'orderby' => 'meta_value_num',
                    'meta_key' => 'event_date_start',
                    'order' => 'ASC',
                    'paged' => $_GET['paged1'] ? $_GET['paged1'] : 1,
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


                global $wp;
                $total = $currentEvents->post_count;
                $allEvents = $currentEvents->found_posts;
                $current_url =  home_url($wp->request);
                $page = $_GET['paged1'] ? $_GET['paged1'] : 1;

                if ($page != 1) { ?>
                    <a href="<?php echo $current_url . '?currentCity=' . ($_GET['currentCity'] ? $_GET['currentCity'] : 'online') . '&paged1=' . paginateEventsArrows('left', $page) . '#current-events'; ?>" class="arrow-left position-absolute"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow-left.svg" /></a>
                <?php }
                if ($total == 4 && $allEvents > 4) { ?>
                    <a href="<?php echo $current_url . '?currentCity=' . ($_GET['currentCity'] ? $_GET['currentCity'] : 'online') . '&paged1=' . paginateEventsArrows('right', $page) . '#current-events'; ?>" class="arrow-right position-absolute"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow-right.svg" /></a>
                <?php }
                ?>
                <div class="col-12 text-center">
                    <h2 class="header events-page__header">Aktualne MeetUpy</h2>
                </div>

                <div class="col-12 mt-5">
                    <div class="events-page__city-list-container">
                        <ul class="events-page__list-group d-flex align-items-center justify-content-center flex-wrap">
                            <?php
                            echo displayLocations('currentCity');
                            ?>
                        </ul>
                    </div>
                </div>
                <!-- CURRENT MEETUPS -->
                <?php
                $counter = 0;
                if ($currentEvents->have_posts()) {
                    while ($currentEvents->have_posts()) {
                        $currentEvents->the_post();
                ?>

                        <?php if ($counter == 0) { ?>
                            <div class="col-10 offset-1 col-lg-6 offset-md-0 events-page__current ml-md-2 mr-md-3 position-relative">

                                <div class="row p-5 bg-white rounded">
                                    <div class="col-6">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/ilustracja_onas.png" />
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <div>
                                            <span class="events__button-date button d-flex align-items-center w-60"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" /><?php the_field('event_date_start'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-5">
                                        <h2 class="header events__header-box events-page--white-color-header">
                                            <?php the_title(); ?>
                                        </h2>
                                        <p class="events__content-box-big"><?php echo wp_trim_words(get_the_content(), 10); ?>
                                        </p>
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
                                            <span class="events__button-date button d-flex align-items-center w-60"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" /><?php the_field('event_date_start'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-4">
                                        <a href=""><button class="events__button-check">Sprawdź</button></a>
                                    </div>
                                    <div class="col-6 mt-4 d-flex justify-content-end"><img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_szary.svg" />
                                    </div>
                                </div>

                            </div>
                            <div class="col-10 offset-1 col-lg-6 offset-md-0 mt-3 mt-md-0 events-page__current">

                            <?php } else if ($counter == 2) { ?>
                                <div class="row bg-white p-5 rounded">
                                    <div class="col-6">
                                        <h2 class="header events__header-box">
                                            <?php the_title(); ?>
                                        </h2>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <div>
                                            <span class="events__button-date button d-flex align-items-center w-60"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" /><?php the_field('event_date_start'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-4">
                                        <a href=""><button class="events__button-check">Sprawdź</button></a>
                                    </div>
                                    <div class="col-6 mt-4 d-flex justify-content-end"><img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_szary.svg" />
                                    </div>
                                </div>
                            <?php } else if ($counter == 3) { ?>
                                <div class="row p-5 bg-white rounded mt-3">
                                    <div class="col-6">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/ilustracja_onas.png" />
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <div>
                                            <span class="events__button-date button d-flex align-items-center w-60"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" /><?php the_field('event_date_start'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-5">
                                        <h2 class="header events__header-box"><?php the_title(); ?></h2>
                                        <p class="events__content-box-big"><?php echo wp_trim_words(get_the_content(), 10); ?>
                                        </p>
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
        </section>
        <!-- PAST MEETUPS -->
        <section class="past-meetup" id="past-events">
            <div class="row position-relative">

                <?php

                $today = date('Ymd');
                $pastEvents = new WP_Query([
                    'post_type' => 'event',
                    'posts_per_page' => 4,
                    'orderby' => 'meta_value_num',
                    'meta_key' => 'event_date_start',
                    'order' => 'ASC',
                    'paged' => $_GET['paged2'] ? $_GET['paged2'] : 1,
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

                $total = $pastEvents->post_count;
                $allPastsEvents = $pastEvents->found_posts;
                $current_url =  home_url($wp->request);
                $page = $_GET['paged2'] ? $_GET['paged2'] : 1;
                if ($page != 1) { ?>
                    <a href="<?php echo $current_url . '?pastCity=' . ($_GET['pastCity'] ? $_GET['pastCity'] : 'online') . '&paged2=' . paginateEventsArrows('left', $page) . '#past-events'; ?>" class="arrow-left position-absolute"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow-left.svg" /></a>
                <?php } ?>
                <?php
                if ($total == 4) { ?>
                    <a href="<?php echo $current_url . '?pastCity=' . ($_GET['pastCity'] ? $_GET['pastCity'] : 'online') . '&paged2=' . paginateEventsArrows('right', $page) . '#past-events'; ?>" class="arrow-right position-absolute"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow-right.svg" /></a>
                <?php }
                ?>


                <div class="col-12 text-center">
                    <h2 class="header events-page__header">Przeszłe MeetUpy</h2>
                </div>
                <div class="col-12 mt-5">
                    <div class="events-page__city-list-container">
                        <ul class="events-page__list-group d-flex align-items-center justify-content-center flex-wrap">
                            <?php echo displayLocations('pastCity'); ?>
                        </ul>
                    </div>
                </div>

                <?php

                $counter = 0;

                if ($pastEvents->have_posts()) {
                    while ($pastEvents->have_posts()) {
                        $pastEvents->the_post();
                ?>

                        <?php if ($counter == 0) { ?>
                            <div class="col-10 offset-1 col-lg-6 offset-md-0 events-page__past mr-4">
                                <div class="row events-page__past--dark-purple-bg p-5 rounded">
                                    <div class="col-6">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/ilustracja_onas.png" />
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <div>
                                            <span class="events__button-date button d-flex align-items-center w-60"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" /><?php the_field('event_date_start'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-5">
                                        <h2 class="header events__header-box events-page__past--white-color-header">
                                            <?php the_title(); ?>
                                        </h2>
                                        <p class="events__content-box-big events-page__past--content-color">
                                            <?php echo wp_trim_words(get_the_content(), 10); ?></p>
                                    </div>
                                    <div class="col-6 mt-4">
                                        <a href=""><button class="events__button-check events-page__past--button-bg">Sprawdź</button></a>
                                    </div>
                                    <div class="col-6 mt-4 d-flex justify-content-end">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_fiolet.svg" />
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if ($counter == 1) { ?>
                                <div class="row events-page__past--dark-purple-bg p-5 mt-3 mb-3 mb-md-0 rounded">
                                    <div class="col-6">
                                        <h2 class="header events__header-box events-page__past--white-color-header">
                                            <?php the_title(); ?>
                                        </h2>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <div>
                                            <span class="events__button-date button d-flex align-items-center w-60"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" /><?php the_field('event_date_start'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-4">
                                        <a href=""><button class="events__button-check events-page__past--button-bg">Sprawdź</button></a>
                                    </div>
                                    <div class="col-6 mt-4 d-flex justify-content-end"><img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_fiolet.svg" /></div>
                                </div>

                            </div>
                            <div class="col-10 offset-1 col-lg-6 offset-md-0 events-page__past">
                            <?php } else if ($counter == 2) { ?>
                                <div class="row events-page__past--dark-purple-bg p-5 rounded">
                                    <div class="col-6">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/ilustracja_onas.png" />
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <div>
                                            <span class="events__button-date button d-flex align-items-center w-60"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" /><?php the_field('event_date_start'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-5">
                                        <h2 class="header events__header-box events-page__past--white-color-header">
                                            <?php the_title(); ?>
                                        </h2>
                                        <p class="events__content-box-big events-page__past--content-color">
                                            <?php echo wp_trim_words(get_the_content(), 10); ?></p>
                                    </div>
                                    <div class="col-6 mt-4">
                                        <a href=""><button class="events__button-check events-page__past--button-bg">Sprawdź</button></a>
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
                                            <span class="events__button-date button d-flex align-items-center w-60"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" /><?php the_field('event_date_start'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-4">
                                        <a href=""><button class="events__button-check events-page__past--button-bg">Sprawdź</button></a>
                                    </div>
                                    <div class="col-6 mt-4 d-flex justify-content-end"><img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_fiolet.svg" /></div>
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
        <section class="partners-meetup" id="partners-events">
            <div class="row position-relative">

                <?php

                $eventsPartners = new WP_Query([
                    'post_type' => 'event-partners',
                    'posts_per_page' => 4,
                    'orderby' => 'meta_value_num',
                    'meta_key' => 'event_date_start',
                    'order' => 'ASC',
                    'paged' => $_GET['paged3'] ? $_GET['paged3'] : 1,
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

                $total = $eventsPartners->post_count;

                $allPartnersEvents = $eventsPartners->found_posts;
                $current_url =  home_url($wp->request);
                $page = $_GET['paged3'] ? $_GET['paged3'] : 1;

                if ($page != 1) { ?>
                    <a href="<?php echo $current_url . '?partnersCity=' . ($_GET['partnersCity'] ? $_GET['partnersCity'] : 'online') . '&paged3=' . paginateEventsArrows('left', $page) . '#partners-events'; ?>" class="arrow-left position-absolute"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow-left.svg" /></a>
                <?php } ?>

                <?php
                if ($total == 4 && $allPartnersEvents > 4) { ?>
                    <a href="<?php echo $current_url . '?partnersCity=' . ($_GET['partnersCity'] ? $_GET['partnersCity'] : 'online') . '&paged3=' . paginateEventsArrows('right', $page) . '#partners-events'; ?>" class="arrow-right position-absolute"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow-right.svg" /></a>
                <?php }
                ?>

                <div class="col-12 text-center">
                    <h2 class="header events-page__header">Eventy partnerów</h2>
                </div>
                <div class="col-12 mt-5 mb-5">
                    <div class="events-page__city-list-container">
                        <ul class="events-page__list-group d-flex align-items-center justify-content-center flex-wrap">
                            <?php echo displayLocations('partnersCity'); ?>
                        </ul>
                    </div>
                </div>
                <?php


                if ($eventsPartners->have_posts()) {
                    while ($eventsPartners->have_posts()) {
                        $eventsPartners->the_post();     ?>
                        <div class="col-lg-3 col-12 text-center mt-3 mt-md-0">
                            <div class="events-page__partner-event-box">
                                <div class="col-12">
                                    <div class="col-6 offset-3">
                                        <img src="<?php the_field('logo'); ?>" class="events-page__partner-event-image" />
                                    </div>
                                    <h2 class="events-page__partner-event-title"><?php the_title(); ?></h2>
                                    <p class="events-page__partner-event-desc"><?php the_field('short_description'); ?></p>
                                    <div class="col-4 offset-4 col-lg-8 offset-lg-2">
                                        <span class="events__button-date events-page__partner-event-button button d-flex align-items-center"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" /><?php the_field('event_date_start'); ?></span>
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
                <div class="col-12 col-lg-6">
                    <img src="<?php the_field('become_sponsor_logo'); ?>" />
                </div>
                <div class="col-12 col-lg-5 offset-lg-1">
                    <h2 class="header-section-page"><?php the_field('become_sponsor_title'); ?></h2>
                    <p class="desc events-page__become-sponsor-desc"><?php the_field('become_sponsor_content'); ?></p>
                    <div class="col-12 text-center">
                        <?php the_field('become_sponsor_button'); ?>
                    </div>
                </div>
            </div>
        </section>

    </div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
