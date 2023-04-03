</div>
<div class="bg-gray-200">
  <div class="bg-white shadow-sm pt-10 px-20 sm:px-4">
    <div class="grid grid-cols-4 md:grid-cols-2 gap-4 justify-items-stretch pt-9">
      <!-- Recent Post -->
      <div class="pb-4">
        <h1 class="uppercase text-gray-400 font-semibold pb-2">Recent Posts</h1>
        <?php 
        $args = array(
          'numberposts' => 5,
        );
        $recent_posts = wp_get_recent_posts($args); 
        if($recent_posts) : ?>
          <ul class="block space-y-4">
            <?php foreach($recent_posts as $post): ?>
                <li><a class="text-gray-500 hover:text-gray-700" href="<?php echo get_permalink($post['ID']); ?>"><?php echo $post['post_title']; ?></a></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>
      <!-- Archives list -->
      <div class="pb-4">
        <h1 class="uppercase text-gray-400 font-semibold pb-2">Archives</h1>
        <ul class="block space-y-4">
          <?php
              $archives = wp_get_archives( array( 
                'type' => 'monthly',
                'limit' => 12,
                'format' => 'html',
                'before' => '<li>',
                'after' => '</li>',
                'show_post_count' => false,
                'echo' => 0,
                'link_class' => 'text-gray-500 hover:text-gray-700'
              ) 
            );
              $archives = explode('</a>', $archives);
              if ( !empty( $archives ) ) {
                foreach( $archives as $archive ) {
                  $archive = trim( $archive );
                  if ( strlen( $archive ) > 0 ) {
                    $archive .= '</a>';
                    echo "<li>$archive</li>";
                  }
                }
              }
          ?>
        </ul>
      </div>
      <!-- Categories -->
      <div class="pb-4">
        <h1 class="uppercase text-gray-400 font-semibold pb-2">Categories</h1>
        <ul>
          <?php
            $categories = get_categories( array(
              'orderby' => 'name',
              'order' => 'ASC',
              'hide_empty' => 0
              ) );
            foreach ( $categories as $category ) {
              echo '<li><a class="block space-y-4 text-gray-500" href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li>';
            }
          ?>
        </ul>

      </div>
      <!-- Recent comments -->
      <div class="pb-4">
        <h1 class="uppercase text-gray-400 font-semibold pb-2">Recent Comment</h1>
        <?php 
            $comments = get_comments(array('status' => 'approve', 'number' => '1'));
            if(count($comments) > 0): ?>
              <ul>
                <?php foreach($comments as $comment): ?>
                  <li><a class="block space-y-4 text-gray-500" href="<?php get_permalink($comment->comment_post_ID) ?>"><span class="text-indigo-500 underline font-medium hover:text-indigo-700"><?php echo $comment->comment_author ?></span> on <span class="text-indigo-500 underline font-medium hover:text-indigo-700"><?php echo get_the_title($comment->comment_post_ID) ?></span></a></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
      </div>
    </div>
    <div class="flex justify-between items-center md:block md:justify-start text-gray-400 border-t-2 border-b-2 border-gray-50 py-4">
     <div>
        <h2 class="uppercase font-semibold">subcribe to our newsletter</h2>
        <p class="text-gray-500 font-light pt-1">The latest news, articles, and resources, sent to your inbox weekly</p>
     </div>
     <?php get_search_form() ?>
    </div>
    <div class="flex pb-10 md:block justify-between items-center">
      <div>
        <ul class="flex space-x-10 p-6 justify-center text-xl">
          <li><a class="text-gray-400 hover:text-gray-500" href="#"><i class="fa-brands fa-facebook fm-2xl"></i></a></li>
          <li><a class="text-gray-400 hover:text-gray-500" href="#"><i class="fa-brands fa-twitter fm-2xl"></i></a></li>
          <li><a class="text-gray-400 hover:text-gray-500" href="#"><i class="fa-brands fa-instagram fm-2xl"></i></a></li>
          <li><a class="text-gray-400 hover:text-gray-500" href="#"><i class="fa-brands fa-github fm-2xl"></i></a></li>
        </ul>
      </div>
      <h3 class="text-gray-400 text-sm">&copy; 2023 <?php bloginfo('name') ?>, Inc. All rights reserved.</h3>
    </div>
  </div>
</div>
    <?php wp_footer(); ?>
    </body>
</html>