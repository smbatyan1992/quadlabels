<?php get_header(); ?>

<div class="container"><?php
	if (have_posts()) :
		while (have_posts()) :
			the_post();
			$thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>
                <div class="col-md-6">
                    <div class="blog-item relative-parent">
                        <div class="blog-thumb">
                            <img src="<?= $thumb; ?>" class="blog-thumbnail" alt="<?php the_title(); ?>" alt="<?php the_title(); ?>">
                        </div>
                        <div class="blog-meta">
                            <h2 class="h-five blog-item-title"><?php the_title(); ?></h2>
                            <p class="blog-item-excerpt"><?php echo excerpt(10); ?></p>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="post-url"></a>
                    </div>
                </div>
		<?php endwhile;
	endif; ?>
</div>

<?php get_footer(); ?>