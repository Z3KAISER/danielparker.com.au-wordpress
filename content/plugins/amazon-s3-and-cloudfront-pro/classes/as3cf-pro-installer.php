<?php
require_once dirname( __FILE__ ) . '/wp-aws-compatibility-check.php';

class AS3CF_Pro_Installer extends WP_AWS_Compatibility_Check {

	protected $required_plugins;
	protected $installer_notices;

	private $installer_action = 'as3cfpro-install-plugins';

	/**
	 * AS3CF_Pro_Installer constructor.
	 *
	 * @param $plugin_file_path
	 * @param $as3cf_plugin_version_required
	 */
	public function __construct( $plugin_file_path, $as3cf_plugin_version_required ) {
		parent::__construct(
			'WP Offload S3 - Pro Upgrade',
			'amazon-s3-and-cloudfront-pro',
			$plugin_file_path,
			'WP Offload S3',
			'amazon-s3-and-cloudfront',
			$as3cf_plugin_version_required,
			'wordpress-s3.php'
		);

		add_action( 'wp_ajax_as3cfpro_install_plugins', array( $this, 'ajax_install_plugins' ) );
		add_action( 'admin_init', array( $this, 'maybe_install_plugins' ) );
		add_action( 'admin_init', array( $this, 'installer_redirect' ) );
		add_action( 'admin_notices', array( $this, 'maybe_display_installer_notices' ) );
	}

	/**
	 * Are all the required plugins installed?
	 *
	 * @return bool
	 */
	public function is_setup() {
		$plugins_not_installed = $this->required_plugins_not_installed();

		return empty( $plugins_not_installed );
	}

	/**
	 * Are all the required plugins activated?
	 *
	 * @return bool
	 */
	public function are_required_plugins_activated() {
		$plugins_not_activated = $this->required_plugins_not_activated();

		return empty( $plugins_not_activated );
	}

	/**
	 * If the plugin is setup use the default compatible check
	 *
	 * @return bool
	 */
	function is_compatible() {
		if ( $this->is_setup() ) {
			return parent::is_compatible();
		}

		return false;
	}

	/**
	 * The required plugins for this plugin
	 *
	 * @return array
	 */
	public function get_required_plugins() {
		if ( is_null( $this->required_plugins ) ) {
			$this->required_plugins = array(
				'amazon-web-services'      => array(
					'class' => 'Amazon_Web_Services',
					'name'  => 'Amazon Web Services',
				),
				'amazon-s3-and-cloudfront' => array(
					'class' => 'Amazon_S3_And_CloudFront',
					'name'  => 'WP Offload S3',
					'file'  => 'wordpress-s3',
				),
			);
		}

		return $this->required_plugins;
	}

	/**
	 * Check if any of the required plugins are installed
	 *
	 * @return array
	 */
	public function required_plugins_not_installed() {
		$plugins          = array();
		$required_plugins = $this->get_required_plugins();

		foreach ( $required_plugins as $slug => $plugin ) {
			$filename = ( isset( $plugin['file'] ) ) ? $plugin['file'] : $slug;
			if ( ! class_exists( $plugin['class'] ) && ! file_exists( WP_PLUGIN_DIR . '/' . $slug . '/' . $filename . '.php' ) ) {
				$plugins[ $slug ] = $plugin['name'];
			}
		}

		return $plugins;
	}


	/**
	 * Check if any of the required plugins are activated
	 *
	 * @return array
	 */
	public function required_plugins_not_activated() {
		$plugins          = array();
		$required_plugins = $this->get_required_plugins();

		foreach ( $required_plugins as $slug => $plugin ) {
			if ( ! class_exists( $plugin['class'] ) ) {
				$plugins[ $slug ] = $plugin['name'];
			}
		}

		return $plugins;
	}

	/**
	 * Generate the plugin info URL for thickbox
	 *
	 * @param string $slug
	 *
	 * @return string
	 */
	function get_plugin_info_url( $slug ) {
		return self_admin_url( 'plugin-install.php?tab=plugin-information&amp;plugin=' . $slug . '&amp;TB_iframe=true&amp;width=600&amp;height=800' );
	}

