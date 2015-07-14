<?php
/**
 * Template Name: Homepage
 * Description: A Page Template to display bloag archives with the sidebar.
 *
 * @package  WordPress
 * @file     page-home.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 */
?>
<?php get_header(); ?>

<div id="content" class="homepage">
	<?php
		
		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}
		
		if (is_page_template('page-home.php')&& ($paged < 2 )){
		
			//include slider
			if ( fp_get_settings( 'fp_show_slider' ) == 1 ) {
				get_template_part( 'includes/slider' );
			}
			
			//include featured post
			if ( fp_get_settings( 'fp_show_feat_singlecats' ) == 1 ) {
				get_template_part( 'includes/single-categories' );
			}
			
			//include featured categories
			if ( fp_get_settings( 'fp_show_feat_cats' ) == 1 ) {
				get_template_part( 'includes/feat-categories' );
			}		
		}	
		
		//include posts list
		if ( fp_get_settings( 'fp_show_feat_postlist' ) == 1 ) {
			get_template_part( 'includes/post-list' );
		}
	?>
		
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>