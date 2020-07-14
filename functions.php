<?php

add_action( 'after_setup_theme', 'blankslate_setup' );
	function blankslate_setup() {
	load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form' ) );
	global $content_width;
	if ( ! isset( $content_width ) ) { $content_width = 1920; }
	register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'blankslate' ) ) );
    register_nav_menus( array( 'footer-menu' => esc_html__( 'Footer Menu', 'blankslate' ) ) );
    register_nav_menus( array( 'footer-menu-2' => esc_html__( 'Footer Menu 2', 'blankslate' ) ) );
}


add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts() {
	// wp_register_style( 'critical', get_stylesheet_directory_uri() . '/css/critical.css' );
	// wp_enqueue_style( 'critical', get_stylesheet_directory_uri() . '/css/critical.css' );


	wp_enqueue_script( 'jquery' );
	// wp_enqueue_script('vendor', get_stylesheet_directory_uri() . '/js/vendor.js', array('jquery'), null, true );
	// wp_enqueue_script('script', get_stylesheet_directory_uri() . '/js/script.js', array('jquery','vendor'), null, true );

}


//Require CPT import
require_once('cpts.php');
require_once('free-services.php');


add_action( 'wp_footer', 'non_critical_styles' );
function non_critical_styles() {
	// wp_register_style( 'non-critical', get_stylesheet_directory_uri() . '/css/non-critical.css' );
	// wp_enqueue_style( 'non-critical', get_stylesheet_directory_uri() . '/css/non-critical.css' );

    // wp_register_style( 'child', get_stylesheet_directory_uri() . '/style.css' );
    // wp_enqueue_style( 'child', get_stylesheet_directory_uri() . '/style.css', array('non-critical') );
	
}

add_action( 'wp_footer', 'blankslate_footer_scripts' );
function blankslate_footer_scripts() { ?>

<script>
jQuery(document).ready(function ($) {

	var deviceAgent = navigator.userAgent.toLowerCase();
	if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
		$("html").addClass("ios");
		$("html").addClass("mobile");
	}
	if (navigator.userAgent.search("MSIE") >= 0) {
		$("html").addClass("ie");
	}
	else if (navigator.userAgent.search("Chrome") >= 0) {
		$("html").addClass("chrome");
	}
	else if (navigator.userAgent.search("Firefox") >= 0) {
		$("html").addClass("firefox");
	}
	else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
		$("html").addClass("safari");
	}
	else if (navigator.userAgent.search("Opera") >= 0) {
		$("html").addClass("opera");
	}

});
</script>


<?php }



add_action( 'widgets_init', 'blankslate_widgets_init' );

function blankslate_widgets_init() {
	register_sidebar( 
		array(
			'name' => esc_html__( 'Sidebar Widget Area', 'blankslate' ),
			'id' => 'primary-widget-area',
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) 
	);
}





//options page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	
}


//button shortcode
function sButton($atts, $content = null) {
   extract(shortcode_atts(array('link' => '#','class'=>''), $atts));
   return '<a class="btn '.$class.'" href="'.$link.'">' . do_shortcode($content) . '</a>';
}
add_shortcode('button', 'sButton');



//remove editor
function remove_editor() {
    if (isset($_GET['post'])) {
        $id = $_GET['post'];
        $template = get_post_meta($id, '_wp_page_template', true);
        switch ($template) {
            case 'page-free.php':
            //case 'page-product-categories.php':
            remove_post_type_support('page', 'editor');
            break;
            default :
            // Don't remove any other template.
            break;
        }
    }
}
add_action('init', 'remove_editor');

add_action('admin_head', 'remove_content_editor');
/**
 * Remove the content editor from pages as all content is handled through Panels
 */
function remove_content_editor()
{
    if((int) get_option('page_on_front')==get_the_ID())
    {
        remove_post_type_support('page', 'editor');
    }
}

//disable gutenberg
add_filter('use_block_editor_for_post_type', '__return_false', 10);



//allow SVG
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
// add_filter('upload_mimes', 'cc_mime_types');



//custom image sizes
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'blog-archive', 600, 460, true ); // (cropped)
}



//custom nav walker
class ApexWalker extends Walker_Nav_Menu {
    
	// Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
    	$object = $item->object;
    	$title = $item->title;
    	$permalink = $item->url;
        $liclass = "";
        $aclass = "";
        if ( $depth === 0 ){
            $liclass .= " nav-item";
            $aclass .= " nav-link";
            if( $args->walker->has_children ){
                $liclass .= " dropdown";
                $aclass .= " dropdown-toggle";
            }
        } else {
            $aclass .= " dropdown-item";
            if( $args->walker->has_children ){
                $aclass .= " dropdown-toggle";
            }
        }
        $output .= "<li class='" .  implode(" ", $item->classes) . $liclass ."'>";
        
        //Add SPAN if no Permalink
	    $output .= '<a href="' . $permalink . '" class="'. $aclass .'">';
       
        $output .= $title;
	    $output .= '</a>';
    }
}

function new_submenu_class($menu) {    
    $menu = preg_replace('/ class="sub-menu"/','/ class="dropdown-menu" /',$menu);        
    return $menu;
}

add_filter('wp_nav_menu','new_submenu_class'); 




// custom excerpt length
function themify_custom_excerpt_length( $length ) {
   return 30;
}
add_filter( 'excerpt_length', 'themify_custom_excerpt_length', 999 );

// add more link to excerpt
function themify_custom_excerpt_more($more) {
   global $post;
   return '<a class="btn btn-secondary" style="margin-top:15px;display:block;width:200px;" href="'. get_permalink($post->ID) . '">'. __('Read More', 'themify') .'</a>';
}
add_filter('excerpt_more', 'themify_custom_excerpt_more');



//pagination
function wpbeginner_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<nav class="blog-pagination"><ul class="pagination justify-content-center">' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li class="page-item">%s</li>' . "\n", get_previous_posts_link('<i class="fa fa-angle-left"></i>') );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="page-item disabled"' : ' class="page-item"';
 
        printf( '<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li class="page-item">…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="page-item disabled"' : ' class="page-item"';
        printf( '<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li class="page-item">…</li>' . "\n";
 
        $class = $paged == $max ? ' class="page-item disabled"' : ' class="page-item"';
        printf( '<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li class="page-item">%s</li>' . "\n", get_next_posts_link('<i class="fa fa-angle-right"></i>') );
 
    echo '</ul></nav>' . "\n";
 
}

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="page-link"';
}




///////////////////////////////////////
///////////////////////////////////////
///////////////////////////////////////
//////////// FREE SERVICES ////////////
///////////////////////////////////////
///////////////////////////////////////
///////////////////////////////////////


function example_ajax_enqueue() {
    if(is_page(26531)){
        // Enqueue javascript on the frontend.
        wp_enqueue_script(
            'free-services',
            get_template_directory_uri() . '/js/free-services.js',
            array('jquery')
        );
        // The wp_localize_script allows us to output the ajax_url path for our script to use.
        wp_localize_script(
            'free-services',
            'free_services_obj',
            array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) )
        );      

        wp_enqueue_script('recaptcha','https://www.google.com/recaptcha/api.js');
    }

}
add_action( 'wp_enqueue_scripts', 'example_ajax_enqueue' );


function free_services_request() {
 
    // The $_REQUEST contains all the data sent via ajax
    if ( isset($_REQUEST) ) {
     
        $email = $_REQUEST['email'];     
        $media = $_REQUEST['media'];
         
        // Let's take the data that was sent and do something with it

        // Now we'll return it to the javascript function
        // Anything outputted will be returned in the response
        $ch = curl_init ("192.99.57.32:8070/api/freeservice/".str_replace("/", "~",$media)."/5");
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, array ('Content-Type: application/x-www-form-urlencoded') );
        $result = curl_exec ( $ch );
        curl_close ( $ch ); 
        echo $result;
         
        // If you're debugging, it might be useful to see what was sent in the $_REQUEST
        // print_r($_REQUEST);
     
    }
     
    // Always die in functions echoing ajax content
   die();
}
 
add_action( 'wp_ajax_free_services_request', 'free_services_request' );
add_action( 'wp_ajax_nopriv_free_services_request', 'free_services_request' );


function custom_single_template($template) {
    global $post;

    if ( $post->post_type==='automatic-followers' || $post->post_type==='automatic-likes' || $post->post_type==='instant-views' ) {
        $template = get_template_directory().'/single-automatic.php';
    } else if ( $post->post_type==='instant-followers' || $post->post_type==='instant-likes' ) {
        $template = get_template_directory().'/single-instant.php';
    }
    return $template;
}
add_filter( 'single_template', 'custom_single_template' );


function new_excerpt_more($more) {
   global $post;
   return ' ';
}
add_filter('excerpt_more', 'new_excerpt_more');

