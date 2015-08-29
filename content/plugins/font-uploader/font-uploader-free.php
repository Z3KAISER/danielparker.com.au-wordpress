<?php
/*
Plugin Name: Wordpress Font Uploader Free
Plugin URI: http://wordpress.org/extend/plugins/font-uploader/
Description: A custom font upload plugin for Wordpress allowing you to use any font anywhere you wish.
Version: 1.3.2
Author: Pippin Williamson
Contributors: mordauk
Author URI: http://pippinsplugins.com
*/


/*
|--------------------------------------------------------------------------
| CONSTANTS
|--------------------------------------------------------------------------
*/

$fu_upload_dir = wp_upload_dir();

// plugin folder url
if(!defined('FU_PLUGIN_URL')) {
	define('FU_PLUGIN_URL', plugin_dir_url( __FILE__ ));
}
// plugin folder path
if(!defined('FU_PLUGIN_DIR')) {
	define('FU_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
}
// fonts folder path
if(!defined('FU_FONT_DIR')) {
	define('FU_FONT_DIR', $fu_upload_dir['basedir'] . '/fonts/' );
}
// fonts folder path
if(!defined('FU_FONT_URL')) {
	define('FU_FONT_URL', content_url() . '/uploads/fonts/' );
}
// old fonts folder path for backwards compatibility
if(!defined('FU_OLD_FONT_DIR')) {
	define('FU_OLD_FONT_DIR', FU_PLUGIN_DIR . 'fonts/' );
}
// old fonts folder url for backwards compatibility
if(!defined('FU_OLD_FONT_URL')) {
	define('FU_OLD_FONT_URL', FU_PLUGIN_URL . 'fonts/' );
}

// plugin root file
if(!defined('FU_PLUGIN_FILE')) {
	define('FU_PLUGIN_FILE', __FILE__);
}


/*
|--------------------------------------------------------------------------
| INTERNATIONALIZATION
|--------------------------------------------------------------------------
*/

function fu_textdomain() {
	load_plugin_textdomain( 'fontuploader', false, dirname( plugin_basename( EDD_PLUGIN_FILE ) ) . '/languages/' );
}
add_action('init', 'fu_textdomain');


/*
|--------------------------------------------------------------------------
| INCLUDES
|--------------------------------------------------------------------------
*/

include( FU_PLUGIN_DIR . '/includes/admin.php' );
include( FU_PLUGIN_DIR . '/includes/functions.php' );
include( FU_PLUGIN_DIR . '/includes/styles.php' );