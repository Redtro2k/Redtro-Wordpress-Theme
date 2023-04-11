<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    <?php the_content(); ?>
      <?php if(comments_open()){ comments_template(); }?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>