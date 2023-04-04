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
                    <h2 class="h-one products-title uppercase"><?= $op_title; ?></h2>
                    <p class="hero-description"><?= $op_subtitle; ?></p>
                    <a href="<?= $op_button['url']; ?>" class="primary-button hero-button"><?= $op_button['title']; ?></a>
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="card-block">
                <?php
                if( have_rows('op_products') ): ?>
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
            </div>
        </div>
    <!-- <ul class="card-block">
        <li class="card-1 card-h">
            <div class="data-scrollmagic-pin-spacer">
                <div class="item">
                    <img src="http://localhost/quadlabels/wp-content/uploads/2023/03/mortgage-application-family.jpg">
                </div>
            </div>   
        </li>
        <li class="card-2 card-h">
            <div class="data-scrollmagic-pin-spacer">
                <div class="item">
                   <img src="http://localhost/quadlabels/wp-content/uploads/2023/03/mortgage-application-family.jpg">
                </div>
            </div> 
        </li>
        <li class="card-3 card-h">
            <div class="data-scrollmagic-pin-spacer">
                <div class="item">
                <img src="http://localhost/quadlabels/wp-content/uploads/2023/03/mortgage-application-family.jpg">
                </div>
            </div> 
        </li>
        <li class="card-4 card-h">
            <div class="data-scrollmagic-pin-spacer">
                <div class="item">
                <img src="http://localhost/quadlabels/wp-content/uploads/2023/03/mortgage-application-family.jpg">
                </div>
            </div> 
        </li>
        <li class="card-5 card-h">
            <div class="data-scrollmagic-pin-spacer">
                <div class="item">
                <img src="http://localhost/quadlabels/wp-content/uploads/2023/03/mortgage-application-family.jpg">
                </div>
            </div> 
        </li>
    </ul> -->
    </div>
</section>
<div class="end-card-scroll"></div>