	/**
	 * Display a custom install notice if the plugin is not setup
	 */
	function get_admin_notice() {
		$plugins_not_installed = $this->required_plugins_not_installed();
		if ( empty( $plugins_not_installed ) ) {
			parent::get_admin_notice();

			return;
		}

		$this->load_installer_assets();

		if ( $notices = get_site_transient( 'as3cfpro_installer_notices' ) ) {
			if ( isset( $notices['filesystem_error'] ) ) {
				// Don't show the installer notice if we have filesystem credential issues
				return;
			}
		}

		$install_notice = untrailingslashit( plugin_dir_path( $this->plugin_file_path ) ) . '/view/install-notice.php';
		include $install_notice;
	}

	/**
	 * Load the scripts and styles required for the plugin installer
	 */
	function load_installer_assets() {
		$plugin_version = $GLOBALS['aws_meta'][ $this->plugin_slug ]['version'];
		$version        = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? time() : $plugin_version;
		$suffix         = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		$src = plugins_url( 'assets/js/installer' . $suffix . '.js', $this->plugin_file_path );
		wp_enqueue_script( 'as3cf-pro-installer', $src, array( 'jquery', 'wp-util' ), $version, true );

		wp_localize_script( 'as3cf-pro-installer',
			'as3cfpro_installer',
			array(
				'strings'  => array(
					'installing'       => __( 'Installing', 'as3cf-pro' ),
					'error_installing' => __( 'There was an error during the installation', 'as3cf-pro' ),
				),
				'nonces'   => array(
					'install_plugins' => wp_create_nonce( 'install-plugins' ),
				),
			)
		);

		// Load thickbox scripts and style so the links work on all pages in dashboard
		add_thickbox();
		wp_enqueue_script( 'plugin-install' );
	}

	/**
	 * Install and activate all required plugins
	 *
	 * @return bool|string|WP_Error
	 */
	function install_plugins() {
		if ( ! $this->check_capabilities() ) {
			return new WP_Error( 'exception', __( 'You do not have sufficient permissions to install plugins on this site.' ) );
		}

		$this->installer_notices = array();

		$plugins_not_installed = $this->required_plugins_not_installed();

		$plugins_activated = 0;
		foreach ( $plugins_not_installed as $slug => $plugin ) {
			if ( $this->install_plugin( $slug ) ) {
				$plugins_activated++;
			}
		}

		set_site_transient( 'as3cfpro_installer_notices', $this->installer_notices, 30 );

		if ( $plugins_activated === count( $plugins_not_installed ) ) {
			// All plugins installed and activated successfully
			$url = add_query_arg( array( 'wpos3pro-install' => 1 ), network_admin_url( 'plugins.php' ) );

			return esc_url_raw( $url );
		}

		return true;
	}

	/**
	 * Retry to install plugins if there has been a filesystem credential issue
	 */
	function maybe_install_plugins() {
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return;
		}

		global $pagenow;
		if ( 'plugins.php' !== $pagenow ) {
			return;
		}

		if ( ! isset( $_GET['action'] ) || $this->installer_action != $_GET['action'] ) {
			return;
		}

		check_admin_referer( $this->installer_action );

		$this->request_filesystem_credentials();

		$result = $this->install_plugins();

		$redirect = network_admin_url( 'plugins.php' );
		if ( ! is_wp_error( $result ) && $result !== true ) {
			$redirect = $result;
		}

