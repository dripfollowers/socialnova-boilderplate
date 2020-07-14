<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>

<?php the_field('splash_section_text'); ?>
<?php echo do_shortcode(get_field('cta_1')); ?>
<?php echo do_shortcode(get_field('cta_2')); ?>
<?php echo do_shortcode(get_field('cta_3')); ?>
<?php the_field('auto_followers_copy'); ?>
<?php the_field('instant_followers_copy'); ?>
<?php the_field('auto_likes_copy'); ?>
<?php the_field('instant_likes_copy'); ?>
<?php the_field('instant_views_copy'); ?>

<?php include('templates/content-cards.php') ?>

<?php include('templates/review-slider.php') ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>