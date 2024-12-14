<?php
/**
 * The header for our theme
 *
 * @package Boxing Martial Arts
 * @subpackage boxing_martial_arts
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) )
	{
		wp_body_open();
	}else{
		do_action('wp_body_open');
	}
?>

<?php if(get_theme_mod('boxing_martial_arts_preloader_show_hide','') != ''){ ?>
	<div class="loader">
		<div class="center center1">
		    <div class="ring"></div>
		</div>
		<div class="center center2">
		    <div class="ring"></div>
		</div>
	</div>
<?php }?>

<header role="banner">
	<a class="screen-reader-text skip-link" href="#tp_content"><?php esc_html_e( 'Skip to content', 'boxing-martial-arts' ); ?></a>
	<div class="header-box">
		<?php
		  get_template_part( 'template-parts/header/top', 'header' );
		  get_template_part( 'template-parts/header/site', 'branding' );
		?>
	</div>
</header>