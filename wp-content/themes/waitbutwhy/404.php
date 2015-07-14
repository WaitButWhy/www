<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package  WordPress
 * @file     404.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 */
?>
<?php get_header(); ?>

<div id="content" class="full-content error-page">
	
	<div class="error-page-wrap">
		
		<div class="one-half error-title">
			<h1 class="second-color">404</h1>
			<h2><?php _e('Page not found', 'fairpixels');?></h2>
		</div>
		
		<div class="one-half last">
			<?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Head back to the home page to find your way or try searching something else.', 'fairpixels' ); ?>
			<?php get_search_form(); ?>			
			<?php the_widget('WP_Widget_Recent_Posts', array('number' => 3), array('before_title' => '<h4>', 'after_title' => '</h4>')); ?>
		</div>
		
	</div>
</div><!-- /content -->

<?php get_footer(); ?>