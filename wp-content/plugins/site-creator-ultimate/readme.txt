=== Site Creator Ultimate ===
Contributors: wpcolor
Donate link: http://1customize.com
Tags: Menu, widget, widgets, Sidebar, layout, custom, build, create, customize, page, site, images, image, admin, theme, background, CSS, jquery, JavaScript, link, links, posts, plugin, slideshow
Requires at least: 3.3.1
Tested up to: 3.4.2
Stable tag: 2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


Enhance the look of your website or create a great looking front page.
Make your website look professional. 

== Description ==

This is an all around plugin that allows you lots of control on how your front page, posts, pages and website looks. It can enhance the look of your front page or make a website look like a professional magazine or news website. 

= Usage =

By posting a short code on a page you can display a layout. A layout is anumber of posts than can be themed. Each layout can be edited with a number of options such as how many posts to show, image options, text options, adding effects and much more. This allows for the creation of a front page, sub pages, blog, category pages or widgets. A front page can be made looking like a magazine or a news website. Several effects can be added such as pop up, text over image and image swap effects.

= Example front page =

http://1customize.com

= Example blog page =

http://1customize.com/blog-example/

= Example uses =

* Create a great news, magazine or business looking front page
* Enhance the look of your website or blog
* Create widgets such as top posts or latest posts etc
* Create complex sub pages

= Features =

* Build a front page, sub pages, create widgets to make your website look great
* Change image size, position, width & height
* Change font size, colors of title & excerpt, etc
* Change excerpt length of your posts
* Easy visual post layout editor with up to 20 layouts
* Add cool Jquery Effects
* CSS style allows you to change all aspects
* Add Image, Title, Excerpt, Categories, Tags, Author, Date, Post info and more
* Add Pagination, filters, spacing and other features

= Effects =

* Image changes to another image when hover over with mouse
* Image changes to another image automatically (simple slideshow)
* Image fades when hover
* Background color effect marks the post you are hovering over
* Put text over image
* Put text in a pop up




= Introduction =

This plugin works by using layouts. A layout is basically a list of posts that can have a specific look. The layout (or the posts) can then be displayed on a page, post or widget. To display it a short code is used. For example to display layout 1 the following short code can be used:

[sitecreator show="1"]

Up to 20 layouts that can be used but sometimes you only need one. The layout in its default state will show 3 posts with a simple layout with no filters or effects which is a starting point. To this more elements, filters and effects can be added.
To display several layouts in one page, simply add several short codes after each other For example:

[sitecreator show="1"] [sitecreator show="2"] [sitecreator show="3"]




= Example: How do I create a new front page? =

By adding one or several layouts on a page we can create a great news, magazine or business looking front page. To display the layouts we have to use a shortcode for each of the layouts. You also need to change the look of each layout you use by changing options such as image size, number of posts to show, etc. In this example we will use one layout.

1. Edit the layout 1 to your liking (assuming you are not using it already). Here you can change the look of the layout by changing image size, number of posts to show, etc.
2. Create a new page. Click on "add a new page" which will be your new front page
3. Display the layout you created in step 1 by adding a short code. If we are using layout 1 the short code will be [sitecreator show="1"]
4. If you want to make the page you created a front page go to Settings -> Reading Settings and mark the static page. In the drop down list, choose the page you just created


= Example: How do I create a new blog page? =

For a blog (which is simply a list of the newest posts) we only need one layout. Add pagination and set posts to show to around 10 posts. The page can be made a front page or be added as a menu item.

1. Edit the layout 1 to your liking (assuming you are not using it already). Here you can change the look of your blog by changing image size, number of posts to show, add pagination, etc.
2. Create a new page. Click on "add a new page" which will be your new front page
3. Display the layout you created in step 1 by adding a short code. If we are using layout 1 the short code will be [sitecreator show="1"]
4. If you want to make the page you created a front page go to Settings -> Reading Settings and mark the static page. In the drop down list, choose the page you just created


= Example: How do I create a widget? =

The plugin also allows you to create different type of widgets. Example of widgets:

* display the latest posts
* random posts
* post from a certain category
* posts from a certain author
* most commented/popular posts. 

The widget can be customized with nice, visual image effects. In this example we will create a widget to show the latest posts from a certain category.

1. Choose layout 1 or a layout you have not used yet
2. Change the layout to your liking by adding title, excerpt and changing image size etc. Important: Make sure that the image and the post is small enough to fit into your sidebar!
3. Under "Show posts only from category" select the category you want show posts from
4. Savet the layout
5. We have now created a layout. To create a widget with this layout we need to do the following: Under Appearance -> widget drag a text widget (that allows you to add arbitrary text or HTML) to your desired sidebar.
6. Add a title to the widget and copy the short code [sitecreator show="1"] (if using layout 1) into the bigger text field and save. The widget should now show up.

= More examples =

Site creator Ultimate also allows the posts to be ordered in a tablet friendly fashion. Example:

http://1customize.com/tablet-friendly-page/

= Theme Compability =

The plugin has been tested with a number of themes but there might be some themes that will need some CSS tweaking to work properly.

Read the FAQ for more info

= Site Creator Ultimate vs Site Layout Customizer =

What is the difference? Site Creator is much more advanced with more options, filters and uses jquery effects while site layout customizer does not. Also the CSS works differently and now uses classes instead of ids. Up to 20 layouts can be used instead of 4. The code base have been redone and the plugins are not compatible with each other. For simpler tasks the Site Layout Customizer plugin can be used, for more control and features use this plugin instead.

== Installation ==

Use the automatic installer from within the WordPress admin, or:

