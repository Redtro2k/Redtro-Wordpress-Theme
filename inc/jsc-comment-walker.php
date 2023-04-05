<?php 
class jsc_comment_walker extends Walker_Comment {
    public function comment($comment, $depth, $args){
        $classes = array('comment');

        // if($comment->comment_parent == 0){
        //     $classes[] = 'parent';
        // }else{
        //     $classes[] = 'child';
        // }

        $author_avatar = get_avatar($comment, $args['avatar_size'], '', '', array('class' => 'h-10 w-10 rounded-full'));
        $author_link = get_comment_author_link($comment);
        $comment_date = get_comment_date('F j, Y', $comment);
        $comment_time = get_comment_time('g:i a', $comment);
        $comment_text = get_comment_text($comment);
        $reply_link_args = array(
            'depth' => $depth,
            'max_depth' => $args['max_depth'],
            'reply_text' => 'Reply',
            'add_below' => 'div-comment',
            'respond_id' => 'respond',
            'class' => 'text-gray-500 hover:text-gray-700'
        );
        
        $reply_link = get_comment_reply_link(array_merge($args, $reply_link_args));

        $output = '<li>';
        $output .= '<div class="flex space-x-3">';
        $output .= '<div class="flex-shrink-0">'. $author_avatar . '</div>';
        $output .= '<div><div class="text-sm"><a class="font-medium text-gray-700!">' . $author_link . '</a></div>';
        $output .= '<div class="mt-1 text-sm text-gray-700"><p>' . $comment_text . '</p></div>';
        $output .= '<div class="mt-2 space-x-2 text-sm"><a class="font-medium text-gray-500" href="' . esc_url(get_comment_link($comment, $args)) . '">' . $comment_date . ' at ' . $comment_time . '</a>&middot;'.$reply_link.'</div></div>';
        // Add a conditional statement to check if the comment author is an administrator
        // if(user_can($comment->user_id, 'manage_options')){
        //     $output .= '<span class="comment-admin">Administrator</span>';
        // }

        $output .= '</div>';

        echo $output;
    }

    public function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output){
        if(!$element){
            return;
        }

        $id_field = $this->db_fields['id'];
        $id = $element->$id_field;

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);

        if(isset($children_elements[$id]) && ($depth < $max_depth)){
            foreach($children_elements[$id] as $child){
                $this->display_element($child, $children_elements, $max_depth, $depth + 1, $args, $output);
            }
        }
    }
}

// https://play.tailwindcss.com/
