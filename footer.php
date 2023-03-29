</div>
<footer class="bg-gray-100">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 flex items-center justify-between lg:px-8">
      <!-- <div class="flex space-x-6 order-2">
        <a class="text-gray-400 hover:text-gray-500">
          <span>facebook</span>
        </a>
        <a class="text-gray-400 hover:text-gray-500">
          <span>facebook</span>
        </a>
      </div> -->
      <?php
      wp_nav_menu( 
          array(
            'menu' => 'footer',
            'container' => '',
            'theme_location' => 'footer',
            'items_wrap' => '<ul id="%2$s" class="flex space-x-6 order-2">%3$s</ul>',
            'walker' => new jsc_wp_nav_footer_menu_walker()
          )
       )
      ?>
      <div class="mt-8 md:mt-0 md:order-1">
        <p class="md:text-center text-base text-gray-400">&copy; <?php echo date('Y') ?> <?php bloginfo('name') ?>, Inc. All rights reserved.</p>
      </div>
    </div>
  </footer>
    <?php wp_footer(); ?>
    </body>
</html>