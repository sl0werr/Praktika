<?php

	$boxing_martial_arts_tp_theme_css = "";

$boxing_martial_arts_theme_lay = get_theme_mod( 'boxing_martial_arts_tp_body_layout_settings','Full');
if($boxing_martial_arts_theme_lay == 'Container'){
$boxing_martial_arts_tp_theme_css .='body{';
	$boxing_martial_arts_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
$boxing_martial_arts_tp_theme_css .='}';
$boxing_martial_arts_tp_theme_css .='@media screen and (max-width:575px){';
		$boxing_martial_arts_tp_theme_css .='body{';
			$boxing_martial_arts_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left: 0px';
		$boxing_martial_arts_tp_theme_css .='} }';
$boxing_martial_arts_tp_theme_css .='.page-template-front-page .menubar{';
	$boxing_martial_arts_tp_theme_css .='position: static;';
$boxing_martial_arts_tp_theme_css .='}';
$boxing_martial_arts_tp_theme_css .='.scrolled{';
	$boxing_martial_arts_tp_theme_css .='width: auto; left:0; right:0;';
$boxing_martial_arts_tp_theme_css .='}';
}else if($boxing_martial_arts_theme_lay == 'Container Fluid'){
$boxing_martial_arts_tp_theme_css .='body{';
	$boxing_martial_arts_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
$boxing_martial_arts_tp_theme_css .='}';
$boxing_martial_arts_tp_theme_css .='@media screen and (max-width:575px){';
		$boxing_martial_arts_tp_theme_css .='body{';
			$boxing_martial_arts_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left:0px';
		$boxing_martial_arts_tp_theme_css .='} }';
$boxing_martial_arts_tp_theme_css .='.page-template-front-page .menubar{';
	$boxing_martial_arts_tp_theme_css .='width: 99%';
$boxing_martial_arts_tp_theme_css .='}';		
$boxing_martial_arts_tp_theme_css .='.scrolled{';
	$boxing_martial_arts_tp_theme_css .='width: auto; left:0; right:0;';
$boxing_martial_arts_tp_theme_css .='}';
}else if($boxing_martial_arts_theme_lay == 'Full'){
$boxing_martial_arts_tp_theme_css .='body{';
	$boxing_martial_arts_tp_theme_css .='max-width: 100%;';
$boxing_martial_arts_tp_theme_css .='}';
}

$boxing_martial_arts_scroll_position = get_theme_mod( 'boxing_martial_arts_scroll_top_position','Right');
if($boxing_martial_arts_scroll_position == 'Right'){
$boxing_martial_arts_tp_theme_css .='#return-to-top{';
    $boxing_martial_arts_tp_theme_css .='right: 20px;';
$boxing_martial_arts_tp_theme_css .='}';
}else if($boxing_martial_arts_scroll_position == 'Left'){
$boxing_martial_arts_tp_theme_css .='#return-to-top{';
    $boxing_martial_arts_tp_theme_css .='left: 20px;';
$boxing_martial_arts_tp_theme_css .='}';
}else if($boxing_martial_arts_scroll_position == 'Center'){
$boxing_martial_arts_tp_theme_css .='#return-to-top{';
    $boxing_martial_arts_tp_theme_css .='right: 50%;left: 50%;';
$boxing_martial_arts_tp_theme_css .='}';
}

    
//Social icon Font size
$boxing_martial_arts_social_icon_fontsize = get_theme_mod('boxing_martial_arts_social_icon_fontsize');
	$boxing_martial_arts_tp_theme_css .='.media-links a i{';
$boxing_martial_arts_tp_theme_css .='font-size: '.esc_attr($boxing_martial_arts_social_icon_fontsize).'px;';
$boxing_martial_arts_tp_theme_css .='}';

// site title font size option
$boxing_martial_arts_site_title_font_size = get_theme_mod('boxing_martial_arts_site_title_font_size', 25);{
$boxing_martial_arts_tp_theme_css .='.logo h1 , .logo p a{';
	$boxing_martial_arts_tp_theme_css .='font-size: '.esc_attr($boxing_martial_arts_site_title_font_size).'px;';
$boxing_martial_arts_tp_theme_css .='}';
}

//site tagline font size option
$boxing_martial_arts_site_tagline_font_size = get_theme_mod('boxing_martial_arts_site_tagline_font_size', 15);{
$boxing_martial_arts_tp_theme_css .='.logo p{';
	$boxing_martial_arts_tp_theme_css .='font-size: '.esc_attr($boxing_martial_arts_site_tagline_font_size).'px;';
$boxing_martial_arts_tp_theme_css .='}';
}

// related post
$boxing_martial_arts_related_post_mob = get_theme_mod('boxing_martial_arts_related_post_mob', true);
$boxing_martial_arts_related_post = get_theme_mod('boxing_martial_arts_remove_related_post', true);
$boxing_martial_arts_tp_theme_css .= '.related-post-block {';
if ($boxing_martial_arts_related_post == false) {
    $boxing_martial_arts_tp_theme_css .= 'display: none;';
}
$boxing_martial_arts_tp_theme_css .= '}';
$boxing_martial_arts_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($boxing_martial_arts_related_post == false || $boxing_martial_arts_related_post_mob == false) {
    $boxing_martial_arts_tp_theme_css .= '.related-post-block { display: none; }';
}
$boxing_martial_arts_tp_theme_css .= '}';

