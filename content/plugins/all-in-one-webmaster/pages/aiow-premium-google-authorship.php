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
	<h3>Google Authorship Options</h3>
	<div>
		<table class="form-table">

			<tr valign="top" class="alternate">
				<th scope="row" style="width: 32%;"><label>1) Google Authorship
						Profile</label></th>
				<td><input id="styled"
					name="all_in_one_premium_google_authorship_profile" type="text"
					size="60"
					value="<?php echo get_option('all_in_one_premium_google_authorship_profile'); ?>" />
					<br />Copy your Google+ profile link and paste it here<br />
					<p>NOTE: Just supports single author blog. Please leave it blank for multiauthor blog.</p></td>
			</tr>

			<tr valign="top">
				<th scope="row" style="width: 32%;"><label>2) Google Authorship Page</label></th>
				<td><input id="styled"
					name="all_in_one_premium_google_authorship_page" type="text"
					size="60"
					value="<?php echo get_option('all_in_one_premium_google_authorship_page'); ?>" />
                    &nbsp;<?=$aiow_quantcast_ana?>
                    <br />If you have a Google+ page for your business,
					add that URL here and link it on your Google+ page's about page.<br />
				</td>
			</tr>

		</table>
	</div>
</div>

<div class="submit">
	<input name="my_aiowz_update_setting" type="hidden"
		value="<?php echo wp_create_nonce('aiowz-update-setting'); ?>" /> <input
		type="submit" name="update_google_authorship" class="button-primary"
		value="<?php _e('Update options'); ?> &raquo;" />

</div>
</div>
</form>

<?php
require_once (dirname ( __FILE__ ) . '/aiow-premium-right-column.php');
require_once (dirname ( __FILE__ ) . '/aiow-premium-footer.php');
?>