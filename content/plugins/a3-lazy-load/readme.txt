=== a3 Lazy Load ===

Contributors: a3rev, A3 Revolution Software Development team
Tags: a3 lazy load, Lazy Loading , image lazy load, lazyload
Requires at least: 4.0
Tested up to: 4.3
Stable tag: 1.4.1
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Use a3 Lazy Load for images, videos, iframes. Instantly improve your sites load time and dramatically improve site user’s experience.

== Description ==

a3 Lazy Load is a Mobile Oriented, simple to use plugin that will speed up site performance. The more content heavy your site the better the plugin will perform and the more you will see the improvements in performance. See [this demo](http://ressio.github.io/lazy-load-xt/demo/stresstest1000img.htm) of a page with 1,000 images (yes 1,000 images) to load.

a3 Lazy Load is inspired by and powered by the ressio [Lazy-Load-xt JavaScript](https://github.com/ressio/lazy-load-xt).

a3 Lazy Load is the most fully featured lazy load plugin for WordPress. Use the plugins admin settings to easily define what elements are lazy loaded when they become visible in the users browser. As the user scroll down the page the next lot of elements you have applied lazy Load to are only loaded as they become visible in the view port.

= Image Lazy Load =

Images are the number one element that slows page load and increases bandwidth use. From the a3 Lazy Load admin panel turn load images by a3 Lazy Load ON | OFF. For more flexibility when ON you can choose to ON | OFF lazy load for images in

* Post and Pages (All Content areas)
* Widgets (Sidebar, header and footer)
* Apply to post thumbnails
* Apply to gravatars

= More than just Images =

= Video Lazy Load =

a3 Lazy Load supports all WordPress video Embeds including Youtube, Vimeo and HTML5 video - for a full list see the [WordPress Codex Embeds](http://codex.wordpress.org/Embeds) list. The WordPress embed method of copying and pasting the video url into posts and pages content area is fully supported. Note - embed video by WordPress shortcode is not supported.

From the a3 lazy Load admin panel turn Video Support ON | OFF. When ON you can choose to ON | OFF lazy load for videos in

* Post and Pages (All Content areas)
* Widgets (Sidebar, header and footer)

* Youtube [see demo](http://ressio.github.io/lazy-load-xt/demo/youtube-iframe.htm)
* Video [see demo](http://ressio.github.io/lazy-load-xt/demo/video-html5.htm)

= Elements loaded by iframe =

a3 Lazy Load has built in support for content that is added by iframe from any source in content and widgets - examples

* WordPress embedded media
* Facebook Like boxes with profiles, Like buttons, Recommend
* Google+ Profile
* Google Maps

= Lazy Load Effects =

a3 Lazy Load gives you the option to lazy load images with a FADE IN or SPINNER effect.

* FADEIN [see demo](http://ressio.github.io/lazy-load-xt/demo/fadein.htm)
* SPINNER [see demo](http://ressio.github.io/lazy-load-xt/demo/spinner.htm)
* Option to create a custom Lazy Load pre-load background colour

= WooCommerce =

a3 lazy Load is built and tested to be fully compatible with the very widely used WooCommerce plugin.

= Performance Tweak =

a3 Lazy Load gives you the option to load its script from your sites HEAD or from the FOOT.

* Note that your theme must have the wp_footer() function if you select FOOTER load.
* Note the plugin CSS is always loaded from the HEAD.

= Exclude Images and Videos =

a3 Lazy Load allows you to easily exclude any images and video by class name from having the Lazy Load effect applied.

= JavaScript Disabled Fallback =

a3 Lazy Load has built in Noscript fallback if user has JavaScript turned off in their browser. Developers who use underscore.js in their applications can use the Noscript parameter to exclude their plugins content from Lazy Load.

= Theme Compatibility =

* Work with any WordPress theme that follows the WordPress Theme Codex.
* Fully compatible with WPTouch plugin - Set to not apply on Mobiles if WPTouch is installed.
* Fully compatible with MobilePress plugin - Set to not apply on Mobiles if MobilePress is installed.

= Plugin Compatibility =

* Will not conflict with any plugin that has lazy load built in.
* Plugin Developers a3 lazy load filter allows them to let lazy load apply to their plugin.
* Tested 100% compatible with WP Super Cache and W3 Total Cache plugins.
* Tested 100% compatible with Amazon Cloudfront.
* Fully compatible with CDN architecture.

= Full Browser Support =

a3 lazy Load is tested 100% compatible with all major browsers.

= PC's =
* IE 6-11
* Chrome 1-39 (current)
* Firefox 1.5-33 (current)
* Safari 3-8 (current)
* Opera 10.6-25 (current)

= Mobile =
* iOS 5-8 (current)
* Android 2.3-4.4 (current)
* Amazon Kindle Fire 4-4.3 (Current)
* Windows Mobile 8.1 (Current)

= More Features =

* Full support of jQueryMobile framework
* WordPress Multi site ready.
* Backend support for RTL display.
* Translation ready


== Installation ==

= Minimum Requirements =

* WordPress 4.0
* PHP version 5.2.4 or greater
* MySQL version 5.1.73 or greater

= Automatic installation =

Automatic installation is the easiest option as WordPress handles the file transfers itself and you don't even need to leave your web browser. To do an automatic install of a3 Lazy Load, log in to your WordPress admin panel, navigate to the Plugins menu and click Add New. Search a3 Lazy load, select and install.

== Screenshots ==

1. Admin Dashboard.


== Usage ==

1. Install and activate the plugin

2. On wp-admin a3 Lazy Load one page admin panel check the settings.

3. Enjoy


== Changelog ==

= 1.4.1 - 2015/08/22 =
* Tweak - include new CSSMin lib from https://github.com/tubalmartin/YUI-CSS-compressor-PHP-port into plugin framework instead of old CSSMin lib from http://code.google.com/p/cssmin/ , to avoid conflict with plugins or themes that have CSSMin lib
* Tweak - make __construct() function for 'Compile_Less_Sass' class instead of using a method with the same name as the class for compatibility on WP 4.3 and is deprecated on PHP4
* Tweak - change class name from 'lessc' to 'a3_lessc' so that it does not conflict with plugins or themes that have another Lessc lib
* Tweak - Plugin Framework DB query optimization. Refactored settings_get_option call for dynamic style elements, example typography, border, border_styles, border_corner, box_shadow
* Tweak - Tested for full compatibility with WordPress major version 4.3.0
* Fix - Update the plugin framework for setup correct default settings on first installed
* Fix - Update the plugin framework for reset to correct default settings when hit on 'Reset Settings' button on each settings tab

= 1.4.0 - 2015/06/17 =
* Feature - Plugin framework Mobile First focus upgrade
* Feature - Massive improvement in admin UI and UX in PC, tablet and mobile browsers
* Feature - Introducing opening and closing Setting Boxes on admin panels.
* Feature - Added Plugin Framework Customization settings. Control how the admin panel settings show when editing.
* Feature - Added House Keeping - Clean up on Deletion function. ON | OFF switch is in the Plugin Framework Settings Box.  
* Feature - Added a 260px wide images to the right sidebar for support forum link, Documentation links.
* Tweak - Tested for full compatibility with WooCommerce Version 2.3.11
* Tweak - Removed Add-Ons Menu
* Tweak - Moved plugin menu from Wordpress Dashboard admin menu to a sub menu on the WordPress Settings menu
* Tweak - Added Settings link to the plugins listing on plugin.php menu for easy access to plugin
* Fix - Check 'request_filesystem_credentials' function, if it does not exists then require the core php lib file from WP where it is defined

= 1.3.0 - 2015/06/05 =
* Feature - Added Image Load Threshold with set threshold pixel dynamic setting. Default is 0px
* Credit - Thanks to [Onisforos and Matt Pain](https://wordpress.org/support/topic/setting-threshold?replies=3) for suggesting and explaining the new Threshold feature

= 1.2.2 - 2015/06/03 =
* Tweak - Security Hardening. Removed all php file_put_contents functions in the plugin framework and replace with the WP_Filesystem API
* Tweak - Security Hardening. Removed all php file_get_contents functions in the plugin framework and replace with the WP_Filesystem API

= 1.2.1 - 2015/05/26 =
* Fix - Update url of dynamic stylesheet in uploads folder to the format <code>//domain.com/</code> so it's always is correct when loaded as <code>http</code> or <code>https</code>
* Credit - Thanks to WordPress member hero12 for bringing the matter [to our attention](https://wordpress.org/support/topic/css-is-not-loaded-properly-on-https?replies=1).

= 1.2.0 - 2015/05/18 =
* Feature - Added new extend script to support event when click or tap on tab to load images without having to scroll to initiate load.
* Tweak - Tested and Tweaked for full compatibility with WordPress Version 4.2.2
* Tweak - Changed Permission 777 to 755 for style folder inside the uploads folder
* Tweak - Chmod 644 for dynamic style and .less files from uploads folder

= 1.1.1 - 2015/04/21 =
* Tweak - Tested and Tweaked for full compatibility with WordPress Version 4.2.0
* Tweak - Update style of plugin framework. Removed the [data-icon] selector to prevent conflict with other plugins that have font awesome icons

= 1.1.0 - 2015/01/23 =
* Feature - Added support for all WordPress video Embeds including Youtube, Vimeo and HTML5 video
* Feature - Added support for content that is added by iframe from any source in post and page content and widgets
* Feature - Added ON | OFF option for Noscript parameter for both images and video and iframes - fallback if user does not have JavaScript support turned on in browser.
* Tweak - Reworked the plugins admin panel for new feature options. Separate settings for Images and Video / iframes
* Tweak - Updated all the admin panel text and add new help text.
* Tweak - Updated the plugins WordPress description with new features.
* Tweak - Updated the plugins WordPress screenshot
* Tweak - Updated the plugins WordPress banner image.
* Dev - Updated 'a3_lazy_load_enable' function to edit their image or video attribute to enable a3 lazy load images or videos loaded by 3rd party application.
* Dev - Defined 'a3_lazy_load_image_enable' function to edit image attribute to enable a3 lazy load to apply images loaded by 3rd party applications.
* Dev - Defined 'a3_lazy_load_video_enable' function to edit image attribute so a3 lazy load script can apply to the videos, iframe.
* Dev - Include 'var a3_lazyload_params = {"apply_images":"1","apply_videos":"1"};' JavaScript variable into frontend that get the option that are set from admin panel. Plugin and Theme developers can use that variable inside own script to check when Lazy Load apply for Image and for Video instead of use 'a3_lazy_load_video_enable' and 'a3_lazy_load_video_enable' functions in PHP code
* Dev - Remove 'a3_lazy_load_skip_classes' filter tag, we will replace another filter for separate filters for image and videos
* Dev - Defined 'a3_lazy_load_skip_images_classes' filter tag. Developers can add another class css name for images that they don't want lazy load applied too.
* Dev - Defined 'a3_lazy_load_skip_videos_classes' filter tag. Developers can add another class css name for video that they don't want lazy load applied too.
* Dev - Added default exclude class 'a3-notlazy' so developers can easily apply it to videos that they don't want Lazy Load to apply to.
* Dev - Defined 'a3_lazy_load_videos' filter. Plugin and Theme developers can use this filter and parse the content with videos or iframe and the filter will return content with change on videos or iframe that a3 Lazy Load support

= 1.0.2 - 2015/01/20 =
* Tweak - Include wp_deregister_script( 'jquery-lazyloadxt' ) before wp_enqueue_script( 'jquery-lazyloadxt' ) for compatibility with a3 Portfolio plugin which supports video slides
* Dev - Add new parameter $noscript boolen type for 'a3_lazy_load_html' and 'a3_lazy_load_images' filters to exclude or include noscript from content return of 3rd party plugins.
* Dev - Added default exclude class 'a3-notlazy' so developers can easily apply it to images that they don't want Lazy Load to apply to.

= 1.0.1 - 2014/12/23 =
* Tweak - Applied lazy load for 'wp_get_attachment_image_attributes' filter tag for WordPress default [gallery] shortcode
* Tweak - Added link to a3 Lazy Load wordpress.org support forum on plugins description that show on plugins menu
* Dev - Defined 'a3_lazy_load_enable' function when Enable Lazy Load is set to ON. Plugin and Theme developers can use the function to edit their image attribute so that a3 lazy load script can apply to the images.
* Dev - Defined 'a3_lazy_load_skip_classes' filter tag. Developers can add another class css name for images that they don't want lazy load applied too.
* Fix - Lazy Load does not apply to images added by shortcode, excluding the WordPress default [gallery] shortcode

= 1.0.0 - 2014/12/20 =
* First working release


== Upgrade Notice ==

= 1.4.1 =
Major Maintenance Upgrade. 5 Code Tweaks plus 2 bug fixes for full compatibility with WordPress v 4.3.0

= 1.4.0 =
Major Feature Upgrade. Massive admin panel UI and UX upgrade. Includes 5 new features, 3 Tweaks, 1 bug fix plus full compatibility with WooCommerce Version 2.3.11

= 1.3.0 =
Feature Upgrade. New Image Loading Threshold feature. Set threshold in pixel that images will start to load before they reach the viewport.

= 1.2.2 =
Important Maintenance Upgrade. 2 x major a3rev Plugin Framework Security Hardening Tweaks

= 1.2.1 =
Maintenance Upgrade. 1 bug fix for dynamic stylesheets loaded over secure https protocol.

= 1.2.0 =
Feature Upgrade. Added support for Lazy Load images in Tabbed content without having to scroll, also a file permissions tweak plus full compatibility with WordPress 4.2.2

= 1.1.1 =
Maintenance upgrade. Code tweaks for full compatibility with WordPress 4.2.0 and WooCommerce 2.3.8

= 1.1.0 =
Major version release. Added support for WordPress Embeds - Youtube, Vimeo, HTML5 video and iframe content from all sources.

= 1.0.2 =
Upgrade now for an a3 Portfolio plugin compatibility code tweak and a new Dev parameter and exclude class.

= 1.0.1 =
Upgrade your plugin now for apply lazy load to shortcodes fix plus plus a new developer function and class.
