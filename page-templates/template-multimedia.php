<?php

/**
 * Template Name: Template Multimedia
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

    <div class="<?php echo esc_attr($container); ?> multimedia" id="multimedia">

        <section class="our-speakers">
            <div class="row">
                <div class="col-6">
                    <h2 class="header header-section-page">Nasi prelegenci</h2>
                </div>
                <div class="col-6 text-right">
                    <div class="input-container">
                        <input type="text" name="speaker" class="input" placeholder="Znajdź prelegenta" />
                    </div>
                </div>
            </div>
            <div class="row">


                <?php
                $speakers = new WP_Query([
                    'post_type' => 'speaker',
                    'post_per_page' => 8
                ]);
                if ($speakers->have_posts()) {
                    while ($speakers->have_posts()) {
                        $speakers->the_post(); ?>

                        <div class="col-3">
                            <div class="flip-card">
                                <div class="flip-card__inner">
                                    <div class="flip-card__front">
                                        <img src="<?php the_field('speaker_image'); ?>" class="our-speakers__image h-100 w-100" alt="Avatar">
                                    </div>
                                    <div class="flip-card__back p-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="flip-card__profession"><?php the_field('speaker_profession'); ?></h4>
                                            </div>
                                            <div class="col-12">
                                                <h3 class="header flip-card__name"><?php the_title(); ?></h3>
                                            </div>
                                            <div class="col-12">
                                                <p class="flip-card__body"><?php the_field('speaker_description'); ?></p>
                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <?php

                                                if (get_field('speaker_social_media')) {
                                                    $socialIcons = get_field('speaker_social_media');
                                                    foreach ($socialIcons as $icon) { ?>
                                                        <a href="<?php echo $icon['social_image_link']; ?>">
                                                            <img src="<?php echo $icon['social_image']; ?>" />
                                                        </a>
                                                <?php  }
                                                }
                                                ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                <?php }
                }
                ?>

            </div>
        </section>
        <section class="events-films">
            <div class="row mb-5">
                <div class="col-6">
                    <h2 class="header header-section-page">Filmy z eventów</h2>
                </div>
                <div class="col-3 text-right">
                    <div class="input-container">
                        <input type="text" name="film" class="input" placeholder="Znajdź film" />
                    </div>
                </div>
                <div class="col-3 text-right">
                    <div class="select-container">
                        <select class="select multimedia__select w-100">
                            <option selected disabled>Wybierz miasto</option>
                            <option>Warszawa</option>
                            <option>Poznań</option>
                            <option>Lublin</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="multimedia__card-event">
                        <div class="multimedia__image-container">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/event-film.png" class="multimedia__image" alt="Avatar">
                        </div>
                        <div class="multimedia__title-event-container mt-3">
                            <h3 class="header multimedia__title-event">Gdańsk MeetUp #13</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="events-gallery mt-5">
            <div class="row">
                <div class="col-6">
                    <h2 class="header header-section-page">Galeria z eventów</h2>
                </div>
                <div class="col-3 text-right">
                    <div class="input-container">
                        <input type="text" name="film" class="input" placeholder="Znajdź film" />
                    </div>
                </div>
                <div class="col-3 text-right">
                    <div class="select-container">
                        <select class="select multimedia__select w-100">
                            <option selected disabled>Wybierz miasto</option>
                            <option>Warszawa</option>
                            <option>Poznań</option>
                            <option>Lublin</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-3">
                    <div class="multimedia__card">
                        <div class="multimedia__image-container">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/event-film.png" class="multimedia__image" alt="Avatar">
                        </div>
                        <div class="multimedia__title-event-container mt-3">
                            <h3 class="header multimedia__title-event">Gdańsk MeetUp #13</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
