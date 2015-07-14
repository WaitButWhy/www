<?php


/**
 * Custom Social Count Plus Number Format.
 *
 * @param  int   $number Default number.
 *
 * @return float         New formated number.
 */
function custom_social_count_plus_number_format( $number ) {
    return number_format( $number, 0, '', ',' );
}

add_filter( 'social_count_plus_number_format', 'custom_social_count_plus_number_format' );

/**
 * FairPixels functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package  WordPress
 * @file     functions.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 */

require( get_template_directory() . '/framework/functions.php' );

/**
 * Set the format for the more in excerpt, return ... instead of [...]
 */ 
function fairpixels_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'fairpixels_excerpt_more');

// custom excerpt length
function fairpixels_excerpt_length( $length ) {
    return 35;
}
add_filter( 'excerpt_length', 'fairpixels_excerpt_length');
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own fairpixels_comments(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
if ( ! function_exists( 'fairpixels_comments' ) ) :
function fairpixels_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	global $post;
	
	switch ( $comment->comment_type ) :
		case '' :
		
		if($comment->user_id == $post->post_author) {
			$author_text = '<span class="author-comment main-color-bg">Author</span>';
		} else {
			$author_text = '';
		}
		
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>">
		
			<div class="author-avatar">
				<a href="<?php comment_author_url()?>"><?php echo get_avatar( $comment, 60 ); ?></a>
			</div>			
		
			<div class="comment-right">
				
				<div class="comment-header">
						<h5><?php printf( __( '%s', 'fairpixels' ), sprintf( '<cite class="fn cufon">%s</cite>', get_comment_author_link() ) ); ?></h5>
						<?php echo $author_text; ?>
				</div>
					
				<div class="comment-meta">					
					
					<span class="comment-time">
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php
							/* translators: 1: date, 2: time */
							printf( __( '%1$s at %2$s', 'fairpixels' ), get_comment_date(),  get_comment_time() ); ?></a>
					</span>
					<span class="sep">-</span>
					<span class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'fairpixels' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</span>
				
					
					
					<?php edit_comment_link( __( '[ Edit ]', 'fairpixels' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- /comment-meta -->
			
				<div class="comment-text">
					<?php comment_text(); ?>
				</div>
		
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<p class="moderation"><?php _e( 'Your comment is awaiting moderation.', 'fairpixels' ); ?></p>
				<?php endif; ?>

				<!-- /reply -->
		
			</div><!-- /comment-right -->
		
		</article><!-- /comment  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'fairpixels' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '[ Edit ]', 'fairpixels' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php	
			break;
	endswitch;
}
endif;	//ends check for fairpixels_comments()

/**
 * Set the main menu fallback
 */
 
if ( ! function_exists( 'fp_main_menu_fallback' ) ) :
	
	function fp_main_menu_fallback() { ?>
		<ul class="menu">
			<?php
				wp_list_categories(array(
					'number' => 5,
					'exclude' => '1',
					'title_li' => '',
					'orderby' => 'count',
					'order' => 'DESC'  
				));
			?>  
		</ul>
    <?php
	}

endif; // ends check for fp_main_menu_fallback()

/**
 * Set the top menu fallback
 */
if ( ! function_exists( 'fp_top_menu_fallback' ) ) :
	
	function fp_top_menu_fallback() { ?>
		<ul class="menu">
			<?php
				wp_list_categories(array(
					'number' => 3,
					'exclude' => '1',
					'title_li' => '',
					'orderby' => 'count',
					'order' => 'DESC'  
				));
			?>  
		</ul>
    <?php
	}

endif; // ends check for fp_top_menu_fallback()

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
   }
   return $count;
}
 
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

/*function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );*/


function custom_excerpt($text) {  // custom 'read more' link
   if (strpos($text, '[...]')) {
      $excerpt = strip_tags(str_replace('[...]', '...&nbsp;<a  class="read-more" href="'.get_permalink().'">Read More</a>', $text), "<a>");
   } else {
      $excerpt = '' . strip_tags($text) . '...&nbsp;<a class="read-more" href="'.get_permalink().'">Read More</a>';
   }
   return $excerpt;
}
add_filter('the_excerpt', 'custom_excerpt');



add_theme_support( 'post-formats', array( 'quote' ) );


function excludecatfeed($query) {
               if(is_feed()) {
                              $query->set('cat','-30, -70, -73, -77, -78, -79');
							  //$query->set('post__not_in', array(1070) ); 
                              return $query;
               }
}
add_filter('pre_get_posts', 'excludecatfeed');


/* Responsive Email Feed */

function wbw_custom_feeds() {
  add_feed('email', 'get_me_the_email_feed_template');
}
add_action('init', 'wbw_custom_feeds');

function get_me_the_email_feed_template() {
  add_filter('the_content_feed', 'wbw_super_awesome_feed_image_magic');
  include(ABSPATH . '/wp-includes/feed-rss2.php' );
}