		wp_redirect( $redirect );
		exit;
	}

	/**
	 * AJAX handler for installing the required plugins.
	 *
	 */
	function ajax_install_plugins() {
		check_ajax_referer( 'install-plugins', 'nonce' );

		$response = array(
			'redirect' => network_admin_url( 'plugins.php' ), // redirect to the plugins page by default
		);

		$result = $this->install_plugins();

		if ( is_wp_error( $result ) ) {
			$response['error'] = $result->get_error_message();
			wp_send_json_error( $response );
		}

		if ( $result !== true ) {
			$response['redirect'] = $result;
		}

		wp_send_json_success( $response );
	}

	/**
	 * Redirect to the AWS or Offload S3 page after successfully installing the plugins
	 */
	function installer_redirect() {
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return;
		}

		global $pagenow;
		if ( 'plugins.php' !== $pagenow ) {
			return;
		}

		if ( ! isset( $_GET['wpos3pro-install'] ) ) {
			return;
		}

		if ( ! parent::is_compatible() ) {
			// Do not redirect if the pro plugin is not compatible
			return;
		}

		delete_site_transient( 'as3cfpro_installer_notices' );

		$page = 'amazon-web-services';
		global $amazon_web_services;

		if ( $amazon_web_services->are_access_keys_set() ) {
			// If we somehow have the access key and secret set, redirect to the AS3CF page
			$page = 'amazon-s3-and-cloudfront';
		}

		$url = add_query_arg( array( 'page' => $page ), network_admin_url( 'admin.php' ) );

		wp_redirect( esc_url_raw( $url ) );
		exit();
	}

	/**
	 * Install and activate a plugin
	 *
	 * @param string $slug
	 *
	 * @return bool
	 */
	function install_plugin( $slug ) {
		$status = array( 'slug' => $slug );

		include_once( ABSPATH . 'wp-admin/includes/class-wp-upgrader.php' );
		include_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );

		$api = plugins_api( 'plugin_information', array(
			'slug'   => $slug,
			'fields' => array( 'sections' => false )
		) );

		if ( is_wp_error( $api ) ) {
			$status['error'] = $api->get_error_message();
			$this->end_install( $status );
		}

		$upgrader = new Plugin_Upgrader( new Automatic_Upgrader_Skin() );
		$result   = $upgrader->install( $api->download_link );

		if ( is_wp_error( $result ) ) {
			$status['error'] = $result->get_error_message();
			$this->end_install( $status );

			return false;
		} else if ( is_null( $result ) ) {
			$status['error'] = __( 'Unable to connect to the filesystem. Please confirm your credentials.' );

			$this->installer_notices['filesystem_error'] = true;
			$this->end_install( $status );

			return false;
		}

		$installed_plugin = get_plugins( '/' . $slug );

		if ( ! empty( $installed_plugin ) ) {
			$key  = array_keys( $installed_plugin );
			$key  = reset( $key );
			$file = $slug . '/' . $key;

			$network_wide = is_multisite();
			$activated    = activate_plugin( $file, '', $network_wide );
		} else {
			$activated = false;
		}

		$plugin_activated = false;
		if ( false === $activated || is_wp_error( $activated ) ) {
			$warning = ' ' . __( 'but not activated', 'as3cf-pro' );
			if ( is_wp_error( $activated ) ) {
				$warning .= ': ' . $activated->get_error_message();
			}

			$status['warning'] = $warning;
		} else {
			$plugin_activated = true;
		}

		$this->end_install( $status );

		return $plugin_activated;
	}

	/**
	 * Add the outcome of the install to the installer notices array to be set in a transient
	 *
	 * @param array $status
	 */
	function end_install( $status ) {
		$plugins = $this->get_required_plugins();

		$class   = 'updated';
		$message = sprintf( __( '%s installed successfully', 'as3cf-pro' ), $plugins[ $status['slug'] ]['name'] );
		if ( isset( $status['error'] ) ) {
			$class   = 'error';
			$message = sprintf( __( '%s not installed', 'as3cf-pro' ), $plugins[ $status['slug'] ]['name'] );
			$message .= ': ' . $status['error'];
		}

		if ( isset( $status['warning'] ) ) {
			$message .= $status['warning'];
		}

		$this->installer_notices['notices'][] = array( 'message' => $message, 'class' => $class );
	}

	/**
	 * Get the request filesystem credentials form
	 *
	 * @return string Form HTML
	 */
	function request_filesystem_credentials() {
		$url = wp_nonce_url( 'plugins.php?action=' . $this->installer_action, $this->installer_action );
		ob_start();
		request_filesystem_credentials( $url );
		$data = ob_get_contents();
		ob_end_clean();

		return $data;
	}

	/**
	 * Display plugin installer notices
	 */
	function maybe_display_installer_notices() {
		if ( $notices = get_site_transient( 'as3cfpro_installer_notices' ) ) {
			if ( ! isset( $notices['notices'] ) ) {
				return;
			}

			foreach ( $notices['notices'] as $notice ) {
				print '<div class="as3cf-pro-installer-notice ' . $notice['class'] . '"><p>' . $notice['message'] . '</p></div>';
			}

			delete_site_transient( 'as3cfpro_installer_notices' );

			if ( isset( $notices['filesystem_error'] ) ) {
				$data = $this->request_filesystem_credentials();
				if ( ! empty( $data ) ) {
					echo '<div class="as3cfpro-installer-filesystem-creds">';
					echo $data;
					echo '</div>';
				}
			}
		}
	}
}