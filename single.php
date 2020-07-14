<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

$exclude = array();
array_push($exclude,get_the_id()); ?>


<?php the_title(); ?>
<?php echo get_the_date('F j, o'); ?>


<?php the_content(); ?>

<?php endwhile; endif; ?>

<?php $related = get_field('related_blog_posts');
if($related){
    foreach($related as $post){ ?>

<img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'blog-archive'); ?>" alt="post-thumb-one">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<?php echo get_the_date('F j, o'); ?>
<?php the_excerpt(); ?>
<a href="<?php the_permalink(); ?>">Read more</a>

    <?php }
}

get_footer(); ?>