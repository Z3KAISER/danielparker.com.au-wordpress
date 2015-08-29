<?php
/**
 * @author Crunchify.com
 * Plugin: All in One Webmaster
 * URL: http://crunchify.com/all-in-one-webmaster/
 */
?>

<?php
require_once (dirname ( __FILE__ ) . '/aiow-premium-header.php');
?>

<div class="postbox">
	<h3>Webmaster Options</h3>

	<div>
		<table class="form-table">

			<tr valign="top" class="alternate">
				<th scope="row" style="width: 32%;"><label>1) <b>Google</b>
						WebMaster Central
				</label></th>
				<td><input id="styled" name="all_in_one_premium_google_webmaster"
					type="text" size="55"
					value="<?php echo get_option('all_in_one_premium_google_webmaster'); ?>" />
					&nbsp; <br />(meta name="google-site-verification" content="<font
					color="red"><code>Volxdfasfasd3i3e_wATasfdsSDb0uFqvNVhLk7ZVY</code></font>")<br />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="width: 32%;"><label>2) <b>Yandex</b>
						WebMaster Center
				</label></th>
				<td><input id="styled" name="all_in_one_premium_yandex_webmaster"
					type="text" size="55"
					value="<?php echo get_option('all_in_one_premium_yandex_webmaster'); ?>" />
					&nbsp; <br />(meta name="yandex-verification" content="<font
					color="red"><code>12gdw6884bb7f260</code></font>")<br /></td>
			</tr>

			<tr valign="top" class="alternate">
				<th scope="row" style="width: 32%;"><label>3) <b>Bing</b> WebMaster
						Center
				</label></th>
				<td><input id="styled" name="all_in_one_premium_bing_webmaster"
					type="text" size="55"
					value="<?php echo get_option('all_in_one_premium_bing_webmaster'); ?>" />
					&nbsp; <br />(meta name="msvalidate.01" content="<font color="red"><code>ASBKDW71D43Z67AB2D39636C89B88A</code></font>")<br />

				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="width: 32%;"><label>4) <b>Alexa</b> Rank
				</label></th>
				<td><input id="styled" name="all_in_one_premium_alexa_webmaster"
					type="text" size="55"
					value="<?php echo get_option('all_in_one_premium_alexa_webmaster'); ?>" />
					&nbsp; <br />(meta name="alexaVerifyID" content="<font color="red"><code>OKJ3RsasdfKHGST1uqa8zcBfrjtY</code></font>")<br />
				</td>
			</tr>
			<tr valign="top" class="alternate">
				<th scope="row" style="width: 32%;"><label>5) <b>BlogCatalog</b></label><?=$new_icon?></th>
				<td><input id="styled" name="all_in_one_premium_bcatalog_webmaster"
					type="text" size="55"
					value="<?php echo get_option('all_in_one_premium_bcatalog_webmaster'); ?>" />
					&nbsp; <br />(meta name="blogcatalog" content="<font color="red"><code>7DS9234212</code></font>")<br />
				</td>
			</tr>

			<!--  Since 10.1 -- Google Tag Manager  -->

			<tr valign="top">
				<th scope="row" style="width: 32%;"><label>6) <b>Google Tag Manager</b></label><?=$new_icon?></th>
				<td><input id="styled" name="all_in_one_premium_google_tag_manager"
					type="text" size="55"
					value="<?php echo get_option('all_in_one_premium_google_tag_manager'); ?>" />
					&nbsp; <br />i.e. <font color="red"><code>GTM-517WGB</code></font><br />
				</td>
			</tr>

			<tr valign="top" class="alternate">
				<th scope="row" style="width: 32%;"><label>7) <b>Pinterest Verification</b></label><?=$new_icon?></th>
				<td><input id="styled" name="all_in_one_premium_pinterest"
					type="text" size="55"
					value="<?php echo get_option('all_in_one_premium_pinterest'); ?>" />
					&nbsp; <br />i.e. (meta name="p:domain_verify" content="<font color="red"><code>771017f25ca2994a38624f0abdd16a3b</code></font>")<font color="red"></font><br />
				</td>
			</tr>

			<tr valign="top">
				<th scope="row" style="width: 32%;"><label>8) <b>Facebook Insights</b></label><?=$new_icon?><br>
					<br> <a href="http://www.facebook.com/insights/" target="_blank"
					title="Click to visit Facebook Insight"><?=$help_icon?></a><i><a
						href="http://crunchify.com/facebook-insights-now-in-all-in-one-webmaster-wp-plugin/"
						target="_blank">View Tutorial</a></i></th>
				<td><input name="all_in_one_premium_fbinsights_webmaster"
					type="text" size="16"
					value="<?php echo get_option('all_in_one_premium_fbinsights_webmaster'); ?>" />
					(meta property="fb:admins" content="<font color="red"><code>57343534</code></font>")
					<br> <input name="all_in_one_premium_fbinsights_webmaster_pageid"
					type="text" size="16"
					value="<?php echo get_option('all_in_one_premium_fbinsights_webmaster_pageid'); ?>" />
					(meta property="fb:page_id" content="<font color="red"><code>21333354</code></font>")
					<br> <input name="all_in_one_premium_fbinsights_webmaster_appid"
					type="text" size="16"
					value="<?php echo get_option('all_in_one_premium_fbinsights_webmaster_appid'); ?>" />
					(meta property="fb:app_id" content="<font color="red"><code>77435354</code></font>")<br />
				</td>
			</tr>

		</table>
	</div>
</div>


<div class="submit">
	<input name="my_aiowz_update_setting" type="hidden"
		value="<?php echo wp_create_nonce('aiowz-update-setting'); ?>" /> <input
		type="submit" name="update_webmaster" class="button-primary"
		value="<?php _e('Update options'); ?> &raquo;" />

</div>
</div>

</form>

<?php
require_once (dirname ( __FILE__ ) . '/aiow-premium-right-column.php');
require_once (dirname ( __FILE__ ) . '/aiow-premium-footer.php');
?>