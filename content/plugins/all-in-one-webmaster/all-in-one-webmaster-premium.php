<?PHP
/**
 * All in One Webmaster is the best webmaster plugin for WordPress
 * that adds Meta-Tags and Scripts to your Site's Header and Footer Section
 * automatically without changing any of your themes file and
 * without slowing down your site.
 *
 * @package All in One Webmaster
 * @author Arpit Shah
 * @license GPL-2.0+
 * @link http://crunchify.com/all-in-one-webmaster/
 * @copyright 2012-14 Crunchify. All rights reserved.
 *           
 *            @wordpress-plugin
 *            Plugin Name: All in One Webmaster
 *            Plugin URI: http://crunchify.com/all-in-one-webmaster/
 *            Description: All in One Webmaster is the best webmaster plugin for WordPress that adds Meta-Tags and Scripts to your Site's Header and Footer Section automatically without changing any of your themes file and without slowing down your site.
 *            Version: 9.7
 *            Author: Arpit Shah
 *            Author URI: http://crunchify.com/
 *            Text Domain: aiow
 *            Contributors: Crunchify
 *            License: GPL-2.0+
 *            License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

/*
 * Copyright (C) 2012-2014 Crunchify.com This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */

/**
 * Setup plugin.
 */
class aiow_premium {
	
	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since 1.0.0
	 *       
	 * @var string
	 */
	protected $version = '9.7';
	
	/**
	 * The name of the plugin.
	 *
	 * @since 1.0.0
	 *       
	 * @var string
	 */
	protected $plugin_name = 'All in One Webmaster';
	
	/**
	 * Unique plugin identifier.
	 *
	 * @since 1.0.0
	 *       
	 * @var string
	 */
	protected $plugin_slug = 'all-in-one-webmaster';
	
	/**
	 * Plugin textdomain.
	 *
	 * @since 1.0.0
	 *       
	 * @var string
	 */
	protected $domain = 'aiow';
	
	/**
	 * Only instance of object.
	 */
	private static $instance = null;
	
	/**
	 * Creates or returns an instance of this class.
	 *
	 * @since 9.0
	 *       
	 * @return aiow_premium A single instance of this class.
	 */
	public static function get_instance() {
		if (self::$instance == null) {
			self::$instance = new self ();
		}
		return self::$instance;
	}
	
	/**
	 * Initiate plugin.
	 *
	 * @since 9.0
	 */
	private function __construct() {
		
		// Output Analytics
		$analytics = get_option ( 'aiow_premium_options' );
		add_action ( 'wp_footer', array (
				$this,
				'aiow_premium_footer' 
		), 1000 );
		add_action ( 'wp_head', array (
				$this,
				'aiow_premium_header' 
		), 2 );
		
		// Settings page
		add_action ( 'admin_menu', array (
				$this,
				'aiow_premium_menupage' 
		) );
		
		// Settings page
		add_action ( 'admin_menu', array (
				$this,
				'aiow_premium_load_css_js' 
		) );
	}
	
