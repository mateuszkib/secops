<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>

<footer class="footer">

    <div class="<?php echo esc_attr($container); ?>">

        <div class="row">

            <div class="col-3">
                <?php if (is_active_sidebar('footer-1')) {
                    dynamic_sidebar('footer-1');
                } ?>
            </div>
            <div class="col-2">
                <?php if (is_active_sidebar('footer-2')) {
                    dynamic_sidebar('footer-2');
                } ?>
            </div>
            <div class="col-2">
                <?php if (is_active_sidebar('footer-3')) {
                    dynamic_sidebar('footer-3');
                } ?>
            </div>
            <div class="col-2">
                <?php if (is_active_sidebar('footer-4')) {
                    dynamic_sidebar('footer-4');
                } ?>
            </div>
            <div class="col-3 text-center footer-social-icons">
                <?php if (is_active_sidebar('footer-5')) {
                    dynamic_sidebar('footer-5');
                } ?>
            </div>

            <!--col end -->

        </div><!-- row end -->

    </div><!-- container end -->

</footer><!-- wrapper end -->
</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>