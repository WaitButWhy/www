<?php
/**
 * Template Name: Mandarin
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


	

<h1 style="color: #000;margin-bottom: 25px;"><?php the_title(); ?></h1>


<div class="contact-text">		
				<?php while ( have_posts() ) : the_post(); ?>			
					<?php the_content(); ?>			
				<?php endwhile; // end of the loop. ?>
    </div>


	<?php
		
		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}
		
		
		//include posts list
		if ( fp_get_settings( 'fp_show_feat_postlist' ) == 1 ) {
			get_template_part( 'includes/mandarin-list' );
		}
	?>
		
</div>
<?php //get_sidebar('mandarin'); ?>
	<div id="sidebar">
		<?php dynamic_sidebar( 'mandarin' );	 ?>
	</div><!-- /sidebar -->
<?php get_footer(); ?>