	/**
	 * Get all Header Meta Tags
	 *
	 * @since 9.0
	 */
	public function aiow_premium_header() {
		$google_wm = get_option ( 'all_in_one_premium_google_webmaster' );
		$pinterest_wm = get_option ( 'all_in_one_premium_pinterest' );
		
		$yandex_wm = get_option ( 'all_in_one_premium_yandex_webmaster' );
		$alexa_wm = get_option ( 'all_in_one_premium_alexa_webmaster' );
		$bcatalog_wm = get_option ( 'all_in_one_premium_bcatalog_webmaster' );
		$fbinsights_wm = get_option ( 'all_in_one_premium_fbinsights_webmaster' );
		$fbinsights_wm_pageid = get_option ( 'all_in_one_premium_fbinsights_webmaster_pageid' );
		$fbinsights_wm_appid = get_option ( 'all_in_one_premium_fbinsights_webmaster_appid' );
		
		$bing_wm = get_option ( 'all_in_one_premium_bing_webmaster' );
		$google_an = get_option ( 'all_in_one_premium_google_analytics' );
		$quantcast_an = get_option ( 'all_in_one_premium_quantcast_analytics' );
		
		$google_authorship_profile = get_option ( 'all_in_one_premium_google_authorship_profile' );
		$google_authorship_page = get_option ( 'all_in_one_premium_google_authorship_page' );
		
		$favicon_icon = get_option ( 'all_in_one_premium_favicon' );
		
		$head_section = get_option ( 'all_in_one_premium_head_section' );
		echo "\n";
		echo "<!-- All in One Webmaster plugin by Crunchify.com -->";
		if (! ($head_section == "")) {
			echo $head_section . "\n";
		}
		if (! ($google_wm == "")) {
			$google_wm_meta = '<meta name="google-site-verification" content="' . $google_wm . '" /> ';
			echo $google_wm_meta . "\n";
		}

		if (! ($pinterest_wm == "")) {
			$pinterest_wm_meta = '<meta name="p:domain_verify" content="' . $pinterest_wm . '" /> ';
			echo $pinterest_wm_meta . "\n";
		}
		
		if (! ($yandex_wm == "")) {
			$yandex_wm_meta = '<meta name="yandex-verification" content="' . $yandex_wm . '" /> ';
			echo $yandex_wm_meta . "\n";
		}
		
		if (! ($bing_wm == "")) {
			$bing_wm_meta = '<meta name="msvalidate.01" content="' . $bing_wm . '" />';
			echo $bing_wm_meta . "\n";
		}
		
		if (! ($alexa_wm == "")) {
			$alexa_wm_meta = '<meta name="alexaVerifyID" content="' . $alexa_wm . '" />';
			echo $alexa_wm_meta . "\n";
		}
		if (! ($bcatalog_wm == "")) {
			$bcatalog_wm_meta = '<meta name="blogcatalog" content="' . $bcatalog_wm . '" />';
			echo $bcatalog_wm_meta . "\n";
		}
		if (! ($fbinsights_wm == "")) {
			$fbinsights_wm_meta = '<meta property="fb:admins" content="' . $fbinsights_wm . '" />';
			echo $fbinsights_wm_meta . "\n";
		}
		
		if (! ($fbinsights_wm_pageid == "")) {
			$fbinsights_wm_meta = '<meta property="fb:page_id" content="' . $fbinsights_wm_pageid . '" />';
			echo $fbinsights_wm_meta . "\n";
		}
		if (! ($fbinsights_wm_appid == "")) {
			$fbinsights_wm_meta = '<meta property="fb:app_id" content="' . $fbinsights_wm_appid . '" />';
			echo $fbinsights_wm_meta . "\n";
		}
		
		if (! ($google_an == "")) {
			echo '<script>' . "\n";
			echo '(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){' . "\n";
			echo '  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),' . "\n";
			echo 'm=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)' . "\n";
			echo '})(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');' . "\n";
			echo 'ga(\'create\', \'' . $google_an . '\', \'auto\');' . "\n";
			echo 'ga(\'send\', \'pageview\');' . "\n";
			echo '</script>' . "\n";
		}
		
		if (! ($quantcast_an == "")) {
			echo '<script type="text/javascript">' . "\n";
			echo '_qoptions={qacct:"' . $quantcast_an . '"};' . "\n";
			echo '</script>' . "\n";
			echo '<script type="text/javascript" src="http://edge.quantserve.com/quant.js"></script>' . "\n";
		}
		
		if (! ($google_authorship_profile == "")) {
			$google_authorship_profile_meta = '<link rel="author" href="' . $google_authorship_profile . '">';
			echo $google_authorship_profile_meta . "\n";
		}
		
		if (! ($google_authorship_page == "")) {
			$google_authorship_page_meta = '<link rel="publisher" href="' . $google_authorship_page . '">';
			echo $google_authorship_page_meta . "\n";
		}
				
		if (! ($favicon_icon == "")) {
			$favicon_meta = '<link rel="Shortcut Icon" href="' . $favicon_icon . '" type="image/x-icon">';
			echo $favicon_meta . "\n";
		}
		
