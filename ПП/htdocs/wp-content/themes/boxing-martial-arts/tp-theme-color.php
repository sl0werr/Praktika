<?php

$boxing_martial_arts_tp_theme_css = '';

//theme-color
$boxing_martial_arts_tp_color_option = get_theme_mod('boxing_martial_arts_tp_color_option');

if($boxing_martial_arts_tp_color_option != false){
$boxing_martial_arts_tp_theme_css .='button[type="submit"],.main-navigation .menu > ul > li.highlight, .box:before,.box:after,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.page-numbers,.prev.page-numbers,.next.page-numbers,span.meta-nav,#theme-sidebar button[type="submit"],#footer button[type="submit"],#comments input[type="submit"],.site-info,.book-tkt-btn a.register-btn,.toggle-nav i, #return-to-top,.error-404 [type="submit"],#slider h6,.news-detail:after,.newsletter_shortcode input[type="submit"],#slider .carousel-control-prev-icon, #slider .carousel-control-next-icon,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale,wc-block-checkout__actions_row .wc-block-components-checkout-place-order-button,.wc-block-cart__submit-container a, .wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link,.category-dropdown::-webkit-scrollbar-thumb,.category-dropdown::-webkit-scrollbar,.category-dropdown::-webkit-scrollbar-track,.wc-block-checkout__actions_row .wc-block-components-checkout-place-order-button,.join-btn a,.topbar,.more-btn a,.match-heading p,.box-btn a,#theme-sidebar .wp-block-search .wp-block-search__label:before,#theme-sidebar h3:before, #theme-sidebar h1.wp-block-heading:before, #theme-sidebar h2.wp-block-heading:before, #theme-sidebar h3.wp-block-heading:before,#theme-sidebar h4.wp-block-heading:before, #theme-sidebar h5.wp-block-heading:before, #theme-sidebar h6.wp-block-heading:before, #slider p.slider-text{';
$boxing_martial_arts_tp_theme_css .='background: '.esc_attr($boxing_martial_arts_tp_color_option).';';
$boxing_martial_arts_tp_theme_css .='}';
}

if($boxing_martial_arts_tp_color_option != false){
$boxing_martial_arts_tp_theme_css .='a,#theme-sidebar .textwidget a,#footer .textwidget a,.comment-body a,.entry-content a,.entry-summary a,.page-template-front-page .media-links a:hover,.topbar-home i.fas.fa-phone-volume,#theme-sidebar h3,.page-box h4 a,.readmore-btn a,.box-content a ,.woocommerce-message::before ,.logo a, .logo p ,.wp-block-search .wp-block-search__label,#theme-sidebar h2.wp-block-heading,.timebox i,#theme-sidebar li a:hover, #footer li a:hover,post_tag :hover,#theme-sidebar .tagcloud a:hover,#footer .tagcloud a:hover, #theme-sidebar .widget_tag_cloud a:hover,.box-info i,a.added_to_cart.wc-forward ,.category-dropdown li a:hover ,a:hover,#footer p.wp-block-tag-cloud a:hover,#theme-sidebar .wp-block-search .wp-block-search__label, .main-navigation a:hover, #slider .inner_carousel h1 a:hover, .demo-box h3 a:hover{';
$boxing_martial_arts_tp_theme_css .='color: '.esc_attr($boxing_martial_arts_tp_color_option).';';
$boxing_martial_arts_tp_theme_css .='}';
}
if($boxing_martial_arts_tp_color_option != false){
$boxing_martial_arts_tp_theme_css .='.main-navigation .current_page_item > a,.wp-block-quote:not(.is-large):not(.is-style-large),.product-search input,#theme-sidebar .tagcloud a:hover,#footer .tagcloud a:hover, #theme-sidebar .widget_tag_cloud a:hover,.readmore-btn a,#footer p.wp-block-tag-cloud a:hover,#slider .carousel-control-prev-icon, #slider .carousel-control-next-icon {';
	$boxing_martial_arts_tp_theme_css .='border-color: '.esc_attr($boxing_martial_arts_tp_color_option).';';
$boxing_martial_arts_tp_theme_css .='}';
}
if($boxing_martial_arts_tp_color_option != false){
$boxing_martial_arts_tp_theme_css .='.woocommerce-message {';
$boxing_martial_arts_tp_theme_css .='border-top-color: '.esc_attr($boxing_martial_arts_tp_color_option).';';
$boxing_martial_arts_tp_theme_css .='}';
}

