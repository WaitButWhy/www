<?php
/**
 * The Template for displaying all single posts.
 *
 * @package  WordPress
 * @file     single.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 */
?>
<?php get_header(); ?>

<div id="content" class="single-post">
	
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', 'mandarin' ); ?>
        <!-- fb commentz -->
        <div id='fb-root'></div>
<script>(function(d){ var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;} js = d.createElement('script'); js.id = id; js.async = true; js.src = "//connect.facebook.net/en_US/all.js#xfbml=1"; d.getElementsByTagName('head')[0].appendChild(js); }(document));</script>
<fb:comments colorscheme='light' href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'  xid='7951485411085066356'></fb:comments>
		<?php comments_template( '', true ); ?>		
	<?php endwhile; // end of the loop. ?>
		
         
    <?php if(function_exists("wp_template_ad")) { wp_template_ad("1"); } ?>
    
     <a class="homeBtn" href="<?php echo home_url(); ?>">Home</a>
     <a class="fullArchive" href="<?php echo home_url(); ?>/archive/">Archive</a>
	<?php fp_pagination(); ?>
    
</div><!-- /content -->

<?php //get_sidebar(); ?>	
	<div id="sidebar">
		<?php dynamic_sidebar( 'mandarin' );	 ?>
	</div><!-- /sidebar -->
<?php get_footer(); ?>