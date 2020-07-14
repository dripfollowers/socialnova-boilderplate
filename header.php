<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />

  <?php wp_head(); ?>
</head>

<body <?php if(!is_home()){ body_class(); } ?>>

<?php 
global $dripFollowers;
$dripFollowers->echo_service_down_msg();
?>


<?php
  wp_nav_menu( array(
    'theme_location' => 'main-menu',
    'menu_class' => 'navbar-nav ml-auto',
    'depth' => 3,
    'container' => false,
    //Process nav menu using our custom nav walker
    'walker' => new ApexWalker()
    )
  );
?>

