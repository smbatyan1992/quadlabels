<?php 
$news_title = get_field('news_title');
$news_button = get_field('news_button');
?>
<section class="news-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="news-section-info">
                    <h4 class="h-one news-title"><?= $news_title; ?></h4>
                    <a href="<?= $news_button['url']; ?>" class="primary-button news-button"><?= $news_button['title']; ?></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="latest-news">
                    <?php $args_news = array( 
                    'post_type' => 'post',       
                    'post_status' => 'publish',
                    'posts_per_page' => 1,  
                    );
                    $loop_news = new WP_Query( $args_news ); 
                    while ( $loop_news->have_posts() ) : $loop_news->the_post(); ?>
                    <div class="news-item">
                        <div class="news-thumbnail">
                            <?php echo get_the_post_thumbnail(); ?>
                        </div>
                        <div class="news-meta">
                            <h4 class="h-five news-item-title"><?php the_title(); ?></h4>
                            <p class="news-item-ex"><?php echo excerpt(10); ?></p>
                        </div>
                        <div class="news-item-button">
                            <a href="<?php the_permalink(); ?>" class="primary-button news-button-url">Read news</a>
                        </div>
                    </div>
                    <?php
                    endwhile;
                    wp_reset_postdata() ?>
                </div>
            </div>
        </div>
    </div>
</section>