<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package  WordPress
 * @file     content-page.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<h1><?php the_title(); ?></h1>
	</header><!-- /entry-header -->
	
	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'fairpixels' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- /entry-content -->

</article><!-- /post-<?php the_ID(); ?> -->