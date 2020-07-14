<?php if(get_field('select_auto_packs')){ ?>
<?php $tab = get_field('select_auto_packs');
if( $tab ): $i=1; foreach( $tab as $pack): 
$pt = $pack->post_type;
if(strpos($pt, 'follow')) {
$subj = 'Followers';
} else if (strpos($pt, 'like')) {
$subj = 'Likes';
} else {
$subj = 'Views';
} ?>
<?php echo get_field('number_per_day',$pack->ID); ?>
<?php echo $subj ?>
<?php echo get_field('price',$pack->ID); ?>
<a href="/buy?type=<?php echo $pt; ?>&pack=<?php echo get_field('code',$pack->ID); ?>" class="">Buy Now</a>
<a href="/<?php echo $pt.'/'.$pack->post_name; ?>" class="more">Learn More</a>
<?php endforeach; endif; ?>
<?php } ?>