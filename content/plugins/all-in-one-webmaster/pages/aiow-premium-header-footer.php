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
	<h3>Extra HTML code to be inserted in to Header or Footer Section</h3>

	<div>
		<table class="form-table">

			<tr valign="top" class="alternate">

				<th scope="row" style="width: 32%;"><label>1) <b>Header</b> Section
				</label><?=$new_icon?><br>
				<br>Add <b>ONLY HTML</b> code to the <code>head</code> of your blog
				</th>

				<td><textarea name="all_in_one_premium_head_section" cols="60"
						rows="5"><?php echo get_option('all_in_one_premium_head_section'); ?></textarea></td>
			</tr>
			<tr valign="top">
				<th scope="row" style="width: 32%;"><label>2) <b>Footer</b> Section
				</label><?=$new_icon?><br>
				<br>Add <b>ONLY HTML</b> code to the <code>footer</code> of your
					blog</th>

				<td><textarea name="all_in_one_premium_footer_section" cols="60"
						rows="5"><?php echo get_option('all_in_one_premium_footer_section'); ?></textarea></td>
			</tr>

		</table>
	</div>

</div>

<a href="http://crunchify.com/all-in-one-webmaster/" target="_blank">Feedback</a>
|
<a href="http://twitter.com/Crunchify" target="_blank">Twitter</a>
|
<a href="http://www.facebook.com/Crunchify" target="_blank">Facebook</a>

<div class="submit">
	<input name="my_aiowz_update_setting" type="hidden"
		value="<?php echo wp_create_nonce('aiowz-update-setting'); ?>" /> <input
		type="submit" name="update_headerfooter" class="button-primary"
		value="<?php _e('Update options'); ?> &raquo;" />

</div>
</div>

</form>


<?php
require_once (dirname ( __FILE__ ) . '/aiow-premium-right-column.php');
require_once (dirname ( __FILE__ ) . '/aiow-premium-footer.php');
?>