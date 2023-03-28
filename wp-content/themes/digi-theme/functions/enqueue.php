<?php
function enqueue_assets() {
	wp_enqueue_style("roboto", "//fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap", [], "", "all");
	wp_enqueue_style("poppins", "//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap", [], "", "all");
	wp_enqueue_style("bootstrap-style", "//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css", [], "", "all"); 
	wp_style_add_data( 'bootstrap-style', array( 'integrity', 'crossorigin' ) , array( 'sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC', 'anonymous' ) );
	wp_enqueue_style("font-awesome-5", "//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css", [], "", "all"); 
	wp_style_add_data( 'font-awesome-5', array( 'integrity', 'crossorigin' ) , array( 'sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU', 'anonymous' ) );
	wp_enqueue_style("stylecss", get_stylesheet_uri());
	
	// if (is_page("contact-us")) {
	// 	wp_enqueue_script("google-api", "//maps.googleapis.com/maps/api/js?key=AIzaSyAG1EChKTqRIrN8-DmjmlsqUYUB8ByPlFw","","",true);
	// 	wp_enqueue_script("map-settings-js", get_template_directory_uri() . "/js/google-maps-settings.js","","",true);
	// }
	wp_enqueue_script("jquery");

	wp_enqueue_style('owl-carousel-css', get_template_directory_uri() .'/css/owl.carousel.min.css','','',false);
	wp_enqueue_script('owl-carousel-js', get_template_directory_uri() .'/js/owl.carousel.min.js', '', '', true);

	//wp_enqueue_script("jquery-js", "//code.jquery.com/jquery-3.3.1.slim.min.js", "", "", true);
	//wp_script_add_data( 'jquery-js', array( 'integrity', 'crossorigin' ) , array( 'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo', 'anonymous' ) );
	wp_enqueue_script("bootstrap-5", "//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js", "", "", true);
    wp_script_add_data( 'bootstrap-5', array( 'integrity', 'crossorigin' ) , array( 'sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM', 'anonymous' ) );

	wp_enqueue_script("functions", get_template_directory_uri() . "/js/functions.js", "", "", true);
	wp_enqueue_script("customAjax", get_template_directory_uri() . "/js/custom-ajax.js", "", "", true);

	wp_localize_script("functions", "wp_var",
		[
			"ajax_url" => admin_url("admin-ajax.php"),
		]
	);
}
add_action("wp_enqueue_scripts", "enqueue_assets");
