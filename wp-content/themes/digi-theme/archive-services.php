<?php
/* Template Name: Services */
get_header();
$description_background = get_field('description_background', 'option');
$services_description = get_field('services_description', 'option');
?>
<section class="our-services-content dark-section">
    <div class="container">
        <div class="services-description relative-parent">
            <div class="services-content">
                <?= $services_description; ?>
            </div>
            <img class="desc-background" src="<?= $description_background; ?>" alt="background" title="background">
        </div>
    </div>
</section>
<section class="services-items">
	<div class="container">
		<div class="row">
			<?php $args = array( 
                'post_type' => 'services',       
                'post_status' => 'publish',
                'posts_per_page' => -1,  
            );
            $loop = new WP_Query( $args );
            $s_count = 1;   
            while ( $loop->have_posts() ) : $loop->the_post();
            $service_color = get_field('service_color'); ?>
			<div class="col-lg-4">
                <div class="item-s relative-parent" style="background: <?= $service_color; ?>">
                    <div class="thumbnail-block">
                        <?php echo get_the_post_thumbnail(); ?>
                    </div>
                    <div class="service-info">
                        <h2 class="service-title h-two white-text"><?php the_title(); ?></h2>
                        <div class="service-description white-text"><?php the_content(); ?></div>
                    </div>
					<a class="service-button uppercase line-button white-text" href="<?php the_permalink(); ?>">explore</a>
                </div>
			</div>
                <?php
                $s_count++;
            endwhile;
            wp_reset_postdata() ?>
		</div>
	</div>
</section>
<?php require_once("templates/get-in-touch.php"); ?>
<?php get_footer(); ?>