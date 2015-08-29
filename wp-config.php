<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

// ===================================================
// Load database info and local development parameters
// ===================================================
if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
	define( 'WP_LOCAL_DEV', true );
	include( dirname( __FILE__ ) . '/local-config.php' );
} else {
	/* Grab db credentials, keys and salts from environment */
	define( 'WP_LOCAL_DEV', false );
	define( 'DB_NAME', getenv('DB_NAME') );
	define( 'DB_USER', getenv('DB_USER') );
	define( 'DB_PASSWORD', getenv('DB_PASSWORD') );
	define( 'DB_HOST', getenv('DB_HOST') ); // Probably 'localhost'

	define( 'AUTH_KEY',         getenv('AUTH_KEY') );
	define( 'SECURE_AUTH_KEY',  getenv('SECURE_AUTH_KEY') );
	define( 'LOGGED_IN_KEY',    getenv('LOGGED_IN_KEY') );
	define( 'NONCE_KEY',        getenv('NONCE_KEY') );
	define( 'AUTH_SALT',        getenv('AUTH_SALT') );
	define( 'SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT') );
	define( 'LOGGED_IN_SALT',   getenv('LOGGED_IN_SALT') );
	define( 'NONCE_SALT',       getenv('NONCE_SALT') );
}

// ========================
// Custom Content Directory
// ========================
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/content' );

// ================================================
// You almost certainly do not want to change these
// ================================================
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ==============================================================
// Table prefix
// Change this if you have multiple installs in the same database
// ==============================================================
$table_prefix  = 'wp_';

// ================================
// Language
// Leave blank for American English
// ================================
define( 'WPLANG', '' );

// ===========
// Hide errors
// ===========
ini_set( 'display_errors', 0 );
define( 'WP_DEBUG_DISPLAY', false );

// =================================================================
// Debug mode
// Debugging? Enable these. Can also enable them in local-config.php
// =================================================================
// define( 'SAVEQUERIES', true );
// define( 'WP_DEBUG', true );

// ======================================
// Load a Memcached config if we have one
// ======================================
if ( file_exists( dirname( __FILE__ ) . '/memcached.php' ) )
	$memcached_servers = include( dirname( __FILE__ ) . '/memcached.php' );

// ===========================================================================================
// This can be used to programatically set the stage when deploying (e.g. production, staging)
// ===========================================================================================
define( 'WP_STAGE', '%%WP_STAGE%%' );
define( 'STAGING_DOMAIN', '%%WP_STAGING_DOMAIN%%' ); // Does magic in WP Stack to handle staging domain rewriting

// ===================
// Bootstrap WordPress
// ===================
if ( !defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
require_once( ABSPATH . 'wp-settings.php' );

// ===================
// Remap site url
// ===================
define('WP_HOME', 'http://danielparker.com.au/wp');
define('WP_SITEURL', 'http://danielparker.com.au/wp');
