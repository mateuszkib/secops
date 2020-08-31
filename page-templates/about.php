<?php

/**
 * Template Name: About Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

?>

<div class="container-fluid">
    <section class="meetups">

        <div class="row ">

            <div class="col-6">
                <div class="row">
                    <div class="col-6 offset-3 meetups__header-container">
                        <h2 class="header meetups__header">Informacje o MeetUpach</h2>
                    </div>
                    <div class="col-3 offset-3">
                        <div><img src="<?php echo get_template_directory_uri(); ?>/images/Squares.svg" /></div>
                        <h2 class="header meetups__header-info">Pierwsza informacja</h2>
                        <p class="meetups__header-info-desc">Massa hendrerit fermentum
                            accumsan, lectus. Volutpat in
                            at nisl pulvinar aenean et
                            lacus, sollicitudin nunc. Eget.</p>
                    </div>
                    <div class="col-3">
                        <div><img src="<?php echo get_template_directory_uri(); ?>/images/Bright.svg" /></div>
                        <h2 class="header meetups__header-info">Pierwsza informacja</h2>
                        <p class="meetups__header-info-desc">Massa hendrerit fermentum
                            accumsan, lectus. Volutpat in
                            at nisl pulvinar aenean et
                            lacus, sollicitudin nunc. Eget.</p>
                    </div>
                    <div class="col-3 offset-3 mt-3">
                        <div><img src="<?php echo get_template_directory_uri(); ?>/images/Contrast.svg" /></div>
                        <h2 class="header meetups__header-info">Pierwsza informacja</h2>
                        <p class="meetups__header-info-desc">Massa hendrerit fermentum
                            accumsan, lectus. Volutpat in
                            at nisl pulvinar aenean et
                            lacus, sollicitudin nunc. Eget.</p>
                    </div>
                    <div class="col-3 mt-3">
                        <div><img src="<?php echo get_template_directory_uri(); ?>/images/Signal.svg" /></div>
                        <h2 class="header meetups__header-info">Pierwsza informacja</h2>
                        <p class="meetups__header-info-desc">Massa hendrerit fermentum
                            accumsan, lectus. Volutpat in
                            at nisl pulvinar aenean et
                            lacus, sollicitudin nunc. Eget.</p>
                    </div>
                </div>
            </div>
            <div class="col-6" style="background: url('<?php echo get_template_directory_uri(); ?>/images/ilustracja_bg.svg') no-repeat bottom center; background-size: cover;">
                <img src="<?php echo get_template_directory_uri(); ?>/images/ilustracja_onas.png" />
            </div>

        </div><!-- .row end -->

    </section>

    <div class="line-break">
        <div class="container">
            <div class="row">
                <div class="col-12 line-break__border">
                </div>
            </div>
        </div>
    </div>

    <section class="community">
        <div class="row">
            <div class="col-4 offset-2">
                <h2 class="header community__header-left community__header-left--active" data-target="collapse-first"><span class="header community__header-left-span community__header-left-span--active">01</span> Społeczność</h2>
                <h2 class="header community__header-left" data-target="collapse-second"><span class="header community__header-left-span">02</span> Partnerzy</h2>
                <h2 class="header community__header-left" data-target="collapse-third"><span class="header community__header-left-span">03</span> Sponsorzy</h2>

            </div>
            <div class="col-3 offset-1">
                <div class="community-section my-collapse collapse-first our_community">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/ikona_nasza_spolecznosc.svg" />
                    <h3 class="header community__header-right">Nasza społeczność</h3>
                    <p class="community__desc-right">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Senectus laoreet tincidunt ipsum vel sit amet, id etiam. Mauris non sagittis sit semper et pellentesque faucibus. Amet faucibus augue pretium ultrices odio. Sed sed massa etiam arcu donec felis. Platea.</p>
                </div>
                <div class="partners-section my-collapse collapse-second our_partners d-none">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/ikona_nasi_partnerzy.svg" />
                    <h3 class="header community__header-right">Nasi partnerzy</h3>
                    <p class="community__desc-right">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Senectus laoreet tincidunt ipsum vel sit amet, id etiam. Mauris non sagittis sit semper et pellentesque faucibus. Amet faucibus augue pretium ultrices odio. Sed sed massa etiam arcu donec felis. Platea.</p>
                </div>
                <div class="sponsors-section my-collapse collapse-third our_sponsors d-none">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/ikona_nasi_sponsorzy.svg" />
                    <h3 class="header community__header-right">Nasi sponsorzy</h3>
                    <p class="community__desc-right">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Senectus laoreet tincidunt ipsum vel sit amet, id etiam. Mauris non sagittis sit semper et pellentesque faucibus. Amet faucibus augue pretium ultrices odio. Sed sed massa etiam arcu donec felis. Platea.</p>
                </div>
            </div>
            <div class="col-4 offset-2 mt-5">
                <a href="#"><button class="button community__button">Skontaktuj sie z nami</button></a>
            </div>
        </div>
    </section>
    <section class="who-we-are">
        <div class="row mt-5">
            <div class=" col-4 offset-2">
                <img src="<?php echo get_template_directory_uri(); ?>/images/ilustracja_kimjestesmy.png" />
            </div>
            <div class="col-3 offset-1">
                <h2 class="header home-header__who-header">Kim jesteśmy?</h2>
                <p class="home-header__who-text"><?php
                                                    if (get_field('who_we_are')) {
                                                        the_field('who_we_are');
                                                    }
                                                    ?></p>
                <button class="button home-header__who-button">Nasze eventy</button>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();
