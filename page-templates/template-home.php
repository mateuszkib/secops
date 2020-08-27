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
                        <p class="home-header__span">POLSKA</p>
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
                <h2 class="home-header__who-header">Kim jesteśmy?</h2>
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
<section class="news">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="news__header">Aktualności</h2>
                <p class="news__paragraph">Najnowsze wieści dotyczące SecOps
                    lorem ipsum dolor sit amet. Dalsza
                    część tekstu.</p>
                <button class="button news__button">Wszystkie aktualności</button>

            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/pexel1.jpg" class="news__img-card card-img-top" />
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz.svg" /><span>08.08.2020</span> <span>Jan Kowalski</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/pexel2.jpg" class="news__img-card card-img-top" width="300" height="250" />
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/kalendarz.svg" /><span>08.08.2020</span> <span>Jan Kowalski</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>