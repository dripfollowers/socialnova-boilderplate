<?php wp_nav_menu( 
  array(
    'theme_location' => 'footer-menu',
    'depth' => 1,
    'container' => false,
    'menu_class' => 'footer-links'
  )
); ?>
<?php wp_nav_menu( 
  array(
    'theme_location' => 'footer-menu-2',
    'depth' => 1,
    'container' => false,
    'menu_class' => 'footer-links'
  )
); ?>
<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/payment.png" alt="payment-methods">
</footer>

<?php wp_footer(); ?>


</body>
</html>