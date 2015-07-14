<?php
/**
 * The template for displaying the scrolling posts.
 * Gets the category for the posts from the theme options. 
 * If no category is selected, displays the latest posts.
 *
 * @package  WordPress
 * @file     ticker.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 */
?>

<script>
	jQuery(document).ready(function($) {
		$(".ticker").show();
		$("ul#ticker-posts").liScroll({travelocity: 0.05});
	});
</script>

<div class="ticker-section">
	<div class="content-wrap">
		<div class="ticker">
			
			<div class="title second-color-bg">
				
				<?php 
					$ticker_icon = fp_get_settings('fp_ticker_icon');	
					
					if (!empty($ticker_icon)){ ?>
					<div class="ticker-icon">					
						<i class="<?php echo $ticker_icon; ?>"></i>					
					</div>					
				<?php } ?>
					
				<h6><?php _e('Latest', 'fairpixels'); ?></h6>
			</div>		
			
			<ul id="ticker-posts">
				<?php
					$cat_id = "";
					$cat_id = fp_get_settings('fp_ticker_cat');
					
					$args = array(
						'cat' => $cat_id,
						'post_status' => 'publish',
						'ignore_sticky_posts' => 1,
						'posts_per_page' => 10
					);
				?>
				<?php $query = new WP_Query( $args ); ?>
					<?php if ( $query -> have_posts() ) : ?>
						<?php while ( $query -> have_posts() ) : $query -> the_post(); ?>
							<li>
								<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
								<div class="sep"></div>
							</li>							
						<?php endwhile; ?>
					<?php endif; ?>
				<?php wp_reset_query();?>
			</ul>

		</div>
		
		<div class="search">
			<?php get_search_form(); ?>
		</div>
	</div>
</div><!-- /ticker-section -->