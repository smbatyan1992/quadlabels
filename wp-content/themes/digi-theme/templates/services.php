<?php
$ss_title = get_field('ss_title');
$ss_subtitle = get_field('ss_subtitle');
?>
<section class="services relative-parent">
    <div class="container">
        <div class="services-info">
            <h2 class="h-one service-section-title text-center"><?= $ss_title; ?></h2>
            <p class="service-subtitle text-center"><?= $ss_subtitle; ?></p>
        </div>
        <div class="card-block">
            <?php $args = array( 
                'post_type' => 'services',       
                'post_status' => 'publish',
                'posts_per_page' => -1,  
            );
            $loop = new WP_Query( $args );
            $s_count = 1;   
            while ( $loop->have_posts() ) : $loop->the_post();
            $service_color = get_field('service_color'); ?>
                <div class="card-1 card-s">
                    <div class="data-scrollmagic-pin-spacer">
                        <div class="item-s" style="background: <?= $service_color; ?>">
                            <div class="row">
                                <div class="col-lg-4 col-md-12">
                                    <div class="thumbnail-block">
                                        <?php echo get_the_post_thumbnail(); ?>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-12">
                                    <div class="service-info">
                                        <p class="s-count white-text"><?php if($s_count < 10): ?>0<?php endif; ?><?= $s_count; ?></p>
                                        <h3 class="service-title h-two white-text"><?php the_title(); ?></h3>
                                        <div class="service-description white-text"><?php echo excerpt(10) ?></div>
                                        <a class="service-button uppercase line-button white-text" href="<?php the_permalink(); ?>">explore</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $s_count++;
            endwhile;
            wp_reset_postdata() ?>
            <div class="card-1 card-s last-s">
                <div class="data-scrollmagic-pin-spacer">
                    <div class="item-s relative-parent">
                        <div class="last-services">
                            <div class="col-md-4">
                                <div class="service-info">
                                    <p class="s-count white-text">05</p>
                                    <h3 class="service-title h-two white-text">Our services</h3>
                                    <a class="service-button uppercase line-button white-text" href="<?php echo get_site_url(); ?>/services/">See our services</a>
                                </div>
                            </div>
                        </div>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/bg-last-s.png" class="last-s-bg" alt="label" title="label">
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-theme owl-carousel services-mobile-slide">
            <?php $args = array( 
                'post_type' => 'services',       
                'post_status' => 'publish',
                'posts_per_page' => -1,  
            );
            $loop = new WP_Query( $args );
            $s_count = 1;   
            while ( $loop->have_posts() ) : $loop->the_post();
            $service_color = get_field('service_color'); ?>
                <div class="item-s" style="background: <?= $service_color; ?>">
                     <div class="row">
                        <div class="col-md-4">
                            <div class="thumbnail-block">
                                <?php echo get_the_post_thumbnail(); ?>
                            </div>
                         </div>
                        <div class="col-md-8">
                            <div class="service-info">
                                <p class="s-count white-text"><?php if($s_count < 10): ?>0<?php endif; ?><?= $s_count; ?></p>
                                <h3 class="service-title h-two white-text"><?php the_title(); ?></h3>
                                <div class="service-description white-text"><?php the_content(); ?></div>
                                <a class="service-button uppercase line-button white-text" href="<?php the_permalink(); ?>">explore</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $s_count++;
            endwhile;
            wp_reset_postdata() ?>
        </div>
    </div>
    <img src="<?php echo get_template_directory_uri(); ?>/img/services-bg.png" class="services-bg" alt="label" title="label">
</section>
<div class="end-card-scroll-services"></div>