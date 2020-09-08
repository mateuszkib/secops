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

$defaultCityID = 93;

if (is_front_page()) {
    get_template_part('global-templates/hero');
}

function displayLocations($kindEvent)
{
    $args = [
        'post_type' => 'city',
        'post_per_page' => '-1'
    ];
    $locations = new WP_Query($args);
    $html = '';
    $activeCity = $_GET[$kindEvent];
    while ($locations->have_posts()) {
        $locations->the_post();
        $slug = get_post_field('post_name');
        $title = get_the_title();

        $html .= "<li class='events-page__list-item'><a href='?{$kindEvent}={$slug}' class='events-page__list-link'>{$title}</a></li>";
    }
    return $html;
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
                $currentEvents = new WP_Query([
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
                            'value' => '"' . ($_GET['currentCity']) ? $_GET['currentCity'] : $defaultCityID . '"'
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
                            <div class="col-6 events-page__current mr-4">
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
                    'meta_query' => array(
                        array(
                            'key' => 'event_date_start',
                            'value' => $today,
                            'compare' => '<',
                            'type' => 'numeric'
                        ), array(
                            'key' => 'related_cities',
                            'compare' => 'LIKE',
                            'value' => '"' . ($_GET['pastCity']) ? $_GET['pastCity'] : $defaultCityID . '"'
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
                                            <span class="events__button-date button d-flex align-items-center w-60"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" /><?php the_field('event_date_start'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-5">
                                        <h2 class="header events__header-box events-page__past--white-color-header"><?php the_title(); ?>
                                        </h2>
                                        <p class="events__content-box-big events-page__past--content-color"><?php echo wp_trim_words(get_the_content(), 10); ?></p>
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
                                        <a href=""><button class="events__button-check events-page__past--button-bg">Sprawdź</button></a>
                                    </div>
                                    <div class="col-6 mt-4 d-flex justify-content-end"><img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_fiolet.svg" /></div>
                                </div>

                            </div>
                            <div class="col-6 events-page__past">
                            <?php } else if ($counter == 2) { ?>
                                <div class="row p-5 events-page__past--dark-purple-bg rounded">
                                    <div class="col-6">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/ilustracja_onas.png" />
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <div>
                                            <span class="events__button-date button d-flex align-items-center w-60"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" />18.06.2020</span>
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
                                            SecOps Online MeetUp #10
                                        </h2>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <div>
                                            <span class="events__button-date button d-flex align-items-center w-60"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" />18.06.2020</span>
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
                <div class="col-3 text-center">
                    <div class="events-page__partner-event-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/ovh.png" class="events-page__partner-event-image" />
                        <h2 class="events-page__partner-event-title">OVHcloud Online MeetUp</h2>
                        <p class="events-page__partner-event-desc">Eleifend arcu tempus quam consequat nulla in.</p>
                        <div>
                            <span class="events__button-date events-page__partner-event-button button d-flex align-items-center"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" />18.06.2020</span>
                        </div>
                    </div>
                </div>
                <div class="col-3 text-center">
                    <div class="events-page__partner-event-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/ovh.png" class="events-page__partner-event-image" />
                        <h2 class="events-page__partner-event-title">OVHcloud Online MeetUp</h2>
                        <p class="events-page__partner-event-desc">Eleifend arcu tempus quam consequat nulla in.</p>
                        <div>
                            <span class="events__button-date events-page__partner-event-button button d-flex align-items-center"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" />18.06.2020</span>
                        </div>
                    </div>
                </div>
                <div class="col-3 text-center">
                    <div class="events-page__partner-event-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/ovh.png" class="events-page__partner-event-image" />
                        <h2 class="events-page__partner-event-title">OVHcloud Online MeetUp</h2>
                        <p class="events-page__partner-event-desc">Eleifend arcu tempus quam consequat nulla in.</p>
                        <div>
                            <span class="events__button-date events-page__partner-event-button button d-flex align-items-center"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" />18.06.2020</span>
                        </div>
                    </div>
                </div>
                <div class="col-3 text-center">
                    <div class="events-page__partner-event-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/ovh.png" class="events-page__partner-event-image" />
                        <h2 class="events-page__partner-event-title">OVHcloud Online MeetUp</h2>
                        <p class="events-page__partner-event-desc">Eleifend arcu tempus quam consequat nulla in.</p>
                        <div>
                            <span class="events__button-date events-page__partner-event-button button d-flex align-items-center"><img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz_events.svg" class="mr-2" width="15" />18.06.2020</span>
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
