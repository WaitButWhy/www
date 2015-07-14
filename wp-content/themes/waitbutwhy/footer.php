<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package  WordPress
 * @file     footer.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 */
?>
	</div><!-- /main -->
</div><!-- /container -->

<footer id="footer" style="height:auto;">
	<div class="footer-widgets main-color-bg">
		<div class="content-wrap">
		
			<div class="two-fourth">			
				<?php 
					if ( ! dynamic_sidebar( 'footer-1' ) ) : 			
					endif;
				?>
			</div>
			
			<!--div class="one-fourth">	
				<?php 
					/*if ( ! dynamic_sidebar( 'footer-2' ) ) : 			
					endif;*/
				?>
			</div-->
			
			<div class="one-fourth">	
				<?php 
					if ( ! dynamic_sidebar( 'footer-3' ) ) : 			
					endif;
				?>
			</div>
			
			<div class="one-fourth last">
				<?php 
					if ( ! dynamic_sidebar( 'footer-4' ) ) : 			
					endif;					
				?>
			</div>
		
		</div><!-- /inner-wrap -->			
		
	</div><!-- /footer-widgets -->
	
	<div class="footer-info">
		<div class="content-wrap">
			<?php if (fp_get_settings( 'fp_footer_text_left' )){ ?> 
				<div style="padding-top: 19px;float: left;position: absolute;left: 12px;">
					<?php //echo fp_get_settings( 'fp_footer_text_left' ); ?>	
                    
                    <?php //include(get_template_directory_uri()	. "/simphp.php"); ?>
                    <?php 
					//include('/nas/wp/www/cluster-8010/waitbutwhy/wp-content/themes/waitbutwhy/simphp.php');
					/*include('/nas/wp/www/cluster-2100/waitbutwhy/wp-content/themes/waitbutwhy/simphp.php');*/
					
					//old too much traffic
					//$visitors = file_get_contents("/nas/wp/www/cluster-2100/waitbutwhy/wp-content/themes/waitbutwhy/hits.txt");
					//$visitors++;
					//file_put_contents("/nas/wp/www/cluster-2100/waitbutwhy/wp-content/themes/waitbutwhy/hits.txt",$visitors);
					global $wpdb;
					//$data = $wpdb->get_row("SELECT value FROM $wpdb->stats where name = hits, ARRAY_A");
					$result = $wpdb->get_var("SELECT value FROM stats");

						/*echo "<!-- <pre>";
						echo $result;					  
						echo "</pre> -->";*/
					
					// don't show til fixed
					echo number_format($result);
					
					// store new count
					$newCount = $result + 1;
					$strQuery = "UPDATE stats SET value = %d WHERE name = %s";

					$wpdb->query($wpdb->prepare( $strQuery, $newCount, "hits") );
					
					//$numCount = number_format($info);
					//echo $info;  ?>	
				</div>
			<?php } ?>
			
			<?php if ( fp_get_settings( 'fp_show_header_social' ) == 1 ){ ?>		
				
				<div class="footer-right">
                
                <div align="center" style="float: left;
margin: 0 auto;font-size: 14px;padding-bottom: 8px;width: 136px;"><a href="<?php echo home_url(); ?>/sharing-policy/" style="line-height: 31px;">&copy; WaitButWhy <?php echo date("Y"); ?></a> <a href="<?php echo home_url(); ?>/contact" target="_blank" class="contactLink">Contact</a><a href="<?php echo home_url(); ?>/partner-us" target="_blank" class="partnerLink">Partner With Us</a><br /><a href="<?php echo home_url(); ?>/privacy-policy">Privacy Policy</a></div>
                
					<ul class="list">
                    <li class="rss"><!--a href="<?php echo fp_get_settings( 'fp_rss_url' ); ?>/feed/"><i class="icon-rss"></i></a--></li>
						<?php if (fp_get_settings( 'fp_twitter_url' )){ ?>
							<li class="twitter"><a href="<?php echo fp_get_settings( 'fp_twitter_url' ); ?>"><i class="icon-twitter"></i></a></li>
						<?php } ?>
						
						<?php if (fp_get_settings( 'fp_fb_url' )){ ?>
							<li class="fb"><a href="<?php echo fp_get_settings( 'fp_fb_url' ); ?>"><i class="icon-facebook"></i></a></li>
						<?php } ?>
						
						<?php if (fp_get_settings( 'fp_gplus_url' )){ ?>
							<li class="gplus"><a href="<?php echo fp_get_settings( 'fp_gplus_url' ); ?>"><i class="icon-google-plus"></i></a></li>
						<?php } ?>
						
						<?php if (fp_get_settings( 'fp_linkedin_url' )){ ?>
							<li class="linkedin"><a href="<?php echo fp_get_settings( 'fp_linkedin_url' ); ?>"><i class="icon-linkedin"></i></a></li>
						<?php } ?>
						
						<?php if (fp_get_settings( 'fp_pinterest_url' )){ ?>
							<li class="pinterest"><a href="<?php echo fp_get_settings( 'fp_pinterest_url' ); ?>"><i class="icon-pinterest"></i></a></li>
						<?php } ?>
						
						<?php if (fp_get_settings( 'fp_instagram_url' )){ ?>
							<li class="instagram"><a href="<?php echo fp_get_settings( 'fp_instagram_url' ); ?>"><i class="icon-instagram"></i></a></li>
						<?php } ?>
						
						<?php if (fp_get_settings( 'fp_dribbble_url' )){ ?>
							<li class="dribbble"><a href="<?php echo fp_get_settings( 'fp_dribbble_url' ); ?>"><i class="icon-dribbble"></i></a></li>
						<?php } ?>
						
						<?php if (fp_get_settings( 'fp_youtube_url' )){ ?>
							<li class="youtube"><a href="<?php echo fp_get_settings( 'fp_youtube_url' ); ?>"><i class="icon-youtube"></i></a></li>
						<?php } ?>
						
						<?php if (fp_get_settings( 'fp_rss_url' )){ ?>
							<li class="rss"><!--a href="<?php echo fp_get_settings( 'fp_rss_url' ); ?>"><i class="icon-rss"></i></a--></li>
						<?php } ?>
                        	<li class="turtle"><a href="<?php echo home_url(); ?>/you-clicked-the-turtle/"><img src="<?php echo get_template_directory_uri(); ?>/images/turtle.png" /></a></li>
						
					</ul>
				</div>
			
			<?php } ?>
				
		</div><!-- /inner-wrap -->			
	</div> <!--/footer-info -->
	
