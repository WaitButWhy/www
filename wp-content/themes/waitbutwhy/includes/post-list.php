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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=507732202657943";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="feat-postlist" class="section">
	<?php
	
	
		
	
	
		//$cat_id = fp_get_settings('fp_feat_postlist_cat');
		$cat_id = "-30, -70, -73, -77, -78, -79";
		$cat_icon = fp_get_settings('fp_feat_postlist_cat_icon');
		
		$tag_id = 32;
		
		
		if ( get_query_var('paged') ) {
				$paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) {
				$paged = get_query_var('page');
			} else {
				$paged = 1;
			}
			
	?>
		
		
	<?php if (is_home() && $paged < 2 ){ ?>		
		
		<div class="cat-header">
			<div class="cat-title second-color-bg">
			
				<?php if (!empty($cat_icon)){ ?>
					<div class="cat-icon">					
						<i class="<?php echo $cat_icon; ?>"></i>					
					</div>					
				<?php } ?>
                
                
				
				<?php if (!empty($cat_id)){ 
					$cat_name = get_cat_name($cat_id);
					$cat_url = get_category_link($cat_id );
				?>
					<h4><a href="<?php echo esc_url( $cat_url ); ?>" ><?php echo $cat_name; ?></a></h4>	
				<?php } else{ ?>
					<h4><?php _e('Latest Posts', 'fairpixels'); ?></h4>	
				<?php } ?>
                
               
							
			</div>
		</div>
			
			
	<?php } ?>
			
	<div class="archive-postlist">
    
    
    <?php							
	if($paged < 2) {
								
								// featured 		
			$args = array(
				/*'cat' => $cat_id,*/
				'tag_id' => 32,
				'post_status' => 'publish',
				'ignore_sticky_posts' => 1,
				'post_type' => 'any',
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
									
					<div class="mainPost">
                    
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    
						<?php get_template_part( 'content', 'excerpt' ); ?>
                        
                        
                         <div class="homeSocial">
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
					//print_r($json[0]);
					$fbCount = intval($json[0]['shares']);*/
					
					// fb like
					
					/*$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/fql");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, '[{"q":"select%20%20like_count%20from%20link_stat%20where%20url=%22' . $url . '%22"}]');
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					$curl_results = curl_exec($ch);
					curl_close($ch);
					$json = json_decode($curl_results, true);
					$fbLikes = intval($json[0]['like_count']);*/

					// twitter
					/*$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, "http://urls.api.twitter.com/1/urls/count.json");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, '[{"url":"' . ltrim($url, "http://") . '"}]');
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					$curl_results = curl_exec($ch);
					curl_close($ch);
					$json = json_decode($curl_results, true);
					print_r($json);
					$twitterCount = intval($json[0]['count']);*/
					
									
					
					
					
					?>
                    
                    	<a href="<?php comments_link(); ?>"><i class="icon-comments"></i> <?php /*comments_popup_link( __('0', 'fairpixels'), __( '1', 'fairpixels'), __('%', 'fairpixels'));*/ echo full_comment_count(); ?></a>
                        
                        <span style="font-size:15px;"><!--&nbsp;&nbsp;&nbsp;Share:</span> <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>"><i class="icon-facebook" style="margin-left:4px;"></i> <?php //echo get_shares($url); ?></a>-->
                        
                        
                        <a href="https://twitter.com/intent/tweet?text=<?php urlencode(the_title()); ?>&url=<?php echo $url; ?>"><i class="icon-twitter"></i> <?php echo get_tweets($url); ?></a>
                        
                        <a href="https://plus.google.com/share?url=<?php echo $url; ?>"><i class="icon-google-plus"></i> <?php echo $gPlusCount; ?></a>
                        <div class="homeFBL"><fb:like href="<?php echo $url; ?>" layout="button_count" action="like" show_faces="false" share="false"></fb:like></div>
                        
					</div></div>
                    
                    
					</div>
					<?php 
					
					if($i == 0){ break; }
					
					$i++; ?>
				<?php endwhile; ?>
			<?php endif; ?>		
    	</div>
   
    
    
     <div class="cat-header">
				<div class="cat-title second-color-bg">
					<h4><?php if($paged == 1){ ?>Latest Posts <?php } else {?>Older Posts<?php } ?></h4>				
                    </div>
                </div>
    
		<?php				
		
		// clear featured query
		wp_reset_query();
					
			//if($paged > 1){						
			$args = array(
				'cat' => $cat_id,
				'tag__not_in' => $tag_id,
				'post_status' => 'publish',
				'ignore_sticky_posts' => 1,
				'posts_per_page' => 35,
				 'paged' => $paged
			);			
			
			 $wp_query = new WP_Query( $args ); //}
		?>					
		<?php $i = 0;  
		
		
		?>
        
			<?php if ( $wp_query -> have_posts() ) : ?>
				<?php while ( $wp_query -> have_posts() ) : $wp_query -> the_post();
				
				 ?>
					<?php								
						$post_class ="";
						if ( $i % 2 == 1 ){
							$post_class =" last";							
						}					
					?>								
					<div class="one-half<?php echo $post_class; ?>">
						<?php get_template_part( 'content', 'excerpt' ); ?>
                        
                        <div class="homeSocial">
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
					$fbCount = intval($json[0]['shares']);*/
					
					/*// fb like
					
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/fql");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, '[{"q":"select%20%20like_count%20from%20link_stat%20where%20url=%22' . $url . '%22"}]');
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					$curl_results = curl_exec($ch);
					curl_close($ch);
					$json = json_decode($curl_results, true);
					$fbLikes = intval($json[0]['like_count']);
					
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
                    
                    	<a href="<?php comments_link(); ?>"><i class="icon-comments"></i> <?php /*comments_popup_link( __('0', 'fairpixels'), __( '1', 'fairpixels'), __('%', 'fairpixels'));*/ echo full_comment_count(); ?></a>
                        
                        
                        
                       
                       
                      <span style="font-size:15px;"><!--&nbsp;&nbsp;&nbsp;Share:</span>  <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>"><i class="icon-facebook" style="margin-left:4px;"></i> <?php //echo get_shares($url); ?></a>-->
                        
                        
                        
                        <a href="https://twitter.com/intent/tweet?text=<?php urlencode(the_title()); ?>&url=<?php echo $url; ?>"><i class="icon-twitter"></i> <?php echo get_tweets($url); ?></a>
                        
                        <a href="https://plus.google.com/share?url=<?php echo $url; ?>"><i class="icon-google-plus"></i> <?php echo $gPlusCount; ?></a>
                        <div class="homeFBL2"><fb:like href="<?php echo $url; ?>" layout="button_count" action="like" show_faces="false" share="false"></fb:like></div>
                        
					</div></div>
                        
                        
					</div>
					<?php $i++;
					
					if($i > 9){ break; } 
					 ?>
				<?php endwhile; ?>
			<?php endif; ?>		
	</div>
    <?php } // endif < 2 ?> 
   <?php							
	if($paged < 2 || $paged >= 2) {  ?>
    
     <?php if($paged < 2){ ?>
    <div style="position: relative;top: 28px; clear:both;">
     <?php if(function_exists("wp_template_ad")) { wp_template_ad("1"); } ?>
    </div>
    <?php } ?>
    
    
    <div class="older-postlist">
    
     <div class="cat-header">
				<div class="cat-title second-color-bg">
					<h4><?php if($paged == 1){ ?>Previous Posts <?php } else {?>Older Posts<?php } ?></h4>				
                    </div>
                </div>
                
                <?php if($paged >= 2){ 
						
						// clear featured query
						wp_reset_query();
									
							//if($paged > 1){						
							$args = array(
								'cat' => $cat_id,
								'tag__not_in' => $tag_id,
								'post_status' => 'publish',
								'ignore_sticky_posts' => 1,
								'posts_per_page' => 35,
								 'paged' => $paged
							);			
							
							 $wp_query = new WP_Query( $args ); //}
				
				 } // end if page 2 ?>
                
                
              <div id="widget-tab2-content" class="tab-content" style="display: block;">
              <?php //$latest_posts = new WP_Query( $args_popular ); ?>
				<?php if ( $wp_query -> have_posts() ) : ?>
					<ul class="list post-list">
					<?php while ( $wp_query -> have_posts() ) : $wp_query -> the_post(); ?>					
						<li>
							<?php if ( has_post_thumbnail()) { ?>
							<div class="thumbnail">
								<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'fp75_75' ); ?></a>
							</div>
							<?php } ?>
							<div class="post-right">
								<h5>
									<a href="<?php the_permalink() ?>">
										<?php 
											//display only first 50 characters in the title.	
											$short_title = mb_substr(the_title('','',FALSE),0, 50);
											echo $short_title; 
											if (strlen($short_title) > 49){ 
												echo '...'; 
											} 
										?>	
									</a>
								</h5>
								<div class="entry-meta">
									
									
									<?php $comments = get_comments_number();
										//if ( $comments > 0 ) { ?>
										<span class="comments">
											<a href="<?php comments_link(); ?>"><i class="icon-comments"></i>
											<?php /*comments_popup_link( __('0', 'fairpixels'), __( '1', 'fairpixels'), __('%', 'fairpixels'));*/ echo full_comment_count(); ?></a>		&nbsp;&nbsp;&nbsp;<!--i class="icon-facebook" style="color:#AAAAAA"></i--> <!--fb:comments-count href="<?php the_permalink(); ?>"></fb:comments-count--> <?php //echo get_likes(get_permalink()); ?> <div class="homeFBL2"><fb:like href="<?php echo get_permalink(); ?>" layout="button_count" action="like" show_faces="false" share="false"></fb:like></div>
										</span>		
									<?php //} ?>	
								</div>
							</div>
						</li>
					<?php endwhile; ?>
					</ul>
				<?php endif;?>
				<?php //wp_reset_query();?>	
			</div>
                
    </div>
	
	<?php } ?>
    
    <a class="fullArchive" href="<?php echo home_url(); ?>/archive">Archive</a>
	<?php fp_pagination(); ?>
    
    <?php //if(function_exists("wp_template_ad")) { wp_template_ad("1"); } ?>
    
	<?php wp_reset_query();?>	
</div>

<?php if($paged >= 2){ ?>
</div>
<?php } ?>