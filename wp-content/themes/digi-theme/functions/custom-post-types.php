<?php
// ADD CUSTOM POST TYPE IF NEEDED
function custom_post_type_services() {
	$labels = [
		"name"               => _x("Services", "services"),
		"singular_name"      => _x("Services", "service"),
		"add_new"            => _x("Add New", "Service"),
		"add_new_item"       => __("Add New Service"),
		"edit_item"          => __("Edit Service"),
		"new_item"           => __("New Service"),
		"all_items"          => __("All Services"),
		"view_item"          => __("View Service"),
		"search_items"       => __("Search Services"),
		"not_found"          => __("No Services found"),
		"not_found_in_trash" => __("No Services found in the Trash"), 
		"parent_item_colon"  => "",
		"menu_name"          => "Services"
	];

	$args = [
		"labels"        => $labels,
		"description"   => "Holds our Services and Service specific data",
		"public"        => true,
		"menu_position" => 5,
		"supports"      => ["title", "editor", "thumbnail", "post-formats" ,"custom-fields"],
		"has_archive"   => true,
	];
	register_post_type("services", $args);
}
add_action("init", "custom_post_type_services");


function custom_post_type_industries() {
	$labels = [
		"name"               => _x("Industries", "industries"),
		"singular_name"      => _x("Industries", "industry"),
		"add_new"            => _x("Add New", "Industry"),
		"add_new_item"       => __("Add New Industry"),
		"edit_item"          => __("Edit Industry"),
		"new_item"           => __("New Industry"),
		"all_items"          => __("All Industries"),
		"view_item"          => __("View Industry"),
		"search_items"       => __("Search Industries"),
		"not_found"          => __("No Industries found"),
		"not_found_in_trash" => __("No Industries found in the Trash"), 
		"parent_item_colon"  => "",
		"menu_name"          => "Industries"
	];

	$args = [
		"labels"        => $labels,
		"description"   => "Holds our Industries and Industry specific data",
		"public"        => true,
		"menu_position" => 5,
		"supports"      => ["title", "editor", "thumbnail", "post-formats" ,"custom-fields"],
		"has_archive"   => true,
	];
	register_post_type("industries", $args);
}
add_action("init", "custom_post_type_industries");