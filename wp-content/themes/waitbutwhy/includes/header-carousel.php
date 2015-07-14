<?php
/**
 * The template for displaying the single column featured categories.
 * Gets the category for the posts from the theme options. 
 * If no category is selected, displays the latest posts.
 *
 * @package  WordPress
 * @file     header-carousel.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 */
?>

<script>
	jQuery(document).ready(function($) {
		$("#carousel-posts").owlCarousel({
			slideSpeed: 200,					//Slide speed in milliseconds
			paginationSpeed: 800,				//Pagination speed in milliseconds
			autoPlay: 5000,						//Autoplay every 5 seconds. 
			stopOnHover: true,					//Stop autoplay on mouse hover
			navigation: true,					//Display "next" and "prev" buttons.
			pagination: false,					//Display pagination
			items : 3,							//Number of items to display	
			itemsDesktop : [1199,3],			//Number of slides visible with a particular browser width.
			itemsTablet: [736,2],
			itemsMobile: [462,1]	
		});
	});
</script>

<div class="header-carousel section main-color-bg">
		
	<div class="content-wrap">
		<div id="carousel-posts" class="owl-carousel">
			
			<?php							
				$cat_id = fp_get_settings('fp_carousel_cat');
				
				$args1 = array(
					'cat' => $cat_id,
					'post_status' => 'publish',
					'ignore_sticky_posts' => 1,
					'posts_per_page' => 10
				);	
			?>
			
			<?php $query = new WP_Query( $args1 ); ?>
				<?php if ( $query -> have_posts() ) : ?>
					<?php while ( $query -> have_posts() ) : $query -> the_post(); ?>
						
						 
						<?php if ( has_post_thumbnail() ) {	?>
							 <div class="item">
								<div class="thumbnail overlay">
									<a href="<?php the_permalink(); ?>" >
										<?php the_post_thumbnail( 'fp374_200' ); ?>
									</a>
								</div>
								
								
								<div class="post-details">
									<div class="post-wrap">
									<div class="post-title">
										<div class="post-icon"><i class="icon-file-text-alt"></i></div>
										<h4><a href="<?php the_permalink() ?>">																				
												<?php 
													$excerpt = get_the_title();
													echo mb_substr($excerpt,0, 50);
													if (strlen($excerpt) > 49){ 
														echo '...'; 
													}
												?>
											</a>
										</h4>
									</div>
									
									<div class="post-desc">
										<div class="excerpt">
											<?php 
												$excerpt = get_the_excerpt();
												echo mb_substr($excerpt,0, 120);
												if (strlen($excerpt) > 119){ 
													echo '...'; 
												}
											?>
										</div>
										<div class="more">
											<a href="<?php the_permalink() ?>"><?php _e('Read more', 'fairpixels'); ?></a>
										</div>
									</div>	
									
									</div>
								</div>
								
							</div>
						<?php } ?>
						 
					<?php endwhile; ?>
				<?php endif; ?>					
			<?php wp_reset_query();		//reset the query ?>

		</div>
	</div>
			
</div>