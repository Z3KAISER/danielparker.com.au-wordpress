<?php
class A3_Lazy_Load_Hook_Filter
{
	public static function a3_wp_admin() {
		wp_enqueue_style( 'a3rev-wp-admin-style', A3_LAZY_LOAD_CSS_URL . '/a3_wp_admin.css' );
	}

	public static function admin_sidebar_menu_css() {
		wp_enqueue_style( 'a3rev-admin-lazy-load-sidebar-menu-style', A3_LAZY_LOAD_CSS_URL . '/admin_sidebar_menu.css' );
	}

	public static function plugin_extra_links($links, $plugin_name) {
		if ( $plugin_name != A3_LAZY_LOAD_NAME) {
			return $links;
		}
		$links[] = '<a href="'.admin_url( 'admin.php?page=a3-lazy-load', 'relative' ).'">'.__('Settings', 'a3_lazy_load').'</a>';
		$links[] = '<a href="https://wordpress.org/support/plugin/a3-lazy-load/" target="_blank">'.__('Support', 'a3_lazy_load').'</a>';
		return $links;
	}

}
?>