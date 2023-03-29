<?php
$hero_title = get_field('hero_title');
$hero_description = get_field('hero_description');
$hero_button = get_field('hero_button');
$hero_image = get_field('hero_image');
?>
<section class="hero relative-parent">
    <div class="container">
        <div class="col-lg-7">
            <div class="hero-info">
                <h1 class="h1 uppercase hero-title"><?= $hero_title; ?></h1>
                <p class="hero-description"><?= $hero_description; ?></p>
                <a href="<?= $hero_button['url']; ?>" class="primary-button hero-button"><?= $hero_button['title']; ?></a>
            </div>
        </div>
        <div class="col-lg-5">
        
        </div>
    </div>
    <div class="gray-circle absolute-element"></div>
</section>