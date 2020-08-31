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
                            <h1 class="home-header__title">SecOps</h1>
                        </div>

                        <div class="col-6 offset-3">
                            <p class="header home-header__span">POLSKA</p>
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
                    <h2 class="header home-header__who-header">Kim jesteśmy?</h2>
                    <p class="home-header__who-text"><?php
                                                        if (get_field('who_we_are')) {
                                                            the_field('who_we_are');
                                                        }
                                                        ?></p>
                    <button class="button home-header__who-button">Nasze eventy</button>
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
                <p class="news__paragraph">Najnowsze wieści dotyczące SecOps
                    lorem ipsum dolor sit amet. Dalsza
                    część tekstu.</p>
                <button class="button news__button">Wszystkie aktualności</button>

            </div>
            <div class="col">
                <div class="card">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/pexel2.jpg" class="news__img-card card-img-top" width="300" height="250" />
                    <div class="card-body">
                        <h5 class="header card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of
                            the card's content.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz.svg" width="20" /><span class="card__date">08.08.2020</span>
                            </div>
                            <span class="card__author"><?php echo get_avatar(get_the_author_email(), '20'); ?>Jan
                                Kowalski</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/pexel2.jpg" class="news__img-card card-img-top" width="300" height="250" />
                    <div class="card-body">
                        <h5 class="header card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of
                            the card's content.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz.svg" width="20" /><span class="card__date">08.08.2020</span>
                            </div>
                            <span class="card__author"><?php echo get_avatar(get_the_author_email(), '20'); ?>Jan
                                Kowalski</span>
                        </div>
                    </div>
                </div>
            </div>
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
        <div class="row">
            <div class="col-6 bg-white rounded">
                <div class="row p-5">
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
            <div class="col-6">
                <div class="col-12">
                    <div class="row bg-white p-5">
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
                    <div class="row bg-white p-5 mt-5">
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
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a href=""><button class="button events__button-all-events">Wszystkie eventy</button></a>
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
                                    <a href="<?php echo $sponsor['sponsor']['caption']; ?>"><img src="<?php echo $sponsor['sponsor']['url']; ?>" class="sponsors-carousel__img" alt="<?php echo $sponsor['sponsor']['alt']; ?>" /></a>
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