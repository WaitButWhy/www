<?php
/**
 * Plugin Name: FairPixels: Slider Widget
 * Plugin URI: http://fairpixels.com
 * Description: This widget displays latests posts featured images
 * Version: 1.0
 * Author: FairPixels
 * Author URI: http://fairpixels.com
 *
 */

/**
 * Add function to widgets_init that'll load our widget.
 */
add_action('widgets_init', 'fairpixels_slider_widgets');

function fairpixels_slider_widgets(){
	register_widget('fairpixels_slider_widget');
}

/**
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 */ 
class fairpixels_slider_widget extends WP_Widget {
	
	/**
	 * Widget setup.
	 */
	function fairpixels_slider_widget(){
		/* Widget settings. */	
		$widget_ops = array('classname' => 'widget_slider', 'description' => 'Displays the slider in the sidebar.');
		
		/* Create the widget. */
		$this->WP_Widget('fairpixels_slider_widget', 'FairPixels: Slider', $widget_ops);
	}
	
	/**
	 * display the widget on the screen.
	 */
	function widget($args, $instance){	
		extract($args);
		echo $before_widget;
		$title = $instance['title'];
		$cat_id = $instance['categories'];
		$posts = $instance['posts'];
				
		$args = array(
				'cat' => $cat_id,
				'post_status' => 'publish',
				'ignore_sticky_posts' => 1,
				'posts_per_page' => $posts
			);
				
			
			if ( $title ){			
				echo $before_title . $title . $after_title;
			} ?>
			
			<script>
				jQuery(document).ready(function($) {				
					$(".slider-widget-posts").show();
					$('.slider-widget-posts').flexslider({				// slider settings
						animation: "slide",								// animation style
						controlNav: true,								// slider thumnails class
						slideshow: true,								// enable automatic sliding
						directionNav: false,							// disable nav arrows
						slideshowSpeed: 6000,   						// slider speed
						smoothHeight: false,
						keyboard: true,
						mousewheel: true,
					});	
				});
			</script>
			
			<div class="slider-widget-posts" >
				<ul class="slides">
					<?php $query = new WP_Query( $args ); ?>
					<?php while($query->have_posts()): $query->the_post(); ?>						
						<?php if(has_post_thumbnail()): ?>								
							<li>									
								<?php if ( has_post_thumbnail() ) {	?>
									<div class="thumb">
										<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'fp374_200' ); ?></a>
																				
									</div>
								<?php } ?>
								
																	
									<h4>
										<a href="<?php the_permalink() ?>">
											<?php 
												//display only first 60 characters in the title.
												$title = the_title('','',FALSE);
												$short_title = mb_substr($title, 0, 60);
												echo $short_title; 
												if (strlen($title) > 60){ 
													echo '...'; 
												} 
											?>
										</a>
									</h4>
																		
								
								
							</li>														
						<?php endif; ?>							
					<?php endwhile; ?>
				</ul>
			</div>
							
		<?php
		echo $after_widget;
	}
	
	/**
	 * update widget settings
	 */
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['categories'] = $new_instance['categories'];
		$instance['posts'] = $new_instance['posts'];
		return $instance;
	}
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */	
	function form($instance){
		$defaults = array('title' => '', 'categories' => 'all', 'posts' => 5);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'fairpixels'); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e('Filter by Category:', 'fairpixels'); ?></label> 
			<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>>all categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('posts'); ?>"><?php _e('Number of posts:', 'fairpixels'); ?></label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo $instance['posts']; ?>" />
		</p>
	<?php }
}
?>