</footer><!-- /footer -->

<?php wp_footer(); ?>

<script type="text/javascript">
  var _sf_async_config = { uid: 53334, domain: 'waitbutwhy.com', useCanonical: true };
  (function() {
    function loadChartbeat() {
      window._sf_endpt = (new Date()).getTime();
      var e = document.createElement('script');
      e.setAttribute('language', 'javascript');
      e.setAttribute('type', 'text/javascript');
      e.setAttribute('src','//static.chartbeat.com/js/chartbeat.js');
      document.body.appendChild(e);
    };
    var oldonload = window.onload;
    window.onload = (typeof window.onload != 'function') ?
      loadChartbeat : function() { oldonload(); loadChartbeat(); };
  })();
</script>


<script type='text/javascript'>
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-42339569-1']);
      _gaq.push(['_trackPageview']);
      (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';

        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
      })();
    </script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42339569-1', 'waitbutwhy.com');
  ga('send', 'pageview');

</script>

<script type="text/javascript">
/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
var disqus_shortname = 'waitbutwhyforum'; // required: replace example with your forum shortname

/* * * DON'T EDIT BELOW THIS LINE * * */
(function () {
var s = document.createElement('script'); s.async = true;
s.type = 'text/javascript';
s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
}());
</script>

</body>
</html>