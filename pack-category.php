<?php

/* Template name: Category page */

if(have_posts()): while(have_posts()): the_post(); ?>

<?php the_field('splash_text'); ?>

<?php the_field('packs_heading_text'); ?>

<?php include('templates/content-cards.php') ?>

<?php include('templates/review-slider.php') ?>

<?php include('templates/faqs.php') ?>

<?php include('templates/footer-cta.php') ?>

<?php

endwhile; endif;

?>