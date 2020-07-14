<?php 

get_header(); 

?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php echo get_the_post_thumbnail_url(get_the_id(),'blog-archive'); ?>
<?php the_title(); ?>
<?php echo get_the_date('F j, o'); ?>
<?php the_excerpt(); ?>
<a href="<?php the_permalink(); ?>" class="">Read more</a>
<?php endwhile; endif; ?>
<?php wpbeginner_numeric_posts_nav(); ?>


<?php get_footer(); ?>