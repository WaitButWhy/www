<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package  WordPress
 * @file     search.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 */
?>
<?php get_header(); ?>
	<div id="content" class="post-archive">
			<div class="archive">
				 <div class="older-postlist">
                 
                  <div id="widget-tab2-content" class="tab-content" style="display: block;">
                 
					<?php if ( have_posts() ) : ?>

						<header class="archive-header">
							<h2 class="archive-title">
								<?php printf( __( 'Search Results for: %s', 'fairpixels' ), '<span>' . get_search_query() . '</span>' ); ?>
							</h2>
						</header>
				
						
                        
                        <ul class="list post-list">
							<?php $i = 0; ?>				
							<?php while ( have_posts() ) : the_post(); ?>
								<li>
							<?php if ( has_post_thumbnail()) { ?>
							<div class="thumbnail">
								<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'fp75_75' ); ?></a>
							</div>
							<?php } ?>
							<div class="post-right">
								<h5>
									<a href="<?php the_permalink() ?>">
										<?php 
											//display only first 50 characters in the title.	
											$short_title = mb_substr(the_title('','',FALSE),0, 50);
											echo $short_title; 
											if (strlen($short_title) > 49){ 
												echo '...'; 
											} 
										?>	
									</a>
								</h5>
								<div class="entry-meta">
									
									
									<?php $comments = get_comments_number();
										//if ( $comments > 0 ) { ?>
										<span class="comments">
											<a href="<?php comments_link(); ?>"><i class="icon-comments"></i>
											<?php /*comments_popup_link( __('0', 'fairpixels'), __( '1', 'fairpixels'), __('%', 'fairpixels'));*/ echo full_comment_count(); ?></a>		&nbsp;&nbsp;&nbsp;<!--i class="icon-facebook" style="color:#AAAAAA"></i--> <!--fb:comments-count href="<?php the_permalink(); ?>"></fb:comments-count--> <?php //echo get_likes(get_permalink()); ?> <div class="homeFBL2"><fb:like href="<?php echo get_permalink(); ?>" layout="button_count" action="like" show_faces="false" share="false"></fb:like></div>
										</span>		
									<?php //} ?>	
								</div>
							</div>
						</li>
								<?php $i++; ?>
							<?php endwhile; ?>
						</ul>
                        
                        </div>
                
    </div>
						 <a class="fullArchive" href="<?php echo home_url(); ?>/archive">Archive</a>
	<?php fp_pagination(); ?>
					
					<?php else : ?>

						<article id="post-0" class="post no-results not-found">
							<header class="archive-header">
								<h3 class="archive-title">								
									<?php _e( 'Nothing Found', 'fairpixels' ); ?>
								</h3>
							</header><!-- /entry-header -->

							<div class="entry-content">
								<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'fairpixels' ); ?></p>
								<div class="box-550">
									<?php get_search_form(); ?>
								</div>
							</div><!-- /entry-content -->
						</article><!-- /post-0 -->

					<?php endif; ?>
				</div><!-- /search-results -->
		</div><!-- /content -->

<?php get_sidebar('left'); ?>		
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>