<?php get_header(); ?>

<div class="container">
    <?php
	if (have_posts()) :
		while (have_posts()) :
			the_post();
            $second_section_title = get_field('second_section_title');
            $second_section_description = get_field('second_section_description');
            ?>           
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="product-single-title h-three"><?php the_title(); ?></h1>
                    <div class="product-single-content">
                        <?php the_content(); ?>
                        <a href="<?php the_field('order_button_url'); ?>" class="primary-button product-order-button">Order Now</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-gallery relative-parent owl-carousel owl-theme">
                        <?php 
                        $images = get_field('product_images');
                        $size = 'full';
                        if( $images ): ?>
                            <?php foreach( $images as $image_id ): ?>
                                <div class="product-gallery-item">
                                    <?php echo wp_get_attachment_image( $image_id, 'full' ); ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="product-second-section relative-parent">
                <h3 class="second-section-title"><?= $second_section_title; ?></h3>
                <div class="second-section-description">
                    <?= $second_section_description; ?>
                </div>
            </div>
		<?php endwhile;
	endif; ?>
</div>
<?php require_once("templates/get-in-touch.php"); ?>
<?php get_footer(); ?>