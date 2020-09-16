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

<div class="container-fluid position-relative" style="max-width: 1920px;">
    <div class="w-100">
        <img src="<?php echo get_template_directory_uri(); ?>/images/bg.png" class="position-absolute" style="right: 0; top: 32%;" />
    </div>
    <section class="meetups">
        <div class="row ">
            <div class="col-12 col-lg-6">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 meetups__header-container">
                        <h2 class="header meetups__header">Informacje o MeetUpach</h2>
                    </div>

                    <?php

                    $information = get_field('info_about_meetup');
                    foreach ($information as $key => $info) { ?>
                        <div class="col-6 col-lg-4 meetups__column mb-3">
                            <div><img src="<?php echo $info['image']['url']; ?>" />
                            </div>
                            <h2 class="header meetups__header-info"><?php echo $info['title']; ?></h2>
                            <p class="meetups__header-info-desc"><?php echo $info['content']; ?></p>
                        </div>

                    <?php } ?>
                </div>
            </div>
            <div class="col-10 offset-1 offset-md-1 offset-lg-0 col-lg-6" style="background: url('<?php echo get_template_directory_uri(); ?>/images/ilustracja_bg.svg') no-repeat bottom center; background-size: cover;">
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
            <div class="col-10 offset-1 col-lg-4 offset-lg-2">
                <h2 class="header community__header-left community__header-left--active" data-target="collapse-first">
                    <span class="header community__header-left-span community__header-left-span--active">01</span>
                    Społeczność
                </h2>
                <h2 class="header community__header-left" data-target="collapse-second"><span class="header community__header-left-span">02</span> Partnerzy</h2>
                <h2 class="header community__header-left" data-target="collapse-third"><span class="header community__header-left-span">03</span> Patronite</h2>

            </div>
            <div class="community__description-container col-10 offset-1 col-lg-3 offset-lg-1">
                <div class="community-section my-collapse collapse-first our_community">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/ikona_nasza_spolecznosc.svg" />
                    <h3 class="header community__header-right">Nasza społeczność</h3>
                    <p class="community__desc-right">
                        <?php
                        (get_field('our_community')) ?
                            the_field('our_community') :
                            ""; ?>
                    </p>
                </div>
                <div class="partners-section my-collapse collapse-second our_partners d-none">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/ikona_nasi_partnerzy.svg" />
                    <h3 class="header community__header-right">Nasi partnerzy</h3>
                    <p class="community__desc-right">
                        <?php
                        (get_field('our_partners')) ?
                            the_field('our_partners') :
                            ""; ?>
                    </p>
                </div>
                <div class="sponsors-section my-collapse collapse-third our_sponsors d-none">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/ikona_nasi_sponsorzy.svg" />
                    <h3 class="header community__header-right">Patronite</h3>
                    <p class="community__desc-right">
                        <?php
                        (get_field('our_sponsors')) ?
                            the_field('our_sponsors') :
                            ""; ?>
                    </p>
                </div>
            </div>
            <div class="col-6 offset-3 col-md-6 offset-md-1 col-lg-4 offset-lg-2 mt-5">
                <a href="/kontakt"><button class="button community__button">Skontaktuj sie z nami</button></a>
            </div>
        </div>
    </section>
    <section class="who-we-are">
        <div class="row mt-5">
            <div class="col-10 offset-1 col-lg-4 offset-lg-2">
                <img src="<?php echo get_template_directory_uri(); ?>/images/ilustracja_kimjestesmy.png" />
            </div>
            <div class="col-10 offset-1 col-lg-4 offset-lg-1 mt-5">
                <h2 class="header home-header__who-header">
                    <?php (get_field('who_title') ? the_field('who_title') : "");  ?></h2>
                <p class="home-header__who-text"><?php (get_field('who_content') ? the_field('who_content') : ""); ?>
                </p>
                <?php
                (get_field('who_button') ? the_field('who_button') : "");
                ?>
            </div>
        </div>
    </section>
    <section class="join-us">
        <div class="row">

            <?php

            $joinUsBoxes = get_field('join_us_box');
            if (have_rows('join_us_box')) :

                $i = 0;
                while (have_rows('join_us_box')) : the_row(); ?>

                    <div class="col-md-10 offset-1 col-lg-4 offset-lg-0 <?= ($i == 0) ? 'offset-lg-2' : ''; ?> join-us-box mr-5">
                        <div class="row">
                            <div class="col-3 offset-1 text-center">
                                <?php $image = get_sub_field('image'); ?>
                                <img src="<?php echo $image["url"]; ?>" />
                            </div>
                            <div class="col-6">
                                <h2 class="header join-us-box__header"><?php the_sub_field('title'); ?></h2>
                            </div>
                            <div class="col-6 offset-4">
                                <p class="join-us-box__desc"><?php the_sub_field('content'); ?></p>
                            </div>
                            <div class="col-3 offset-1 text-center"><img src="<?php echo get_template_directory_uri(); ?>/images/sygnet_szary.svg" />
                            </div>
                            <div class="col-6"><?php the_sub_field('join_link'); ?></div>
                        </div>
                    </div>

            <?php $i++;
                endwhile;

            endif;
            ?>

        </div>
    </section>
    <section class="info-about-training">
        <div class="container">
            <div class="row">
                <div class="col-10 offset-1 col-lg-5 offset-lg-0">
                    <h2 class="header info-about-training__header"><?php the_field('info_title'); ?></h2>
                    <p class="info-about-training__desc"><?php the_field('info_content'); ?></p>
                    <?php the_field('info_button'); ?>
                </div>
                <div class="col-8 offset-2 col-lg-5 offset-lg-0 info-about-training__image-box mt-5">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/ilustracja_infoonaszychszkoleniach.png" />
                </div>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();
