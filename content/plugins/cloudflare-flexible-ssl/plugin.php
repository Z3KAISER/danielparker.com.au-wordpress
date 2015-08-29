<?php
/*
 * Plugin Name: CloudFlare Flexible SSL
 * Plugin URI: http://icwp.io/2f
 * Description: Fix For CloudFlare Flexible SSL Redirect Loop For WordPress
 * Version: 1.0.0
 * Text Domain: cloudflare-flexible-ssl
 * Author: iControlWP
 * Author URI: http://icwp.io/2e
 */

// Simple 1st version. More to come.
if ( isset( $_SERVER['HTTP_CF_VISITOR'] ) && strpos( $_SERVER['HTTP_CF_VISITOR'], 'https' ) !== false ) {
	$_SERVER['HTTPS'] = 'on';
}