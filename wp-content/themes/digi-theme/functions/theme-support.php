<?php
function blank_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar([
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	]);
}
add_action("widgets_init", "blank_widgets_init");

/* Add Thumbnail Support */
add_theme_support("post-thumbnails"); 
add_image_size("full-slider", 1920, 1080, true); //(width, height, crop)

/* custom read more and excerpt heigh. 
 * usage: echo my_excerpts(20, $post) or echo my_excerpts(20)
 * or use wp_trim_words() @ https://developer.wordpress.org/reference/functions/wp_trim_words/
 */
function custom_excerpt($excerpt_length, $content = false) {
	global $post;
	$mycontent = $post->post_excerpt;
	$link = $post->guid;

	$mycontent = __($post->post_content);
	$mycontent = strip_shortcodes($mycontent);
	$mycontent = str_replace("]]>", "]]&gt;", $mycontent);
	$mycontent = strip_tags($mycontent);
	$words = explode(" ", $mycontent, $excerpt_length + 1);
	if(count($words) > $excerpt_length) :
	array_pop($words); 
	array_push($words, "...");
	$mycontent = implode(" ", $words);
	endif;

	// Make sure to return the content
	return $mycontent;
}

/* change e-mail name */
function res_fromemail($email) {
	$wpfrom = get_option("admin_email");
	return $wpfrom;
}
add_filter("wp_mail_from", "res_fromemail");

function res_fromname($email) {
	$wpfrom = get_option("blogname");
	return $wpfrom;
}
add_filter("wp_mail_from_name", "res_fromname");

