=== Videojs HTML5 Player ===
Contributors: naa986
Donate link: http://wphowto.net/
Tags: video, wpvideo, flash, html5, iPad, iphone, ipod, mobile, playlists, embed video, videojs, flash player, player, video player, embed, lightweight, minimal, myvideo, responsive  
Requires at least: 4.2
Tested up to: 4.3
Stable tag: 1.0.4
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Embed video files beautifully in WordPress using Videojs HTML5 Player

== Description ==

Videojs HTML5 Player is a user-friendly plugin that supports video playback on desktops and mobile devices. It makes super easy for you to embed both self-hosted video files or video files that are externally hosted using Videojs library.

= Videojs HTML5 Player Features =

* Embed MP4 video files into a post/page or anywhere on your WordPress site
* Embed responsive videos for a better user experience while viewing from a mobile device
* Embed HTML5 videos which are compatible with all major browsers
* Embed videos with poster images
* Embed videos using videojs player
* Automatically play a video when the page is rendered
* Embed videos uploaded to your WordPress media library using direct links in the shortcode
* No setup required, simply install and start embedding videos
* Lightweight and compatible with the latest version of WordPress
* Clean and sleek player with no watermark

= Videojs HTML5 Player Plugin Usage =

In order to embed a video create a new post/page and use the following shortcode:

`[videojs_video url="http://example.com/wp-content/uploads/videos/myvid.mp4" width="480"]`

Here, "url" is a shortcode parameter that you need to replace with the actual URL of the video file.

= Options =

The following options are supported in the shortcode.

**Width**

Defines the width of the video file (Height is automatically calculated).

**Preload**

Specifies if and how the video should be loaded when the page loads. Defaults to "auto" (the video should be loaded entirely when the page loads). Other options:

* "metadata" - only metadata should be loaded when the page loads
* "none" - the video should not be loaded when the page loads

`[videojs_video url="http://example.com/wp-content/uploads/videos/myvid.mp4" width="480" preload="metadata"]`

**Controls**

Specifies that video controls should be displayed. Defaults to "true". In order to hide controls set this parameter to "false".

`[videojs_video url="http://example.com/wp-content/uploads/videos/myvid.mp4" width="480" controls="false"]`

When you disable controls users will not be able to interact with your videos. So It is recommended that you enable autoplay for a video with no controls.

**Autoplay**

Causes the video file to automatically play when the page loads.

`[videojs_video url="http://example.com/wp-content/uploads/videos/myvid.mp4" width="480" autoplay="true"]`

**Poster**

Defines image to show as placeholder before the video plays.

`[videojs_video url="http://example.com/wp-content/uploads/videos/myvid.mp4" width="480" poster="http://example.com/wp-content/uploads/poster.jpg"]`

**Loop**

Causes the video file to loop to beginning when finished and automatically continue playing.

`[videojs_video url="http://example.com/wp-content/uploads/videos/myvid.mp4" width="480" loop="true"]`

**Muted**

Specifies that the audio output of the video should be muted.

`[videojs_video url="http://example.com/wp-content/uploads/videos/myvid.mp4" width="480" muted="true"]`

For detailed documentation please visit the [Videojs HTML5 Player](http://wphowto.net/videojs-html5-player-for-wordpress-757) plugin page

== Installation ==

1. Go to the Add New plugins screen in your WordPress Dashboard
1. Click the upload tab
1. Browse for the plugin file (videojs-html5-player.zip) on your computer
1. Click "Install Now" and then hit the activate button

== Frequently Asked Questions ==

= Can this plugin be used to embed videos in WordPress? =

Yes.

= Are the videos embedded by this plugin playable on iOS devices? =

Yes.

= Can I embed responsive videos using this plugin? =

Yes.

== Screenshots ==

1. Videojs HTML5 Player Demo

== Upgrade Notice ==
none

== Changelog ==

= 1.0.4 =

* Videojs HTML5 Player is now compatible with WordPress 4.3

= 1.0.3 =

* Added an option to mute the audio output of a video
* Added an option to loop a video

= 1.0.2 =

* Added an option to show/hide controls
* Added an option to set preload attribute

= 1.0.1 =

* First commit
