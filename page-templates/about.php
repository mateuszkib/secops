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

<section class="meetups">
    <div class="container-fluid">

        <div class="row ">

            <div class="col-6">
                <div class="row">
                    <div class="col-6 offset-3 meetups__header-container">
                        <h2 class="meetups__header">Informacje o MeetUpach</h2>
                    </div>
                    <div class="col-3 offset-3">
                        <div><img src="<?php echo get_template_directory_uri(); ?>/images/Squares.svg" /></div>
                        <h2 class="meetups__header-info">Pierwsza informacja</h2>
                        <p class="meetups__header-info-desc">Massa hendrerit fermentum
                            accumsan, lectus. Volutpat in
                            at nisl pulvinar aenean et
                            lacus, sollicitudin nunc. Eget.</p>
                    </div>
                    <div class="col-3">
                        <div><img src="<?php echo get_template_directory_uri(); ?>/images/Bright.svg" /></div>
                        <h2 class="meetups__header-info">Pierwsza informacja</h2>
                        <p class="meetups__header-info-desc">Massa hendrerit fermentum
                            accumsan, lectus. Volutpat in
                            at nisl pulvinar aenean et
                            lacus, sollicitudin nunc. Eget.</p>
                    </div>
                    <div class="col-3 offset-3 mt-3">
                        <div><img src="<?php echo get_template_directory_uri(); ?>/images/Contrast.svg" /></div>
                        <h2 class="meetups__header-info">Pierwsza informacja</h2>
                        <p class="meetups__header-info-desc">Massa hendrerit fermentum
                            accumsan, lectus. Volutpat in
                            at nisl pulvinar aenean et
                            lacus, sollicitudin nunc. Eget.</p>
                    </div>
                    <div class="col-3 mt-3">
                        <div><img src="<?php echo get_template_directory_uri(); ?>/images/Signal.svg" /></div>
                        <h2 class="meetups__header-info">Pierwsza informacja</h2>
                        <p class="meetups__header-info-desc">Massa hendrerit fermentum
                            accumsan, lectus. Volutpat in
                            at nisl pulvinar aenean et
                            lacus, sollicitudin nunc. Eget.</p>
                    </div>
                </div>
            </div>
            <div class="col-6"
                style="background: url('<?php echo get_template_directory_uri(); ?>/images/ilustracja_bg.svg') no-repeat bottom center; background-size: cover;">
                <img src="<?php echo get_template_directory_uri(); ?>/images/ilustracja_onas.png" />
            </div>

        </div><!-- .row end -->

    </div><!-- #content -->
</section>
<section class="community">

</section>


<?php
get_footer();