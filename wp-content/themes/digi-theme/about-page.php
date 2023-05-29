<?php
/* Template Name: About us */
get_header();
$sect_1_image = get_field('sect_1_image');
$sec_1_description = get_field('sec_1_description');
$sect_2_image = get_field('sect_2_image');
$sec_2_description = get_field('sec_2_description');
$small_image_1 = get_field('small_image_1');
$sect_3_image = get_field('sect_3_image');
$sec_3_description = get_field('sec_3_description');
$small_image_2 = get_field('small_image_2');
$description_under_image = get_field('description_under_image');
$ph_title = get_field('ph_title');
$section_background = get_field('section_background');
?>
<section class="about-us-main">
    <div class="ab-section-1 relative-parent">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-description">
                        <h1 class="h-one about-page-title"><?php the_title(); ?></h1>
                        <?= $sec_1_description; ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-image">
                        <?php echo wp_get_attachment_image( $sect_1_image, 'full' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ab-section-2 relative-parent">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-image relative-parent">
                        <div class="about-image-group">
                            <?php echo wp_get_attachment_image( $sect_2_image, 'full' ); ?>
                            <div class="absolute-image" data-aos="fade-left">
                                <?php echo wp_get_attachment_image( $small_image_1, 'full' ); ?> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-description">
                        <?= $sec_2_description; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ab-section-3 relative-parent">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-description">
                        <?= $sec_3_description; ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-image relative-parent">
                        <?php echo wp_get_attachment_image( $sect_3_image, 'full' ); ?>
                        <div class="absolute-image" data-aos="fade-right">
                            <?php echo wp_get_attachment_image( $small_image_2, 'full' ); ?> 
                        </div>
                    </div>
                    <p class="description-under-image"><?= $description_under_image; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="philosophy">
    <div class="container">
        <h2 class="h-one text-center philosophy-title"><?= $ph_title; ?></h2>
        <div class="row">
            <?php
            if( have_rows('philosophy') ):
                while( have_rows('philosophy') ) : the_row();
                    $description = get_sub_field('description');
                    $title = get_sub_field('title'); ?>
                    <div class="col-lg-4 col-md-12" data-aos="fade-up" data-aos-duration="1000">
                        <div class="about-item">
                            <div class="about-title">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 12C21 7.03125 16.9688 3 12 3C7.03125 3 3 7.03125 3 12C3 16.9688 7.03125 21 12 21C16.9688 21 21 16.9688 21 12Z" stroke="#FF8400" stroke-width="1.6" stroke-miterlimit="10"/>
                                    <path d="M17.25 9L12.0061 15L9.75844 12.75M8.99766 15L6.75 12.75M14.3302 9L11.9138 11.7656" stroke="#FF8400" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <h5 class="h-five uppercase white-text ab-title"><?= $title; ?></h5>
                            </div>
                            <div class="ab-description">
                                <p><?= $description; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
            else :
            endif; ?>
        </div>
    </div>
</section>
<section class="about-advantages" style="background: url(<?= $section_background; ?>) center center / cover no-repeat;">
    <div class="container">
        <div class="row">
            <?php
            if( have_rows('advantages') ):
                while( have_rows('advantages') ) : the_row();
                    $icon = get_sub_field('icon');
                    $title = get_sub_field('title'); ?>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="about-adv-item text-center">
                            <?php echo file_get_contents($icon); ?>
                            <p class="adv-item-title"><?= $title; ?></p>
                        </div>
                    </div>
                <?php endwhile;
            else :
            endif; ?>
        </div>
    </div>
</section>
<?php require_once("templates/get-in-touch.php"); ?>
<?php get_footer(); ?>