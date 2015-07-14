<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package  WordPress
 * @file     content-single.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 */
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=689761124373742";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div class="post-wrap">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
	<header class="entry-header">
		<h1><?php the_title(); ?></h1>
        
        <div class="entry-meta">
				
				<div class="left" style="display:block;">
        <?php
		$showDate = get_field( "show_post_date" );
		if( $showDate )
		{?>
			
					<span class="date">
						<i class="icon-calendar"></i>
						<?php echo get_the_date(); ?>
					</span>
		<?php
        }
		
		
		/*$showAuthor = get_field( "show_post_author" );
		if( $showAuthor )
		{
			?>
            By <?php the_author(); ?> 
			<?php
		}*/
		
		$showAuthor = get_field( "show_post_author" );
		if( !$showAuthor )
		{
?>

By <?php the_author(); ?> 
<br /><br />

<?php }// end if ?>

				</div>
        </div>
        <!-- end meta -->
		
		<?php /*if ( fp_get_settings( 'fp_show_post_meta' ) == 1 ){ ?>
			<div class="entry-meta">
				
				<div class="left">
					<span class="date">
						<i class="icon-calendar"></i>
						<?php echo get_the_date(); ?>
					</span>
					
					<?php if ( comments_open() ) : ?>
						<span class="comments">
							<i class="icon-comments"></i>
							<?php comments_popup_link( __('no comments', 'fairpixels'), __( '1 comment', 'fairpixels'), __('% comments', 'fairpixels')); ?>
						</span>		
					<?php endif; ?>	
					
					<span class="views">
						<i class="icon-eye-open"></i>								
						<?php echo getPostViews(get_the_ID()); ?>
					</span> 
					
					<span class="category">
						<i class="icon-folder-close-alt"></i>									
						<?php the_category(', ' ); ?>
					</span>
											
					<?php the_tags('<span class="tags"><i class="icon-tags"></i>',' , ','</span>'); ?>
				</div>
				
				<?php /*if ( fp_get_settings( 'fp_show_post_social' ) == 1 ){ ?>
					<div class="social">
						<span class="fb">
							<a href="http://facebook.com/share.php?u=<?php the_permalink() ?>&amp;t=<?php the_title(); ?>" target="_blank"><i class=" icon-facebook-sign"></i></a>
						</span>				
						
						<span class="twitter">
							<a href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink();?>" target="_blank"><i class="icon-twitter"></i></a>				
						</span>
						
						<span class="gplus">
							<a href="https://plus.google.com/share?url=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" target="_blank"><i class="icon-google-plus-sign"></i></a>			
						</span>
						
						<span class="pinterest">
							<?php
								$thumbnail = "";
								if (has_post_thumbnail() ){
									 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
									 $thumbnail = $image[0];
								}
							?>
							<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo $thumbnail; ?>&amp;description=<?php the_title() ?>" target="_blank">		
							<i class="icon-pinterest"></i>					
							</a>					
						</span>				
					</div>
				<?php }/ ?>
			</div>
		<?php }*/ ?>
	</header>
	
	
	<div class="entry-content-wrap">		
				
		
		<?php $saved_img_ids = get_post_meta($post->ID, 'fp_meta_gallery_img_ids', true); ?>
		
		<?php if (!empty($saved_img_ids)) { ?>
				
			<script>
				jQuery(document).ready(function($) {
					
					$('.entry-slider').show();
					$('.entry-slider-nav').flexslider({
						animation: "slide",
						controlNav: false,
						animationLoop: true,
						slideshow: false,
						itemWidth: 190,
						itemMargin: 0,
						asNavFor: '.entry-slider-main'
					});
					  
					$('.entry-slider-main').flexslider({
						animation: "slide",
						controlNav: false,
						animationLoop: true,
						slideshow: true,
						sync: ".entry-slider-nav"
					});
				});
			</script>

			<div class="entry-slider">
				<div class="entry-slider-main flexslider">
					<ul class="slides">
						<?php $img_ids = explode(',',$saved_img_ids);
							foreach($img_ids as $img_id) { 
								if (is_numeric($img_id)) {
									$image_attributes = wp_get_attachment_image_src( $img_id, 'fp780_400');?>
									<li><img class="attachment-fp780_400" src="<?php echo $image_attributes[0]; ?>"></li>
									<?php									
								}
							}
						?>
					</ul>
				</div>
				<div class="entry-slider-nav main-color-bg flexslider">
					<ul class="slides">
						<?php 
							foreach($img_ids as $img_id) { 
									if (is_numeric($img_id)) {
										$image_attributes = wp_get_attachment_image_src( $img_id, 'fp239_130');?>
										<li><img src="<?php echo $image_attributes[0]; ?>"></li>
										<?php									
									}
								}
						?>
					</ul>
				</div>
			</div>
		<?php } ?>
	
			<?php				
				$show_video = get_post_meta($post->ID, 'fp_meta_post_add_video', true); 				
				
				if ($show_video == 1){
					$video_code = get_post_meta($post->ID, 'fp_meta_post_video_code', true); ?>
					
					<div class="entry-video">
						<?php echo $video_code; ?>
					</div>					
			<?php					
				}
				?>
				
				<?php 
				$show_feat_img = get_post_meta($post->ID, 'fp_meta_post_add_featimg', true); 
		
				if ($show_feat_img == 1){ ?>
					<div class="entry-image">
						<?php the_post_thumbnail( 'fp780_400' ); ?>
					</div>					
				<?php 
				}
			?>
		
		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'fairpixels' ) . '</span>', 'after' => '</div>' ) ); ?>
            
              <!--div class="homeSocial">
                        <div class="share" style="top:0px;"> 
                    
                    <?php 
					/* social calls */
					$url = get_permalink();
					/*
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
					
					// fb
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
                    
                    	<i class="icon-comments"></i> <?php comments_popup_link( __('0', 'fairpixels'), __( '1', 'fairpixels'), __('%', 'fairpixels')); ?>
                        <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>"><i class="icon-facebook"></i> <?php echo $fbCount; ?></a>
                        <a href="https://twitter.com/intent/tweet?text=<?php urlencode(the_title()); ?>&url=<?php echo $url; ?>"><i class="icon-twitter"></i> <?php echo $twitterCount; ?></a>
                        
                        <a href="https://plus.google.com/share?url=<?php echo $url; ?>"><i class="icon-google-plus"></i> <?php echo $gPlusCount; ?></a>
					</div></div-->
                    
      
      
      
      <?php if(get_post_type( $post ) == "table") { disqus_embed('waitbutwhyforum'); } ?>
      
      
                    <div id="socBarmageddon">
                    	<div id="fbLikePost"><div id="fb-root" class="inline"></div><script src="http://connect.facebook.net/en_US/all.js#appId=689761124373742&amp;xfbml=1"></script><fb:like href="" send="true" layout="button_count" width="100" show_faces="false" font=""></fb:like></div>
                        
                        
                       <?php //fix tweet count
					   
					   $tweetURL = "http://www." . ltrim($url,"http://");
					   
					   $json_string = wp_remote_get('http://urls.api.twitter.com/1/urls/count.json?url=http://www.' . ltrim($url, "http://"));
					   $json = json_decode($json_string['body'], true);
						
					  
					  if($json['count'] == 0){
							
								$tweetURL = $url;
							}
							
							
					   
					   
					   ?>
                        
                        
                        <div id="twitterSharePost"><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $tweetURL; ?>" data-via="waitbutwhy">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></div>
                        
                        <div id="gplusSharePost"><!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-annotation="none" data-width="100"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script></div>
                        
                        <div id="redditSharePost"><script type="text/javascript" src="http://www.reddit.com/static/button/button1.js"></script></div>
                        
                        <div id="pinterestSharePost">
                        
                        <a href="//www.pinterest.com/pin/create/button/?url=<?php echo $url; ?>&description=<?php the_title(); ?>" data-pin-do="buttonPin" data-pin-config="beside"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" /></a></div>
                        
                        <div id="pocketSharePost"><a data-pocket-label="pocket" data-pocket-count="horizontal" class="pocket-btn" data-lang="en"></a>
<script type="text/javascript">!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script");j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";var w=d.getElementById(i);d.body.appendChild(j);}}(document,"pocket-btn-js");</script></div>
                    	
                    	<div id="stumbleuponSharePost"><!-- Place this tag where you want the su badge to render -->
<su:badge layout="1"></su:badge>

<!-- Place this snippet wherever appropriate -->
<script type="text/javascript">
  (function() {
    var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
    li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
  })();
</script>
</div>

<div style="clear:both;"></div>
                    
                    </div>
                    
                    
		
			<div id="social-ads" style="height:216px;margin-top: 0px;">
            
            <div id="follow-by-email" style="margin-bottom:0px;">
            
            

			
			
			<?php $mailCount = getSubCount(); ?>
            
            
            
					<h2 style="font-size: 17px;">Join <?php echo number_format($mailCount); ?> others and have our posts delivered to you by email.</h2>

<div class="orangeBox">

<form method="post" action="<?php echo $url; ?>#mc4wp-form-3" id="mc4wp-form-3" class="mc4wp-form form ">
					<p>
						<!--input type="text" name="mc-email" id="mc-email" placeholder="Email Address" style="width: 220px;" /-->
                        <input type="email" id="mc4wp_email" name="EMAIL" required="" placeholder=" Email Address"  style="width: 220px;">
					</p>

					<p>
						<strong>(No spam, ever. We promise.)</strong>
						<input type="submit" value="Submit" style="position: relative;top: -49px;" />
					</p>
                    
                    <textarea name="mc4wp_required_but_not_really" style="display: none;"></textarea><input type="hidden" name="mc4wp_form_submit" value="1"><input type="hidden" name="mc4wp_form_instance" value="2"></form>
                    
                    </div>
                
                 </div>
            
            <div id="like-wait-but-why" style="margin-bottom:0px;">
            
            	<h2>LOOK AT THIS BIG BUTTON WE MADE</h2>
                
                <a href="http://www.facebook.com/waitbutwhy" target="_blank"><img src="<?php echo home_url(); ?>/wp-content/uploads/2013/12/like-wbw-fb-count.jpg" style="margin-bottom:30px!important;" /></a>
                <h3 class="fbBawksCount" style="color:#fff; position:relative; top: -68px;left: 206px;"><?php echo get_option('fairpixels_facebook_followers'); ?></h3>
                
            </div>
            
            
				
                    
				

				<div class="clear"></div>
			</div>
		</div><!-- /entry-content -->
		
	</div><!-- /entry-content-wrap -->
		


	<?php setPostViews(get_the_ID()); ?>
</article><!-- /post-<?php the_ID(); ?> -->

<?php if ( fp_get_settings( 'fp_show_post_author' ) == 1 ) { ?>
	<div class="entry-author">				
		<div class="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), 68 ); ?>
		</div>		
		<div class="author-description">
			<h4><?php printf( __( 'About %s', 'fairpixels' ), get_the_author() ); ?></h4>
			<?php the_author_meta( 'description' ); ?>
			<div id="author-link">
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
					<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'fairpixels' ), get_the_author() ); ?>
				</a>
			</div><!-- /author-link	-->
		</div><!-- /author-description -->
	</div><!-- /author-info -->
	
	<?php } //endif; 
	
	$excludeCats = '1';
	
	 if ( fp_get_settings( 'fp_show_post_nav' ) == 1 ) { ?>
		<div class="entry-nav main-color-bg">
			<?php previous_post_link( '<div class="prev"><i class="icon-chevron-left"></i><div class="link">%link</div></div>', __( 'Previous Post', true), 1 ); ?>
			<?php next_post_link( '<div class="next"><div class="link">%link</div><i class="icon-chevron-right"></i></div>', __( 'Next Post', true ), 1 ); ?>
		</div>
	<?php } 
		
	if ( fp_get_settings( 'fp_show_related_posts' ) == 1 ){
		get_template_part( 'includes/related-posts' );
		?>
        <!--h3 style="margin-top:30px; margin-bottom:30px;">RECOMMENDED POSTS</h3>
        
        <div id='taboola-below-main-column-o-mix'></div>
<script type="text/javascript">
window._taboola = window._taboola || [];
_taboola.push({mode:'organic-thumbs-2r', container:'taboola-below-main-column-o-mix', placement:'below-main-column-o', target_type:'mix'});
</script-->




      <?php /*if(!get_post_type( $post ) == "table") {  ?>



        
        <h3 style="margin-top:30px; margin-bottom:30px;">FROM THE WEB</h3>
        




      <?php  }*/ ?>



       <!--div id='taboola-below-main-column-sc-mix'></div>
