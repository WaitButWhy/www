<?php
/**
 * Template Name: Archives
 * Description: A Page Template to display archives with the sidebar.
 *
 * @package  WordPress
 * @file     page-archives.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 */
?>
<?php get_header(); ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=507732202657943";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="content" class="archive-page">
	<div class="older-postlist">
    
     <div class="cat-header">
				<div class="cat-title second-color-bg">
					<h4><?php echo the_title(); ?></h4>				
                    </div>
                </div>
                
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php echo the_content(); ?>
                
                
                <?php
				endwhile; endif; 
				
				
				
				$cat_id = "1, 2, 73, 76, -30, -70, -77, -78, 79";
				
				$args = array(
				'cat' => $cat_id,
				'post_status' => 'publish',
				'ignore_sticky_posts' => 1,
				'posts_per_page' => 50,
				 'paged' => $paged
			);			
			
			?>
            
            <?php $wp_query = new WP_Query( $args ); ?>
                
              <div id="widget-tab2-content" class="tab-content" style="display: block;">
              <?php //$latest_posts = new WP_Query( $args_popular ); ?>
				<?php if ( $wp_query -> have_posts() ) : ?>
					<ul class="list post-list">
					<?php while ( $wp_query -> have_posts() ) : $wp_query -> the_post(); ?>					
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
											<i class="icon-comments"></i>
											<?php /*comments_popup_link( __('0', 'fairpixels'), __( '1', 'fairpixels'), __('%', 'fairpixels'));*/ echo full_comment_count(); ?>		&nbsp;&nbsp;&nbsp;<!--i class="icon-facebook" style="color:#AAAAAA"></i--> <!--fb:comments-count href="<?php the_permalink(); ?>"></fb:comments-count--> <?php //echo get_likes(get_permalink()); ?><div class="homeFBL2"><fb:like href="<?php echo get_permalink(); ?>" layout="button_count" action="like" show_faces="false" share="false"></fb:like></div>
										</span>		
									<?php //} ?>	
								</div>
							</div>
						</li>
					<?php endwhile; ?>
					</ul>
				<?php endif;?>
				<?php //wp_reset_query();?>	
			</div>
                
    </div>
    
    
    <?php fp_pagination(); ?>
    
	
</div><!-- /content -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>