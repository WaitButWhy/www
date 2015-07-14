<?php
/**
 * The template for displaying the single column featured categories.
 * Gets the category for the posts from the theme options. 
 * If no category is selected, displays the latest posts.
 *
 * @package  WordPress
 * @file     feat-post.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 */
?>
<div id="feat-postlist" class="section">
	<?php
		$cat_id = fp_get_settings('fp_feat_postlist_cat');
		$cat_icon = fp_get_settings('fp_feat_postlist_cat_icon');
		
		
		if ( get_query_var('paged') ) {
				$paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) {
				$paged = get_query_var('page');
			} else {
				$paged = 1;
			}
			
	?>
		
		
	<?php if (is_home() && $paged < 2 ){ ?>		
		
		<div class="cat-header">
			<div class="cat-title second-color-bg">
			
				<?php if (!empty($cat_icon)){ ?>
					<div class="cat-icon">					
						<i class="<?php echo $cat_icon; ?>"></i>					
					</div>					
				<?php } ?>
				
				<?php if (!empty($cat_id)){ 
					$cat_name = get_cat_name($cat_id);
					$cat_url = get_category_link($cat_id );
				?>
					<h4><a href="<?php echo esc_url( $cat_url ); ?>" ><?php echo $cat_name; ?></a></h4>	
				<?php } else{ ?>
					<h4><?php _e('Latest Posts', 'fairpixels'); ?></h4>	
				<?php } ?>
							
			</div>
		</div>
			
			
	<?php } ?>
			
	<div class="archive-postlist">
		<?php							
									
			$args = array(
				'cat' => $cat_id,
				'post_status' => 'publish',
				'ignore_sticky_posts' => 1,
				 'paged' => $paged
			);			
		?>					
		<?php $i = 0; 
			
		?>
		<?php $wp_query = new WP_Query( $args ); ?>
			<?php if ( $wp_query -> have_posts() ) : ?>
				<?php while ( $wp_query -> have_posts() ) : $wp_query -> the_post(); ?>
					<?php								
						$post_class ="";
						if ( $i % 2 == 1 ){
							$post_class =" last";							
						}					
					?>								
					<div class="one-half<?php echo $post_class; ?>">
						<?php get_template_part( 'content', 'excerpt' ); ?>
					</div>
					<?php $i++; ?>
				<?php endwhile; ?>
			<?php endif; ?>		
	</div>
	<?php fp_pagination(); ?>
	<?php wp_reset_query();?>	
</div>