		echo "<!-- /All in One Webmaster plugin -->\n\n";
	}
	
	/**
	 * Output Footer Scripts
	 *
	 * @since 9.0
	 */
	public function aiow_premium_footer() {
		$clicky_an = get_option ( 'all_in_one_premium_clicky_analytics' );
		$compete_an = get_option ( 'all_in_one_premium_compete_analytics' );
		
		$footer_section = get_option ( 'all_in_one_premium_footer_section' );
		$sitemeter_an = get_option ( 'all_in_one_premium_sitemeter_analytics' );
		$google_tag_manager = get_option ( 'all_in_one_premium_google_tag_manager' );
		
		if (! ($footer_section == "")) {
			echo $footer_section . "\n";
		}
		
		if (! ($clicky_an == "")) {
			echo '<script src="http://static.getclicky.com/js" type="text/javascript"></script>' . "\n";
			echo '<script type="text/javascript">clicky.init(' . $clicky_an . ');</script>' . "\n";
		}
		
		if (! ($compete_an == "")) {
			echo '<script type="text/javascript">' . "\n";
			echo '__compete_code = \'' . $compete_an . '\';' . "\n";
			echo '(function () { var s = document.createElement(\'script\'),d = document.getElementsByTagName(\'head\')[0] || document.getElementsByTagName(\'body\')[0],t = \'https:\' == document.location.protocol ? \'https://c.compete.com/bootstrap/\' : \'http://c.compete.com/bootstrap/\'; s.src = t + __compete_code + \'/bootstrap.js\'; s.type = \'text/javascript\'; s.async = \'async\'; if (d) { d.appendChild(s); }}());' . "\n";
			echo '</script>' . "\n";
		}
		
		if (! ($sitemeter_an == "")) {
			echo '<script type="text/javascript" src="' . $sitemeter_an . '"></script>' . "\n";
		}
		
		if (! ($google_tag_manager == "")) {
			
			echo '<noscript><iframe src="//www.googletagmanager.com/ns.html?id=' . $google_tag_manager . '" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>' . "\n";
			echo '<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':new Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src= \'//www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f); })(window,document,\'script\',\'dataLayer\',\'' . $google_tag_manager . '\');</script>' . "\n";
		}
		
		$all_in_one_premium_banner1 = get_option ( 'all_in_one_premium_banner' );
	}
	
	/**
	 * Register All Menus.
	 *
	 * @since 9.0
	 */
	public function aiow_premium_menupage() {
		add_menu_page ( 'All in One Webmaster', 'AIO Webmaster', 'manage_options', 'aiow-premium', 'all_in_one_premium_webmaster_webmaster_page', plugins_url ( 'all-in-one-webmaster/images/favicon.ico' ), 6 );
		add_submenu_page ( 'aiow-premium', 'Webmaster Tools', 'Webmaster Options', 'manage_options', 'aiow-premium', 'all_in_one_premium_webmaster_webmaster_page' );
		add_submenu_page ( 'aiow-premium', 'Analytics Tools', 'Analytics Options', 'manage_options', 'aiow-premium-analytics', 'all_in_one_premium_webmaster_analytics_page' );
		add_submenu_page ( 'aiow-premium', 'Google Authorship', 'Google Authorship', 'manage_options', 'aiow-premium-google-authorship', 'all_in_one_premium_webmaster_google_authorship_page' );
		add_submenu_page ( 'aiow-premium', 'Header/Footer Tools', 'Header/Footer Options', 'manage_options', 'aiow-premium-header-footer', 'aiow_premium_headerer_footer_page' );
		add_submenu_page ( 'aiow-premium', 'Sitemap Tools', 'Sitemap Options', 'manage_options', 'aiow-premium-sitemap', 'all_in_one_premium_webmaster_sitemap_page' );
		add_submenu_page ( 'aiow-premium', 'Misc Tools', 'Misc Options', 'manage_options', 'aiow-premium-misc', 'all_in_one_premium_webmaster_misc_page' );
	}
	
	/**
	 * Load CSS and JS.
	 *
	 * @since 9.0
	 */
	public function aiow_premium_load_css_js() {
		wp_enqueue_script ( 'jquery' ); // Enque Default jQuery
		wp_enqueue_script ( 'jquery-ui-core' ); // Enque Default jQuery UI Core
		wp_enqueue_script ( 'jquery-ui-tabs' ); // Enque Default jQuery UI Tabs
		
		wp_register_script ( 'aiow-plugin-script', plugins_url ( '/js/aiow-premium.js', __FILE__ ) );
		wp_enqueue_script ( 'aiow-plugin-script' );
		
		wp_register_style ( 'aiow-plugin-css', plugins_url ( '/css/aiow-premium.css', __FILE__ ) );
		wp_enqueue_style ( 'aiow-plugin-css' );
	}
}

