<?php
$ex_title = get_field('ex_title');
$ex_subtitle = get_field('ex_subtitle');
$ex_button = get_field('ex_button');
?>
<section class="experience green-section relative-parent">
    <div class="experience-info">
        <div class="container">
            <h3 class="white-text h-three text-center experience-title"><?= $ex_title; ?></h3>
            <p class="white-text experience-subtitle"><?= $ex_subtitle; ?></p>
            <a href="<?= $ex_button['url']; ?>" class="bordered-button experience-button white-bordered"><?= $ex_button['title']; ?></a>
        </div>
    </div>
    <?php
        if( have_rows('ex_images') ):
            $prcount = 1;
            while( have_rows('ex_images') ) : the_row();
                $image_ex = get_sub_field('image');
                $speed = get_sub_field('speed'); ?>
                <div class="parallax-layer layer-<?= $prcount; ?>" data-speed="<?php echo $speed; ?>">
                    <?php echo wp_get_attachment_image( $image_ex, 'full' ); ?>
                </div>
            <?php $prcount++; endwhile;
        endif; ?>
</section>