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

function getLocations($parametr)
{
    $args = [
        'post_type' => 'city',
        'post_per_page' => '-1'
    ];
    $locations = new WP_Query($args);
    $html = "";
    if ($locations->have_posts()) {
        while ($locations->have_posts()) {
            $locations->the_post();
            $slug = get_post_field('post_name');
            $title = get_the_title();

            if ($_GET[$parametr] == $slug) {
                $html .= "<option value={$slug} selected>{$title}</option>";
            } else {
                $html .= "<option value={$slug}>{$title}</option>";
            }
        }
    }
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


if (is_front_page()) {
    get_template_part('global-templates/hero');
}
?>

<div class="wrapper" id="full-width-page-wrapper">

    <div class="<?php echo esc_attr($container); ?> multimedia" id="multimedia">
        <section class="our-speakers">
            <div class="row mb-4">
                <div class="col-6">
                    <h2 class="header header-section-page">Nasi prelegenci</h2>
                </div>
                <div class="col-6 text-right">
                    <div class="input-container">
                        <input type="text" name="speaker-name" class="multimedia-search-input input"
                            placeholder="Znajdź prelegenta" />
                    </div>
                </div>
            </div>
            <div class="row">

                <?php

                $paged1 = isset($_GET['paged1']) ? (int) $_GET['paged1'] : 1;
                $paged2 = isset($_GET['paged2']) ? (int) $_GET['paged2'] : 1;
                $paged3 = isset($_GET['paged3']) ? (int) $_GET['paged3'] : 1;


                $speakers = new WP_Query([
                    'post_type' => 'speaker',
                    'posts_per_page' => 6,
                    's' => $_GET['speaker-name'] ? $_GET['speaker-name'] : "",
                    'paged' => $_GET['paged1'] ? $_GET['paged1'] : 1,
                ]);
                if ($speakers->have_posts()) {
                    while ($speakers->have_posts()) {
                        $speakers->the_post(); ?>

                <div class="col-3">
                    <div class="flip-card">
                        <div class="flip-card__inner">
                            <div class="flip-card__front">
                                <img src="<?php the_field('speaker_image'); ?>" class="our-speakers__image h-100 w-100"
                                    alt="Avatar">
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


                <?php
                    }
                    wp_reset_postdata();
                }

                $pag_args1 = array(
                    'format'  => '?paged1=%#%',
                    'current' => $paged1,
                    'total'   => $speakers->max_num_pages,
                    'add_args' => array('paged2' => $paged2),
                ); ?>

                <div class="col-12 pagination mt-5">
                    <div class="pagination-flex">
                        <?php
                        echo paginate_links($pag_args1);
                        ?>
                    </div>
                </div>

            </div>
        </section>

        <?php

        $argsFilmsEvents = [
            'post_type' => 'multimedia',
            'posts_per_page' => 8,
            's' => $_GET['film'] ? $_GET['film'] : "",
            'orderBy' => 'date',
            'meta_key' => 'multimedia_type',
            'paged' => $_GET['paged2'] ? $_GET['paged2'] : 1,
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'multimedia_type',
                    'value' => 'film',
                    'compare' => '=',
                )
            )
        ];

        if ($_GET['cityFilm']) {
            $argsFilmsEvents['meta_query'][] = array(
                array(
                    'key' => 'related_cities',
                    'value' => '"' . getCityID("cityFilm") . '"',
                    'compare' => 'LIKE',
                )
            );
        }

        $eventsFilms = new WP_Query($argsFilmsEvents);
        ?>
        <section id="films-events" class="events-films">
            <div class="row mb-5">
                <div class="col-6">
                    <h2 class="header header-section-page">Filmy z eventów</h2>
                </div>
                <div class="col-3 text-right">
                    <div class="input-container">
                        <input type="text" id="film" name="film" class="multimedia-search-input input"
                            placeholder="Znajdź film" />
                    </div>
                </div>
                <div class="col-3 text-right">
                    <div class="select-container">
                        <select id="select-film" class="select multimedia__select multimedia__select--film w-100">
                            <option <?php echo !$_GET['cityFilm'] ? 'selected="selected"' : ''; ?> disabled>Wybierz
                                miasto
                            </option>
                            <?php echo getLocations('cityFilm'); ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $counter = 0;
                $countPost = $eventsFilms->post_count;
                if ($eventsFilms->have_posts()) {
                    while ($eventsFilms->have_posts()) {
                        $eventsFilms->the_post(); ?>
                <div data-id="<?php the_ID(); ?>" class="col-3 mb-4 show-multimedia-film">
                    <div class="multimedia__card-event">
                        <div class="multimedia__image-container">
                            <img src="https://img.youtube.com/vi/<?php the_field('multimedia_film'); ?>/maxresdefault.jpg"
                                class="multimedia__image" alt="Avatar">
                        </div>
                        <div class="multimedia__title-event-container mt-3">
                            <h3 class="header multimedia__title-event"><?php the_title(); ?></h3>
                        </div>
                    </div>
                </div>
                <?php if ($counter == 3) { ?>
                <div class="col-12 mt-5 mb-5 film-events-container">
                </div>
                <?php }
                        $counter++;
                    }
                    if ($countPost < 4) { ?>
                <div class="col-12 mt-5 mb-5 film-events-container">
                </div>
                <?php }
                }

                $pag_args2 = array(
                    'format'  => '?paged2=%#%',
                    'current' => $paged2,
                    'total'   => $eventsFilms->max_num_pages,
                    'add_args' => $_GET['cityFilm'] ? ['cityFilm' => $_GET['cityFilm']] : ''
                );
                wp_reset_postdata(); ?>

                <div class="col-12 pagination mt-5">
                    <div class="pagination-flex">
                        <?php
                        echo paginate_links($pag_args2);
                        ?>
                    </div>
                </div>
            </div>

        </section>
        <?php
        $argsGalleryEvents = [
            'post_type' => 'multimedia',
            'posts_per_page' => 8,
            's' => $_GET['gallery'] ? $_GET['gallery'] : "",
            'orderBy' => 'date',
            'meta_key' => 'multimedia_type',
            'order' => 'ASC',
            'paged' => $_GET['paged3'] ? $_GET['paged3'] : 1,
            'meta_query' => array(
                array(
                    'key' => 'multimedia_type',
                    'value' => 'picture',
                    'compare' => '=',
                )
            )
        ];


        if ($_GET['cityGallery']) {
            $argsGalleryEvents['meta_query'][] = array(
                array(
                    'key' => 'related_cities',
                    'value' => '"' . getCityID("cityGallery") . '"',
                    'compare' => 'LIKE',
                )
            );
        }

        $eventsGallery = new WP_Query($argsGalleryEvents);
        ?>
        <section class="events-gallery mt-5">
            <div class="row">
                <div class="col-6">
                    <h2 class="header header-section-page">Galeria z eventów</h2>
                </div>
                <div class="col-3 text-right">
                    <div class="input-container">
                        <input type="text" id="gallery" name="gallery" class="multimedia-search-input input"
                            placeholder="Znajdź galerię" />
                    </div>
                </div>
                <div class="col-3 text-right">
                    <div class="select-container">
                        <select id="select-gallery" class="select multimedia__select multimedia__select--gallery w-100">
                            <option <?php echo !$_GET['cityGallery'] ? 'selected="selected"' : ''; ?> disabled>Wybierz
                                miasto
                            </option>
                            <?php echo getLocations('cityGallery'); ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <?php
                $counter = 0;
                $countPost = $eventsGallery->post_count;
                if ($eventsGallery->have_posts()) {
                    while ($eventsGallery->have_posts()) {
                        $eventsGallery->the_post();
                ?>
                <div data-id="<?php the_ID(); ?>" class="col-3 show-multimedia-gallery">
                    <div class="multimedia__card">
                        <div class="multimedia__image-container">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="multimedia__title-event-container mt-3">
                            <h3 class="header multimedia__title-event"><?php the_title(); ?></h3>
                        </div>
                    </div>
                </div>
                <?php if ($counter == 3) { ?>
                <div class="col-12 mt-5 mb-5 gallery-events-container">
                </div>
                <?php }
                        $counter++;
                    }
                    if ($countPost < 4) { ?>
                <div class="col-12 mt-5 mb-5 gallery-events-container">
                </div>
                <?php }
                }

                $pag_args3 = array(
                    'format'  => '?paged3=%#%',
                    'current' => $paged3,
                    'total'   => $eventsGallery->max_num_pages,
                );
                ?>

                <div class="col-12 pagination mt-5">
                    <div class="pagination-flex">
                        <?php
                        echo paginate_links($pag_args3);
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();