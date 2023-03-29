<?php get_header(); ?>
  <main class="relative py-16 bg-white overflow-hidden">
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <div class="mt-6 prose prose-indigo prose-lg text-gray-500 mx-auto">
          <h1 class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl"><?php the_title(); ?></h1>
          <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
              <?php the_content(); ?>
          <?php endwhile; endif; ?>
      </div>
    </div>
  </main>
<?php get_footer(); ?>