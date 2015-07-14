<?php
session_start();
/**
 * Template Name: Contact 
 * Description: A Page Template to display contact form with captcha and jQuery validation.
 *
 * @package  WordPress
 * @file     page-contact.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 */
 
	/*$name_error = '';
	$email_error = '';
	$message_error = '';
	$captcha_error = '';
	
	$fp_recaptcha_public_key = fp_get_settings('fp_recaptcha_public_key');
	$fp_recaptcha_private_key = fp_get_settings('fp_recaptcha_private_key');
								
	include_once( trailingslashit( get_stylesheet_directory() ) . 'framework/lib/recaptcha/recaptchalib.php' );							
if(isset($_POST['fp_submit'])) {

		//validate sender name
		if(trim($_POST['sender_name']) === '') {
			$name_error = 'Please enter your name.';
			$has_error = true;
		} else {
			$name = trim($_POST['sender_name']);
		}
		
		//validate sender email
		if(trim($_POST['sender_email']) === '')  {
			$email_error = 'Please enter your email address.';
			$has_error = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['sender_email']))) {
			$email_error = 'Please enter a valid email address.';
			$has_error = true;
		} else {
			$email = trim($_POST['sender_email']);
		}
		
		//validate message
		if(trim($_POST['message_text']) === '') {
			$message_error = 'Please enter a message.';
			$has_error = true;
		} else {
			if(function_exists('stripslashes')) {
				$message = stripslashes(trim($_POST['message_text']));
			} else {
				$message = trim($_POST['message_text']);
			}
		}
		
				
		# the response from reCAPTCHA
		$resp = null;
		# the error code from reCAPTCHA, if any
		$error = null;
		
		$resp = recaptcha_check_answer ($fp_recaptcha_private_key,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);

		if (!$resp->is_valid) {                
			# set the error code so that we can display it				
			$captcha_error = __('Please enter code correctly.', 'fairpixels');
			$has_error = true;	
		}	
		
		
		//if no error, send email.
		if(!isset($has_error)) {
			
			$email_to = fp_get_settings('fp_contact_email');		
			$subject = fp_get_settings('fp_contact_subject');	
			
			if (!isset($email_to) || ($email_to == '') ){
				$email_to = get_option('admin_email');				
			}
			
			if (!isset($subject) || ($subject == '') ){
				$subject = 'Contact Message From '.$name;			
			}

			$body = "Name: $name \n\nEmail: $email \n\nComments: $message";
			$headers = 'From: '.$name.' <'.$email_to.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($email_to, $subject, $body, $headers);
			$email_sent = true;
		}
	
	} 
*/
?>

<?php get_header(); ?>

<style>

/*#fairpixels_recent_popular_widget-3{ float: right; }*/

.shop_banner_contact{ /*position:relative;*/ }
.shop_banner_contact img{ position: absolute;
top: 900px;
z-index: 99999999;}

#sidebar #follow-by-email h2{ line-height: inherit!important; }

.contactSide{ width:50%; margin:0 auto; }

#sidebar #follow-by-email{
height: 174px;
margin-bottom: 18px;
}

@media only screen and (max-width: 479px) {

	.contactSide{ width:100%; margin:0 auto; }
	#sidebar #follow-by-email input[type="submit"] { left: 0px!important;top: -77px!important; }
	h2 {font-size: 19px!important; }

}

