<?php
/**
 * Template Name: The Shed
 * Description: A Page Template to display bloag archives with the sidebar.
 *
 * @package  WordPress
 * @file     page-home.php
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

<style>

	/*span.comments{ display:none; }*/
	article.post{ margin-bottom:30px; padding-bottom:30px; border-bottom: 2px solid #f7f7f7;}
	h3 a{ font-size:30px; color:#3e769d; }

</style>

<div id="content" class="homepage">


	

 <div class="cat-header" style="margin-top: 40px;">
				<div class="cat-title second-color-bg">
					<h4><?php echo the_title(); ?></h4>				
                    </div>
                </div>


<div class="contact-text">		
				<?php while ( have_posts() ) : the_post(); ?>			
					<?php the_content(); ?>			
				<?php endwhile; // end of the loop. ?>
    </div>


	<?php
		
		wp_reset_query();
		
		
		//include posts list
		if ( fp_get_settings( 'fp_show_feat_postlist' ) == 1 ) {
			get_template_part( 'includes/shed-list' );
		}
	?>
		
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>