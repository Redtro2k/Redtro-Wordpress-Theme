<?php 
class jsc_wp_nav_menu_walker extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = null){
        $tmp_class = 'child'.$depth;
        $output .= "<ul class='".$tmp_class."'>";
    }
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0){
        // Set default classes for non-current items
        $classes = array('text-gray-300', 'hover:bg-gray-700', 'hover:text-white', 'block', 'rounded-md');
    
        // Add classes for current item
        if (in_array('current-menu-item', $item->classes)) {
            $classes = array('bg-gray-900', 'text-white', 'rounded-md');
        }
    
        // Add desktop-specific classes
        if (!wp_is_mobile()) {
            $classes[] = 'px-3';
            $classes[] = 'py-2';
            $classes[] = 'text-sm';
            $classes[] = 'font-medium';
        }
    
        $class_names = join(' ', $classes);
        $output .= "<li class='$class_names'><a href='".$item->url."'>".$item->title."</a>";
    }
    
    function end_el(&$output, $item, $depth = 0, $args = null){
        $output .= '</li>';
    }
} 