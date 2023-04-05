<?php
$ex_title = get_field('ex_title');
$ex_subtitle = get_field('ex_subtitle');
$ex_button = get_field('ex_button');
?>
<section class="experience green-section">
    <div class="container">
        <p>Test parrallax</p>
    </div>
    <div class="pr-1 images-item" id="scene-2">
        <?php
        if( have_rows('ex_images') ):
            $pr1 = 1;
            $value = 15;
            while( have_rows('ex_images') ) : the_row();
                $image_ex = get_sub_field('image');
                if($pr1 < 5): ?>
                    <div class="cover parallax-item" data-depth="0.1">
                        <?php echo wp_get_attachment_image( $image, 'thumbnail' ); ?>
                    </div>
                <?php endif;
                $pr1++;
            endwhile;
        endif; ?>
    </div>
    <div class="pr-2">

    </div>
</section>