<?php
/**
 * Template Name: Blog
 * Description: A Page Template to display bloag archives with the sidebar.
 *
 * @package  WordPress
 * @file     page-blog.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 */
?>
<?php get_header(); ?>

<div id="content" class="archive post-archive">
	<?php
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		query_posts("paged=$paged");
	?>	
		<header class="archive-header">
			<h2 class="archive-title"><?php the_title(); ?></h2>			
		</header><!-- /archive-header -->
			
			<?php if ( have_posts() ) : ?>
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
						</div>
						<?php $i++; ?>
					<?php endwhile; ?>
				</div>
				<?php fp_pagination(); ?>
				<?php wp_reset_query();?>
				<?php else : ?>

						<article id="post-0" class="post no-results not-found">
							<header class="entry-header">
								<h1 class="entry-title"><?php _e( 'Nothing Found', 'fairpixels' ); ?></h1>
							</header><!-- /entry-header -->

							<div class="entry-content">
								<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'fairpixels' ); ?></p>
								<?php get_search_form(); ?>
							</div><!-- /entry-content -->
						</article><!-- /post-0 -->

					<?php endif; ?>
	</div><!-- /content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>