<?php
/**
 * Pro Plugin Utilities
 *
 * @package     amazon-s3-and-cloudfront-pro
 * @subpackage  Classes/Utils
 * @copyright   Copyright (c) 2015, Delicious Brains
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * AS3CF_Pro_Utils Class
 *
 * This class contains utility functions that need to be available
 * across the Pro plugin codebase
 *
 * @since 1.0
 */
class AS3CF_Pro_Utils {

	/**
	 * Delete wildcard options
	 *
	 * @param array|string $keys
	 */
	public static function delete_wildcard_options( $keys ) {
		global $wpdb;

		$table  = $wpdb->options;
		$column = 'option_name';

		if ( is_multisite() ) {
			$table  = $wpdb->sitemeta;
			$column = 'meta_key';
		}

		// Convert string values to array
		if ( ! is_array( $keys ) ) {
			$keys = array( $keys );
		}

		foreach ( $keys as $key ) {
			$wpdb->query( $wpdb->prepare( "
				DELETE FROM {$table}
				WHERE {$column} LIKE %s
			", $key ) );
		}
	}
}
