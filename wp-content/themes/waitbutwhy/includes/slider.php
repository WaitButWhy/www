<?php
/**
 * The template for displaying the featured slider on homepage.
 * Gets the category for the posts from the theme options. 
 * If no category is selected, displays the latest posts.
 *
 * @package  WordPress
 * @file     feat-slider.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 * 
 **/
?>
<?php		
	$cat_id = fp_get_settings('fp_slider_cat');
	
	$slider_speed = fp_get_settings('fp_slider_speed');	
	if (empty($slider_speed) OR (!is_numeric($slider_speed))){
		$slider_speed = 5000;
	}
	$args = array(
		'cat' => $cat_id,
		'post_status' => 'publish',
		'ignore_sticky_posts' => 1,
		'posts_per_page' => 5
	);
		
?>
<script>
	jQuery(document).ready(function($) {
		$(".main-slider").show();
		$(".main-slider").owlCarousel({ 
			navigation : true,
			pagination: false,
			autoPlay : <?php echo $slider_speed; ?>,
			slideSpeed : 400,
			paginationSpeed : 400,
			singleItem: true 
		});
	});
</script>
<div class="main-slider section">
		<?php $query = new WP_Query( $args ); ?>
			<?php if ( $query -> have_posts() ) : ?>
				<?php while ( $query -> have_posts() ) : $query -> the_post(); ?>
						<?php if ( has_post_thumbnail()) { ?>				
							<div class="item">
								<a href="<?php the_permalink(); ?>" >
									<?php the_post_thumbnail( 'fp780_400' ); ?>
								</a>
								
								<div class="post-info">
																	
									<div class="title">
										<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
										<div class="sep"></div>
									</div>								
									
									<div class="post-excerpt">
										<?php 
											//display only first 160 characters in the excerpt.
											$title = get_the_excerpt('','',FALSE);
											$short_title = mb_substr($title, 0, 160);
											echo $short_title; 
											if (strlen($title) > 160){ 
												echo '...'; 
											} 
										?>											
									</div>
									
									<div class="read-more">
										<a href="<?php the_permalink() ?>"><?php _e('Read more', 'fairpixels'); ?></a>
									</div>
									
								</div>	
									
							</div>							
					<?php } ?>
				<?php endwhile; ?>
			<?php endif;?>
		<?php wp_reset_query();?>				
</div>