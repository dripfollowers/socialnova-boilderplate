<?php the_field('faqs_header'); ?>
<?php 
$faqs = get_field('select_faqs'); 
$count = round(count($faqs)/2); ?>
<?php $i = 0; 
foreach($faqs as $faq){
if($i == $count){ /* second columns */ } ?>
<?php echo get_the_title($faq->ID); ?>
<?php echo get_post_field('post_content', $faq->ID); ?>
<?php $i++; } ?>