/**
 * Initialize Variable.
 *
 * @since 9.0
 */
add_option ( 'all_in_one_premium_google_webmaster', '' );
add_option ( 'all_in_one_premium_yandex_webmaster', '' );
add_option ( 'all_in_one_premium_bing_webmaster', '' );
add_option ( 'all_in_one_premium_alexa_webmaster', '' );
add_option ( 'all_in_one_premium_bcatalog_webmaster', '' );
add_option ( 'all_in_one_premium_fbinsights_webmaster', '' );
add_option ( 'all_in_one_premium_fbinsights_webmaster_pageid', '' );
add_option ( 'all_in_one_premium_fbinsights_webmaster_appid', '' );
add_option ( 'all_in_one_premium_pinterest', '' );

add_option ( 'all_in_one_premium_google_analytics', '' );
add_option ( 'sitemap_URL', '' );
add_option ( 'all_in_one_premium_clicky_analytics', '' );
add_option ( 'all_in_one_premium_compete_analytics', '' );
add_option ( 'all_in_one_premium_quantcast_analytics', '' );
add_option ( 'all_in_one_premium_sitemeter_analytics', '' );

add_option ( 'all_in_one_premium_head_section', '' );
add_option ( 'all_in_one_premium_footer_section', '' );
add_option ( 'all_in_one_premium_banner', '-1' );

add_option ( 'all_in_one_premium_google_authorship_page', '' );
add_option ( 'all_in_one_premium_google_authorship_profile', '' );

add_option ( 'all_in_one_premium_favicon', '' );
add_option ( 'all_in_one_premium_google_tag_manager', '' );
add_option ( 'all_in_one_premium_xml_sitemap', '1' );

/**
 * Sitemap Submit.
 *
 * @since 9.0
 */
function all_in_one_premium_webmaster_sitemap_submit($sitemap_URL1, $search_engine, $OKmessage, $NOmessage) {
	$DONE_MSG = 'DONE';
	$NOPE_MSG = 'NOPE';
	
	$pingurl = $search_engine . $sitemap_URL1;
	$source = @file_get_contents ( $pingurl );
	
	if ($source != false) {
		
		$source = strip_tags ( $source );
		$source = "WEBMASTER" . $source;
		
		$isOKmessage = stripos ( $source, $OKmessage );
		$isNOmessage = stripos ( $source, $NOmessage );
		
		if (($isOKmessage != false) && ($isNOmessage == false)) {
			$finalMessage = $DONE_MSG . $OKmessage;
		}
		if (($isOKmessage == false) && ($isNOmessage != false)) {
			$finalMessage = $NOPE_MSG . $NOmessage;
		}
		if (($isOKmessage == false) && ($isNOmessage == false)) {
			$finalMessage = $NOPE_MSG . 'Submission error';
		}
	} else if ($source == false) {
		$finalMessage = $NOPE_MSG . 'search_engine error';
	}
	return array (
			$source,
			$finalMessage 
	);
}

/**
 * Save All Options.
 *
 * @since 9.0
 */