// Breadcrumbs
function custom_breadcrumbs() {
	// Settings
	$prefix             = "";
	$separator          = "&gt;";
	$breadcrums_id      = "breadcrumbs";
	$breadcrums_class   = "breadcrumbs";
	$home_title         = "Home";
		
	// If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
	$custom_taxonomy    = "product_cat";
		 
	// Get the query & post information
	global $post,$wp_query;
		 
	// Do not display on the homepage
	if (!is_front_page()) {
		 
		// Build the breadcrums
		echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
			 
		// Home page
		echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
		echo '<li class="separator separator-home"> ' . $separator . ' </li>';
			 
		if (is_archive() && !is_tax() && !is_category() && !is_tag()) {
			echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
		} elseif (is_archive() && is_tax() && !is_category() && !is_tag()) {
			// If post is a custom post type
			$post_type = get_post_type();
				
			// If it is a custom post type display name and link
			if ($post_type != "post") {
				$post_type_object = get_post_type_object($post_type);
				$post_type_archive = get_post_type_archive_link($post_type);
				
				echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
				echo '<li class="separator"> ' . $separator . ' </li>';
			}
				
			$custom_tax_name = get_queried_object()->name;
			echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
				
		} elseif (is_single()) {
			// If post is a custom post type
			$post_type = get_post_type();
				
			// If it is a custom post type display name and link
			if ($post_type != "post") {
				$post_type_object = get_post_type_object($post_type);
				$post_type_archive = get_post_type_archive_link($post_type);
				
				echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
				echo '<li class="separator"> ' . $separator . ' </li>';
			}
				
			// Get post category info
			$category = get_the_category();
			 
			if (!empty($category)) {
				// Get last category post is in
				$last_category = end(array_values($category));
					
				// Get parent any categories and create array
				$get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ","), ",");
				$cat_parents = explode(",", $get_cat_parents);
					
				// Loop through parent categories and store in variable $cat_display
				$cat_display = "";
				foreach($cat_parents as $parents) {
					$cat_display .= '<li class="item-cat">'.$parents.'</li>';
					$cat_display .= '<li class="separator"> ' . $separator . ' </li>';
				}
			 
			}
				
			// If it's a custom post type within a custom taxonomy
			$taxonomy_exists = taxonomy_exists($custom_taxonomy);
			if (empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
				$taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
				$cat_id         = $taxonomy_terms[0]->term_id;
				$cat_nicename   = $taxonomy_terms[0]->slug;
				$cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
				$cat_name       = $taxonomy_terms[0]->name;
			}
				
			// Check if the post is in a category
			if (!empty($last_category)) {
				echo $cat_display;
				echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
			// Else if post is in a custom taxonomy
			} elseif (!empty($cat_id)) {
				echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
				echo '<li class="separator"> ' . $separator . ' </li>';
				echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
			} else {
				echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
			}
				
		} elseif (is_category()) {
			// Category page
			echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
		} elseif (is_page()) {
			// Standard page
			if ($post->post_parent) {
				// If child page, get parents 
				$anc = get_post_ancestors( $post->ID );
					 
				// Get parents in the right order
				$anc = array_reverse($anc);
					 
				// Parent page loop
				foreach($anc as $ancestor) {
					$parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
					$parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
				}
					 
				// Display parent pages
				echo $parents;
					 
				// Current page
				echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
			} else {
				// Just display current page if not parents
				echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
			}
				 
		} elseif (is_tag()) {
			// Tag page
				 
			// Get tag information
			$term_id        = get_query_var("tag_id");
			$taxonomy       = "post_tag";
			$args           = "include=" . $term_id;
			$terms          = get_terms( $taxonomy, $args );
			$get_term_id    = $terms[0]->term_id;
			$get_term_slug  = $terms[0]->slug;
			$get_term_name  = $terms[0]->name;
				 
			// Display the tag name
			echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
			 
		} elseif (is_day()) {
			// Day archive
				 
			// Year link
			echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
			echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
				 
			// Month link
			echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
			echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
				 
			// Day display
			echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
				 
		} elseif (is_month()) {
			// Month Archive

			// Year link
			echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
			echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
				 
			// Month display
			echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
				 
		} elseif (is_year()) {
				 
			// Display year archive
			echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
				 
		} elseif (is_author()) {
			// Auhor archive
				 
			// Get the author information
			global $author;
			$userdata = get_userdata( $author );
				 
			// Display author name
			echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
			 
		} elseif (get_query_var("paged")) {
			// Paginated archives
			echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
				 
		} elseif (is_search()) {
			// Search results page
			echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
			 
		} elseif (is_404()) {
				 
			// 404 page
			echo '<li>Error 404</li>';
		}
		echo '</ul>';
	}
}

//ORDERBY taxonomy term name. usage "orderby" => "my-taxonomy-slug"
// function posts_clauses_with_tax($clauses, $wp_query) {
// 	global $wpdb;
// 	//array of sortable taxonomies
// 	$taxonomies = ["my-taxonomy-slug"]; // be sure to change "my-taxonomy-slug"
// 	if (isset($wp_query->query["orderby"]) && in_array($wp_query->query["orderby"], $taxonomies)) {
// 		$clauses["join"] .= "
// 			LEFT OUTER JOIN {$wpdb->term_relationships} AS rel2 ON {$wpdb->posts}.ID = rel2.object_id
// 			LEFT OUTER JOIN {$wpdb->term_taxonomy} AS tax2 ON rel2.term_taxonomy_id = tax2.term_taxonomy_id
// 			LEFT OUTER JOIN {$wpdb->terms} USING (term_id)
// 		";
// 		$clauses["where"] .= " AND (taxonomy = '{$wp_query->query['orderby']}' OR taxonomy IS NULL)";
// 		$clauses["groupby"] = "rel2.object_id";
// 		$clauses["orderby"] = "GROUP_CONCAT({$wpdb->terms}.name ORDER BY name ASC) ";
// 		$clauses["orderby"] .= ("ASC" == strtoupper($wp_query->get("order"))) ? "ASC" : "DESC";
// 	}
// 	return $clauses;
// }
// add_filter("posts_clauses", "posts_clauses_with_tax", 10, 2);