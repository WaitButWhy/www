<?php

/**
 * Tell WordPress to run fairpixels_theme_setup() when the 'after_setup_theme' hook is run.
 */
 
add_action( 'after_setup_theme', 'fairpixels_theme_setup' );

if ( ! function_exists( 'fairpixels_theme_setup' ) ):

function fairpixels_theme_setup() {

	/**
	 * Load up our required theme files.
	 */
	require( get_template_directory() . '/framework/settings/theme-options.php' );
	require( get_template_directory() . '/framework/settings/option-functions.php' );	
	require( get_template_directory() . '/framework/meta/meta_post.php' );

	/**
	 * Load our theme widgets
	 */
	require( get_template_directory() . '/framework/widgets/widget_flickr.php' );
	require( get_template_directory() . '/framework/widgets/widget_tabs.php' );
	require( get_template_directory() . '/framework/widgets/widget_subscribers_count.php' );
	require( get_template_directory() . '/framework/widgets/widget_video.php' );
	require( get_template_directory() . '/framework/widgets/widget_pinterest.php' );
	require( get_template_directory() . '/framework/widgets/widget_recent_comments.php' );
	require( get_template_directory() . '/framework/widgets/widget_adsingle.php' );
	require( get_template_directory() . '/framework/widgets/widget_adsblock.php' );
	require( get_template_directory() . '/framework/widgets/widget_slider.php' );

	
	/* Add translation support.
	 * Translations can be added to the /languages/ directory.
	 */
	load_theme_textdomain( 'fairpixels', get_template_directory() . '/languages' );
	
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	if ( ! isset( $content_width ) )
		$content_width = 600;
		
	/** 
	 * Add default posts and comments RSS feed links to <head>.
	 */
	add_theme_support( 'automatic-feed-links' );
	
	/**
	 * This theme styles the visual editor with editor-style.css to match the theme style.
	 */
	add_editor_style();
	
	/**
	 * Register menus
	 *
	 */
	register_nav_menus( array(
		'primary-menu' => __( 'Primary Menu', 'fairpixels' )					
	) );
	
	/**
	 * Add support for the featured images (also known as post thumbnails).
	 */
	if ( function_exists( 'add_theme_support' ) ) { 
		add_theme_support( 'post-thumbnails' );
	}
	
	/**
	 * Add custom image sizes
	 */
	//add_image_size( 'fp780_400', 780, 400, true );			//main slider
	add_image_size( 'fp780_400', 782, 530, true );
	add_image_size( 'fp374_200', 374, 200, true );			//feat category thumbnails
	add_image_size( 'fp239_130', 239, 130, true );			//related posts thumbnails
	add_image_size( 'fp75_75', 103, 70, true );				//feat post thumbnails	
}
endif; // fairpixels_theme_setup

/**
 * A safe way of adding JavaScripts to a WordPress generated page.
 */

if (!is_admin()){
    add_action('wp_enqueue_scripts', 'fairpixels_js');
}

if (!function_exists('fairpixels_js')) {

    function fairpixels_js() {
		wp_enqueue_script('fp_hoverIntent', get_template_directory_uri().'/js/hoverIntent.js',array('jquery'),'', true);
		wp_enqueue_script('fp_superfish', get_template_directory_uri().'/js/superfish.js',array('hoverIntent'),'', true);
		wp_enqueue_script('fp_slider', get_template_directory_uri() . '/js/flexslider-min.js', array('jquery'),'', true); 
		wp_enqueue_script('fp_lightbox', get_template_directory_uri() . '/js/lightbox.js', array('jquery'),'', true); 		
		wp_enqueue_script('fp_jflickrfeed', get_template_directory_uri() . '/js/jflickrfeed.min.js', array('jquery'),'', true); 
		wp_enqueue_script('fp_touchSwipe', get_template_directory_uri() . '/js/jquery.touchSwipe.min.js', array('jquery'),'', true); 
		wp_enqueue_script('fp_mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.min.js', array('jquery'),'', true); 		
		wp_enqueue_script('fp_scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'),'', true);	

		wp_enqueue_script('fp_ticker', get_template_directory_uri() . '/js/ticker.js', array('jquery'), '', true); 
		
		if (is_page_template('page-home.php')){
			wp_enqueue_script('fp_carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '', true); 
		
		}
    }
	
}

