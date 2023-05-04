<?php 
$op_title = get_field('op_title');
$op_subtitle = get_field('op_subtitle');
$op_button = get_field('op_button');
?>
<section class="our-products">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="home-products-info">
                    <h2 class="h-one products-title"><?= $op_title; ?></h2>
                    <p class="hero-description"><?= $op_subtitle; ?></p>
                    <a href="<?= $op_button['url']; ?>" class="primary-button hero-button"><?= $op_button['title']; ?></a>
                </div>
            </div>
            <div class="col-lg-6">
                <?php
                if( have_rows('op_products') ): ?>
                <ul class="card-block">
                    <?php while( have_rows('op_products') ) : the_row();
                        $image = get_sub_field('product_image');
                        $url = get_sub_field('product_url'); ?>
                        <li class="card-1 card-h">
                            <div class="data-scrollmagic-pin-spacer">
                                <div class="item">
                                    <div class="card-img-block">
                                        <?php echo wp_get_attachment_image( $image, 'medium' ); ?>
                                    </div>
                                    <div class="product-button">
                                        <a class="uppercase line-button" href="<?= $url; ?>">explore</a>
                                    </div>    
                                </div>
                            </div>   
                        </li>
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
                <div class="product-carousel-mobile owl-theme owl-carousel">
                    <?php if( have_rows('op_products') ): ?>
                        <?php while( have_rows('op_products') ) : the_row();
                            $image = get_sub_field('product_image');
                            $url = get_sub_field('product_url'); ?>
                            <div class="product-slide-item">
                                <div class="card-img-block">
                                    <?php echo wp_get_attachment_image( $image, 'medium' ); ?>
                                </div>
                                <div class="product-button">
                                    <a class="uppercase line-button" href="<?= $url; ?>">explore</a>
                                </div>    
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="end-card-scroll"></div>