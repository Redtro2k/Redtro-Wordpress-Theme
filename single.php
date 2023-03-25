<?php get_header(); ?>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
        <h1 class="text-3xl font-bold underline">
           <?php the_title(); ?>
        </h1>
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>
    </div>
  </main>
<?php get_footer(); ?>