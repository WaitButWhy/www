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

<div id="content" class="archive-page">
	<?php if (have_posts()) :?>
			<?php while ( have_posts() ) : the_post(); ?>				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="archive-header">
						<h3 class="archive-title"><?php the_title(); ?></h3>
					</header><!-- /entry-header -->
					<div class="entry-content">
						<?php the_content(); ?>						
					</div><!-- /entry-content -->
				</article><!-- /post-<?php the_ID(); ?> -->
			<?php endwhile; ?>
		<?php endif; ?>
		
		<div class="archive-columns">
		
			<div class="row">
			
				<div class="one-half">
					<h4><?php _e('Last 10 Posts', 'fairpixels') ?></h4>
					<ol class="archive-list">
						<?php
							$recent_posts = wp_get_recent_posts();
							foreach( $recent_posts as $recent ){
								echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li>';
							}
						?>
					</ol>					
				</div>
				
				<div class="one-half last">
					<h4><?php _e('Most Popular Tags:', 'fairpixels')?></h4>
						<?php wp_tag_cloud('number=10&format=list&topic_count_text_callback=default_topic_count_text&orderby=count&order=DESC'); ?>				
				</div>
			</div> <!-- /row -->
			
			<div class="row">
								
				<div class="one-half">
					<h4><?php _e('Archives by Category:', 'fairpixels')?></h4>
					<ul class="archive-list">
						<?php wp_list_categories('title_li=') ?>
					</ul>
				</div>	

				<div class="one-half last">
					<h4><?php _e('Archives By Month:', 'fairpixels')?></h4>
					<ul class="sp-list unordered-list">
						<?php wp_get_archives('type=monthly&show_post_count=1'); ?>
					</ul>
				</div>
			
			</div> <!-- /row -->
			
			<div class="row">
				<div class="one-half">
					<h4><?php _e('Pages:', 'fairpixels')?></h4>
					<ul class="pages">
						<?php wp_list_pages("title_li=" ); ?>
					</ul>
				</div>
				
				<div class="one-half last">
					<h4><?php _e('Search Archives:', 'fairpixels')?></h4>
					<div class="archive-search">
						<?php get_search_form(); ?>
					</div>
				</div>
			
			</div> <!-- /row -->
		</div><!-- /archive-columns -->	
	
</div><!-- /content -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>