</div>
<footer class="bg-white" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="mx-auto max-w-7xl px-6 pb-8 pt-16 sm:pt-24 lg:px-8 lg:pt-32">
      <div class="xl:grid xl:grid-cols-3 xl:gap-8">
        <h1 class="font-bold text-indigo-500"><?php bloginfo('name'); ?></h1>
        <div class="mt-16 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">
          <div class="md:grid md:grid-cols-2 md:gap-8">
            <!-- Recent Posts -->
            <div>
              <h3 class="text-sm font-semibold leading-6 text-gray-900">Recent Posts</h3>
              <?php
              $args = array(
                'numberposts' => 5,
              );
              $recent_posts = wp_get_recent_posts($args); 
              if($recent_posts) : ?>
                <ul role="list" class="mt-6 space-y-4">
                  <?php foreach($recent_posts as $post): ?>               
                    <li>
                      <a class="text-sm leading-6 text-gray-600 hover:text-gray-900" href="<?php echo get_permalink($post['ID']); ?>"><?php echo $post['post_title']; ?></a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
            <div class="mt-10 md:mt-0">
              <h3 class="text-sm font-semibold leading-6 text-gray-900">Archives</h3>
              <ul role="list" class="mt-6 space-y-4">
                <?php
                      $archives = wp_get_archives(array( 
                        'type' => 'monthly',
                        'limit' => 12,
                        'format' => 'html',
                        'before' => '<li>',
                        'after' => '</li>',
                        'show_post_count' => false,
                        'echo' => 0,
                          'link_class' => 'text-sm leading-6 text-gray-600 hover:text-gray-900'
                        ));
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
          </div>
          <div class="md:grid md:grid-cols-2 md:gap-8">
            <div>
              <h3 class="text-sm font-semibold leading-6 text-gray-900">Categories</h3>
              <ul role="list" class="mt-6 space-y-4">
                <?php
                  $categories = get_categories( array(
                    'orderby' => 'name',
                    'order' => 'ASC',
                    'hide_empty' => 0
                    ) );
                  foreach ( $categories as $category ) {
                    echo '<li><a class="text-sm leading-6 text-gray-600 hover:text-gray-900" href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li>';
                  }
                ?>
              </ul>
            </div>
            <div class="mt-10 md:mt-0">
              <h3 class="text-sm font-semibold leading-6 text-gray-900">Recent Comment</h3>
              <?php 
                $comments = get_comments(array('status' => 'approve', 'number' => '1'));
                if(count($comments) > 0): ?>
                  <ul>
                    <?php foreach($comments as $comment): ?>
                      <li><a class="text-sm leading-6 text-gray-600 hover:text-gray-900" href="<?php get_permalink($comment->comment_post_ID) ?>"><span class="text-indigo-500 underline font-medium hover:text-indigo-700"><?php echo $comment->comment_author ?></span> on <span class="text-indigo-500 underline font-medium hover:text-indigo-700"><?php echo get_the_title($comment->comment_post_ID) ?></span></a></li>
                    <?php endforeach; ?>
                  </ul>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-16 border-t border-gray-900/10 pt-8 sm:mt-20 lg:mt-24 lg:flex lg:items-center lg:justify-between">
        <div>
          <h3 class="text-sm font-semibold leading-6 text-gray-900">Find Something?</h3>
          <p class="mt-2 text-sm leading-6 text-gray-600">The latest news, articles, and resources.</p>
        </div>
        <?php get_search_form() ?>
      </div>
      <div class="mt-8 border-t border-gray-900/10 pt-8 md:flex md:items-center md:justify-between">
            <?php 
              wp_nav_menu(
                  array(
                    'menu' => 'footer',
                    'container' => '',
                    'theme_location' => 'footer',
                    'items_wrap' => '<ul id="%2$s" class="flex space-x-6 md:order-2 %2$s">%3$s</ul>',
                    'walker' => new jsc_wp_nav_footer_menu_walker()
                  )
              )
            ?>
        <p class="mt-8 text-xs leading-5 text-gray-500 md:order-1 md:mt-0">&copy; 2023 <?php bloginfo('name') ?>, Inc. All rights reserved.</p>
      </div>
    </div>
  </footer>
    <?php wp_footer(); ?>
    </body>
</html>