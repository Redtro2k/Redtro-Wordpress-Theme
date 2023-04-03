<?php get_header(); ?>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
      <div class="flex justify-center">
        <div class="hidden sm:grid gap-6 grid-cols-1 pt-16">
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
                      <span class="rounded-full bg-indigo-500 hover:bg-indigo-700 px-2 cursor-pointer font-medium text-white shadow-sm">
                      <small class="text-xs"><?php the_category(', ') ?></small>
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
        <div>
          <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <div class="block sm:hidden space-y-3">
              <div class="flex bg-white rounded-md shadow-sm">
                <div class="h-47 grow-0">
                  <?php if(has_post_thumbnail()) : the_post_thumbnail('full', array('class' => 'h-35 w-25 rounded-l-md', 'width' => '240', 'height' => '240')); else: ?>
                    <img class="w-43 h-48 rounded-l-md" height="640px" width="240" alt="<?php the_title(); ?>" src="https://artsmidnorthcoast.com/wp-content/uploads/2014/05/no-image-available-icon-6.png" />
                  <?php endif; ?>
                </div>
              <div class="grow pl-5 mr-6">
                <div class="mt-5 block">
                  <div class="flex items-center text-gray-700 text-sm">
                    <span>
                      <svg class="h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z" />
                      </svg> 
                    </span>&nbsp;<p>Members Only</p>
                  </div>
                  <h1 class="font-semibold text-left text-xl antialiased text-black"><?php the_title(); ?></h1>
                  <p class="max-w-2xl text-base inline text-gray-600">
                    <?php the_excerpt(); ?><a href="<?php permalink_link() ?>" class="text-indigo-500 hover:animate-pulse focus:outline-nones transition-colors hover:text-indigo-700">Read More</a>
                  </p>
                  <div class="flex">
                    <div class="grid grid-cols-5 gap-2 text-sm pt-2">
                      <?php if(has_category()): ?>
                        <span class="bg-indigo-500 text-white px-2 rounded-lg py-0.5"><?php the_category(', ') ?></span>
                      <?php endif; ?>
                    </div>
                  </div>
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