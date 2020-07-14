<?php
$reviews = get_field('select_reviews'); 
 if($reviews): ?>
<?php the_field('reviews_header'); ?>
<?php foreach ($reviews as $review) { ?>
<img src="<?php echo get_field('reviewer_pic',$review->ID)['sizes']['thumbnail']; ?>" alt="client-thumb-one">
<?php echo get_the_title($review->ID); ?>
<?php echo get_field('star_rating',$review->ID);  ?>
<?php echo get_field('content',$review->ID); ?>
<?php } ?>

<?php 

wp_reset_postdata();

endif; ?>
