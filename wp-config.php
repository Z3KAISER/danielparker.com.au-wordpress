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
	define( 'DB_NAME', $_SERVER['DB_NAME'] );
	define( 'DB_USER', $_SERVER['DB_USER'] );
	define( 'DB_PASSWORD', $_SERVER['DB_PASSWORD'] );
	define( 'DB_HOST', $_SERVER['DB_HOST'] );

	// ===================
	// Remap site url
	// ===================
	define('WP_HOME', $_SERVER['WP_HOME']);
	define('WP_SITEURL', $_SERVER['WP_SITEURL']);
}

/* Keys and salts */
define('AUTH_KEY',         'q0a|68w{ 1ID(4}5pc5ofiO{E=>*IpYdgm!(yG-:bLQyhxa!89^<lyHD6j&p>=(f');
define('SECURE_AUTH_KEY',  't3T|G+;od%<0pg[Q*w+|V=-V0~:E~UStfW1uz-[i0id0+E]yPL_j+Ed0C+VWgDbY');
define('LOGGED_IN_KEY',    'x1>aSp`))adRQhZ^y;e8A}FhOim~InV8.*Cw?|*H1kONMJ68=CBR)SCCzWg<k E5');
define('NONCE_KEY',        '##8a-[B8W^F*b/)kg>.P{v[)z,ou~r:yT|x 7u:kjUgZJ`kICL|,-GnCgw[aVxH%');
define('AUTH_SALT',        'fpey=I|<o7i>=Dl4m!PC| :sEVlg|@E6J6CRd=7?A@^X%[w&98/hR#~C^N0r,j;o');
define('SECURE_AUTH_SALT', 'o0=Z+C)@{~jb5glQ]Of:*X+hJI=YToOyY{=Nwf-a>E#tYQ 4*JbIXkYLgHp0~Oz7');
define('LOGGED_IN_SALT',   '|Z7hYIYf,dkKp.,1diB~!$:@D&S>@y>%pb,WE& B9vm!~*Nx=LRK?qEKh)t::)w,');
define('NONCE_SALT',       'Ch+?]lTA*!+}43SjM>?p[5G}=k{&P!p-R/8?N__fm0|W|6XgdKnv.5#52&y9Tnht');

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
