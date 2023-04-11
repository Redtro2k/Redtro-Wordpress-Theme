<?php 
function load_stylesheet() {
	wp_enqueue_style( 'stylesheets', get_template_directory_uri()  . '/dist/output.css', array(), true, 'all');
}
add_action( 'wp_enqueue_scripts', 'load_stylesheet' );

function load_scripts(){
	wp_enqueue_script('alphine', get_template_directory_uri(). '/dist/script.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'load_scripts');

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
	$content = str_replace('<a', '<a class="text-indigo-600"', $content);
	$content = str_replace('<img', '<img class="rounded-md shadow"', $content);
	return $content;
  }
  add_filter('the_content', 'add_tailwind_classes_to_content');


if(!function_exists('register_navwalker')){
	function register_navwalker() {
		require_once get_template_directory() . '/inc/jsc-navwalker.php';
	}
}
add_action('after_setup_theme', 'register_navwalker');

if(!function_exists('register_footer_navwalker')){
	function register_footer_navwalker() {
		require_once get_template_directory() . '/inc/jsc-footer-walker.php';
	}
}
add_action('after_setup_theme', 'register_footer_navwalker');

if(!function_exists('register_comment_walker')){
	function register_comment_walker(){
		require_once get_template_directory() .  '/inc/jsc-comment-walker.php';
	}
}
add_action('after_setup_theme', 'register_comment_walker');


function add_archive_link_class( $link_html ) {
    $link_html = str_replace( '<a', '<a class="text-gray-500 hover:text-gray-700"', $link_html );
    return $link_html;
}
add_filter( 'get_archives_link', 'add_archive_link_class' );

function my_custom_comment_list( $comment, $args, $depth ) {
    $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
    ?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> style="list-style-type:none;">
        <div class="flex space-x-3">
            <div class="flex-shrink-0 top-1">
			<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'], '', '', array('class' => 'rounded-full h-10 w-10') ); ?>                
		</div>
		<div>
				<div class="text-sm">
					<?php printf( '<a style="list-style-type:none;" class="font-medium text-gray-900" href="%s">%s</a>', esc_url( get_comment_author_url() ), esc_html( get_comment_author() ) ); ?>
				</div>
				<div class="text-sm text-gray-700">
					<?php comment_text(); ?>
				</div>
				<div class="space-x-2 text-sm flex">
                    <time datetime="<?php comment_time( 'c' ); ?>">
                        <?php printf( __( '%1$s at %2$s' ), get_comment_date(), get_comment_time() ); ?>
                    </time>
					<span class="font-medium text-gray-500">&middot;</span>
					<?php edit_comment_link( __( 'Edit' ), '<span class="font-medium text-gray-900">', '</span>' ); ?>
					<div class="font-medium text-gray-900">
                <?php
                comment_reply_link( array_merge( $args, array(
                    'add_below' => 'div-comment',
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth']
                ) ) );
                ?>
            </div>
				</div>
                </a>
            </div>
            <?php if ( '0' == $comment->comment_approved ) : ?>
                <p class="font-medium text-gray-900"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
            <?php endif; ?>

        </div>
    <?php
}


?>