<?php get_header(); ?>

<div class="single-service-container">
    <?php
	if (have_posts()) :
		while (have_posts()) :
			the_post();
            $service_color = get_field('service_color');
            $two_column_title =  get_field('two_column_title');
            $first_block_text = get_field('first_block_text');
            $second_block_text = get_field('second_block_text');
            $faq_title = get_field('faq_title');
            $faq_subtitle = get_field('faq_subtitle');
            $s_p_title = get_field('s_p_title');
            $s_p_button = get_field('s_p_button'); ?>
            <section class="single-service-general">
                <div class="container">
                    <div class="item-s" style="background: <?= $service_color; ?>">
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div class="thumbnail-block">
                                    <?php echo get_the_post_thumbnail(); ?>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <div class="service-info">
                                    <h3 class="service-title h-two white-text"><?php the_title(); ?></h3>
                                    <div class="service-description white-text"><?php the_content(); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="service-two-descriptions">
                <div class="container">
                    <p class="service-two-col-title"><?= $two_column_title; ?></p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="two-col-service-text">
                                <p><?= $first_block_text; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="two-col-service-text">
                                <p><?= $second_block_text; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="service-products dark-section">
                <div class="container">
                    <h2 class="h-two s-p-title"><?= $s_p_title; ?></h2>
                </div>
                <div class="service-products-carousel owl-carousel owl-theme">
                     <?php
                    $featured_posts = get_field('servicea_products');
                    if( $featured_posts ): ?>
                            <?php foreach( $featured_posts as $post ): 
                            // Setup this post for WP functions (variable must be named $post).
                            setup_postdata($post); ?>
                             <div class="s-product-item relative-parent">
                                <div class="s-thumb">
                                     <?php echo get_the_post_thumbnail(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="p-button"></a>
                            </div>
                         <?php endforeach; ?>
                         <?php 
                        // Reset the global post object so that the rest of the page works correctly.
                        wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
                <div class="container">
                    <div class="s-p-button-container">
                        <a href="<?= $s_p_button['url']; ?>" class="primary-button s-p-button"><?= $s_p_button['title']; ?></a>
                    </div>
                </div>
            </section>
            <section class="single-service-faq">
                <div class="container">
                    <div class="service-faq-container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="acc-info">
                                    <?php if($faq_title): ?><h4 class="h-four acc-title"><?= $faq_title; ?></h4><?php endif; ?>
                                    <?php if($faq_subtitle): ?><p class="acc-description"><?= $faq_subtitle; ?></p><?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="accordion" id="accordionExample">
                                    <?php
                                    if( have_rows('faq_item') ):
                                        $acc_count = 1;
                                        while( have_rows('faq_item') ) : the_row();
                                            $title = get_sub_field('title');
                                            $description = get_sub_field('descriptio'); ?>
                                            <div class="accordion-item">
                                                <h4 class="accordion-header" id="heading<?= $acc_count; ?>">
                                                    <button class="accordion-button <?php if($acc_count == 1): echo 'active-acc-title'; endif; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $acc_count; ?>" aria-expanded="true" aria-controls="collapse<?= $acc_count; ?>">
                                                        <?= $title; ?>
                                                    </button>
                                                </h4>
                                                <div id="collapse<?= $acc_count; ?>" class="accordion-collapse collapse <?php if($acc_count == 1): echo 'show'; endif; ?>" aria-labelledby="heading<?= $acc_count; ?>" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <?= $description; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php 
                                        $acc_count++;
                                        endwhile;
                                    else :
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
		<?php endwhile;
	endif; ?>
</div>
<?php require_once("templates/get-in-touch.php"); ?>
<?php get_footer(); ?>