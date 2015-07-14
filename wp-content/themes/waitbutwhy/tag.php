<?php
/**
 * The template used to display Tag Archive pages
 *
 * @package  WordPress
 * @file     tag.php
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

<div id="content" class="homepage">
	<?php if ( have_posts() ) : ?>
		
		<header class="archive-header">
			<h2 class="archive-title"><?php printf( __( 'Tag: %s', 'fairpixels' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h2>
			
			<?php
				$tag_description = tag_description();
				if ( ! empty( $tag_description )) {
					echo apply_filters( 'tag_archive_meta', '<div class="archive-meta">' . $tag_description . '</div>' );
				}
			?>
		</header>
<div id="feat-postlist" class="section">

		<div class="archive-postlist">
			<?php $i = 0; ?>				
			<?php while ( have_posts() ) : the_post(); ?>
				<?php								
					$post_class ="";
					if ( $i % 2 == 1 ){
						$post_class =" last";
					}					
				?>								
				<div class="one-half<?php echo $post_class; ?>">
					<?php get_template_part( 'content', 'excerpt' ); ?>
                    
                    
                      <div class="homeSocial">
                        <div class="share"> 
                   <?php /* social calls */
					$url = get_permalink(); ?>
                    
                    	<a href="<?php comments_link(); ?>"><i class="icon-comments"></i> <?php /*comments_popup_link( __('0', 'fairpixels'), __( '1', 'fairpixels'), __('%', 'fairpixels'));*/ echo full_comment_count(); ?></a>
                        
                        
                        
                       
                       
                      <span style="font-size:15px;"><!--&nbsp;&nbsp;&nbsp;Share:</span>  <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>"><i class="icon-facebook" style="margin-left:4px;"></i> <?php //echo get_shares($url); ?></a>-->
                        
                        
                        
                        <a href="https://twitter.com/intent/tweet?text=<?php urlencode(the_title()); ?>&url=<?php echo $url; ?>"><i class="icon-twitter"></i> <?php echo get_tweets($url); ?></a>
                        
                        <a href="https://plus.google.com/share?url=<?php echo $url; ?>"><i class="icon-google-plus"></i> <?php echo $gPlusCount; ?></a>
                        <div class="homeFBL2"><fb:like href="<?php echo $url; ?>" layout="button_count" action="like" show_faces="false" share="false"></fb:like></div>
                        
					</div></div>
                    
                    
                    
				</div>
				<?php $i++; ?>
			<?php endwhile; ?>
		</div>
        
</div>
		
		 <a class="fullArchive" href="<?php echo home_url(); ?>/archive" style="clear: both;">Archive</a>
	<?php fp_pagination(); ?>
        
	<?php else : ?>
		<article id="post-0" class="post no-results not-found">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Nothing Found', 'fairpixels' ); ?></h1>
			</header>

			<div class="entry-content">
				<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'fairpixels' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</article><!-- /post-0 -->
	<?php endif; ?>
</div><!-- /content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
