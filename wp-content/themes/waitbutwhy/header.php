<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package  WordPress
 * @file     header.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 */
  
?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
<script src="//cdn.optimizely.com/js/2572440331.js"></script>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="pocket-site-verification" content="eeacb22f26e28eaaab8351eb4c2f1b" />
  
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	//bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'fairpixels' ), max( $paged, $page ) );

	?>
</title>
<meta property="og:title" content="<?php wp_title( '|', true, 'right' ); /*bloginfo( 'name' );*/ ?>">

<?php 

$description = my_excerpt( $post->post_content, $post->post_excerpt );
		$description = strip_tags($description);
		$description = str_replace("\"", "'", $description);

?>
<meta property="og:url" content="<?php echo get_permalink(); ?>">
<meta property="og:description" content="<?php echo $description; ?>">
<meta property="og:image" content="<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 800,800 ), false, '' ); echo $src[0]; ?>">

<?php
function my_excerpt($text, $excerpt){
	
    if ($excerpt) return $excerpt;

    $text = strip_shortcodes( $text );

    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $text = strip_tags($text);
    $excerpt_length = apply_filters('excerpt_length', 55);
    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
    $words = preg_split("/[\n
	 ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
            array_pop($words);
            $text = implode(' ', $words);
            $text = $text . $excerpt_more;
    } else {
            $text = implode(' ', $words);
    }

    return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
?>


<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='<?php echo get_template_directory_uri(); ?>/images/favicon.ico' rel='icon' type='image/x-icon'/>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<script type="text/javascript">
	var themeDir = "<?php echo get_template_directory_uri(); ?>";
</script>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
		wp_head(); 
?>

<!--script type="text/javascript">
 window._taboola = window._taboola || [];
_taboola.push({article:'auto'}); 
!function (e, f, u) {
    e.async = 1;
    e.src = u;
    f.parentNode.insertBefore(e, f);
}(document.createElement('script'), document.getElementsByTagName('script')[0], 'http://cdn.taboola.com/libtrc/waitbutwhy/loader.js');
</script-->


<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
  _fbq.push(['addPixelId', '373106669537767']);
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', 'PixelInitialized', {}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=373106669537767&amp;ev=PixelInitialized" /></noscript>


<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>


<script type="text/JavaScript">
	jQuery(document).ready(function() {
		jQuery('.widget_social_counter .facebook').click(function() {
			window.open('http://facebook.com/waitbutwhy');
		});

		jQuery('.widget_social_counter .twitter').click(function() {
			window.open('http://twitter.com/waitbutwhy');
		});
	});
</script>
</head>
<body <?php body_class(); ?>>
	
  <!-- Google Tag Manager -->
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5CZCB2"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-5CZCB2');</script>
	<!-- End Google Tag Manager -->

  
	<header id="header">			
		
		<div class="top main-color-bg">
			<div class="content-wrap">
				<?php if ( fp_get_settings( 'fp_show_top_menu' ) == 1 ){ ?>
				
					<div class="left">
						<ul class="list">
						
							<?php if (fp_get_settings( 'fp_menu_item1_title' )){ ?>
								<li>
									<?php if (fp_get_settings( 'fp_menu_item1_icon' )){ ?>
										<i class="<?php echo fp_get_settings( 'fp_menu_item1_icon' ); ?>"></i>
									<?php } ?>
									
									<?php if (fp_get_settings( 'fp_menu_item1_url' )){ ?>
										<a href="<?php echo fp_get_settings( 'fp_menu_item1_url' ); ?>">
											<?php echo fp_get_settings( 'fp_menu_item1_title' ); ?>
										</a>
									<?php } else {
										echo fp_get_settings( 'fp_menu_item1_title' );
									} ?>							
								</li>
							<?php } ?>
							
							<?php if (fp_get_settings( 'fp_menu_item2_title' )){ ?>
								<li>
									<?php if (fp_get_settings( 'fp_menu_item2_icon' )){ ?>
										<i class="<?php echo fp_get_settings( 'fp_menu_item2_icon' ); ?>"></i>
									<?php } ?>
									
									<?php if (fp_get_settings( 'fp_menu_item2_url' )){ ?>
										<a href="<?php echo fp_get_settings( 'fp_menu_item2_url' ); ?>">
											<?php echo fp_get_settings( 'fp_menu_item2_title' ); ?>
										</a>
									<?php } else {
										echo fp_get_settings( 'fp_menu_item2_title' );
									} ?>							
								</li>
							<?php } ?>
							
							<?php if (fp_get_settings( 'fp_menu_item3_title' )){ ?>
								<li>
									<?php if (fp_get_settings( 'fp_menu_item3_icon' )){ ?>
										<i class="<?php echo fp_get_settings( 'fp_menu_item3_icon' ); ?>"></i>
									<?php } ?>
									
									<?php if (fp_get_settings( 'fp_menu_item3_url' )){ ?>
										<a href="<?php echo fp_get_settings( 'fp_menu_item3_url' ); ?>">
											<?php echo fp_get_settings( 'fp_menu_item3_title' ); ?>
										</a>
									<?php } else {
										echo fp_get_settings( 'fp_menu_item3_title' );
									} ?>							
								</li>
							<?php } ?>
							
							<?php if (fp_get_settings( 'fp_menu_item4_title' )){ ?>
								<li>
									<?php if (fp_get_settings( 'fp_menu_item4_icon' )){ ?>
										<i class="<?php echo fp_get_settings( 'fp_menu_item4_icon' ); ?>"></i>
									<?php } ?>
									
									<?php if (fp_get_settings( 'fp_menu_item4_url' )){ ?>
										<a href="<?php echo fp_get_settings( 'fp_menu_item4_url' ); ?>">
											<?php echo fp_get_settings( 'fp_menu_item4_title' ); ?>
										</a>
									<?php } else {
										echo fp_get_settings( 'fp_menu_item4_title' );
									} ?>							
								</li>
							<?php } ?>
							
							<?php if (fp_get_settings( 'fp_menu_item5_title' )){ ?>
								<li>
									<?php if (fp_get_settings( 'fp_menu_item5_icon' )){ ?>
										<i class="<?php echo fp_get_settings( 'fp_menu_item5_icon' ); ?>"></i>
									<?php } ?>
									
									<?php if (fp_get_settings( 'fp_menu_item5_url' )){ ?>
										<a href="<?php echo fp_get_settings( 'fp_menu_item5_url' ); ?>">
											<?php echo fp_get_settings( 'fp_menu_item5_title' ); ?>
										</a>
									<?php } else {
										echo fp_get_settings( 'fp_menu_item5_title' );
									} ?>							
								</li>
							<?php } ?>
							
						</ul>
					</div> 
					
				<?php } ?>
				
				<?php if ( fp_get_settings( 'fp_show_header_social' ) == 1 ){ ?>		
				
					<div class="social">
						<ul class="list">
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
							
							<?php /*if (fp_get_settings( 'fp_rss_url' )){ ?>
								<li class="rss"><a href="<?php echo fp_get_settings( 'fp_rss_url' ); ?>"><i class="icon-rss"></i></a></li>
							<?php }*/ ?>
							
						</ul>
					</div>
				<?php } ?>
			</div>
		</div>		
		
		<?php 
			//include news ticker
			if ( fp_get_settings( 'fp_show_ticker' ) == 1 ) {
				get_template_part( 'includes/ticker-section' );
			}
		?>
		
		<div class="logo-section">
			<div class="content-wrap">
				<div class="logo">			
					<?php if (fp_get_settings( 'fp_logo_url' )) { ?>
						<h1>
							<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
								<img src="<?php echo fp_get_settings( 'fp_logo_url' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
							</a>
						</h1>	
					<?php } else {?>
						<h1 class="site-title">
							<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
								<?php bloginfo('name'); ?>
							</a>
						</h1>					
					<?php } ?>	
				</div>
				
				<?php /* hide this search
				if (fp_get_settings( 'fp_header_ad' )) {?>
					<div class="banner">	
						<?php echo fp_get_settings( 'fp_header_ad' ); ?>	
					</div>
			<?php }*/ ?>
			
			</div>
		</div>
		
		<nav class="primary-menu clearfix">
			<div class="content-wrap">
				
				<div class="mobile-menu">
					<a class="menu-slide" href="#">
						<span class="title"><?php _e('Menu', 'fairpixels'); ?></span>
						<span class="icon"><i class="icon-list"></i></span>
					</a>
				</div>
				
				<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '0', 'menu_class' => 'sf-menu', 'fallback_cb' => 'fp_main_menu_fallback') ); ?> <div class="social">
                
                <div class="search" style="float: left;top: 9px;position: relative;">
				<form method="get" id="searchform" class="search-form" action="/">
		<input type="text" class="search-field" name="s" id="s" placeholder="Search">
    	<button class="search-submit"><i class="icon-search"></i></button>
	</form>
	
	
		</div>
                
                
                
						<ul class="list"><li class="rss" style="position: relative;top: -10px;"><a href="<?php echo home_url(); ?>/feed"><i class="icon-rss"></i></a></li></ul>
							
			</div>
			
		</nav>
		<div class="clearfix"></div>	
		
		<?php 
			//include featured categories
			if (is_page_template('page-home.php')&& $paged < 2 ){
				if ( fp_get_settings( 'fp_show_carousel' ) == 1 ) {
					get_template_part( 'includes/header-carousel' );
				}
			}
		?>		
	</header>	
	
	<div id="container" class="hfeed">	
		
	<div id="main">	