<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to fairpixels_comment() which is
 * located in the functions.php file.
 *
 * @package  WordPress
 * @file     comments.php
 * @author   FairPixels
 * @link 	 http://fairpixels.com
 */
?>
<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'fairpixels' ); ?></p>
	</div><!-- /comments -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // if has comments ?>

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
        
        
        
			<span><?php printf(_n('1 comment', '%1$s comments', get_comments_number()), number_format_i18n( get_comments_number() ), 'fairpixels' ); ?> - <a href="#commentsField" style="font-size: 15px; position: relative;top: -3px;">jump to comment field &raquo;</a></span>
		</h3>

		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use fairpixels_comments() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define fairpixels_comments() and that will be used instead.
				 * See fairpixels_comments() in functions.php for more.
				 */
				wp_list_comments( array( 'callback' => 'fairpixels_comments' ) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav class="comment-nav">
			<h4><?php _e( 'Comment navigation', 'fairpixels' ); ?></h4>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'fairpixels' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'fairpixels' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		
	<?php endif; ?>
    
    
<a name="commentsField"></a>
	<?php comment_form(); ?>

</div><!-- /comments -->
