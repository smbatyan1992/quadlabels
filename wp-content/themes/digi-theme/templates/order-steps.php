<?php 
$os_title = get_field('os_title');
$os_image = get_field('os_image');
$ssb_title = get_field('ssb_title');
$ssb_description = get_field('ssb_description');
?>
<section class="order-steps green-section relative-parent">
    <div class="container">
        <h2 class="h-one os-title text-center"><?= $os_title; ?></h2>
        <div class="laptop-section relative-parent">
            <img src="<?php echo get_template_directory_uri(); ?>/img/laptop.png" class="laptop-image" alt="laptop" title="laptop">
            <img class="screen-image" src="<?= $os_image; ?>" alt="screen-image" title="screen-image">
            <?php
                if( have_rows('os_steps') ):
                    $count_setp = 1;
                    while( have_rows('os_steps') ) : the_row();
                        $screen_bg = get_sub_field('screen_bg'); ?>
                        <img class="screen-image screen-image-sl sc-bg-<?= $count_setp; ?>" src="<?= $screen_bg; ?>" alt="screen-image" title="screen-image">
                    <?php $count_setp++; endwhile;
                endif; ?>
            <div class="steps-block">
                <?php
                if( have_rows('os_steps') ):
                    $count_setp = 1;
                    while( have_rows('os_steps') ) : the_row();
                        $title = get_sub_field('title');
                        $icon = get_sub_field('icon'); ?>
                        <div class="step-item d-flex step-<?= $count_setp; ?>" data-sc="<?= $count_setp; ?>" data-aos="flip-left" data-aos-duration="1000">
                            <?php echo file_get_contents($icon); ?>
                            <p class="step-title"><?= $title; ?></p>
                        </div>
                    <?php $count_setp++; endwhile;
                endif; ?>
            </div>
        </div>
    </div>
    <div class="steps-block-mobile steps-block">
        <?php
        if( have_rows('os_steps') ):
            $count_setp = 1;
            while( have_rows('os_steps') ) : the_row();
            $title = get_sub_field('title');
            $icon = get_sub_field('icon'); ?>
            <div class="step-item d-flex step-<?= $count_setp; ?>" data-sc="<?= $count_setp; ?>" data-aos="flip-left" data-aos-duration="1000">
                <?php echo file_get_contents($icon); ?>
                <p class="step-title"><?= $title; ?></p>
            </div>
        <?php $count_setp++; endwhile;
        endif; ?>
    </div>
</section>
<section class="ssb white-text">
    <div class="ssb-main">
        <div class="container">
            <div class="d-flex ssb-flex">
                <p class="ssb-title"><?= $ssb_title; ?></p>
                <p class="ssb-description"><?= $ssb_description; ?></p>
            </div>
        </div>
    </div>
</section>