<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package  WordPress
 * @file     page.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 */
 ?>
<?php get_header(); ?>

<div id="content" class="single-page">
	
	<?php if (have_posts()) : ?>
		<?php while ( have_posts() ) : the_post(); ?>				
			<?php get_template_part( 'content', 'page' ); ?>
            <?php if ( comments_open() ) : ?>
            
            <div id='fb-root'></div>
<script>(function(d){ var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;} js = d.createElement('script'); js.id = id; js.async = true; js.src = "//connect.facebook.net/en_US/all.js#xfbml=1"; d.getElementsByTagName('head')[0].appendChild(js); }(document));</script>
<fb:comments colorscheme='light' href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'  xid='7951485411085066356'></fb:comments>
            
			<?php comments_template( '', true ); ?>
            <?php endif; ?>
		<?php endwhile; // end of the loop. ?>
	<?php endif ?>	

</div><!-- /content -->

<?php get_sidebar(); ?>	
<?php get_footer(); ?>