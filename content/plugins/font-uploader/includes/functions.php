<?php


/**
 * Pulls in all font files and returns them in an array
 * 
 * @access      private
 * @since       1.3
 * @return      array
*/

function fu_load_fonts() {

	wp_mkdir_p( FU_FONT_DIR ); // create the upload path, if it doesn't exist

	$fonts_folder = opendir( FU_FONT_DIR );

	$allowed_types = fu_get_allowed_font_types();

	$fonts_return = array();

	while( ($font = readdir($fonts_folder) ) !== false ) {
		if( fu_is_font( $font, FU_FONT_DIR ) ) {
			$fonts_return[] = $font;
		}
	}
	closedir($fonts_folder);

	$fonts_folder = opendir( FU_OLD_FONT_DIR );

	while( ($font = readdir($fonts_folder) ) !== false ) {
		if( fu_is_font( $font, FU_OLD_FONT_DIR ) ) {
			$fonts_return[] = $font;
		}
	}
	closedir($fonts_folder);

	array_unshift($fonts_return, "Choose a font");
	return $fonts_return;
}


/**
 * Set Upload Dir
 *
 * Sets the upload dir to /edd.
 *
 * @access      private
 * @since       1.3 
 * @return      array
*/

function fu_set_upload_dir($upload) {
	$upload['subdir']= '/fonts';
	$upload['path'] = $upload['basedir'] . $upload['subdir'];
	$upload['url']	= $upload['baseurl'] . $upload['subdir'];
	return $upload;
}


/**
 * Checks for a font file
 *
 * Detects whether the specified file is a font
 *
 * @access      private
 * @since       1.3
 * @return      bool
*/

function fu_is_font( $file, $path ) {
	if ( !in_array( fu_get_file_extension( $file, $path ), fu_get_allowed_font_types() ) )
		return false;
	
	$mime = fu_get_file_mime( $file, $path );
	$extension = fu_get_file_extension( $file, $path );
	$allowed_mimes = fu_allowed_mime_types();

	if( $allowed_mimes[$extension] != $mime )
		return false;

	return true;
}


/**
 * Gets the file extension
 * 
 * @access      private
 * @since       1.3
 * @return      string
*/

function fu_get_file_extension($file, $path = null) {
   $filetype = wp_check_filetype( $path . $file );
   return strtolower( $filetype['ext'] );
}


/**
 * Gets the file mime
 * 
 * @access      private
 * @since       1.3
 * @return      string
*/

function fu_get_file_mime($file, $path = null) {
   $filetype = wp_check_filetype( $path . $file );
   return $filetype['type'];
}


/**
 * Gets allowed file extensions
 * 
 * @access      private
 * @since       1.3
 * @return      array
*/

function fu_get_allowed_font_types() {
	return apply_filters('fu_allowed_types', array('otf', 'ttf') );
}

/**
 * Gets allowed file types for Font Uploader
 * 
 * @access      private
 * @since       1.3
 * @return      array
*/

function fu_allowed_mime_types( $existing_mimes = array() ) {
 
	$existing_mimes['ttf'] = 'font/ttf ';
	$existing_mimes['otf'] = 'font/opentype';
 	return $existing_mimes;
 
}
add_filter('upload_mimes', 'fu_allowed_mime_types');


/**
 * Uploads a font file
 * 
 * @access      private
 * @since       1.3
 * @return      array
*/

function fu_upload_font_file() {
	if( isset( $_POST['fu_action'] ) && $_POST['fu_action'] == 'upload' ) {
		if( ! wp_verify_nonce( $_POST['font-upload-nonce'], 'font-upload-nonce' ) )
			return;

		add_filter( 'upload_dir', 'fu_set_upload_dir' );

		// all good, let's save the file
		$font = wp_upload_bits( $_FILES['font']['name'], null, file_get_contents( $_FILES['font']['tmp_name'] ) );

		if( ! empty( $font['error'] ) )
			wp_die( $font['error'], __('Font Upload Failure', 'fontuploader') );

		wp_redirect( add_query_arg( 'font', 'uploaded', admin_url( 'themes.php?page=font-uploader' ) ) ); exit;
	}
}
add_action('admin_init', 'fu_upload_font_file');


/**
 * Displays font notices
 * 
 * @access      private
 * @since       1.3
 * @return      void
*/

function fu_admin_notices() {
	global $pagenow;
	if( $pagenow == 'themes.php' && isset( $_GET['font'] ) && $_GET['font'] == 'uploaded' ) {
		echo '<div class="updated"><p>' . __('Your font have been successfully uploaded', 'fontuploader') . '</p></div>';
	}
}
add_action('admin_notices', 'fu_admin_notices');


function fu_get_font_url( $font_name ) {
	if( file_exists( FU_FONT_DIR . $font_name ) )
		return FU_FONT_URL . $font_name;
	elseif( file_exists( FU_OLD_FONT_DIR . $font_name ) )
		return FU_OLD_FONT_URL . $font_name;
	else
		return false;
}