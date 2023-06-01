<?php
$hero_title = get_field('hero_title');
$hero_description = get_field('hero_description');
$hero_button = get_field('hero_button');
$hero_image = get_field('hero_image');
?>
<section id="hero" class="hero relative-parent">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="hero-info">
                    <h1 class="h-one hero-title"><?= $hero_title; ?></h1>
                    <p class="hero-description"><?= $hero_description; ?></p>
                    <a href="<?= $hero_button['url']; ?>" class="primary-button hero-button"><?= $hero_button['title']; ?></a>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="hero-image-section relative-parent">
                    <div class="circle-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo-around.svg" class="logo-around" alt="logo" title="logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo-center.svg" class="logo-center" alt="logo" title="logo">
                    </div>
                    
                    <img src="<?php echo get_template_directory_uri(); ?>/img/shadow_box.webp" class="shadow-box" alt="shadow-box" title="shadow-box">
                    <?php if( $hero_image ) {
                        echo wp_get_attachment_image( $hero_image, 'full', '', array('class' => 'bottle-image') );
                    }?>
                </div>
            </div>
        </div>
    </div>
    <img class="label-main" src="<?php echo get_template_directory_uri(); ?>/img/label-main.png" alt="label" title="label">
    <div class="label-line"></div>
    <div class="gray-circle absolute-element"></div>
    <canvas id="canvas"></canvas>
</section>