<?php the_field('icon_cards_heading_text'); ?>

<?php if(have_rows('icon_cards')): while(have_rows('icon_cards')): the_row();

$image_url = get_sub_field('icon');
the_sub_field('text');

endwhile; endif; ?>