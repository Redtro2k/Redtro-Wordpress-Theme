<?php get_header(); ?>
<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900"><?php single_cat_title() ?></h1>
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <h3><?php the_title(); ?></h3>
            <?php the_excerpt(); ?>
            <a href="<?php permalink_link() ?>"> Read More </a>
        <?php endwhile; endif; ?>
    </div>
  </main>
<!-- https://play.tailwindcss.com/KzmwYKSdgF - for mobile
https://play.tailwindcss.com/kcm8uciOjN - for desktop -->


<?php get_footer(); ?>