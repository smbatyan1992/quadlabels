<?php
/* Template Name: Blog */
get_header();
?>
<section class="blog-main">
    <div class="container">
        <h1 class="h-one inner-page-title text-center contact-us-page-title"><?php the_title(); ?></h1>
        <div class="row">
            <?php $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 30,
                'orderby' => 'date',
                'order' => 'DESC'
            );

            $query = new WP_Query( $args );

            if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                $thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>
                <div class="col-md-6">
                    <div class="blog-item">
                        <div class="blog-thumb">
                            <img src="<?= $thumb; ?>" class="blog-thumbnail" alt="<?php the_title(); ?>" alt="<?php the_title(); ?>">
                        </div>
                        <div class="blog-meta">
                            <h2 class="h-five blog-item-title"><?php the_title(); ?></h2>
                            <p class="blog-item-excerpt"><?php echo excerpt(10); ?></p>
                        </div>
                    </div>
                </div>
            <?php }
            }

            wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php require_once("templates/get-in-touch.php"); ?>
<?php get_footer(); ?>