if($boxing_martial_arts_tp_color_option != false){
$boxing_martial_arts_tp_theme_css .='.page-box,#theme-sidebar section {';
    $boxing_martial_arts_tp_theme_css .='border-left-color: '.esc_attr($boxing_martial_arts_tp_color_option).';';
$boxing_martial_arts_tp_theme_css .='}';
}
if($boxing_martial_arts_tp_color_option != false){
$boxing_martial_arts_tp_theme_css .='.page-box,#theme-sidebar section {';
    $boxing_martial_arts_tp_theme_css .='border-bottom-color: '.esc_attr($boxing_martial_arts_tp_color_option).';';
$boxing_martial_arts_tp_theme_css .='}';
}

//preloader

$boxing_martial_arts_tp_preloader_color1_option = get_theme_mod('boxing_martial_arts_tp_preloader_color1_option');
$boxing_martial_arts_tp_preloader_color2_option = get_theme_mod('boxing_martial_arts_tp_preloader_color2_option');
$boxing_martial_arts_tp_preloader_bg_color_option = get_theme_mod('boxing_martial_arts_tp_preloader_bg_color_option');

if($boxing_martial_arts_tp_preloader_color1_option != false){
$boxing_martial_arts_tp_theme_css .='.center1{';
	$boxing_martial_arts_tp_theme_css .='border-color: '.esc_attr($boxing_martial_arts_tp_preloader_color1_option).' !important;';
$boxing_martial_arts_tp_theme_css .='}';
}
if($boxing_martial_arts_tp_preloader_color1_option != false){
$boxing_martial_arts_tp_theme_css .='.center1 .ring::before{';
	$boxing_martial_arts_tp_theme_css .='background: '.esc_attr($boxing_martial_arts_tp_preloader_color1_option).' !important;';
$boxing_martial_arts_tp_theme_css .='}';
}
if($boxing_martial_arts_tp_preloader_color2_option != false){
$boxing_martial_arts_tp_theme_css .='.center2{';
	$boxing_martial_arts_tp_theme_css .='border-color: '.esc_attr($boxing_martial_arts_tp_preloader_color2_option).' !important;';
$boxing_martial_arts_tp_theme_css .='}';
}
if($boxing_martial_arts_tp_preloader_color2_option != false){
$boxing_martial_arts_tp_theme_css .='.center2 .ring::before{';
	$boxing_martial_arts_tp_theme_css .='background: '.esc_attr($boxing_martial_arts_tp_preloader_color2_option).' !important;';
$boxing_martial_arts_tp_theme_css .='}';
}
if($boxing_martial_arts_tp_preloader_bg_color_option != false){
$boxing_martial_arts_tp_theme_css .='.loader{';
	$boxing_martial_arts_tp_theme_css .='background: '.esc_attr($boxing_martial_arts_tp_preloader_bg_color_option).';';
$boxing_martial_arts_tp_theme_css .='}';
}

// footer-bg-color
$boxing_martial_arts_tp_footer_bg_color_option = get_theme_mod('boxing_martial_arts_tp_footer_bg_color_option');

if($boxing_martial_arts_tp_footer_bg_color_option != false){
$boxing_martial_arts_tp_theme_css .='#footer{';
	$boxing_martial_arts_tp_theme_css .='background: '.esc_attr($boxing_martial_arts_tp_footer_bg_color_option).' !important;';
$boxing_martial_arts_tp_theme_css .='}';
}

// logo tagline color
$boxing_martial_arts_site_tagline_color = get_theme_mod('boxing_martial_arts_site_tagline_color');

if($boxing_martial_arts_site_tagline_color != false){
$boxing_martial_arts_tp_theme_css .='.logo h1 a, .logo p a{';
$boxing_martial_arts_tp_theme_css .='color: '.esc_attr($boxing_martial_arts_site_tagline_color).';';
$boxing_martial_arts_tp_theme_css .='}';
}

$boxing_martial_arts_logo_tagline_color = get_theme_mod('boxing_martial_arts_logo_tagline_color');
if($boxing_martial_arts_logo_tagline_color != false){
$boxing_martial_arts_tp_theme_css .='p.site-description{';
$boxing_martial_arts_tp_theme_css .='color: '.esc_attr($boxing_martial_arts_logo_tagline_color).';';
$boxing_martial_arts_tp_theme_css .='}';
}