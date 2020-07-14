
<?php if(get_field('footer_cta_heading',get_the_ID()) || get_field('footer_button_1',get_the_ID()) || get_field('footer_button_2',get_the_ID()) || get_field('footer_button_3',get_the_ID())): ?>

<?php the_field('footer_cta_heading',get_the_ID()); ?>
<?php do_shortcode(get_field('footer_button_1',get_the_ID())); ?>
<?php do_shortcode(get_field('footer_button_2',get_the_ID())); ?>
<?php do_shortcode(get_field('footer_button_3',get_the_ID())); ?>

<?php endif; ?>