<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "body-content-wrapper" div.
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<?php
            if ( is_singular() && pings_open() ) :
                printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
            endif;
        ?>
		<meta name="viewport" content="width=device-width" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<a class="skip-link screen-reader-text" href="#main-content-wrapper">
			<?php _e( 'Skip to content', 'shogunlite' ); ?>
		</a>
		<div id="body-content-wrapper" class="header-main-fixed-closed animsition">

			<div class="circles-wrapper">
				<div class="circles-container">
					<div class="circles-inner" id="ld-particles-2"
						 data-particles="true"
						 data-particles-options='{"particles":{"number":{"value":2,"density":1},"color":{"value":["#b9dee2","#ffe3dd"]},"shape":{"type":["circle"]},"size":{"value":450},"move":{"enable":true,"direction":"top","speed":2,"random":true,"out_mode":"out"}},"interactivity":[]}'>
					</div>
				</div>
			</div>

			<div id="header-top">
				<div id="open-close-hdr-icon-wrapper">
					<span id="open-close-hdr-icon">
					</span><!-- #open-close-hdr-icon -->

					<div class="nav-icon">
					  <div></div>
					</div><!-- .nav-icon -->
				</div><!-- .nav-icon -->

				<div id="header-logo">
					<?php
						if ( function_exists( 'the_custom_logo' ) ) :
							the_custom_logo();
						endif;

						$header_text_color = get_header_textcolor();

					    if ( 'blank' !== $header_text_color ) :
					?>    
					        <div id="site-identity">
					        	<a href="<?php echo esc_url( home_url('/') ); ?>"
					        		title="<?php esc_attr( get_bloginfo('name') ); ?>">

					        		<h1 class="entry-title">
					        			<?php echo esc_html( get_bloginfo('name') ); ?>
									</h1>
					        	</a>
					        	<strong>
					        		<?php echo esc_html( get_bloginfo('description') ); ?>
					        	</strong>
					        </div><!-- #site-identity -->
					<?php
					    endif;
					?>
				</div><!-- #header-logo -->
			</div><!-- #header-top -->

			<header id="header-main-fixed">
				<div id="header-content-wrapper">
					<nav id="navmain">
						<?php wp_nav_menu( array( 'theme_location' => 'primary',
												  'fallback_cb'    => 'wp_page_menu',
												  
												  ) ); ?>
					</nav><!-- #navmain -->
					<div class="clear">
					</div><!-- .clear -->
				</div><!-- #header-content-wrapper -->
			</header><!-- #header-main-fixed -->

			<ul class="header-social-widget">
				<?php shogunlite_show_social_sites(); ?>
			</ul><!-- .header-social-widget -->

			<div class="clear">
			</div><!-- .clear -->

			<?php if ( is_front_page() && get_option( 'show_on_front' ) == 'page' && get_theme_mod('shogunlite_slider_display', 0) == 1 ) : ?>

						<?php shogunlite_display_slider(); ?>

			<?php else: ?>

					<div id="page-header">
				    	<div id="page-header-inner">

				    		<div id="page-header-content">
		          				<div id="page-header-title">
		          					<h1><?php the_title(); ?></h1>
		          				</div><!-- #page-header-title -->
		          			</div><!-- #page-header-content -->

		          			<div id="header-section">
			    				<?php if ( has_post_thumbnail() ) : ?>

						    		<?php the_post_thumbnail( 'full' ); ?>

						    	<?php elseif ( has_header_image() ) : ?>

						    		<img src="<?php echo esc_url( get_header_image() ); ?>" />

				          		<?php endif; ?>
			    			</div><!-- #header-section -->
				        </div><!-- #page-header-inner -->
				    </div><!-- #page-header -->
			
			<?php endif; ?>

		    