</style>

	<script type="text/javascript">
	<!--//--><![CDATA[//><!--
		jQuery(document).ready(function() {
			jQuery('form#fp_contact_form').submit(function() {
			jQuery('form#fp_contact_form .error').remove();
			var hasError = false;
			jQuery('.requiredField').each(function() {
			if(jQuery.trim(jQuery(this).val()) == '') {
									
					if(jQuery(this).hasClass('name_field')) {
						jQuery(this).parent().append('<span class="error"><?php _e('Please enter your name.', 'fairpixels'); ?></span>');
					}
					
					if(jQuery(this).hasClass('title_field')) {
						jQuery(this).parent().append('<span class="error"><?php _e('Please enter message title.', 'fairpixels'); ?></span>');
					}
					
					if(jQuery(this).hasClass('email')) {
						jQuery(this).parent().append('<span class="error"><?php _e('Please enter your email.', 'fairpixels'); ?></span>');
					}
					
					if(jQuery(this).hasClass('message_field')) {
						jQuery(this).parent().append('<span class="error"><?php _e('Please enter your message.', 'fairpixels'); ?></span>');
					}
					
					if(jQuery(this).hasClass("captcha_field")) {
						jQuery(this).parent().append('<span class="error"><?php _e('Please enter the security code.', 'fairpixels'); ?></span>');
					}
				
					jQuery(this).addClass('inputError');
					hasError = true;
				} else if(jQuery(this).hasClass('email')) {
					var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
					if(!emailReg.test(jQuery.trim(jQuery(this).val()))) {
						jQuery(this).parent().append('<span class="error"><?php _e('Please enter valid email', 'fairpixels'); ?> </span>');
						jQuery(this).addClass('inputError');
						hasError = true;
					}
				}
			});
						
			if(hasError) {
				return false;
			} else{
				return true;
			}						
			});
		});
	//-->!]]>
	</script>	
	
	<div id="content" class="contact-page">
			<header class="entry-header">
				<h2><?php the_title(); ?></h2>			
			</header><!-- /archive-header -->
			
			<?php $fp_contact_address = fp_get_settings( 'fp_contact_address' );	?>
			<!--div class="map">
				<iframe width="100%" scrolling="no" height="270" frameborder="0" src="		https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo urlencode($fp_contact_address); ?>&amp;z=14&amp;iwloc=near&amp;output=embed" marginwidth="0" marginheight="0"></iframe>
			</div--><!--/map -->
		
			<div class="contact-text">		
				<?php while ( have_posts() ) : the_post(); ?>			
					<?php the_content(); ?>			
				<?php endwhile; // end of the loop. ?>					
                
                
                
                <div  id="sidebar" class="contactSide">
                
                
                					<aside id="fairpixels_social_subscribers_widget-2" class="widget widget_social_counter">		<div class="wrap">
			<ul class="list">
								
									<li class="facebook">
						<div class="icon"><i class="icon-facebook"></i></div>
						<div class="right">				
							<div class="count"><h4><a target="_blank" href="http://www.facebook.com/waitbutwhy"><?php echo get_option('fairpixels_facebook_followers'); ?></a></h4></div>
							<div class="text">Like WBW On Facebook</div>				
						</div>
					</li><!-- /facebook -->
								
									<li class="twitter">
						<div class="icon"><i class="icon-twitter"></i></div>
						<div class="right">
							<div class="count"><h4><a target="_blank" href="http://twitter.com/waitbutwhy"><?php echo get_option('fairpixels_twitter_followers'); ?></a></h4></div>
							<div class="text">Follow WBW On Twitter</div>
						</div>
					</li> <!-- /twitter -->
								
									<li class="dribbble">
						<div class="icon"><i class="icon-dribbble"></i></div>
						<div class="right">
							<div class="count"><h4><a target="_blank" href="http://dribbble.com/"></a></h4></div>
							<div class="text">Followers</div>		
						</div>				
					</li>
								
									<li class="rss">
						<div class="icon"><i class="icon-rss"></i></div>
						<div class="right">
							<div class="subscribe"><h4><a target="_blank" href="">Subscribe</a></h4></div>
							<div class="text">RSS Feeds</div>		
						</div>				
					</li>
								
			</ul>
				
		</div><!-- /wrap -->			
		</aside>
        <?php $mailCount = getSubCount();  ?>
        
        <aside id="text-6" class="widget widget_text"><div class="widget-title"><h4>Follow By Email</h4></div>			<div class="textwidget"><div id="follow-by-email" style="width:100%;">
					<h2 style="font-size: 17px;">Join <?php echo number_format($mailCount); ?> others and have our posts delivered to you by email.</h2>

<div class="orangeBox">
					
<!-- Form by MailChimp for WP plugin v1.2 - http://dannyvankooten.com/wordpress-plugins/mailchimp-for-wordpress/ -->
<form method="post" action="http://waitbutwhy.com/contact/#mc4wp-form-1" id="mc4wp-form-1" class="mc4wp-form form "><p>
	
    <?php if($_POST){ ?>
<h3>Success!<br />
You’re subscribed.</h3>
<?php }else{ ?>
    
	<input type="email" id="mc4wp_email" name="EMAIL" required="" placeholder="&#xf003; Email Address">

<label for="mc4wp_email">(No spam, ever. We promise.)</label>

</p>


<p>
	<input type="submit" value="Submit">
</p><textarea name="mc4wp_required_but_not_really" style="display: none;"></textarea><input type="hidden" name="mc4wp_form_submit" value="1"><input type="hidden" name="mc4wp_form_instance" value="1">
<?php } ?>

