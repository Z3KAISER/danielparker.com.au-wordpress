<?php

function fu_output_css()	{

echo '<style type="text/css" media="screen">';
if (get_option('fu_header_font') != 'Choose a font' && get_option('fu_header_font') != null)
{	echo '
	@font-face {
	  font-family: "header-font";
	  src: url("'; echo fu_get_font_url( get_option('fu_header_font') ); echo '");
	}';
}
if (get_option('fu_body_font') != 'Choose a font'  && get_option('fu_body_font') != null)
{	echo '
	@font-face {
	  font-family: "body-font";
	  src: url("'; echo fu_get_font_url( get_option('fu_body_font') ); echo '");
	}';
}
if (get_option('fu_lists_font') != 'Choose a font'  && get_option('fu_lists_font') != null)
{	echo '
	@font-face {
	  font-family: "lists-font";
	  src: url("'; echo fu_get_font_url( get_option('fu_lists_font') ); echo '");
	}';
}
if (get_option('fu_custom_one_font') != 'Choose a font'  && get_option('fu_custom_one') != null)			
{	echo '
	@font-face {
	  font-family: "custom-one";
	  src: url("'; echo fu_get_font_url( get_option('fu_custom_one_font') ); echo '");
	}';
}
if (get_option('fu_custom_two_font') != 'Choose a font'  && get_option('fu_custom_two') != null)			
{	echo '
	@font-face {
	  font-family: "custom-two";
	  src: url("'; echo fu_get_font_url( get_option('fu_custom_two_font') ); echo '");
	}';
}
if (get_option('fu_custom_three_font') != 'Choose a font'  && get_option('fu_custom_three') != null)			
{	echo '
	@font-face {
	  font-family: "custom-three";
	  src: url("'; echo fu_get_font_url( get_option('fu_custom_three_font') ); echo '");
	}';
}
if (get_option('fu_custom_four_font') != 'Choose a font'  && get_option('fu_custom_four') != null)			
{	echo '
	@font-face {
	  font-family: "custom-four";
	  src: url("'; echo fu_get_font_url( get_option('fu_custom_four_font') ); echo '");
	}';
}
if (get_option('fu_custom_five_font') != 'Choose a font'  && get_option('fu_custom_five') != null)			
{	echo '
	@font-face {
	  font-family: "custom-five";
	  src: url("'; echo fu_get_font_url( get_option('fu_custom_five_font') ); echo '");
	}';
}
if (get_option('fu_header_font') != 'Choose a font' && get_option('fu_header_font') != null)
{
	echo	'h1, h2, h3, h4, h5, h6, h7	{
	font-family: "header-font"!important;
	}';
}
if (get_option('fu_body_font') != 'Choose a font'  && get_option('fu_body_font') != null)
{
	echo 'p, em, div	{
		font-family: "body-font"!important;
	}';
}
if (get_option('fu_lists_font') != 'Choose a font'  && get_option('fu_lists_font') != null)
{
	echo '
	li	{
		font-family: "lists-font"!important;
	}';
}

if (get_option('fu_custom_one_font') != 'Choose a font'  && get_option('fu_custom_one') != null)			
{
	echo get_option('fu_custom_one'); echo '	{
		font-family: "custom-one"!important;
	}';
}
if (get_option('fu_custom_two_font') != 'Choose a font'  && get_option('fu_custom_two') != null)			
{
	echo get_option('fu_custom_two'); echo '	{
		font-family: "custom-two"!important;
	}';
}
if (get_option('fu_custom_three_font') != 'Choose a font'  && get_option('fu_custom_three') != null)			
{
	echo get_option('fu_custom_three'); echo '	{
		font-family: "custom-three"!important;
	}';
}
if (get_option('fu_custom_four_font') != 'Choose a font'  && get_option('fu_custom_four') != null)			
{
	echo get_option('fu_custom_four'); echo '	{
		font-family: "custom-four"!important;
	}';
}
if (get_option('fu_custom_five_font') != 'Choose a font'  && get_option('fu_custom_five') != null)			
{
	echo get_option('fu_custom_five'); echo '	{
		font-family: "custom-five"!important;
	}';
}
echo '
</style>';

}			
add_action('wp_head','fu_output_css');