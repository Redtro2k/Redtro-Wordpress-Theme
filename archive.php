<?php get_header(); ?>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
      <div class="flex justify-center">
        <div class="grid gap-6 grid-cols-1 pt-16">
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <div class="w-80 rounded bg-white shadow-lg">
              <!-- thumbnail -->
              <?php if(has_post_thumbnail() ): ?>
                    <?php the_post_thumbnail('full', array('class' => 'rounded-t', 'width' => '639', 'height' => '437')) ?>
              <?php else: ?>
                <img class="rounded-t" src="https://artsmidnorthcoast.com/wp-content/uploads/2014/05/no-image-available-icon-6.png" alt="<?php the_title(); ?>">
              <?php endif; ?>
              <div class="mx-4 mt-3 block space-y-4 pb-5">
                <div class="flex items-center space-x-2 text-gray-500">
                  <i class="fa-solid fa-lock h-4 w-4 text-gray-300"></i>
                  <p class="text-sm">Member Only</p>
                </div>
                  <h2 class="text-xl antialiased"><?php the_title(); ?></h2>
                  <div class="pb-4">
                    <p class="font-light text-gray-700 antialiased">
                      <?php the_excerpt(); ?>
                    </p>
                  </div>
                  <?php if(has_category()): ?>
                    <div class="flex space-x-2">
                      <span class="rounded-full bg-indigo-500 hover:bg-indigo-700 cursor-pointer px-3 py-1 font-medium text-white shadow-sm">
                        <i class="fa-solid fa-arrow-right"></i> <small class="text-sm"><?php the_category(', ') ?></small>
                      </span>
                    </div>
                  <?php endif; ?>
                  <div class="flex justify-end">
                    <a class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="<?php permalink_link() ?>"> Read More </a>
                  </div>
              </div>
            </div>            
            <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
  </main>
<!-- https://play.tailwindcss.com/KzmwYKSdgF - for mobile
https://play.tailwindcss.com/kcm8uciOjN - for desktop -->


<?php get_footer(); ?>