<?php

/* Template name: Free services page */

if(have_posts()): while(have_posts()): the_post(); ?>

<?php the_field('splash_text'); ?>

<?php the_field('secondary_text'); ?>

<?php include('templates/content-cards.php') ?>

<?php include('templates/review-slider.php') ?>

<?php include('templates/faqs.php') ?>

<?php include('templates/footer-cta.php') ?>

<?php endwhile; endif;

?>