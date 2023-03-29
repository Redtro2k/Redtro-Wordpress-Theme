<?php 
function load_stylesheet() {
	wp_enqueue_style( 'stylesheets', get_template_directory_uri()  . '/dist/output.css', array(), true, 'all');
}
add_action( 'wp_enqueue_scripts', 'load_stylesheet' );

function tailwind_menus(){
	$locations = array(
		'primary' => 'Header Primary Top Bar',
		'footer' => 'Footer Menu Items'
	);
	register_nav_menus( $locations);
}
add_action('init', 'tailwind_menus');

function add_additional_class_on_li($classes, $item, $args){
	if(isset($args->add_li_class)) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_tailwind_classes_to_content($content) {
	// Find all p elements in the content and add a "text-base" class to them
	$content = str_replace('<p>', '<p class="text-base">', $content);
	$content = str_replace('<a', '<a class="text-indigo-600"', $content);
	
	// Return the modified content
	return $content;
  }
  add_filter('the_content', 'add_tailwind_classes_to_content');


if(!function_exists('register_navwalker')) :
		function register_navwalker() {
			// require('inc/jsc-navwalker.php');
			require_once get_template_directory() . '/inc/jsc-navwalker.php';
		}
endif;
add_action('after_setup_theme', 'register_navwalker');

if(!function_exists('register_footer_navwalker')):
		function register_footer_navwalker() {
			require_once get_template_directory() . '/inc/jsc-footer-walker.php';
		}
endif;
add_action('after_setup_theme', 'register_footer_navwalker');

?>