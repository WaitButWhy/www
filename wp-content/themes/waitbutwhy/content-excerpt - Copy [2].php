<?php
/**
 * The template for displaying content in the archive and search results template
 *
 * @package  WordPress
 * @file     content-excerpt.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	
	<?php							
		$feat_video = get_post_meta( $post->ID, 'fp_meta_post_video_code', true );
		
		if (!empty($feat_video)){ ?>
			<div class="thumb-wrap video-thumb">
				<?php echo $feat_video; ?>
			</div>
		
		<?php } else if ( has_post_thumbnail() ) {	?>
		
		<div class="thumb-wrap">
			<div class="thumb">
				<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'fp780_400' ); ?></a>
			</div>
			
			<?php if ( comments_open() ) : ?>
				<span class="comments main-color-bg">
					<i class="icon-comments"></i>
					<?php comments_popup_link( __('no comments', 'fairpixels'), __( '1 comment', 'fairpixels'), __('% comments', 'fairpixels')); ?>
				</span>		
			<?php endif; ?>			
			
			<div class="overlay">									
				<a class="post-link" href="<?php the_permalink() ?>"><i class="icon-link"></i></a>	
			</div>
		</div>

	<?php } ?>
	
    <?php if (empty($feat_video)){ ?>
	<header class="entry-header">							
		
        
        <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
		<!--div class="entry-meta">
			<span class="date">
				<i class="icon-calendar"></i>
				<?php echo get_the_date(); ?>
			</span>
			
			<?php 
				$category = get_the_category(); 
				if($category[0]){?>
					
					<span class="category">
						<i class="icon-folder-close"></i>
						<?php echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>'; ?>
					</span>					
					<?php
				}
			?>
				
			<span class="views">
				<i class="icon-eye-open"></i>									
				<?php echo getPostViews(get_the_ID()); ?>
			</span>  
		</div-->		
	</header>
	
	<div class="entry-excerpt">
		<?php the_excerpt(); ?>
	</div>
    <?php } ?>
	
</article><!-- /post-<?php the_ID(); ?> -->
