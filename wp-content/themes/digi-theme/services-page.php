<?php
/* Template Name: Services */
get_header();
$description_background = get_field('description_background');
?>
<section class="our-services-content dark-section">
    <div class="container">
        <div class="services-description relative-parent">
            <div class="services-content">
                <?= $description_background; ?>
            </div>
            <img class="desc-background" src="<?= $description_background; ?>" alt="background" title="background">
        </div>
    </div>
</section>
<?php get_footer(); ?>