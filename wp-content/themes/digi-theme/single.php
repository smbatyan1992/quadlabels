<?php get_header(); ?>

<div class="container">
	<div class="user-content">
		<?php
		if (have_posts()) :
			while (have_posts()) :
				the_post(); ?>
				<h1 class="single-post-title"><?php the_title(); ?></h1>
				<div class="post-author d-flex">
					<div class="profile-image">
						<?php
							$post_author_id = get_post_field( 'post_author', $post_id );
							$author_image = get_field('profile_image', 'user_'.$post_author_id);
							$position = get_field('position', 'user_'.$post_author_id);
							$get_author_gravatar = get_avatar_url($post_author_id, array('size' => 450));
							if($author_image){
								echo '<img src="'.$author_image.'" alt="'.get_the_title().'" />';
							} else {
								echo '<img src="'.$get_author_gravatar.'" alt="'.get_the_title().'" />';
							}
						?>
					</div>
					<div class="user-meta">
						<div class="user-name">
							<?php
								$first_name = get_user_meta($post_author_id, 'first_name', true);
								$last_name = get_user_meta($post_author_id, 'last_name', true);

								if ($first_name && $last_name) {
									echo '<p class="user-fl-name">';
									echo $first_name.' ';
									echo $last_name;
									echo '</p>';
								}
							?>
							<p class="user-position"><?= $position; ?></p>
						</div>
					</div>
				</div>
				<p><?php the_content(); ?></p><?php
			endwhile;
		endif; ?>
	</div>
	<div class="related-posts">
		<h4 class="h-one related-title uppercase text-center">What to read next</h4>
		<div class="row">
			<?php
				$post_id = get_the_ID(); // Get the current post ID
				$args = array(
					'post__not_in' => array($post_id), // Exclude the current post
					'posts_per_page' => 2, // Number of related posts to display
					'orderby' => 'rand' // Order randomly
				);

				$related_query = new WP_Query($args);

				// Display related posts
				if ($related_query->have_posts()) {
					while ($related_query->have_posts()) {
						$related_query->the_post();
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
					<?php }
					wp_reset_postdata(); // Reset the query
				} else {
					// No related posts found
					echo 'No related posts found.';
				} 
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>