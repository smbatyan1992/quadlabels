<?php 
$op_title = get_field('op_title');
$op_subtitle = get_field('op_subtitle');
$op_button = get_field('op_button');
?>
<section class="our-products">
    <div class="container">
            <div class="home-products-info">
                <h2 class="h-one products-title"><?= $op_title; ?></h2>
                <p class="hero-description"><?= $op_subtitle; ?></p>
            </div>
            <div class="row">
                <?php
                    $featured_posts = get_field('choose_products');
                    if( $featured_posts ): ?>
                        <?php foreach( $featured_posts as $post ): 
                            setup_postdata($post); ?>
                            <div class="col-lg-4">
                                <div class="product-item relative-parent">
                                    <div class="product-item-thumb">
                                        <?php echo get_the_post_thumbnail(); ?>
                                    </div>
                                    <h4 class="product-item-title"><?php the_title(); ?></h4>
                                    <a href="<?php the_permalink(); ?>" class="product-item-url"></a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php 
                        wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
            <a href="<?= $op_button['url']; ?>" class="primary-button hero-button"><?= $op_button['title']; ?></a>
    </div>
</section>