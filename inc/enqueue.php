<?php

/**
 * UnderStrap enqueue scripts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('understrap_scripts')) {
    /**
     * Load theme's JavaScript and CSS sources.
     */
    function understrap_scripts()
    {
        // Get the theme data.
        $the_theme     = wp_get_theme();
        $theme_version = $the_theme->get('Version');

        $css_version = $theme_version . '.' . filemtime(get_template_directory() . '/css/theme.min.css');
        wp_enqueue_style('understrap-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version);
        wp_enqueue_style('understrap-carousel-theme', get_template_directory_uri() . '/css/owl.theme.default.min.css');
        wp_enqueue_style('understrap-carousel', get_template_directory_uri() . '/css/owl.carousel.min.css');
        wp_enqueue_style('understrap-splide_css', get_template_directory_uri() . '/node_modules/@splidejs/splide/dist/css/splide.min.css');
        wp_enqueue_style('understrap-splide_video_css', get_template_directory_uri() . '/node_modules/@splidejs/splide-extension-video/dist/css/splide-extension-video.min.css');


        wp_enqueue_script('jquery');

        $js_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/theme.min.js');
        wp_enqueue_script('understrap-splide_js', get_template_directory_uri() . '/node_modules/@splidejs/splide/dist/js/splide.min.js', '', '1.0', true);
        wp_enqueue_script('understrap-splide_video_js', get_template_directory_uri() . '/node_modules/@splidejs/splide-extension-video/dist/js/splide-extension-video.min.js', '', '1.0', true);
        wp_enqueue_script('understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array('jquery'), $js_version, true);
        wp_enqueue_script('main_js', get_template_directory_uri() . '/js/custom-javascript.js', array('jquery'), '1.0', true);
        wp_enqueue_script('understrap-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.0', true);

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }

        wp_localize_script('understrap-scripts', 'secopsData', [
            'root_url' => get_site_url(),
        ]);
    }
} // End of if function_exists( 'understrap_scripts' ).

add_action('wp_enqueue_scripts', 'understrap_scripts');