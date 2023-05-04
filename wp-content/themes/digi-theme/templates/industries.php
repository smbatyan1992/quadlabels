<?php
$ind_title = get_field('ind_title');
$ind_subtitle = get_field('ind_subtitle');
?>
<section class="industries">
    <div class="container">
        <h3 class="h-one text-center ind-title"><?= $ind_title; ?></h3>
        <p class="ind-subtitle text-center"><?= $ind_subtitle; ?></p>
        <div class="owl-theme industries-carousel">
                <?php $args_ind = array( 
                    'post_type' => 'industries',       
                    'post_status' => 'publish',
                    'posts_per_page' => -1,  
                );
                $loop_ind = new WP_Query( $args_ind ); 
                while ( $loop_ind->have_posts() ) : $loop_ind->the_post(); ?>
                <div class="ind-item relative-parent">
                    <h4 class="h-four ind-title"><a href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a></h4>
                    <?php echo get_the_post_thumbnail(); ?>
                    <a href="<?php the_permalink(); ?>" class="ind-button-url"></a>
                </div>
                <?php
                endwhile;
                wp_reset_postdata() ?>
        </div>
    </div>
</section>