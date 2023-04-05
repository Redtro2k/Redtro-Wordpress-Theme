<?php get_header(); ?>
  <main>
  <div class="relative">
      <div class="mt-6 prose prose-indigo prose-lg text-gray-500 mx-auto">
        <h1 class="mt-2 block text-3xl text-center leading-8 tracking-tight text-gray-900 sm:text-4xl font-sans"><?php the_title(); ?></h1>
        asdasd
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <?php the_content(); ?>
              <?php if(comments_open()){ comments_template(); }?>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </main>
<?php get_footer(); ?>