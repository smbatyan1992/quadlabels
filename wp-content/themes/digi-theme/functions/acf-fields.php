<?php
if (function_exists("acf_add_options_page")) {
	acf_add_options_page([
		"page_title"    => "Options",
		"menu_title"    => "Theme Settings",
		"menu_slug"     => "theme-general-settings",
		"icon_url"      => "dashicons-images-alt2",
		"capability"    => "edit_posts",
		"redirect"      => false
	]);
}

// // change the color of the flex content header or add any other styles
// function my_acf_admin_head() {
	// add any styles withing a style tag.
// }
// add_action('acf/input/admin_head', 'my_acf_admin_head');