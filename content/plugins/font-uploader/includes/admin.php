<?php


function fu_admin_page() {
	add_theme_page( __('Font Uploader', 'fontuploader'), __('Font Uploader', 'fontuploader'), 'manage_options', 'font-uploader', 'fu_render_admin');
}
add_action('admin_menu', 'fu_admin_page');

function fu_render_admin() {

    $options = fu_setup_options();
    $i=0;

    if ( isset( $_REQUEST['saved'] ) && $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>Font Uploader settings saved.</strong></p></div>';
	?>
	<div class="wrap">
		
		<h2>Font Uploader</h2>
		<p>Uploaded fonts will appear in the menus below</p>	
		<form method="post" enctype="multipart/form-data" action="themes.php?page=font-uploader">
			<p><input type="file" name="font"></p>
			<input type="hidden" name="fu_action" value="upload"/>
			<?php echo wp_nonce_field('font-upload-nonce', 'font-upload-nonce'); ?>
			<div class="description"><em><?php _e('Filetypes accepted: ', 'fontuploader'); ?><strong>.ttf</strong>, and <strong>.otf</strong></em></div>
			<?php echo submit_button(__('Upload Font File', 'fontuploader') ); ?>
		</form>


	    <form method="post">
	    	<table class="form-table">
			<?php 
	        foreach ($options as $value):
	            switch ( $value['type'] ):
	                case "open":  break;
					case "close": ?>
	    					</td>
						</tr>
						<?php
						break;
	                case "title": ?>
						<p>Apply your uploaded fonts to elements below:</p>
						<?php
						break;
					case 'text': ?>
						<tr class="form-field">
							<th scope="row" valign="top">
		    					<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
							</th>
							<td class="fu_input fu_text">
		    					<input name="<?php echo $value['id']; ?>" class="<?php echo $value['class']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != ""){ echo htmlentities(stripslashes(get_option( $value['id']))); } ?>" />
		    					<?php if( isset( $value['desc'] ) ) : ?>
		    					<p class="description"><?php echo $value['desc']; ?></p>
		    				<?php endif; ?>
							</td>
						</tr>
						<?php
	                    break;
	                case 'select':
						?>
						<tr class="form-field">
							<th scope="row" valign="top">
		    					<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
							</th>
							<td class="fu_input fu_select">
							    <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="<?php echo $value['class']; ?>">
							    <?php foreach ($value['options'] as $option) { ?>
							        <option <?php if (get_option( $value['id'] ) == $option){ echo 'selected="selected"'; } ?>><?php echo htmlentities($option); ?></option>
							    <?php } ?>
							    </select>
							    <?php if( isset( $value['desc'] ) ) : ?>
							    <span class="description"><?php echo $value['desc']; ?></span>
							    <?php endif; ?>
							</td>
						</tr>
						<?php
	                    break;
	                case "section":
	                    $i++; ?>
						<tr class="form-field">
						    <th scope="row" valign="top">
						    	<h3><?php echo $value['name']; ?></h3>
						   	</th>
						    <td class="fu_options">
	                        <?php 
	                    break;
	            endswitch;
	        endforeach;
			?>
			</table>
	        <input type="hidden" name="action" value="save" />
	        <?php echo submit_button(__('Save Changes', 'fontuploader') ); ?>
	    </form>
	</div>
	<?php
}

function fu_setup_options() {
	
	$sn = 'fu';
	$fonts = fu_load_fonts();
	$options = array(

	    array( "name" => __('Font Upader', 'fontuploader'),
	        "type" => "title"),
	   
	    array( "name" => "Fonts",
	        "type" => "section"),

	    array( "type" => "open"),

		 array( 
		 	"name" => "Headers",
			"desc" => "Font for header elements, such as h1, h2.",
			"id" => $sn."_header_font",
			"class" => "fu_font_list",
			"type" => "select",
			"options" => $fonts
		),

		array( 
		 	"name" => "Lists",
			"desc" => "Font for list items",
			"id" => $sn."_lists_font",
			"class" => "fu_font_list",
			"type" => "select",
			"options" => $fonts
		),

		array( 
		 	"name" => "Main Body",
			"desc" => "Font for the main body text of the website",
			"id" => $sn."_body_font",
			"class" => "fu_font_list",
			"type" => "select",
			"options" => $fonts
		),
		   
	    array( "type" => "close"),
	    
	    array( 
	    	"name" => "Advanced - Custom Elements",
	        "type" => "section"
	    ),
	    array( "type" => "open"), 
	    
		array( 
		 	"name" => "Element Font",
			"id" => $sn."_custom_one_font",
			"class" => "fu_font_list",
			"type" => "select",
			"options" => $fonts
		), 
		array( 
		 	"name" => "Element",
			"desc" => "Enter the ID or class selector for the element you'd like to <em>fontify</em>. For example, <em>#navigation</em>, or <em>.element p</em>",
			"id" => $sn."_custom_one",
			"class" => "regular-text",
			"type" => "text"
		),    
		array( 
		 	"name" => "Element Font",
			"id" => $sn."_custom_two_font",
			"class" => "fu_font_list",
			"type" => "select",
			"options" => $fonts
		),
		array( 
			"name" => "Element",
			"desc" => "Enter the ID or class selector for the element you'd like to <em>fontify</em>. For example, <em>#navigation</em>, or <em>.element p</em>",
			"id" => $sn."_custom_two",
			"class" => "regular-text",
			"type" => "text"
		),    
		array( 
		 	"name" => "Element Font",
			"id" => $sn."_custom_three_font",
			"class" => "fu_font_list",
			"type" => "select",
			"options" => $fonts
		),
		array( 
			"name" => "Element",
			"desc" => "Enter the ID or class selector for the element you'd like to <em>fontify</em>. For example, <em>#navigation</em>, or <em>.element p</em>",
			"id" => $sn."_custom_three",
			"class" => "regular-text",
			"type" => "text"
		),    
		array( 
		 	"name" => "Element Font",
			"id" => $sn."_custom_four_font",
			"class" => "fu_font_list",
			"type" => "select",
			"options" => $fonts
		), 
		array( 
		 	"name" => "Element",
			"desc" => "Enter the ID or class selector for the element you'd like to <em>fontify</em>. For example, <em>#navigation</em>, or <em>.element p</em>",
			"id" => $sn."_custom_four",
			"class" => "regular-text",
			"type" => "text"
		),    
		array( 
			"name" => "Element Font",
			"id" => $sn."_custom_five_font",
			"class" => "fu_font_list",
			"type" => "select",
			"options" => $fonts
		),
		array( 
			"name" => "Element",
			"desc" => "Enter the ID or class selector for the element you'd like to <em>fontify</em>. For example, <em>#navigation</em>, or <em>.element p</em>",
			"id" => $sn."_custom_five",
			"class" => "regular-text",
			"type" => "text"
		),    
			   
	    array( "type" => "close"),
	          
	);

	return $options;
}

function fu_save_options() {

	global $pagenow;

    $options = fu_setup_options();

    if ( isset( $_GET['page'] ) && $_GET['page'] == 'font-uploader'  && $pagenow == 'themes.php') {

        if ( isset( $_REQUEST['action'] ) && 'save' == $_REQUEST['action'] ) {

            foreach ($options as $value) {

                if( isset( $value['id'] ) && isset( $_REQUEST[ $value['id'] ] ) ) {

                    update_option( $value['id'], $_REQUEST[ $value['id'] ]  );

                } else {

                	if( isset( $value['id'] ) )
	                    delete_option( $value['id'] );

                }

            }
        }
    }
}
add_action('admin_init', 'fu_save_options');