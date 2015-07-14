<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package  WordPress
 * @file     author.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 */
?>
<?php get_header(); ?>

	<div id="content" class="post-archive author-archive">
    
    
    	<div class="archive">
				 <div class="older-postlist">
                 
                  <div id="widget-tab2-content" class="tab-content" style="display: block;">
                  
                  
		<?php if ( have_posts() ) : ?>
			<?php
				/* Queue the first post, that way we know
			     * what author we're dealing with (if that is the case).
				 *
				 * We reset this later so we can run the loop
				 * properly with a call to rewind_posts().
				 */
				the_post();
			?>

			<header class="archive-header">
				<h3 class="archive-title"><?php printf( __( 'Author Archives: %s', 'fairpixels' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h3>
			</header>

			<?php
				/* Since we called the_post() above, we need to
			 	 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();
			?>

			<?php
				// If a user has filled out their description, show a bio on their entries.
				if ( get_the_author_meta( 'description' )) {?>
					<div class="archive-desc">							
						<div class="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), 68 ); ?>
						</div>	
					
						<div class="author-description">								
							<h4><?php printf( __( 'About %s', 'fairpixels' ), get_the_author() ); ?></h4>
								<?php the_author_meta( 'description' ); ?>																		
						</div><!-- /author-description -->
					</div><!-- /author-info -->
			<?php } ?>
			
            
            
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
            
            
			<?php fp_pagination(); ?>
		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'fairpixels' ); ?></h1>
				</header><!-- .entry-header -->
				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'fairpixels' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</article><!-- /post-0 -->

		<?php endif; ?>
        
        </div></div></div>
	</div><!-- /content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>