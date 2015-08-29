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
	<h3>Misc Options</h3>

	<div>
		<table class="form-table">

			<tr valign="top" class="alternate">
				<th scope="row" style="width: 32%;"><label>1) <b>Add Site Favicon
							Link</label></th>
				<td><input id="styled" name="all_in_one_premium_favicon" type="text"
					size="55"
					value="<?php echo get_option('all_in_one_premium_favicon'); ?>" />
                    &nbsp;<?=$aiow_google_ana?>
                    <br />Sample Link: http://crunchify.com/favicon.ico<br />
				</td>
			</tr>

		</table>
	</div>
</div>

<div class="submit">
	<input name="my_aiowz_update_setting" type="hidden"
		value="<?php echo wp_create_nonce('aiowz-update-setting'); ?>" /> <input
		type="submit" name="update_misc" class="button-primary"
		value="<?php _e('Update options'); ?> &raquo;" />

</div>
</div>
</form>

<?php
require_once (dirname ( __FILE__ ) . '/aiow-premium-right-column.php');
require_once (dirname ( __FILE__ ) . '/aiow-premium-footer.php');
?>