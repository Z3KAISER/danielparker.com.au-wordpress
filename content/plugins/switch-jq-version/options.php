<?php
function switch_jq_version_register_settings() {
	add_option('switch_jq_version_version', '2.1.0');
	add_option('switch_jq_version_cdn', 'google');
	add_option('switch_jq_version_customise_url', '');
	register_setting('switch_jq_version_options', 'switch_jq_version_version');
	register_setting('switch_jq_version_options', 'switch_jq_version_cdn');
	register_setting('switch_jq_version_options', 'switch_jq_version_customise_url');
}
add_action('admin_init', 'switch_jq_version_register_settings');

function switch_jq_version_register_options_page() {
	add_options_page(__('Switch jQuery Version Options Page', SWITCH_JQ_VERSION_TEXT_DOMAIN), __('Switch jQuery Version', SWITCH_JQ_VERSION_TEXT_DOMAIN), 'manage_options', SWITCH_JQ_VERSION_TEXT_DOMAIN.'-options', 'switch_jq_version_options_page');
}
add_action('admin_menu', 'switch_jq_version_register_options_page');

function switch_jq_version_get_select_option($select_option_name, $select_option_value, $select_option_id){
	?>
	<select name="<?php echo $select_option_name; ?>" id="<?php echo $select_option_name; ?>"<?php if($select_option_name == "switch_jq_version_cdn"){ ?> onchange="customise_cdn(this);"<?php } ?>>
		<?php
		for($num = 0; $num < count($select_option_id); $num++){
			$select_option_value_each = $select_option_value[$num];
			$select_option_id_each = $select_option_id[$num];
			?>
			<option value="<?php echo $select_option_id_each; ?>"<?php if (get_option($select_option_name) == $select_option_id_each){?> selected="selected"<?php } ?>>
				<?php echo $select_option_value_each; ?>
			</option>
		<?php } ?>
	</select>
	<?php
}

function switch_jq_version_options_page() {
?>
<script>
function customise_cdn(select){
	var selected_option = select.options[select.selectedIndex].value;
	var version_option = document.getElementById("switch_jq_version_version");
	if(selected_option == "customise"){
		jQuery("#switch_jq_version_customise_div").slideDown();
	}else{
		jQuery("#switch_jq_version_customise_div").slideUp();
	}
	if(selected_option == "wordpress"){
		version_option.value = "";
		version_option.disabled = "disabled";
	}else{
		version_option.disabled = "";
	}
}
</script>
<div class="wrap">
	<h2><?php _e("Switch jQuery Version Options Page", SWITCH_JQ_VERSION_TEXT_DOMAIN); ?></h2>
	<form method="post" action="options.php">
		<?php settings_fields('switch_jq_version_options'); ?>
		<h3><?php _e("General Options", SWITCH_JQ_VERSION_TEXT_DOMAIN); ?></h3>
			<p><?php printf(__('The jQuery version of your blog is %s', SWITCH_JQ_VERSION_TEXT_DOMAIN), get_option('switch_jq_version_version')); ?></p>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="switch_jq_version_version"><?php _e("jQuery Version: ", SWITCH_JQ_VERSION_TEXT_DOMAIN); ?></label></th>
					<td>
						<input type="text" name="switch_jq_version_version" id="switch_jq_version_version" value="<?php echo get_option('switch_jq_version_version'); ?>" <?php if(get_option("switch_jq_version_cdn") == "wordpress"){ ?> disabled="disabled"<?php } ?> />
						<?php printf(__("(Recommend: You may delete the load of jQuery in your blog's %s)", SWITCH_JQ_VERSION_TEXT_DOMAIN), "<code>header.php</code>"); ?>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="switch_jq_version_cdn"><?php _e("CDN for jQuery: ", SWITCH_JQ_VERSION_TEXT_DOMAIN); ?></label></th>
					<td>
						<?php switch_jq_version_get_select_option("switch_jq_version_cdn", array(__('WordPress Default', SWITCH_JQ_VERSION_TEXT_DOMAIN), __('Google CDN', SWITCH_JQ_VERSION_TEXT_DOMAIN), __('jQuery CDN', SWITCH_JQ_VERSION_TEXT_DOMAIN), __('Sina CDN', SWITCH_JQ_VERSION_TEXT_DOMAIN), __('Customise', SWITCH_JQ_VERSION_TEXT_DOMAIN)), array('wordpress', 'google', 'jq', 'sina', 'customise')); ?>
						<?php _e("(If you don't know what it means, leave it as default)", SWITCH_JQ_VERSION_TEXT_DOMAIN); ?>
						<div id="switch_jq_version_customise_div"<?php if(get_option("switch_jq_version_cdn") != "customise"){ ?> style="display: none;"<?php } ?>>
							<input type="url" name="switch_jq_version_customise_url" id="switch_jq_version_customise_url" value="<?php echo get_option('switch_jq_version_customise_url'); ?>" size="40" />
							<?php printf(__('(Use %s for version number)', SWITCH_JQ_VERSION_TEXT_DOMAIN), "<code>%VERSION%</code>"); ?>
						</div>
					</td>
				</tr>
			</table>
		<?php submit_button(); ?>
	</form>
</div>
<?php
}
?>