1. Upload the plugin to the `/wp-content/plugins/` directory
2. Activate the plugin through the Plugins menu in WordPress
3. Edit a layout in the Site Creator Ultimate admin section
4. Display the layout by adding a short code on a page, post or widget.  the short code for layout 1 is [sitecreator show="1"]



== Frequently Asked Questions ==

Here you can read more about the options and settings and also about CSS styling. There are many settings but usually only a few are needed depending on what you want to do. The layout options in their default state shows 3 posts without any effects.


= Main Options =

Description - here an optional description of the layout can be used. 

How many posts to show - Set the number of posts the layout should show

= Placement Options =

In the placement options you can put elements relative to each other. For example you can put the title over the excerpt and image to the left. There are 3 areas (left, right, top) plus over image area and pop up area where elements like title and excerpt can be displayed. There is also position 1 to 10 where 1 is top and 10 is bottom. This allows elements to positioned relative each other in the same area. Example: To put the title in the top of the left area select left and 1.


= Image options =

note: the plugin only works with images uploaded trough WordPress own system.

The plugin uses the image sizes set under settings->media. You can set the width and height of the image in the layout settings, this will just upscale or down scale the image without actually changing the original image size. If a featured image is set for the post then that will be used, otherwise if a image have been inserted into the post then that image will be used

Image Width & height - if not set it will use the image original width and height. This option will not change the original image width and height dimensions.

Image Size - This will select which image size stored in WordPress to use

Embed Image -  this allow text to be embedded around the image or an area. 

Image Effect - Note that you need to upload 2 images for some effects to work! 

* OFF - No effects will be used
* AUTO SWAP - will swap the image automatically after a certain time, 2 uploaded images are needed
* SWAP IMAGE WHEN HOVER - Will change to another image when hover over the post, 2 uploaded images are needed.
* FADE IMAGE - works with one image and will fade the image when hover over it.

Image effect settings

* When using AUTO SWAP the delay time can be set here in seconds
* when using FADE IMAGE the percentage the image will be faded to can be set here


= Excerpt options =

Excerpt Length - Set the length off the excerpt, set 0 to not set the length. Limiting the length of the excerpt Will not work in full html mode.

Shorten Excerpt - Sets how the excerpt will be shortened. Will not work in full html mode.

Read more link - Add an optional read more link

Get excerpt from - Set which field the excerpt will be created from. Usually the main content field is used to create excerpt from, but there is also the possibility to create your own excerpt by choosing "excerpt field". Also full html can be used in a custom field. The field needs to have the name "text". 

important: Using full html can make the layout look unformatted and bad because the html code can interfere with the plugin.


= General options =

Columns - this option allows you to put posts side by side. NOTE: be careful, the width of the layout increases and may overflow on your page. Up to 10 columns with posts can be added but usually 2 or 3 is used.

Link behavior - This chooses which elements that will be linked to the post. 

* DEFAULT - title and image is linked. 
* ALL - all elements are linked. 
- NONE - no links at all will be used.

Pagination - Allows to add pagination to the layout. NOTE: only one can be used per page or post!

Sort posts by - Select in which order the posts will show up

Show posts only from category - If you only want to display posts from a certain category then you can use this option. 


= Space options =

Layout space bottom - add a space or hr separator tag under the layout to separate it from other layouts. Useful if you add several layouts on a page.

Post space - add a space between each posts.




= Background Color Effect Options =

Background color - Activates the effect over the whole post or the image

Bg color change - set the color to change when hover over the posts. NOTE: these options are valid only if BACKGROUND EFFECT is set to HOVER EFFECT.

Bg effect - Set HOVER EFFECT for a simple color change effect or STATIC for a CSS effect. The static CSS effect can be edited in CSS.


= Pop Up Effect Options =

NOTE: To activate this option a pop up option must be selected under placement options.

Direction & Speed - set the direction and speed the pop up will appear in.

Position - set the position of the pop up relative to the top left of the image. If left and top is set to 0 then the corner of the pop up will be the same as the corner of the image.

Width & Height - set the width and height of the pop up. NOTE: if height is 0 then the height will be set automatically. 

Bg Color & Fade - set the background color and fading of the pop up.



= Advanced Post Filter Options =

Advanced post filter need only be used if case you want to do some specific tasks like showing unpublished posts or show a list of pages.



= CSS Styling =

To be able to change title size, edit background colors and other graphics in CSS, you need to add a CSS file. IMPORTANT - To protect your CSS file from being overwritten you need to put it in a safe directory outside the plugin directory. Change the CSS file URL in the main option page to point to your CSS file. Steps:

1. take a copy of the style.css in the plugins directory
2. put the copy in a safe directory outside the plugin. Example the root or the themes folder
3. Change the CSS file URL in the main option page to point to your CSS file.Note: adding a CSS file will not disable the CSS file in the plugin, both will be used.

= Main options page =

CSS file URL - you only need to fill this in if you want to use your own CSS file, see CSS section for more info.

Layout example width - Let you specify the width of the example under each layout in the admin section. You can if you want set it to similar to your theme width.

Allow duplicate - will not repeat the same post more than one time on a page if you are specifying it here. 



= Making a page the front page =

To make a page a front page,  go to Settings -> Reading Settings and select Static Page, in the drop down menu choose the page you want as your front page.







== Screenshots ==

1. Example Front Page
2. options


== Changelog ==

= 2.2 =
* now uses divs instead of tables

= 2.1.6 =
* new release.

== Upgrade Notice ==

= 2.2 =
* now uses divs instead of tables

= 2.1.6 =
* new release.