// slider btn
$boxing_martial_arts_slider_buttom_mob = get_theme_mod('boxing_martial_arts_slider_buttom_mob', true);
$boxing_martial_arts_slider_button = get_theme_mod('boxing_martial_arts_slider_button', true);
$boxing_martial_arts_tp_theme_css .= '#slider .more-btn {';
if ($boxing_martial_arts_slider_button == false) {
    $boxing_martial_arts_tp_theme_css .= 'display: none;';
}
$boxing_martial_arts_tp_theme_css .= '}';
$boxing_martial_arts_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($boxing_martial_arts_slider_button == false || $boxing_martial_arts_slider_buttom_mob == false) {
    $boxing_martial_arts_tp_theme_css .= '#slider .more-btn { display: none; }';
}
$boxing_martial_arts_tp_theme_css .= '}';

//return to header mobile				
$boxing_martial_arts_return_to_header_mob = get_theme_mod('boxing_martial_arts_return_to_header_mob', true);
$boxing_martial_arts_return_to_header = get_theme_mod('boxing_martial_arts_return_to_header', true);
$boxing_martial_arts_tp_theme_css .= '.return-to-header{';
if ($boxing_martial_arts_return_to_header == false) {
    $boxing_martial_arts_tp_theme_css .= 'display: none;';
}
$boxing_martial_arts_tp_theme_css .= '}';
$boxing_martial_arts_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($boxing_martial_arts_return_to_header == false || $boxing_martial_arts_return_to_header_mob == false) {
    $boxing_martial_arts_tp_theme_css .= '.return-to-header{ display: none; }';
}
$boxing_martial_arts_tp_theme_css .= '}';


//footer image
$boxing_martial_arts_footer_widget_image = get_theme_mod('boxing_martial_arts_footer_widget_image');
if($boxing_martial_arts_footer_widget_image != false){
$boxing_martial_arts_tp_theme_css .='#footer{';
	$boxing_martial_arts_tp_theme_css .='background: url('.esc_attr($boxing_martial_arts_footer_widget_image).');';
$boxing_martial_arts_tp_theme_css .='}';
}

// related product
$boxing_martial_arts_related_product = get_theme_mod('boxing_martial_arts_related_product',true);
if($boxing_martial_arts_related_product == false){
$boxing_martial_arts_tp_theme_css .='.related.products{';
	$boxing_martial_arts_tp_theme_css .='display: none;';
$boxing_martial_arts_tp_theme_css .='}';
}

//menu font size
$boxing_martial_arts_menu_font_size = get_theme_mod('boxing_martial_arts_menu_font_size', 14);{
$boxing_martial_arts_tp_theme_css .='.main-navigation a, .main-navigation li.page_item_has_children:after,.main-navigation li.menu-item-has-children:after{';
	$boxing_martial_arts_tp_theme_css .='font-size: '.esc_attr($boxing_martial_arts_menu_font_size).'px;';
$boxing_martial_arts_tp_theme_css .='}';
}

// menu text tranform
$boxing_martial_arts_menu_text_tranform = get_theme_mod( 'boxing_martial_arts_menu_text_tranform','Uppercase');
if($boxing_martial_arts_menu_text_tranform == 'Uppercase'){
$boxing_martial_arts_tp_theme_css .='.main-navigation a {';
	$boxing_martial_arts_tp_theme_css .='text-transform: uppercase;';
$boxing_martial_arts_tp_theme_css .='}';
}else if($boxing_martial_arts_menu_text_tranform == 'Lowercase'){
$boxing_martial_arts_tp_theme_css .='.main-navigation a {';
	$boxing_martial_arts_tp_theme_css .='text-transform: lowercase;';
$boxing_martial_arts_tp_theme_css .='}';
}
else if($boxing_martial_arts_menu_text_tranform == 'Capitalize'){
$boxing_martial_arts_tp_theme_css .='.main-navigation a {';
	$boxing_martial_arts_tp_theme_css .='text-transform: capitalize;';
$boxing_martial_arts_tp_theme_css .='}';
}

/*------------- Blog Page------------------*/
	$boxing_martial_arts_post_image_round = get_theme_mod('boxing_martial_arts_post_image_round', 0);
	if($boxing_martial_arts_post_image_round != false){
		$boxing_martial_arts_tp_theme_css .='.blog .box-image img{';
			$boxing_martial_arts_tp_theme_css .='border-radius: '.esc_attr($boxing_martial_arts_post_image_round).'px;';
		$boxing_martial_arts_tp_theme_css .='}';
	}

	$boxing_martial_arts_post_image_width = get_theme_mod('boxing_martial_arts_post_image_width', '');
	if($boxing_martial_arts_post_image_width != false){
		$boxing_martial_arts_tp_theme_css .='.blog .box-image img{';
			$boxing_martial_arts_tp_theme_css .='Width: '.esc_attr($boxing_martial_arts_post_image_width).'px;';
		$boxing_martial_arts_tp_theme_css .='}';
	}

	$boxing_martial_arts_post_image_length = get_theme_mod('boxing_martial_arts_post_image_length', '');
	if($boxing_martial_arts_post_image_length != false){
		$boxing_martial_arts_tp_theme_css .='.blog .box-image img{';
			$boxing_martial_arts_tp_theme_css .='height: '.esc_attr($boxing_martial_arts_post_image_length).'px;';
		$boxing_martial_arts_tp_theme_css .='}';
	}