<script type="text/javascript">
window._taboola = window._taboola || [];
_taboola.push({mode:'thumbs-2r', container:'taboola-below-main-column-sc-mix', placement:'below-main-column-sc', target_type:'mix'});
</script>

<script>
window._taboola = window._taboola || [];
_taboola.push({article:'auto'}); 
_taboola.push({flush:true});
</script-->
        <?php if($_GET['mgid'] == "true"){ ?>
        <!--h3 style="margin-top:30px; margin-bottom:30px;">FROM THE WEB</h3-->
        
        <!-- MarketGidComposite Start -->
<div id="MarketGidScriptRootC10858">
    <div id="MarketGidPreloadC10858">
        <a id="mg_add10858" href="http://mgid.com/advertisers/?utm_source=widget&utm_medium=text&utm_campaign=add" target="_blank">Place your ad here</a><br>        <a href="http://mgid.com/" target="_blank">Loading...</a>    
    </div>
    <script>
                (function(){
            var D=new Date(),d=document,b='body',ce='createElement',ac='appendChild',st='style',ds='display',n='none',gi='getElementById';
            var i=d[ce]('iframe');i[st][ds]=n;d[gi]("MarketGidScriptRootC10858")[ac](i);try{var iw=i.contentWindow.document;iw.open();iw.writeln("<ht"+"ml><bo"+"dy></bo"+"dy></ht"+"ml>");iw.close();var c=iw[b];}
            catch(e){var iw=d;var c=d[gi]("MarketGidScriptRootC10858");}var dv=iw[ce]('div');dv.id="MG_ID";dv[st][ds]=n;dv.innerHTML=10858;c[ac](dv);
            var s=iw[ce]('script');s.async='async';s.defer='defer';s.charset='utf-8';s.src="//jsc.mgid.com/w/a/waitbutwhy.com.10858.js?t="+D.getYear()+D.getMonth()+D.getDate()+D.getHours();c[ac](s);})();
    </script>
</div>
<!-- MarketGidComposite End -->
        
        <?php } // end if ?>
     
        
        
		<?php
	}
?>


</div><!-- /post-wrap -->


<script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>