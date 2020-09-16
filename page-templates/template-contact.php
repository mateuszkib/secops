<?php

/**
 * Template Name: Template Contact
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<div class="contact" style="color: white;">
    <div class="container-fluid">
        <div class="row justify-content-center bg-white text-dark contact__form contact__who-bg">
            <div class="col-12 col-sm-12 col-md-6 text-center">
                <h2 class="contact__bold-text">Dołącz do newslettera</h2>
                <form class="form-inline contact__newsletter-sign" action="/action_page.php">
                    <div class="col-12">
                        <?php echo do_shortcode('[contact-form-7 id="310" title="Newsletter"]'); ?>
                        <!--<input id="email" name="email" type="text" placeholder="Twój adres e-mail" class="form-control contact__email">
                            <button class="button contact__sign-button">Zapisz się</button>-->
                    </div>
                </form>
            </div>
            <div class="col-12 col-sm-12 col-md-6 text-center">
                <h2 class="contact__bold-text">Skontaktuj się z nami</h2>
                <p class="mt-5">Dołącz do nas! <span class="text-success font-weight-bold">hello@secopspolska.pl</span>
                </p>
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-4 mt-5">
                        <p class="contact__yellow-text"><img src="<?php echo get_template_directory_uri(); ?>/images/email.svg" class="contact__yellow-img" />Adres e-mail</p>
                        <p class="font-weight-bold">hello@secopspolska.pl</p>
                    </div>
                    <div class="col-12 col-xl-4 mt-5">
                        <p class="contact__yellow-text"><img src="<?php echo get_template_directory_uri(); ?>/images/phone.svg" class="contact__yellow-img" />Numer telefonu</p>
                        <p class="font-weight-bold ml-3">+48 221 855 557</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class=" col-12 col-md-6">
                <div class="home-header__who-bg col-12">
                    <div class="col-6 offset-3">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/ilustracja_kimjestesmy.png" />
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <h2 class="contact__who-header">
                    <?php (get_field('who_title') ? the_field('who_title') : "");  ?>
                </h2>
                <p class="contact__who-text">
                    <?php (get_field('who_content') ? the_field('who_content') : ""); ?>
                </p>
                <div class="contact__text-center">
                    <?php
                    (get_field('who_button') ? the_field('who_button') : "");
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>