<?php
/* Template Name: Contact us */
get_header();
$cu_address = get_field('address', 'option');
$cu_phone_number_1 = get_field('phone_number_1', 'option');
$cu_phone_number_2 = get_field('phone_number_2', 'option');
$cu_email_address = get_field('email_address', 'option');
$contact_us_page_background = get_field('contact_us_page_background', 'option');
?>
<section class="contact-us relative-parent">
    <div class="container">
        <h1 class="h-one inner-page-title text-center contact-us-page-title"><?php the_title(); ?></h1>
        <div class="row">
            <div class="col-lg-6">
                <div class="main-contact-info dark-section">
                    <h3 class="h-four contact-info-title">Our Address</h3>
                    <div class="cu-address-block cu-item d-flex">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 1.5C9.81276 1.50258 7.71584 2.3726 6.16923 3.91922C4.62261 5.46584 3.75259 7.56276 3.75001 9.75C3.74739 11.5374 4.33124 13.2763 5.41201 14.7C5.41201 14.7 5.63701 14.9963 5.67376 15.039L12 22.5L18.3293 15.0353C18.3623 14.9955 18.588 14.7 18.588 14.7L18.5888 14.6978C19.669 13.2747 20.2526 11.5366 20.25 9.75C20.2474 7.56276 19.3774 5.46584 17.8308 3.91922C16.2842 2.3726 14.1873 1.50258 12 1.5ZM12 12.75C11.4067 12.75 10.8266 12.5741 10.3333 12.2444C9.83995 11.9148 9.45543 11.4462 9.22837 10.8981C9.00131 10.3499 8.9419 9.74667 9.05765 9.16473C9.17341 8.58279 9.45913 8.04824 9.87869 7.62868C10.2982 7.20912 10.8328 6.9234 11.4147 6.80764C11.9967 6.69189 12.5999 6.7513 13.1481 6.97836C13.6962 7.20542 14.1648 7.58994 14.4944 8.08329C14.8241 8.57664 15 9.15666 15 9.75C14.999 10.5453 14.6826 11.3078 14.1202 11.8702C13.5578 12.4326 12.7954 12.749 12 12.75Z" fill="white"/>
                        </svg>
                        <p class="cu-address"><?= $cu_address; ?></p>
                    </div>
                    <div class="cu-phone-block d-flex cu-item">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 10.999H22C22 5.869 18.127 2 12.99 2V4C17.052 4 20 6.943 20 10.999Z" fill="white"/>
                            <path d="M13 7.99999C15.103 7.99999 16 8.89699 16 11H18C18 7.77499 16.225 5.99999 13 5.99999V7.99999ZM16.422 13.443C16.2299 13.2683 15.9774 13.1752 15.7178 13.1832C15.4583 13.1912 15.212 13.2998 15.031 13.486L12.638 15.947C12.062 15.837 10.904 15.476 9.71204 14.287C8.52004 13.094 8.15904 11.933 8.05204 11.361L10.511 8.96699C10.6975 8.78612 10.8062 8.53982 10.8142 8.2802C10.8222 8.02059 10.7289 7.76804 10.554 7.57599L6.85904 3.51299C6.68408 3.32035 6.44092 3.2035 6.18119 3.18725C5.92146 3.17101 5.66564 3.25665 5.46804 3.42599L3.29804 5.28699C3.12515 5.46051 3.02196 5.69145 3.00804 5.93599C2.99304 6.18599 2.70704 12.108 7.29904 16.702C11.305 20.707 16.323 21 17.705 21C17.907 21 18.031 20.994 18.064 20.992C18.3086 20.9783 18.5394 20.8747 18.712 20.701L20.572 18.53C20.7415 18.3325 20.8273 18.0768 20.8113 17.817C20.7952 17.5573 20.6785 17.3141 20.486 17.139L16.422 13.443Z" fill="white"/>
                        </svg>
                        <div class="cu-phones">
                            <a href="tel:<?= $cu_phone_number_1; ?>" class="cu-phone"><?= $cu_phone_number_1; ?></a>
                            <a href="tel:<?= $cu_phone_number_2; ?>" class="cu-phone"><?= $cu_phone_number_2; ?></a>
                        </div>
                    </div>
                    <div class="cu-email-block cu-item d-flex">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 4H2V20H22V4ZM20 8L12 13L4 8V6L12 11L20 6V8Z" fill="white"/>
                        </svg>
                        <a href="mailto:<?= $cu_email_address; ?>" class="cu-email"><?= $cu_email_address; ?></a>
                    </div>
                    <div class="social">
                        <span>Let’s Connect:</span>
                            <?php
                            if( have_rows('social_icons', 'option') ):
                                while( have_rows('social_icons', 'option') ) : the_row();
                                    $icon = get_sub_field('icon');
                                    $social_url = get_sub_field('social_url'); ?>
                                    <a href="<?= $social_url; ?>" class="social-icon"><?= $icon; ?></a>
                                <?php endwhile;
                            endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="map-section">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3290.223044073709!2d-118.633205!3d34.446485599999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c27fb16fb3ab23%3A0xd38f7b6409771a83!2s28410%20Witherspoon%20Pkwy%2C%20Valencia%2C%20CA%2091355%2C%20USA!5e0!3m2!1sen!2sam!4v1682629086484!5m2!1sen!2sam" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <img src="<?= $contact_us_page_background; ?>" class="contact-bg">
</section>
<?php require_once("templates/get-in-touch.php"); ?>
<?php get_footer(); ?>