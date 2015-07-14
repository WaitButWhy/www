jQuery(document).ready(function() {
			
	jQuery(function() {
		var menu = jQuery('.primary-menu .content-wrap > ul');		
		jQuery(".menu-slide").click(function() {
			menu.slideToggle(500);
		});
	
	
		jQuery(window).on('resize', function(){       
			if(!jQuery(".menu-slide").is(":visible")){
				menu.css({'display':''});   
			}
		});
	});
	
	// disqus fix comment links
	jQuery('.dsq-comment-text a').live('mouseover', function() {
		jQuery(this).attr('target', '_blank');
	});
	
	// search hotness
	
	/*jQuery(".search-submit").hover(function(event) {
          jQuery('.search-field').animate({ width: "198" });
          event.stopPropagation();
        });*/
	
	
	//tooltips annotations
		jQuery(".refbody").hide();
        jQuery(".refnum").click(function(event) {
          jQuery(this.nextSibling).toggle();
          event.stopPropagation();
        });
        jQuery("body").click(function(event) {
          jQuery(".refbody").hide();
        });
	
	
	
	jQuery(".primary-menu").show();	
	jQuery('.primary-menu ul.sf-menu').superfish({				// main menu settings
		hoverClass:  'over', 								// the class applied to hovered list items 
		animation:   {opacity:'show',height:'show'},  		// fade-in and slide-down animation 
		speed:       150,                          			// faster animation speed 
		autoArrows:  true,                           		// disable generation of arrow mark-up 
		dropShadows: true,                            		// disable drop shadows 
		delay       : 0		
	});	
	
	jQuery(".video-thumb iframe").each(function(){
      var ifr_source = jQuery(this).attr('src');
      var wmode = "wmode=transparent";
      if(ifr_source.indexOf('?') != -1) jQuery(this).attr('src',ifr_source+'&'+wmode);
      else jQuery(this).attr('src',ifr_source+'?'+wmode);
	});	

	jQuery('#follow-by-email form').submit(function(e) {
		jQuery('#ajax-error').remove();

		var email = jQuery(this).find('input[name="EMAIL"]').val();

		if (isEmail(email)) {
			var _this = jQuery(this);

			jQuery(this).after('<div id="ajax-loader"></div>');

			jQuery.ajax({
				type: 'POST',
				data: { email: email },
				dataType: 'json',
				url: '/wp-content/themes/waitbutwhy/ajax/subscribe_email.php',
				success: function(data) {
					jQuery('#ajax-loader').remove();

					if (data == 'error') {
						jQuery(_this).after('<div id="ajax-error">Error. Please try again.</div>');
					} else {
						jQuery('.orangeBox p').remove();
						jQuery('.orangeBox').append('<p>Success!<br>You’re subscribed.</p>');
					}
				},
				error: function(e) {
					jQuery('#ajax-loader').remove();
					jQuery(_this).after('<div id="ajax-error">Error. Please try again.</div>');
				}
			});
		}

		e.preventDefault();
	});

	function isEmail(email) {
	  	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  
	  	return regex.test(email);
	}
	
	/* fixed sidebar fix */
	//jQuery(window).scroll(function() {
	   /*if(jQuery(window).scrollTop() + jQuery(window).height() > jQuery(document).height() - 200) {
		   jQuery('#text-3').animate({ top: "+=100" });
		   jQuery('#fairpixels_social_subscribers_widget-5').animate({ top: "+=100" });
		   jQuery('#text-6').animate({ top: "+=100" });
	   }else{
		   jQuery('#text-3').animate({ top: "-=1000" });
		   jQuery('#fairpixels_social_subscribers_widget-5').animate({ top: "-=100" });
		   jQuery('#text-6').animate({ top: "-=1000" });
	   }
	    if(jQuery(window).scrollTop() + jQuery(window).height() > jQuery(document).height() - 100) {
       		jQuery('#text-3').animate({ top: "-=100" });
		   jQuery('#fairpixels_social_subscribers_widget-5').animate({ top: "-=100" });
		   jQuery('#text-6').animate({ top: "-=100" });
   		} else if {
			
		}*/
	//});
	
});