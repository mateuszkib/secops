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
                <div class="col-12 mt-5">
                    <div class="events-page__city-list-container">
                        <ul class="events-page__list-group d-flex align-items-center justify-content-center">
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
                <div class="col-12 current-jobs-offers__become-sponsor">
                    <div class="row">
                        <div class="col-2">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/ilustracja_zostansponsorem.png" />
                        </div>
                        <div class="col-7 d-flex flex-column justify-content-around">
                            <h3 class="header current-jobs-offers__header current-jobs-offers__header--sponsor">Zostań sponsorem</h3>
                            <p class="desc current-jobs-offers__desc current-jobs-offers__desc--sponsor">A dui purus faucibus feugiat tristique. Felis, mauris tempus, sit elit. Mauris congue.</p>
                        </div>
                        <div class="col-3 d-flex align-items-center justify-content-end">
                            <a href=""><button class="button current-jobs-offers__button">Zostań sponsorem</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 current-jobs-offers__offer-container mt-4">
                    <div class="row align-items-center p-3">
                        <div class="col-2">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/ovh.png" />
                        </div>
                        <div class="col-6">
                            <h3 class="header current-jobs-offers__header m-0">Cloud Support Technical Lead</h3>
                        </div>
                        <div class="col-3 w-100 d-flex justify-content-end">
                            <span class="current-jobs-offers__span"><img src="<?php echo get_template_directory_uri(); ?>/images/location.svg" class="mr-2" width="15" />Warszawa</span>
                        </div>
                        <div class="col-1 d-flex justify-content-end">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-down.svg" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 offset-2">OVH Sp. z o.o.</div>
                        <div class="col-6">With more than 1.5 million customers worldwide, OVHcloud is the European leader of cloud computing and the 3rd largest web hosting provider in the world. Our company employs more than 2,200 people and our teams are growing rapidly. With 30 datacenters and a commercial presence on 5 continents, we manufacture our own servers and thus control our entire industrial chain. We defend an innovative and different cloud, which respects the European values of freedom of choice, transparency, openness to standards and protection of privacy.
                            In order to support our growth, we are constantly looking for new talents who share our values and ambitions.</div>
                    </div>
                    <div class="current-jobs-offers__line mr-0 mt-5 mb-5"></div>
                    <div class="row">
                        <div class="col-5 offset-1">
                            <h3 class="header ">Obowiązki</h3>
                            <ul class="current-jobs-offers__list-group">
                                <li class="current-jobs-offers__list-item">Ensure and provide continuous training for IT Support Technicians in the relevant environment</li>
                                <li class="current-jobs-offers__list-item">Identify continuous training needs of technical support advisors and refer them to managers and the training center</li>
                                <li class="current-jobs-offers__list-item">Coordinate and synchronize with the training center so that product, technical and other developments are well known and understood by Customer Advisors</li>
                                <li class="current-jobs-offers__list-item">Participate in designing training modules for specific topics as well as continuous development</li>
                                <li class="current-jobs-offers__list-item">Participate in training modules from the training center (new products, features etc.)</li>
                                <li class="current-jobs-offers__list-item">Evaluate the effectiveness and relevance of training courses (identify gaps in initial training, changes in segments, etc.)</li>
                                <li class="current-jobs-offers__list-item">Propose and carry out individual and group action plans (e.g. workshops, briefing notes) that contribute to the skills development of Customer Advisors</li>
                            </ul>
                        </div>
                        <div class="col-5">
                            <h3 class="header">Wymagania</h3>
                            <ul class="current-jobs-offers__list-group">
                                <li class="current-jobs-offers__list-item">Ensure and provide continuous training for IT Support Technicians in the relevant environment</li>
                                <li class="current-jobs-offers__list-item">Identify continuous training needs of technical support advisors and refer them to managers and the training center</li>
                                <li class="current-jobs-offers__list-item">Coordinate and synchronize with the training center so that product, technical and other developments are well known and understood by Customer Advisors</li>
                                <li class="current-jobs-offers__list-item">Participate in designing training modules for specific topics as well as continuous development</li>
                                <li class="current-jobs-offers__list-item">Participate in training modules from the training center (new products, features etc.)</li>
                                <li class="current-jobs-offers__list-item">Evaluate the effectiveness and relevance of training courses (identify gaps in initial training, changes in segments, etc.)</li>
                                <li class="current-jobs-offers__list-item">Propose and carry out individual and group action plans (e.g. workshops, briefing notes) that contribute to the skills development of Customer Advisors</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
