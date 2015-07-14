<?php
/**
 * The template for displaying the single column featured categories.
 * Gets the category for the posts from the theme options. 
 * If no category is selected, displays the latest posts.
 *
 * @package  WordPress
 * @file     section1.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 */
?>
<div id="single-cats" class="section">
	<!-- category1 -->
	
				
		<div class="feat-cat one-half">
			<?php
				$cat_id = fp_get_settings('fp_feat_singlecat1');
				$cat_icon = fp_get_settings('fp_feat_singlecat1_icon');
				$cat_icon = str_replace(' ', '', $cat_icon); 
			?>			
			
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
			<?php
				$args = array(
					'cat' => $cat_id,
					'post_status' => 'publish',
					'ignore_sticky_posts' => 1,
					'posts_per_page' => 4
				);
			?>
			<?php $query = new WP_Query( $args ); ?>
			<?php if ( $query -> have_posts() ) : ?>
				<?php $last_post  = $query -> post_count -1; ?>
				<?php while ( $query -> have_posts() ) : $query -> the_post(); ?>	
					
					<?php if ( $query->current_post == 0 ) { ?>			
						<div class="main-post">
							<?php							
							$feat_video = get_post_meta( $post->ID, 'fp_meta_post_video_code', true );
							
							if (!empty($feat_video)){ ?>
								<div class="thumb-wrap video-thumb">
									<?php echo $feat_video; ?>
								</div>
								
							<?php } else if ( has_post_thumbnail() ) {	?>
								<div class="thumb-wrap">
									<div class="thumb">
										<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'fp374_200' ); ?></a>
									</div>
									
									<?php if ( comments_open() ) : ?>
										<span class="comments main-color-bg">
											<i class="icon-comments"></i>
											<?php comments_popup_link( __('no comments', 'fairpixels'), __( '1 comment', 'fairpixels'), __('% comments', 'fairpixels')); ?>
										</span>		
									<?php endif; ?>	
									
									<div class="overlay">									
										<a class="post-link" href="<?php the_permalink() ?>"><i class="icon-link"></i></a>	
									</div>
								
								
								</div>
						
							<?php } ?>
							<div class="post-details">
								<h3>
									<a href="<?php the_permalink() ?>">
										<?php 
											//display only first 60 characters in the title.
											$title = the_title('','',FALSE);
											$short_title = mb_substr($title, 0, 60);
											echo $short_title; 
											if (strlen($title) > 60){ 
												echo '...'; 
											} 
										?>
									</a>
								</h3>
								<div class="entry-meta">
									<span class="date">
										<i class="icon-calendar"></i>
										<?php echo get_the_date(); ?>
									</span>
									
									<?php 
										$category = get_the_category(); 
										if($category[0]){?>
											
											<span class="category">
												<i class="icon-folder-close"></i>
												<?php echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>'; ?>
											</span>					
											<?php
										}
									?>
																		
									<span class="views">
										<i class="icon-eye-open"></i>									
										<?php echo getPostViews(get_the_ID()); ?>
									</span> 
								</div>
								<?php the_excerpt(); ?>
							</div>							
						</div><!-- /one-half -->
					<?php } ?>
			
					<?php if ( $query->current_post == 1 ) { ?>
						<div class="post-list">
						<?php } ?>
					
						<?php if ( $query->current_post >= 1 ) { ?>	
							<div class="item-post">
								<?php if ( has_post_thumbnail() ) {	?>
									<div class="thumb">
										<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'fp75_75' ); ?></a>
									</div>
								<?php } ?>								
								<div class="post-right">
									<h5>
										<a href="<?php the_permalink() ?>" rel="bookmark">
											<?php 
												//display only first 60 characters in the title.
												$title = the_title('','',FALSE);
												$short_title = mb_substr($title, 0, 60);
												echo $short_title; 
												if (strlen($title) > 60){ 
													echo '...'; 
												} 
											?>	
										</a>
									</h5>
									
									<div class="entry-meta">
										<span class="date">
											<i class="icon-calendar"></i>
											<?php echo get_the_date(); ?>
										</span>
										
										<?php if ( comments_open() ) : ?>
											<span class="comments">
												<i class="icon-comments"></i>
												<?php comments_popup_link( __('no comments', 'fairpixels'), __( '1 comment', 'fairpixels'), __('% comments', 'fairpixels')); ?>
											</span>		
										<?php endif; ?>											
									</div>
									
								</div>
								
							</div>
						<?php } ?>
						
				<?php if (( $query->post_count  > 1) AND ( $query->post_count  < 4) AND ($query->current_post == $last_post )) { ?>
					</div><!-- /one-half -->
				<?php } ?>
				
				<?php if ( ( $query->post_count  == 4) AND ($query->current_post == $last_post )) { ?>
					</div><!-- /one-half -->
				<?php } ?>						
				
			<?php endwhile; ?>
		<?php endif; ?>			
		</div><!-- /section1-cat -->
	
	<!-- /category1 -->
	
	<!-- category2 -->
	
				
		<div class="feat-cat one-half last">
			<?php
				$cat_id = fp_get_settings('fp_feat_singlecat2');
				$cat_icon = fp_get_settings('fp_feat_singlecat2_icon');
				$cat_icon = str_replace(' ', '', $cat_icon);
			?>			
			
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
			<?php
				$args = array(
					'cat' => $cat_id,
					'post_status' => 'publish',
					'ignore_sticky_posts' => 1,
					'posts_per_page' => 4
				);
			?>
			<?php $query = new WP_Query( $args ); ?>
			<?php if ( $query -> have_posts() ) : ?>
				<?php $last_post  = $query -> post_count -1; ?>
				<?php while ( $query -> have_posts() ) : $query -> the_post(); ?>	
					
					<?php if ( $query->current_post == 0 ) { ?>			
						<div class="main-post">
							<?php							
							$feat_video = get_post_meta( $post->ID, 'fp_meta_post_video_code', true );
							
							if (!empty($feat_video)){ ?>
								<div class="thumb-wrap video-thumb">
									<?php echo $feat_video; ?>
								</div>
								
							<?php } else if ( has_post_thumbnail() ) {	?>
								<div class="thumb-wrap">
									<div class="thumb">
										<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'fp374_200' ); ?></a>
									</div>
									
									<?php if ( comments_open() ) : ?>
										<span class="comments main-color-bg">
											<i class="icon-comments"></i>
											<?php comments_popup_link( __('no comments', 'fairpixels'), __( '1 comment', 'fairpixels'), __('% comments', 'fairpixels')); ?>
										</span>		
									<?php endif; ?>	
									
									<div class="overlay">									
										<a class="post-link" href="<?php the_permalink() ?>"><i class="icon-link"></i></a>	
									</div>
								
								
								</div>
						
							<?php } ?>
							<div class="post-details">
								<h3>
									<a href="<?php the_permalink() ?>">
										<?php 
											//display only first 60 characters in the title.
											$title = the_title('','',FALSE);
											$short_title = mb_substr($title, 0, 60);
											echo $short_title; 
											if (strlen($title) > 60){ 
												echo '...'; 
											} 
										?>
									</a>
								</h3>
								<div class="entry-meta">
									<span class="date">
										<i class="icon-calendar"></i>
										<?php echo get_the_date(); ?>
									</span>
									
									<?php 
										$category = get_the_category(); 
										if($category[0]){?>
											
											<span class="category">
												<i class="icon-folder-close"></i>
												<?php echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>'; ?>
											</span>					
											<?php
										}
									?>
									
									<span class="views">
										<i class="icon-eye-open"></i>									
										<?php echo getPostViews(get_the_ID()); ?>
									</span> 
								</div>
								<?php the_excerpt(); ?>
							</div>							
						</div><!-- /one-half -->
					<?php } ?>
			
					<?php if ( $query->current_post == 1 ) { ?>
						<div class="post-list">
						<?php } ?>
					
						<?php if ( $query->current_post >= 1 ) { ?>	
							<div class="item-post">
								<?php if ( has_post_thumbnail() ) {	?>
									<div class="thumb">
										<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'fp75_75' ); ?></a>
									</div>
								<?php } ?>								
								<div class="post-right">
									<h5>
										<a href="<?php the_permalink() ?>" rel="bookmark">
											<?php 
												//display only first 60 characters in the title.
												$title = the_title('','',FALSE);
												$short_title = mb_substr($title, 0, 60);
												echo $short_title; 
												if (strlen($title) > 60){ 
													echo '...'; 
												} 
											?>	
										</a>
									</h5>
									
									<div class="entry-meta">
										<span class="date">
											<i class="icon-calendar"></i>
											<?php echo get_the_date(); ?>
										</span>
										
										<?php if ( comments_open() ) : ?>
											<span class="comments">
												<i class="icon-comments"></i>
												<?php comments_popup_link( __('no comments', 'fairpixels'), __( '1 comment', 'fairpixels'), __('% comments', 'fairpixels')); ?>
											</span>		
										<?php endif; ?>											
									</div>
									
								</div>
								
							</div>
						<?php } ?>
						
				<?php if (( $query->post_count  > 1) AND ( $query->post_count  < 4) AND ($query->current_post == $last_post )) { ?>
					</div><!-- /one-half -->
				<?php } ?>
				
				<?php if ( ( $query->post_count  == 4) AND ($query->current_post == $last_post )) { ?>
					</div><!-- /one-half -->
				<?php } ?>						
				
			<?php endwhile; ?>
		<?php endif; ?>			
		</div><!-- /section1-cat -->
	
	<!-- /category2 -->
	
	

</div><!-- /feat-section3 -->