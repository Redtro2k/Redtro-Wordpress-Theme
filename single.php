<?php get_header(); ?>
<main class="h-screen">
  <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
      <?php the_content(); ?>
        <?php if(comments_open()){ comments_template(); }?>
  <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>