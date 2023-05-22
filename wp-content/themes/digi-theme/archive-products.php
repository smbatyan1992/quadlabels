<?php
/* Template Name: Products */
get_header();
?>
<section class="products-page">
    <div class="container">
        <h1 class="h-one text-center about-us-title products-page-title"><?php the_title(); ?></h1>
        <div class="products-row">
            <div class="row">
                <?php 
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $args = array(
                    'post_type' => 'products',
                    'posts_per_page' => 9,
                    'paged' => $paged,
                );

                $query = new WP_Query( $args );

                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post(); ?>
                        <div class="col-lg-4">
                            <div class="product-item relative-parent">
                                <div class="product-item-thumb">
                                    <?php echo get_the_post_thumbnail(); ?>
                                </div>
                                <h4 class="product-item-title"><?php the_title(); ?></h4>
                                <a href="<?php the_permalink(); ?>" class="product-item-url"></a>
                            </div>
                        </div>
                    <?php }
                    wp_reset_postdata();
                    $total_pages = $query->max_num_pages;
                    $prev_arrow = '<';
                    $next_arrow = '>';
                    if ( $total_pages > 1 ) {
                        $current_page = max( 1, get_query_var( 'paged' ) );
                        echo '<div id="pagination">';
                        echo paginate_links( array(
                            'base' => get_pagenum_link( 1 ) . '%_%',
                            'format' => '/page/%#%',
                            'current' => $current_page,
                            'total' => $total_pages,
                            'prev_text' => $prev_arrow,
                            'next_text' => $next_arrow,
                            'prev_next' => true,
                        ) );
                        echo '</div>';
                    }
                } else {
                    // No posts found
                } ?>
            </div>
        </div>
    </div>
</section>
<?php require_once("templates/get-in-touch.php"); ?>
<?php get_footer(); ?>