<?php

/**
 * Template Name: Template Home
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<header class="header-bg">
    <?php
    get_header();
    ?>

    <div class="home-header" style="color: white;">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-6">
                    <div class="col-lg-12 text-center">
                        <div class="col-6 offset-3">
                            <h1 class="home-header__title"><?php the_field('title_header'); ?></h1>
                        </div>

                        <div class="col-6 offset-3">
                            <p class="header home-header__span"><?php the_field('subtitle_header'); ?></p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row align-items-center">
                            <div class="col-3 offset-3">
                                <button class="button home-header__button w-100">Dowiedz się więcej</button>
                            </div>
                            <div class="col-5 text-left">
                                <span class="home-header__more-text">
                                    <?php
                                    if (get_field('get_more_text')) {
                                        the_field('get_more_text');
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/header_ilustracja.png" />
                </div>
            </div>
            <div class="row mt-5">
                <div class=" col-6">
                    <div class="home-header__who-bg col-12">
                        <div class="col-6 offset-3">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/ilustracja_kimjestesmy.png" />
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <h2 class="header home-header__who-header">
                        <?php (get_field('who_title') ? the_field('who_title') : "");  ?>
                    </h2>
                    <p class="home-header__who-text">
                        <?php (get_field('who_content') ? the_field('who_content') : ""); ?>
                    </p>
                    <?php
                    (get_field('who_button') ? the_field('who_button') : "");
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="bg">
    <img src="<?php echo get_template_directory_uri(); ?>/images/bg.png" class="position-absolute" />
</div>
<section class="news">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="header news__header">Aktualności</h2>
                <p class="news__paragraph">
                    <?php the_field('news_text'); ?>
                </p>
                <button class="button news__button">Wszystkie aktualności</button>
            </div>

            <?php

            $newsHomePage = new WP_Query([
                'post_type' => 'post',
                'posts_per_page' => 2,
            ]);

            while ($newsHomePage->have_posts()) {
                $newsHomePage->the_post();
            ?>
            <div class="col" style="max-height: 518px;">
                <div class="card" style="height: 100%;">
                    <img src="<?php the_post_thumbnail_url(); ?>" class="news__img-card card-img-top" width="300"
                        height="250" />
                    <div class="card-body">
                        <h5 class="header card-title"><?php echo wp_trim_words(get_the_title(), 10); ?></h5>
                        <p class="card-text"><?php echo wp_trim_words(get_the_content(), 7); ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz.svg"
                                    width="20" /><span class="card__date"><?php the_time('d.m.Y'); ?></span>
                            </div>
                            <span class="card__author"><?php echo get_avatar(get_the_author_email(), '20');
                                                            the_author_posts_link(); ?></span>
                        </div>
                    </div>
                </div>
            </div>


            <?php
            }
            wp_reset_postdata();
            ?>

        </div>
    </div>
</section>
<section class="events">
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h2 class="header events__header text-center">Nadchodzące eventy</h2>
            </div>
            <div class="col-8 offset-2 mt-3">
                <p class="events__description"><?php
                                                if (get_field('text_events')) {
                                                    the_field('text_events');
                                                }
                                                ?></p>
            </div>
        </div>

        <?php
        $today = date('Ymd');
        $eventsHomePage = new WP_Query([
            'post_type' => 'event',
            'posts_per_page' => 3,
            'orderby' => 'meta_value_num',
            'meta_key' => 'event_date_start',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'event_date_start',
                    'value' => $today,
                    'compare' => '>=',
                    'type' => 'numeric'
                )
            )
        ]);
        ?>



        <div class="row">
            <?php $counter = 0;
            $total = $eventsHomePage->post_count;
            while ($eventsHomePage->have_posts()) {
                $eventsHomePage->the_post();
                $counter++;

                if ($counter == 1) { ?>
            <div class="col-6 bg-white rounded">
                <div class="row p-5 h-100">
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
                        <p class="events__content-box-big"><?php echo wp_trim_words(get_the_content(), 10);  ?></p>
                    </div>
                    <div class="col-6 mt-5">
                        <a href=""><button class="events__button-check">Sprawdź</button></a>
                    </div>
                    <div class="col-6 mt-5 d-flex justify-content-end">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_szary.svg" />
                    </div>
                </div>
            </div>
            <?php
                } else {

                    if ($counter == 2) { ?>
            <div class="col-6">
                <div class="col-12">

                    <?php } ?>

                    <div class="row bg-white p-5 <?php if ($counter === 3) {
                                                                echo 'mt-5';
                                                            } ?>">
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
                                src="<?php echo get_template_directory_uri(); ?>/images/sygnet_szary.svg" /></div>
                    </div>
                    <?php
                    }
                        ?>
                    <?php if ($counter == $total) { ?>
                </div>
            </div>
            <?php } ?>

            <?php
            }
            wp_reset_query();
                ?>


        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a href=""><button class="button events__button-all-events">Wszystkie eventy</button></a>
            </div>
        </div>
    </div>
</section>
<section class="sponsors-carousel">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="header sponsors-carousel__header">Nasi sponsorzy:</h2>
            </div>
            <div class="col-12 pl-0">
                <div class="sponsors-carousel__owl owl-carousel owl-theme owl-loaded bg-white">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                            <?php
                            $sponsors = get_field('carousel_sponsors');
                            foreach ($sponsors as $sponsor) {
                            ?>
                            <div class="owl-item">
                                <a href="<?php echo $sponsor['link']; ?>"><img
                                        src="<?php echo $sponsor['sponsor']['url']; ?>" class="sponsors-carousel__img"
                                        alt="<?php echo $sponsor['sponsor']['alt']; ?>" /></a>
                            </div>
                            <?php            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="line-break">
    <div class="container">
        <div class="row">
            <div class="col-12 line-break__border">
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>