function all_in_one_premium_save_all_options() {
	if (isset ( $_POST ['update_sitemap'] )) {
		if (! isset ( $_POST ['my_aiowz_update_setting'] ))
			die ( "Hmm .. looks like you didn't send any credentials.. No CSRF for you! " );
		if (! wp_verify_nonce ( $_POST ['my_aiowz_update_setting'], 'aiowz-update-setting' ))
			die ( "Hmm .. looks like you didn't send any credentials.. No CSRF for you! " );
		
		update_option ( 'sitemap_URL', ( string ) $_POST ['sitemap_URL'] );
		$sitemap_URL1 = get_option ( 'sitemap_URL' );
		
		$show_sitemap = '';
		$last3 = substr ( $sitemap_URL1, - 1, 3 );
		$last5 = substr ( $sitemap_URL1, - 1, 5 );
		$check1 = "xml";
		$icon_url = get_bloginfo ( 'wpurl' );
		
		if ($sitemap_URL1 == "") {
			$show_sitemap .= '<div id="message" class="updated fade"><p>' . "Oops!! Blank field. Please provide sitemap URL" . '<br /><br /> Sitemap must ends with .xml or .xml.gz';
			$show_sitemap .= '</p></div>';
		} 

		else {
			$webmasterlink = array (
					
					'goo' => array (
							'webmaster_engine' => 'Google',
							'search_engine' => 'http://www.google.com/webmasters/sitemaps/ping?sitemap=',
							'OKmessage' => 'Sitemap Notification Received',
							'NOmessage' => 'Bad Request' 
					),
					
					'bin' => array (
							'webmaster_engine' => 'Bing',
							'search_engine' => 'http://www.bing.com/webmaster/ping.aspx?siteMap=',
							'OKmessage' => 'Thanks for submitting your sitemap',
							'NOmessage' => 'Bad Request' 
					) 
			);
			
			$show_sitemap .= '<div id="message" class="updated fade"><p>';
			
			foreach ( $webmasterlink as $siln => $myArray1 ) {
				$webmaster_engine = $myArray1 ['webmaster_engine'];
				$search_engine = $myArray1 ['search_engine'];
				$OKmessage = $myArray1 ['OKmessage'];
				$NOmessage = $myArray1 ['NOmessage'];
				
				list ( $source, $finalMessage ) = all_in_one_premium_webmaster_sitemap_submit ( $sitemap_URL1, $search_engine, $OKmessage, $NOmessage );
				
				$statusTag = substr ( $finalMessage, 0, 4 );
				if ($statusTag == 'DONE') {
					$icon = '<img border="0" src="' . $icon_url . '/wp-content/plugins/all-in-one-webmaster/images/yes.jpg" /> ';
					$alter_link = '<br />';
				} else if ($statusTag == 'NOPE') {
					$icon = '<img border="0" src="' . $icon_url . '/wp-content/plugins/all-in-one-webmaster/images/fail.jpg" /> ';
					$submission_URL1 = $search_engine . $sitemap_URL1;
					$alter_link = '<a href="' . $submission_URL1 . '" target="_blank"> (Try manually)</a><br /><br />';
				} else {
					$icon = '';
					$alter_link = '';
				}
				$finalMessage = substr ( $finalMessage, 4 );
				$insert_sitemap = "\n" . $icon . "<b>" . $webmaster_engine . ":  </b><i>" . $finalMessage . "</i><br />" . $alter_link;
				$show_sitemap .= $insert_sitemap;
			}
			$show_sitemap .= '</p></div>';
		}
		echo $show_sitemap;
	}
	
	/*
	 * Since 9.0 Header Footer Section Submission
	 */
	if (isset ( $_POST ['update_headerfooter'] )) {
		if (! isset ( $_POST ['my_aiowz_update_setting'] ))
			die ( "Hmm .. looks like you didn't send any credentials.. No CSRF for you! " );
		if (! wp_verify_nonce ( $_POST ['my_aiowz_update_setting'], 'aiowz-update-setting' ))
			die ( "Hmm .. looks like you didn't send any credentials.. No CSRF for you! " );
		
		update_option ( 'all_in_one_premium_head_section', stripslashes_deep ( ( string ) $_POST ['all_in_one_premium_head_section'] ) );
		update_option ( 'all_in_one_premium_footer_section', stripslashes_deep ( ( string ) $_POST ['all_in_one_premium_footer_section'] ) );
		echo '<div id="message" class="updated fade"><p><strong>Header/Footer Settings Updated.</strong></p></div>';
		echo '</strong>';
	}
	
	/*
	 * Since 9.0 Analytics Section Submission
	 */
	if (isset ( $_POST ['update_analytics'] )) {
		if (! isset ( $_POST ['my_aiowz_update_setting'] ))
			die ( "Hmm .. looks like you didn't send any credentials.. No CSRF for you! " );
		if (! wp_verify_nonce ( $_POST ['my_aiowz_update_setting'], 'aiowz-update-setting' ))
			die ( "Hmm .. looks like you didn't send any credentials.. No CSRF for you! " );
		
		update_option ( 'all_in_one_premium_google_analytics', ( string ) $_POST ['all_in_one_premium_google_analytics'] );
		update_option ( 'all_in_one_premium_clicky_analytics', ( string ) $_POST ['all_in_one_premium_clicky_analytics'] );
		update_option ( 'all_in_one_premium_compete_analytics', ( string ) $_POST ['all_in_one_premium_compete_analytics'] );
		update_option ( 'all_in_one_premium_quantcast_analytics', ( string ) $_POST ['all_in_one_premium_quantcast_analytics'] );
		update_option ( 'all_in_one_premium_sitemeter_analytics', stripslashes_deep ( ( string ) $_POST ['all_in_one_premium_sitemeter_analytics'] ) );
		
		echo '<div id="message" class="updated fade"><p><strong>Analytics Settings Updated.</strong></p></div>';
		echo '</strong>';
	}
	
	/*
	 * Since 9.0 Google Authorship Section Submission
	 */
	if (isset ( $_POST ['update_google_authorship'] )) {
		if (! isset ( $_POST ['my_aiowz_update_setting'] ))
			die ( "Hmm .. looks like you didn't send any credentials.. No CSRF for you! " );
		if (! wp_verify_nonce ( $_POST ['my_aiowz_update_setting'], 'aiowz-update-setting' ))
			die ( "Hmm .. looks like you didn't send any credentials.. No CSRF for you! " );
		
		update_option ( 'all_in_one_premium_google_authorship_profile', ( string ) $_POST ['all_in_one_premium_google_authorship_profile'] );
		update_option ( 'all_in_one_premium_google_authorship_page', ( string ) $_POST ['all_in_one_premium_google_authorship_page'] );
		
		echo '<div id="message" class="updated fade"><p><strong>Google Authorship Settings Updated.</strong></p></div>';
		echo '</strong>';
	}
	
	/*
	 * Since 9.0 Misc Section Submission
	 */
	if (isset ( $_POST ['update_misc'] )) {
		if (! isset ( $_POST ['my_aiowz_update_setting'] ))
			die ( "Hmm .. looks like you didn't send any credentials.. No CSRF for you! " );
		if (! wp_verify_nonce ( $_POST ['my_aiowz_update_setting'], 'aiowz-update-setting' ))
			die ( "Hmm .. looks like you didn't send any credentials.. No CSRF for you! " );
		
		update_option ( 'all_in_one_premium_favicon', ( string ) $_POST ["all_in_one_premium_favicon"] );
		
		echo '<div id="message" class="updated fade"><p><strong>Misc Options Updated.</strong></p></div>';
		echo '</strong>';
	}
	
	/*
	 * Since 9.1 XML Sitemap Generation Options Setting
	 */
	if (isset ( $_POST ['update_xml_sitemap_new'] )) {
		if (! isset ( $_POST ['my_aiowz_update_setting'] ))
			die ( "Hmm .. looks like you didn't send any credentials.. No CSRF for you! " );
		if (! wp_verify_nonce ( $_POST ['my_aiowz_update_setting'], 'aiowz-update-setting' ))
			die ( "Hmm .. looks like you didn't send any credentials.. No CSRF for you! " );
		
		$priority = array ();
		$excl_array = array (
				'option_page',
				'action',
				'_wpnonce',
				'_wp_http_referer' 
		);
		foreach ( $_POST as $i => $v ) {
			if (! in_array ( $i, $excl_array ))
				$priority [$i] = $v;
		}
		settings_fields ( 'qsitemap-settings-group' );
		update_option ( 'qzip', 'off' );
		update_option ( 'qgoogle', 'off' );
		update_option ( 'qask', 'off' );
		update_option ( 'qbing', 'off' );
		foreach ( $priority as $setting => $value ) {
			update_option ( $setting, $value );
			// echo "<br>$setting => $value";
		}
		echo '<div id="message" class="updated fade"><p><strong>Sitemap Options Updated. <br>Your Sitemap file is created in the site root directory.</strong></p></div>';
		echo '</strong>';
	}
		
	/*
	 * Since 9.0 Webmaster Section Submission
	 */
	if (isset ( $_POST ['update_webmaster'] )) {
		if (! isset ( $_POST ['my_aiowz_update_setting'] ))
			die ( "Hmm .. looks like you didn't send any credentials.. No CSRF for you! " );
		if (! wp_verify_nonce ( $_POST ['my_aiowz_update_setting'], 'aiowz-update-setting' ))
			die ( "Hmm .. looks like you didn't send any credentials.. No CSRF for you! " );
		
		update_option ( 'all_in_one_premium_google_webmaster', ( string ) $_POST ["all_in_one_premium_google_webmaster"] );
		update_option ( 'all_in_one_premium_pinterest', ( string ) $_POST ["all_in_one_premium_pinterest"] );
		update_option ( 'all_in_one_premium_yandex_webmaster', ( string ) $_POST ["all_in_one_premium_yandex_webmaster"] );
		update_option ( 'all_in_one_premium_google_tag_manager', ( string ) $_POST ["all_in_one_premium_google_tag_manager"] );
		update_option ( 'all_in_one_premium_alexa_webmaster', ( string ) $_POST ["all_in_one_premium_alexa_webmaster"] );
		update_option ( 'all_in_one_premium_bcatalog_webmaster', ( string ) $_POST ["all_in_one_premium_bcatalog_webmaster"] );
		update_option ( 'all_in_one_premium_bing_webmaster', ( string ) $_POST ["all_in_one_premium_bing_webmaster"] );
		update_option ( 'all_in_one_premium_fbinsights_webmaster', ( string ) $_POST ["all_in_one_premium_fbinsights_webmaster"] );
		update_option ( 'all_in_one_premium_fbinsights_webmaster_pageid', ( string ) $_POST ["all_in_one_premium_fbinsights_webmaster_pageid"] );
		update_option ( 'all_in_one_premium_fbinsights_webmaster_appid', ( string ) $_POST ["all_in_one_premium_fbinsights_webmaster_appid"] );
		
		echo '<div id="message" class="updated fade"><p><strong>Webmaster Settings Updated.</strong></p></div>';
		echo '</strong>';
	}
}

