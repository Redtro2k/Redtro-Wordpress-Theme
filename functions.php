<?php 
function load_stylesheet() {
	wp_enqueue_style( 'stylesheets', get_template_directory_uri()  . '/dist/output.css', array(), true, 'all');
}
add_action( 'wp_enqueue_scripts', 'load_stylesheet' );

add_theme_support('menus');

register_nav_menus(
	array(
		'top-menu' => __('Top Menu', 'theme'),
		'footer-menu' => __('Footer Menu', 'theme')
	)
	);
?>