</form>
<!-- / MailChimp for WP Plugin -->

                    
                    </div>
                 </div></div>
		</aside>
        
        
        
        
        
        
                                    
                                    <div align="center"><a href="http://store.waitbutwhy.com/" target="_blank"><img class="alignnone size-medium wp-image-485" alt="wbw-shop" src="http://waitbutwhy.com/wp-content/uploads/2014/03/wait-but-why-shop-small-300px.jpg" /></a></div>
                
                </div>
                
                
                
			</div><!-- /contact-text -->
		
			<!--div class="contact-wrap">
			<script type="text/javascript">
				 var RecaptchaOptions = {
					theme : 'custom',
					custom_theme_widget: 'recaptcha_widget'
				 };
			</script>
				<div class="contact-form">						
					<?php /*if(isset($email_sent) && $email_sent == true) { ?>				
						<div class="msgbox msgbox-success"><?php _e('<strong>Thank you.</strong> Your email was sent successfully.', 'fairpixels') ?></div>	
					<?php } else { ?>
	
					<?php if(isset($has_error)) { ?>
						<div class="msgbox msgbox-error"><?php _e('Please correct the following errors and try again.', 'fairpixels') ?></div>
						<?php } ?>
	
						<form action="<?php $_SERVER['PHP_SELF']; ?>" id="fp_contact_form" method="post">
						
						<div class="row">
							
							<div class="one-half">	
								<div class="field">
									<label for="sender_name"><?php _e('Name', 'fairpixels') ?><span class="required"><?php _e('required', 'fairpixels') ?></span></label>
									<input type="text" class="text name_field requiredField" name="sender_name" id="sender_name" placeholder="Your name and surname" value="<?php if(isset($_POST['sender_name'])) echo $_POST['sender_name'];?>" />
									<?php if($name_error != '') { ?>
										<span class="error"><?php echo $name_error; ?></span>  
									<?php } ?>
								</div>
							</div>
						
							<div class="one-half last">
								<div class="field">
									<label for="sender_email"><?php _e('Email', 'fairpixels') ?><span class="required"><?php _e('required', 'fairpixels') ?></span></label>
									<input type="text" class="text requiredField email" name="sender_email" id="sender_email" placeholder="To contact you" value="<?php if(isset($_POST['sender_email']))  echo $_POST['sender_email'];?>" />
									<?php if($email_error != '') { ?>
										<span class="error"><?php echo $email_error; ?></span> 
									<?php }*/ ?>	
								</div>
							</div>
							
						</div--><!-- /row -->
						
						<!--div class="row">
							<div class="field message-field">
								<label for="message_title"><?php /*_e('Message title', 'fairpixels') ?><span class="required"><?php _e('required', 'fairpixels') ?> </span></label>
								<input type="text" class="text title_field requiredField" name="message_title" id="message_title" placeholder="What you ask about?" value="<?php if(isset($_POST['message_title'])) echo $_POST['message_title'];?>" />
								<?php if($name_error != '') { ?>
									<span class="error"><?php echo $message_error; ?></span>  
								<?php } ?>
							</div>
						</div>
						
						<div class="row">
							<div class="field textarea-field">		
								<label for="message_text"><?php _e('Write your message below', 'fairpixels') ?><span class="required"><?php _e('required', 'fairpixels') ?> </span></label>
								<textarea class="textarea message_field requiredField" name="message_text" id="message_text" placeholder="Your question here."><?php if(isset($_POST['message_text'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['message_text']); } else { echo $_POST['message_text']; } } ?></textarea>
																
								<?php if($message_error != '') { ?>
									<span class="error"><?php echo $message_error; ?></span> 
								<?php } ?>				
							</div>	
						</div>						
																		
						<div class="row">
							<div id="recaptcha_widget" style="display:none">
							
								<div class="one-half">
									<div class="recaptcha_only_if_incorrect_sol" style="color:red"><?php _e('Incorrect please try again', 'fairpixels'); ?></div>
									<span class="recaptcha_only_if_image"><?php _e('Enter the words:', 'fairpixels'); ?></span>
								    <span class="recaptcha_only_if_audio"><?php _e('Enter the numbers you hear:', 'fairpixels'); ?></span>
								    <input type="text" id="recaptcha_response_field" class="requiredField captcha_field" name="recaptcha_response_field" />							 
								</div>
								 
								<div class="one-half last">
									<div id="recaptcha_image"></div>
									<div class="recaptcha_refresh">
									<i class="icon-refresh"></i>									
									<a href="javascript:Recaptcha.reload()"><?php _e('Refresh', 'fairpixels'); ?></a></div>
									<div class="recaptcha_only_if_image">
									<i class="icon-volume-up"></i>
									<a href="javascript:Recaptcha.switch_type('audio')"><?php _e('Audio ', 'fairpixels'); ?></a></div>
									<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')"><?php _e('Image', 'fairpixels'); ?></a></div>
									<div class="recaptcha_help">
									<i class="icon-info-sign"></i>
									<a href="javascript:Recaptcha.showhelp()"><?php _e('Help', 'fairpixels'); ?></a></div>
								</div>

								<script type="text/javascript"
									src="http://www.google.com/recaptcha/api/challenge?k=<?php echo $fp_recaptcha_public_key; ?>">
								</script>
								<noscript>
								   <iframe src="http://www.google.com/recaptcha/api/noscript?k=<?php echo $fp_recaptcha_public_key; ?>"
										height="300" width="500" frameborder="0"></iframe><br>
									<textarea name="recaptcha_challenge_field" rows="3" cols="40">
								   </textarea>
								   <input type="hidden" name="recaptcha_response_field"
										value="manual_challenge">
								</noscript>
							</div>
						</div>     						
						
						<div class="row">
							<div class="field">
								<input type="submit" name="fp_submit" value="Send Message" class="button main-color-bg" />
							</div>
						</div>					
				</form>
	
			<?php /*}*/ ?>
	
		</div--><!-- /contact-form -->
		
			
	<!--/div--><!-- /contact-form-wrap -->
</div><!-- /content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>