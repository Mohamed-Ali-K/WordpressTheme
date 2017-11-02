<?php get_header(); ?>
<?php 
if ( have_posts()):
    while (have_posts()): the_post();?>
   <?php get_template_part( 'content'); ?>
    <?php endwhile;
endif;

?>
<?php get_footer(); ?>