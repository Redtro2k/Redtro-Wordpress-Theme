<?php

class jsc_wp_nav_footer_menu_walker extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = null){
        $tmp_class = 'child'.$depth;
        $output .= "<ul class='".$tmp_class."'>";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0){
        $classes = array('text-gray-400', 'hover:text-gray-500');
        $className = join(' ', $classes);
        $output .= "<li class='$className'><a href='".$item->url."'>".$item->title."</a>";
    }

    function end_el(&$output, $item, $depth = 0, $args = null){
        $output .= '</i>';
    }
}