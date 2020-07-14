<?php 

/* Template Name: Contact Page */

get_header(); 


?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>

<?php the_content(); ?>

<?php echo do_shortcode(get_field('shortcode')); ?>

<?php endwhile; endif; ?>


<?php get_footer(); ?>