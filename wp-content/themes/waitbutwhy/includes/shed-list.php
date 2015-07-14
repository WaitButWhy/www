<?php
/**
 * The template for displaying the single column featured categories.
 * Gets the category for the posts from the theme options. 
 * If no category is selected, displays the latest posts.
 *
 * @package  WordPress
 * @file     feat-post.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 */
?>
<div id="feat-postlist" class="section">
	<?php
		//$cat_id = fp_get_settings('fp_feat_postlist_cat');
		$cat_id = "30, 76";
		$cat_icon = fp_get_settings('fp_feat_postlist_cat_icon');
		
	//$paged = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;
	//echo get_query_var('page'); echo get_query_var('paged');
	?>
		
		
	
			
	<div class="archive-postlist">
    
    
    <?php							
	//if($paged < 2) {
										
			$args = array(
				'cat' => $cat_id,
				'post_status' => 'publish',
				'ignore_sticky_posts' => 1,
				 'paged' => $paged
			);			
		?>					
		<?php $i = 0; 
			
		?>
        <div class="mainPostEntry">
        
       
        
		<?php $wp_query = new WP_Query( $args ); ?>
			<?php if ( $wp_query -> have_posts() ) : ?>
				<?php while ( $wp_query -> have_posts() ) : $wp_query -> the_post(); 
				
				
				?>
                
                <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                <br />
                
                 <div class="blueBar">
                    <div class="date"><?php the_time('m.d.y') ?></div>
                    
                    <div class="share"> 
                    
                    <?php 
					/* social calls */
					$url = get_permalink();
					
					// g+
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, "https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					$curl_results = curl_exec($ch);
					curl_close($ch);
					$json = json_decode($curl_results, true);
					$gPlusCount = intval($json[0]['result']['metadata']['globalCounts']['count']);
					
					/*// fb
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, "http://graph.facebook.com/");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, '[{"id":"' . $url . '"}]');
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					$curl_results = curl_exec($ch);
					curl_close($ch);
					$json = json_decode($curl_results, true);
					$fbCount = intval($json[0]['shares']);
					
					// twitter
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, "http://cdn.api.twitter.com/1/urls/count.json");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, '[{"url":"' . $url . '"}]');
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					$curl_results = curl_exec($ch);
					curl_close($ch);
					$json = json_decode($curl_results, true);
					$twitterCount = intval($json[0]['count']);*/
					?>
                    
                    	<i class="icon-comments"></i> <?php echo full_comment_count(); //comments_popup_link( __('0', 'fairpixels'), __( '1', 'fairpixels'), __('%', 'fairpixels')); ?>
                        <!--a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>"><i class="icon-facebook"></i> <?php echo $fbCount; ?></a-->
                        <a href="https://twitter.com/intent/tweet?text=<?php urlencode(the_title()); ?>&url=<?php echo $url; ?>"><i class="icon-twitter"></i> <?php echo get_tweets($url); ?></a>
                        
                        <a href="https://plus.google.com/share?url=<?php echo $url; ?>"><i class="icon-google-plus"></i> <?php echo $gPlusCount; ?></a>
                        
                         <div class="homeFBL2"><fb:like href="<?php echo $url; ?>" layout="button_count" action="like" show_faces="false" share="false"></fb:like></div>
                        
					</div>
                
                </div>
                
									
					<div class="mainPost">
						<?php get_template_part( 'content', 'excerpt' ); ?>
					</div>
					<?php 
					
					//if($i == 0){ break; }
					
					$i++; ?>
				<?php endwhile; ?>
			<?php endif; ?>		
    	</div>
    <?php //} ?>
    
    
    </div>
    <?php if(function_exists("wp_template_ad")) { wp_template_ad("1"); } ?>
    
    <a class="fullArchive" href="<?php echo home_url(); ?>">Regular Posts</a>
	<?php fp_pagination(); ?>
	<?php wp_reset_query();?>	
</div>