/**
 * Add Option Page.
 *
 * @since 9.0
 */
function all_in_one_premium_webmaster_options_page() {
	all_in_one_premium_save_all_options ();
	require_once (dirname ( __FILE__ ) . '/pages/aiow-premium-home.php');
}

/**
 * Add Webmaster Option Page.
 *
 * @since 9.0
 */
function all_in_one_premium_webmaster_webmaster_page() {
	all_in_one_premium_save_all_options ();
	require_once (dirname ( __FILE__ ) . '/pages/aiow-premium-webmaster.php');
}

/**
 * Add Analytics Option Page.
 *
 * @since 9.0
 */
function all_in_one_premium_webmaster_analytics_page() {
	all_in_one_premium_save_all_options ();
	require_once (dirname ( __FILE__ ) . '/pages/aiow-premium-analytics.php');
}

/**
 * Add Google Authorship Option Page.
 *
 * @since 9.0
 */
function all_in_one_premium_webmaster_google_authorship_page() {
	all_in_one_premium_save_all_options ();
	require_once (dirname ( __FILE__ ) . '/pages/aiow-premium-google-authorship.php');
}

/**
 * Add Footer Option Page.
 *
 * @since 9.0
 */
function aiow_premium_headerer_footer_page() {
	all_in_one_premium_save_all_options ();
	require_once (dirname ( __FILE__ ) . '/pages/aiow-premium-header-footer.php');
}

/**
 * Add Sitemap Option Page.
 *
 * @since 9.0
 */
function all_in_one_premium_webmaster_sitemap_page() {
	all_in_one_premium_save_all_options ();
	require_once (dirname ( __FILE__ ) . '/pages/aiow-premium-sitemap.php');
}

/**
 * Add Misc Option Page.
 *
 * @since 9.0
 */
function all_in_one_premium_webmaster_misc_page() {
	all_in_one_premium_save_all_options ();
	require_once (dirname ( __FILE__ ) . '/pages/aiow-premium-misc.php');
}

/**
 * Initiate plugin.
 *
 * @since 9.0
 */
function aiow_premium_init() {
	aiow_premium::get_instance ();
}
add_action ( 'plugins_loaded', 'aiow_premium_init' );

?>