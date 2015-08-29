<?php
/*

**************************************************************************

Plugin Name:  Switch jQuery Version
Plugin URI:   http://www.arefly.com/switch-jq-version/
Description:  Change your jQuery version and the CDN of jQuery just by onclick!
Version:      1.2.2
Author:       Arefly
Author URI:   http://www.arefly.com/
Text Domain:  switch-jq-version
Domain Path:  /lang/

**************************************************************************

	Copyright 2014  Arefly  (email : eflyjason@gmail.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

**************************************************************************/

define("SWITCH_JQ_VERSION_PLUGIN_URL", plugin_dir_url( __FILE__ ));
define("SWITCH_JQ_VERSION_FULL_DIR", plugin_dir_path( __FILE__ ));
define("SWITCH_JQ_VERSION_TEXT_DOMAIN", "switch-jq-version");

/* Plugin Localize */
function switch_jq_version_load_plugin_textdomain() {
	load_plugin_textdomain(SWITCH_JQ_VERSION_TEXT_DOMAIN, false, dirname(plugin_basename( __FILE__ )).'/lang/');
}
add_action('plugins_loaded', 'switch_jq_version_load_plugin_textdomain');

include_once SWITCH_JQ_VERSION_FULL_DIR."options.php";

/* Add Links to Plugins Management Page */
function switch_jq_version_action_links($links){
	$links[] = '<a href="'.get_admin_url(null, 'options-general.php?page='.SWITCH_JQ_VERSION_TEXT_DOMAIN.'-options').'">'.__("Settings", SWITCH_JQ_VERSION_TEXT_DOMAIN).'</a>';
	return $links;
}
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'switch_jq_version_action_links');

function switch_jq_version(){
	$version = get_option('switch_jq_version_version');
	$cdn = get_option('switch_jq_version_cdn');
	switch($cdn){
		case 'google':
			$link = "//ajax.googleapis.com/ajax/libs/jquery/".$version."/jquery.min.js";
		break;
		case 'jq':
			$link = "//code.jquery.com/jquery-".$version.".min.js";
		break;
		case 'sina':
			$link = "//lib.sinaapp.com/js/jquery/".$version."/jquery-".$version.".min.js";
		break;
		case 'customise':
			$link = str_replace("%VERSION%", $version, get_option("switch_jq_version_customise_url"));
		break;
		default:
			$link = "//ajax.googleapis.com/ajax/libs/jquery/".$version."/jquery.min.js";
	}
	if(!is_admin()){
		if($cdn != "wordpress"){
			wp_deregister_script('jquery');
			wp_register_script('jquery', $link, false, $version);
			wp_enqueue_script('jquery');
		}
	}
}
add_action("wp_enqueue_scripts", "switch_jq_version", 99999);