<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
	
<main id="content">


<?php the_content(); ?>


</main>
<?php endwhile; endif; ?>


<?php get_footer(); ?>