function wbw_super_awesome_feed_image_magic($content) {
  // Weirdness we need to add to strip the doctype with later.
  $content = '<div>' . $content . '</div>';
  $doc = new DOMDocument();
  $doc->LoadHTML($content);
  $images = $doc->getElementsByTagName('img');
  foreach ($images as $image) {
    $image->removeAttribute('height');
    $image->setAttribute('width', '556');
  }
  // Strip weird DOCTYPE that DOMDocument() adds in
  $content = substr($doc->saveXML($doc->getElementsByTagName('div')->item(0)), 5, -6);
  return $content;
}


/**
This Example shows how to pull the Members of a List using the MCAPI.php 
class and do some basic error checking.
**/
require_once 'MCAPI.class.php';

function getSubCount(){

$apikey = '77ec9bdaf12b844dbc576c1aeb41c07f-us7';
$listId = '5b568bad0b';

$api = new MCAPI($apikey);

$retval = $api->lists();

if ($api->errorCode){
    echo "Unable to load lists()!";
    echo "\n\tCode=".$api->errorCode;
    echo "\n\tMsg=".$api->errorMessage."\n";
} else {
    /*
		echo "<!-- <pre>";
		echo print_r($retval['data']);
		echo "</pre> -->";
	  */
  
    foreach ($retval['data'] as $list){
			// only main list
      if($list['id']==$listId)
      {
        $mailCount = $list['stats']['member_count'];
      }
		}
		
		/*
	 [1] => Array
        (
            [id] => 5b568bad0b
            [web_id] => 30373
            [name] => List
            [date_created] => 2013-07-02 03:21:14
            [email_type_option] => 
            [use_awesomebar] => 
            [default_from_name] => Wait But Why
            [default_from_email] => contact@waitbutwhy.com
            [default_subject] => 
            [default_language] => en
            [list_rating] => 4
            [subscribe_url_short] => http://eepurl.com/Ffj9D
            [subscribe_url_long] => http://waitbutwhy.us7.list-manage1.com/subscribe?u=250cab41702ae3ef7a2c1c965&id=5b568bad0b
            [beamer_address] => us7-47d8792f46-3d15c32997@inbound.mailchimp.com
            [visibility] => pub	
		
		
						 [member_count] => 43686
					[unsubscribe_count] => 3430
					[cleaned_count] => 247
					[member_count_since_send] => 75
					[unsubscribe_count_since_send] => 87
					[cleaned_count_since_send] => 10
					[campaign_count] => 44
					[grouping_count] => 0
					[group_count] => 0
					[merge_var_count] => 0
					[avg_sub_rate] => 4461
					[avg_unsub_rate] => 328
					[target_sub_rate] => 355
					[open_rate] => 33.1024788584
					[click_rate] => 8.17028779741
     */
}

return $mailCount;

}

function disqus_embed($disqus_shortname) {
    global $post;
    wp_enqueue_script('disqus_embed','http://'.$disqus_shortname.'.disqus.com/embed.js');
    echo '<div id="disqus_thread"></div>
    <script type="text/javascript">
        var disqus_shortname = "'.$disqus_shortname.'";
        var disqus_title = "'.$post->post_title.'";
        var disqus_url = "'.get_permalink($post->ID).'";
        var disqus_identifier = "'.$disqus_shortname.'-'.$post->ID.'";
    </script>';
}


/* clear feed cache, uncomment when needed */

/*function clear_feed_cache() {
global $wpdb;
$num = $wpdb->query($wpdb->prepare("DELETE FROM $wpdb->options WHERE option_name LIKE %s ", '_transient_feed_%'));
error_log($num.' feed transients deleted');
}


function lower_feed_cache_time() {
return 600;
}
add_filter( 'wp_feed_cache_transient_lifetime', 'lower_feed_cache_time' );*/

/* ITS RANDOM TIME */

add_action('init','random_add_rewrite');
function random_add_rewrite() {
       global $wp;
       $wp->add_query_var('random');
       add_rewrite_rule('random/?$', 'index.php?random=1', 'top');
}
 
add_action('template_redirect','random_template');
function random_template() {
       if (get_query_var('random') == 1) {
               $posts = get_posts('category=-30, -70, -73, -77, -78, -79,-15&post_type=post&orderby=rand&numberposts=1');
               foreach($posts as $post) {
                       $link = get_permalink($post);
               }
               wp_redirect($link,307);
               exit;
       }
}


/* TINYMCE EDITS */

// Customize mce editor font sizes
if ( ! function_exists( 'wpex_mce_text_sizes' ) ) {
    function wpex_mce_text_sizes( $initArray ){
        $initArray['fontsize_formats'] = "9pt 10pt 12pt 13pt 14pt 16pt 18pt 20pt 21pt 22pt 24pt 28pt 30pt 32pt 36pt";
        return $initArray;
    }
}
add_filter( 'tiny_mce_before_init', 'wpex_mce_text_sizes' );



?>