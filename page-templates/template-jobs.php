<?php

/**
 * Template Name: Template Offers Jobs
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

    <div class="<?php echo esc_attr($container); ?> offers-job" id="content">

        <section class="current-jobs-offers">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="header-section-page">Aktualne oferty pracy</h2>
                </div>
                <div class="col-12 mt-5 d-none">
                    <div class="events-page__city-list-container">
                        <ul class="events-page__list-group d-flex align-items-center justify-content-center flex-wrap">
                            <li class="events-page__list-item">Wszystkie</li>
                            <li class="events-page__list-item">Warszawa</li>
                            <li class="events-page__list-item">Kraków</li>
                            <li class="events-page__list-item">Lublin</li>
                            <li class="events-page__list-item">Poznań</li>
                            <li class="events-page__list-item">Wrocław</li>
                            <li class="events-page__list-item">Szczecin</li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 current-jobs-offers__become-sponsor mt-3">
                    <div class="row">
                        <div class="col-lg-2 col-md-3 col-6">
                            <img src="<?php the_field('become_sponsor_logo'); ?>" />
                        </div>
                        <div class="col-lg-7 col-md-5 col-6 d-flex flex-column justify-content-around">
                            <h3 class="header current-jobs-offers__header current-jobs-offers__header--sponsor">
                                <?php the_field('become_sponsor_title'); ?></h3>
                            <p class="desc">
                                <?php the_field('become_sponsor_short_description'); ?>
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-4 current-jobs-offers__button-sponsor col-12 d-flex align-items-center justify-content-end">
                            <?php the_field('become_sponsor_button'); ?>
                        </div>
                    </div>
                </div>

                <?php

                $offersJob = new WP_Query([
                    'post_type' => 'offers-job',
                    'post_per_page' => 6
                ]);

                if ($offersJob->have_posts()) {
                    $counter = 1;
                    while ($offersJob->have_posts()) {
                        $offersJob->the_post();
                        $relatedCities = get_field('related_cities');
                        if ($relatedCities) {
                            foreach ($relatedCities as $location) {
                                $city = $location->post_title;
                            }
                        }

                ?>

                        <div class="col-12 current-jobs-offers__offer-container mt-4">
                            <div class="row align-items-center p-3">
                                <div class="col-lg-2 col-md-2 col-6">
                                    <img src="<?php the_field('firm_logo'); ?>" />
                                </div>
                                <div class="col-lg-6 col-md-6 col-6 current-jobs-offers__header-container">
                                    <h3 class="header current-jobs-offers__header m-0"><?php the_title(); ?></h3>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6 w-100 mt-2 mt-md-0 current-jobs-offers__span-container d-flex justify-content-end">
                                    <span class="current-jobs-offers__span"><img src="<?php echo get_template_directory_uri(); ?>/images/location.svg" class="mr-2" width="15" /><?php echo $city; ?></span>
                                </div>
                                <div class="col-lg-1 col-md-1 col-6 mt-2 mt-md-0 d-flex justify-content-end">
                                    <button class="current-jobs-offers__button-arrow" data-toggle="collapse" data-target="#collapseExample<?php echo $counter; ?>" aria-expanded="false" aria-controls="collapseExample<?php echo $counter; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow-down.svg" /></button>
                                </div>
                            </div>
                            <div class="collapse" id="collapseExample<?php echo $counter; ?>">
                                <div class="row">
                                    <div class="col-2 offset-2"><?php the_field('firm_name'); ?></div>
                                    <div class="col-6"><?php the_field('firm_description'); ?></div>
                                </div>
                                <div class="current-jobs-offers__line mr-0 mt-5 mb-5"></div>
                                <div class="row">
                                    <div class="col-5 offset-1">
                                        <h3 class="header current-jobs-offers__header-offer">Obowiązki</h3>
                                        <?php the_field('offer_responsibilities'); ?>
                                    </div>
                                    <div class="col-5">
                                        <h3 class="header current-jobs-offers__header-offer">Wymagania</h3>
                                        <?php the_field('offer_requirements'); ?>
                                    </div>
                                </div>
                                <div class="current-jobs-offers__line mr-0 mt-5 mb-5"></div>
                                <div class="row">
                                    <div class="col-10 offset-1">
                                        <h3 class="header current-jobs-offers__header-offer">Opis stanowiska/uwagi:</h3>
                                        <p class="current-jobs-offers__desc"><?php the_content(); ?></p>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-10 offset-1 text-right">
                                        <?php the_field('offer_button'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                        $counter++;
                    }
                }
                ?>



            </div>
        </section>

    </div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