/**
 * Enqueues styles for front-end.
 *
 */ 
if (!function_exists('fairpixels_css')) {
	function fairpixels_css() {
		wp_enqueue_style( 'fp-style', get_stylesheet_uri() );	
		wp_enqueue_style( 'fp-font-awesome', get_template_directory_uri().'/css/fonts/font-awesome/css/font-awesome.min.css' );	
	}
}
add_action( 'wp_enqueue_scripts', 'fairpixels_css' );


/**
 * Register our sidebars and widgetized areas.
 *
 */
 
if ( function_exists('register_sidebar') ) {
	
	register_sidebar( array(
		'name' => __( 'Sidebar', 'fairpixels' ),
		'id' => 'sidebar-1',
		'description' => __( 'Main sidebar area', 'fairpixels' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4></div>',
	) );
		
	register_sidebar( array(
		'name' => __( 'Post Footer', 'fairpixels' ),
		'id' => 'post-footer-1',
		'description' => __( 'Area below post', 'fairpixels' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4></div>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget 1', 'fairpixels' ),
		'id' => 'footer-1',
		'description' => __( 'Widget 1 area in the footer', 'fairpixels' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget 2', 'fairpixels' ),
		'id' => 'footer-2',
		'description' => __( 'Widget 2 area in the footer', 'fairpixels' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget 3', 'fairpixels' ),
		'id' => 'footer-3',
		'description' => __( 'Widget 3 area in the footer', 'fairpixels' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget 4', 'fairpixels' ),
		'id' => 'footer-4',
		'description' => __( 'Widget 4 area in the footer', 'fairpixels' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4></div>',
	) );
  
  register_sidebar( array(
'name' => 'Forum Reply Footer',
'id' => 'forum-reply-footer',
'description' => 'Appears in the footer area of replies',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );


register_sidebar( array(
		'name' => __( 'Mandarin', 'fairpixels' ),
		'id' => 'mandarin',
		'description' => __( 'Chinese sidebar area', 'fairpixels' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4></div>',
	) );


}

function get_tweets($url) {
					 
						//$json_string = file_get_contents('http://urls.api.twitter.com/1/urls/count.json?url=http://www.' . ltrim($url, "http://"));
						
						$json_string = wp_remote_get('http://urls.api.twitter.com/1/urls/count.json?url=http://www.' . ltrim($url, "http://"));
				
						if (!is_wp_error($json_string)) {
					
						$json = json_decode($json_string['body'], true);
					 //print_r($json);
					 	if($json['count'] == 0){
							
								$json_string = wp_remote_get('http://urls.api.twitter.com/1/urls/count.json?url=' . $url);
								$json = json_decode($json_string['body'], true);
							}
					 
					 
						return number_format(intval( $json['count']) );
						
						}
					}
					 
					/*function get_shares($url) {
					 
						//$json_string = file_get_contents('http://graph.facebook.com/?ids=' . $url);
						$json_string = wp_remote_get('http://graph.facebook.com/?ids=' . $url);
				
				
				
						if (!is_wp_error($json_string)) {
					
						$json = json_decode($json_string['body'], true);
					 
						return number_format(intval( $json[$url]['shares']) );
						}
					}
					
					function get_likes($url) {
					 
						//$json_string = file_get_contents('http://graph.facebook.com/?ids=' . $url);
						$json_string = wp_remote_get('http://graph.facebook.com/?ids=' . $url);
				
						if (!is_wp_error($json_string)) {
					
						$json = json_decode($json_string['body'], true);
						
						//print_r($json);
					 
						return number_format(intval( $json[$url]['shares'] ));
						}
					}*/
					
					
					
function full_comment_count() {  
global $post;  
$url = get_permalink($post->ID);  
  /* failing too much - slowing site down
$filecontent = file_get_contents('https://graph.facebook.com/?ids=' . $url);  
$json = json_decode($filecontent);  
$count = $json->$url->comments;  */
$count = 0;
$wpCount = get_comments_number();  
$realCount = $count + $wpCount;  
if ($realCount == 0 || !isset($realCount)) {  
    $realCount = 0;  
}  
return number_format($realCount);  
}  


function remove_comment_fields($fields) {
    unset($fields['url']);
	$fields['email'] = '';
    return $fields;
}
add_filter('comment_form_default_fields','remove_comment_fields');



/**
 * Pagination for archive, taxonomy, category, tag and search results pages
 *
 * @global $wp_query http://codex.wordpress.org/Class_Reference/WP_Query
 * @return Prints the HTML for the pagination if a template is $paged
 */
if ( ! function_exists( 'fp_pagination' ) ) :
function fp_pagination() {
	global $wp_query;
 
	$big = 999999999; // This needs to be an unlikely integer
 
	// For more options and info view the docs for paginate_links()
	// http://codex.wordpress.org/Function_Reference/paginate_links
	$paginate_links = paginate_links( array(
		'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'mid_size' => 5
	) );
 
	// Display the pagination if more than one page is found
	if ( $paginate_links ) {
		echo '<div class="pagination">';
		echo $paginate_links;
		echo '</div><!--// end .pagination -->';
	}
}
endif; // ends check for fp_pagination()




/* mandarin */

function custom_post_types() {  
  register_post_type(
    'mandarin',
    array(
      'labels' => array(
        'name' => _x('Mandarin', 'post type general name'),
        'singular_name' => _x('Mandarin', 'post type singular name'),
        'add_new' => _x('Add New', 'Mandarin Post'),
        'add_new_item' => __('Add New Mandarin Post'),
        'edit_item' => __('Edit Mandarin Post'),
        'new_item' => __('New Mandarin Post'),
        'all_items' => __('All Mandarin Posts'),
        'view_item' => __('View Mandarin Post'),
        'search_items' => __('Search Mandarin Posts'),
        'not_found' =>  __('No Mandarin Posts found'),
        'not_found_in_trash' => __('No Mandarin Posts found in Trash'), 
        'parent_item_colon' => '',
        'menu_name' => __('Mandarin Posts')
      ),
      'public' => true,
      'menu_position' => 5,
      'rewrite' => array('slug' => 'cn'),
      'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions'),
      'has_archive' => 'true',
	  'capability_type' => 'mandarin',
		'map_meta_cap'    => 'true',
		'capabilities' => array(
        'edit_post' => 'edit_mandarin',
        'edit_posts' => 'edit_mandarin_posts',
        'edit_others_posts' => 'edit_other_mandarin',
        'publish_posts' => 'publish_mandarin',
        'read_post' => 'read_mandarin',
        'read_private_posts' => 'read_private_mandarin',
        'delete_post' => 'delete_mandarin'
    )
    )
  );
	
	// add eric role
	  
    $role = get_role( 'mandarin_author' );
    // create if neccesary
    if (!$role) $role = add_role('mandarin_author', 'Mandarin Author'); 
    // add theme specific roles
    $role->add_cap('edit_mandarin');
    $role->add_cap('edit_mandarin_posts');
    $role->add_cap('edit_other_mandarin');
	$role->add_cap('publish_mandarin');
    $role->add_cap('read_mandarin');
    $role->add_cap('read_private_mandarin');
    $role->add_cap('delete_mandarin');
	$role->remove_cap('edit_posts');
	$role->remove_cap('delete_posts');
	$role->remove_cap('publish_posts');
	
	$role2 = get_role( 'administrator' );
	$role2->add_cap('edit_mandarin');
    $role2->add_cap('edit_mandarin_posts');
    $role2->add_cap('edit_other_mandarin');
	$role2->add_cap('publish_mandarin');
    $role2->add_cap('read_mandarin');
    $role2->add_cap('read_private_mandarin');
    $role2->add_cap('delete_mandarin');

  
}

add_action( 'init', 'custom_post_types' );


/* TINY MCE FIX FONT SIZE */

function wwiz_mce_inits($initArray){
    //$initArray['height'] = '600px';
    $initArray['theme_advanced_font_sizes'] = '10px,12px,13px,14px,15px,16px,18px,20px,22px,24px,26px,28px,30px,32px,34px,36px,38px,40px';
    $initArray['font_size_style_values'] = '10px,12px,13px,14px,15px,16px,18px,20px,22px,24px,26px,28px,30px,32px,34px,36px,38px,40px';
    return $initArray;
}
add_filter('tiny_mce_before_init', 'wwiz_mce_inits');