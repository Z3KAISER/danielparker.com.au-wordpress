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
	<h3>Automatic sitemap submission to Google and Bing</h3>

	<div>
		<table class="form-table">
			<tr valign="top" class="alternate">
				<th scope="row" style="width: 29%;"><label>Please provide existing
						Sitemap URL</label></th>
				<td><input name="sitemap_URL" type="text" size="75"
					value="<?php echo get_option('sitemap_URL'); ?>" /> <br />
					(example: http://example.com/sitemap.xml)</td>
			</tr>
		</table>
	</div>
</div>

<div class="submit">
	<input name="my_aiowz_update_setting" type="hidden"
		value="<?php echo wp_create_nonce('aiowz-update-setting'); ?>" /> <input
		type="submit" name="update_sitemap" class="button-primary"
		value="<?php _e('Submit to Google and Bing'); ?> &raquo;" />

</div>
</div>

<?=$show_sitemap?>
</form>

<?php
require_once (dirname ( __FILE__ ) . '/aiow-premium-right-column.php');
require_once (dirname ( __FILE__ ) . '/aiow-premium-footer.php');
?>