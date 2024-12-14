<?php
/**
 * Boxing Martial Arts functions and definitions
 *
 * @package Boxing Martial Arts
 * @subpackage boxing_martial_arts
 */

function boxing_martial_arts_setup() {

	load_theme_textdomain( 'boxing-martial-arts', get_template_directory() . '/language' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'boxing-martial-arts-featured-image', 2000, 1200, true );
	add_image_size( 'boxing-martial-arts-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary-menu'    => __( 'Primary Menu', 'boxing-martial-arts' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', boxing_martial_arts_fonts_url() ) );
}
add_action( 'after_setup_theme', 'boxing_martial_arts_setup' );

/**
 * Register custom fonts.
 */
function boxing_martial_arts_fonts_url(){
	$boxing_martial_arts_font_url = '';
	$boxing_martial_arts_font_family = array();
	$boxing_martial_arts_font_family[] = 'Fira Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$boxing_martial_arts_font_family[] = 'Fira Sans Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';

	$boxing_martial_arts_font_family[] = 'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$boxing_martial_arts_font_family[] = 'Bad Script';
	$boxing_martial_arts_font_family[] = 'Bebas Neue';
	$boxing_martial_arts_font_family[] = 'Fjalla One';
	$boxing_martial_arts_font_family[] = 'PT Sans:ital,wght@0,400;0,700;1,400;1,700';
	$boxing_martial_arts_font_family[] = 'PT Serif:ital,wght@0,400;0,700;1,400;1,700';
	$boxing_martial_arts_font_family[] = 'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900';
	$boxing_martial_arts_font_family[] = 'Roboto Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700';
	$boxing_martial_arts_font_family[] = 'Alex Brush';
	$boxing_martial_arts_font_family[] = 'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$boxing_martial_arts_font_family[] = 'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$boxing_martial_arts_font_family[] = 'Playball';
	$boxing_martial_arts_font_family[] = 'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$boxing_martial_arts_font_family[] = 'Julius Sans One';
	$boxing_martial_arts_font_family[] = 'Arsenal:ital,wght@0,400;0,700;1,400;1,700';
	$boxing_martial_arts_font_family[] = 'Slabo 13px';
	$boxing_martial_arts_font_family[] = 'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900';
	$boxing_martial_arts_font_family[] = 'Overpass Mono:wght@300;400;500;600;700';
	$boxing_martial_arts_font_family[] = 'Source Sans Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900';
	$boxing_martial_arts_font_family[] = 'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$boxing_martial_arts_font_family[] = 'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900';
	$boxing_martial_arts_font_family[] = 'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$boxing_martial_arts_font_family[] = 'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$boxing_martial_arts_font_family[] = 'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700';
	$boxing_martial_arts_font_family[] = 'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$boxing_martial_arts_font_family[] = 'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$boxing_martial_arts_font_family[] = 'Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$boxing_martial_arts_font_family[] = 'Quicksand:wght@300;400;500;600;700';
	$boxing_martial_arts_font_family[] = 'Padauk:wght@400;700';
	$boxing_martial_arts_font_family[] = 'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$boxing_martial_arts_font_family[] = 'Inconsolata:wght@200;300;400;500;600;700;800;900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$boxing_martial_arts_font_family[] = 'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$boxing_martial_arts_font_family[] = 'Pacifico';
	$boxing_martial_arts_font_family[] = 'Indie Flower';
	$boxing_martial_arts_font_family[] = 'VT323';
	$boxing_martial_arts_font_family[] = 'Dosis:wght@200;300;400;500;600;700;800';
	$boxing_martial_arts_font_family[] = 'Frank Ruhl Libre:wght@300;400;500;700;900';
	$boxing_martial_arts_font_family[] = 'Fjalla One';
	$boxing_martial_arts_font_family[] = 'Figtree:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$boxing_martial_arts_font_family[] = 'Oxygen:wght@300;400;700';
	$boxing_martial_arts_font_family[] = 'Arvo:ital,wght@0,400;0,700;1,400;1,700';
	$boxing_martial_arts_font_family[] = 'Noto Serif:ital,wght@0,400;0,700;1,400;1,700';
	$boxing_martial_arts_font_family[] = 'Lobster';
	$boxing_martial_arts_font_family[] = 'Crimson Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700';
	$boxing_martial_arts_font_family[] = 'Yanone Kaffeesatz:wght@200;300;400;500;600;700';
	$boxing_martial_arts_font_family[] = 'Anton';
	$boxing_martial_arts_font_family[] = 'Libre Baskerville:ital,wght@0,400;0,700;1,400';
	$boxing_martial_arts_font_family[] = 'Bree Serif';
	$boxing_martial_arts_font_family[] = 'Gloria Hallelujah';
	$boxing_martial_arts_font_family[] = 'Abril Fatface';
	$boxing_martial_arts_font_family[] = 'Varela Round';
	$boxing_martial_arts_font_family[] = 'Vampiro One';
	$boxing_martial_arts_font_family[] = 'Shadows Into Light';
	$boxing_martial_arts_font_family[] = 'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$boxing_martial_arts_font_family[] = 'Rokkitt:wght@100;200;300;400;500;600;700;800;900';
	$boxing_martial_arts_font_family[] = 'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$boxing_martial_arts_font_family[] = 'Francois One';
	$boxing_martial_arts_font_family[] = 'Orbitron:wght@400;500;600;700;800;900';
	$boxing_martial_arts_font_family[] = 'Patua One';
	$boxing_martial_arts_font_family[] = 'Acme';
	$boxing_martial_arts_font_family[] = 'Satisfy';
	$boxing_martial_arts_font_family[] = 'Josefin Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700';
	$boxing_martial_arts_font_family[] = 'Quattrocento Sans:ital,wght@0,400;0,700;1,400;1,700';
	$boxing_martial_arts_font_family[] = 'Architects Daughter';
	$boxing_martial_arts_font_family[] = 'Russo One';
	$boxing_martial_arts_font_family[] = 'Monda:wght@400;700';
	$boxing_martial_arts_font_family[] = 'Righteous';
	$boxing_martial_arts_font_family[] = 'Lobster Two:ital,wght@0,400;0,700;1,400;1,700';
	$boxing_martial_arts_font_family[] = 'Hammersmith One';
	$boxing_martial_arts_font_family[] = 'Courgette';
	$boxing_martial_arts_font_family[] = 'Permanent Marke';
	$boxing_martial_arts_font_family[] = 'Cherry Swash:wght@400;700';
	$boxing_martial_arts_font_family[] = 'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700';
	$boxing_martial_arts_font_family[] = 'Poiret One';
	$boxing_martial_arts_font_family[] = 'BenchNine:wght@300;400;700';
	$boxing_martial_arts_font_family[] = 'Economica:ital,wght@0,400;0,700;1,400;1,700';
	$boxing_martial_arts_font_family[] = 'Handlee';
	$boxing_martial_arts_font_family[] = 'Cardo:ital,wght@0,400;0,700;1,400';
	$boxing_martial_arts_font_family[] = 'Alfa Slab One';
	$boxing_martial_arts_font_family[] = 'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700';
	$boxing_martial_arts_font_family[] = 'Cookie';
	$boxing_martial_arts_font_family[] = 'Chewy';
	$boxing_martial_arts_font_family[] = 'Great Vibes';
	$boxing_martial_arts_font_family[] = 'Coming Soon';
	$boxing_martial_arts_font_family[] = 'Philosopher:ital,wght@0,400;0,700;1,400;1,700';
	$boxing_martial_arts_font_family[] = 'Days One';
	$boxing_martial_arts_font_family[] = 'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$boxing_martial_arts_font_family[] = 'Shrikhand';
	$boxing_martial_arts_font_family[] = 'Tangerine:wght@400;700';
	$boxing_martial_arts_font_family[] = 'IM Fell English SC';
	$boxing_martial_arts_font_family[] = 'Boogaloo';
	$boxing_martial_arts_font_family[] = 'Bangers';
	$boxing_martial_arts_font_family[] = 'Fredoka One';
	$boxing_martial_arts_font_family[] = 'Volkhov:ital,wght@0,400;0,700;1,400;1,700';
	$boxing_martial_arts_font_family[] = 'Shadows Into Light Two';
	$boxing_martial_arts_font_family[] = 'Marck Script';
	$boxing_martial_arts_font_family[] = 'Sacramento';
	$boxing_martial_arts_font_family[] = 'Unica One';
	$boxing_martial_arts_font_family[] = 'Dancing Script:wght@400;500;600;700';
	$boxing_martial_arts_font_family[] = 'Exo 2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$boxing_martial_arts_font_family[] = 'Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$boxing_martial_arts_font_family[] = 'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$boxing_martial_arts_font_family[] = 'DM Serif Display:ital@0;1';
	$boxing_martial_arts_font_family[] = 'Open Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800';
	
	$boxing_martial_arts_query_args = array(
		'family'	=> rawurlencode(implode('|',$boxing_martial_arts_font_family)),
	);
	$boxing_martial_arts_font_url = add_query_arg($boxing_martial_arts_query_args,'//fonts.googleapis.com/css');
	return $boxing_martial_arts_font_url;
	$contents = wptt_get_webboxing_martial_arts_font_url( esc_url_raw( $fonts_url ) );
}

/**
 * Register widget area.
 */
function boxing_martial_arts_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'boxing-martial-arts' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'boxing-martial-arts' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'boxing-martial-arts' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'boxing-martial-arts' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'boxing-martial-arts' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'boxing-martial-arts' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'boxing-martial-arts' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'boxing-martial-arts' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'boxing-martial-arts' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'boxing-martial-arts' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'boxing-martial-arts' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'boxing-martial-arts' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'boxing-martial-arts' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'boxing-martial-arts' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'boxing_martial_arts_widgets_init' );

// Category count 
function boxing_martial_arts_display_post_category_count() {
    $boxing_martial_arts_category = get_the_category();
    $boxing_martial_arts_category_count = ($boxing_martial_arts_category) ? count($boxing_martial_arts_category) : 0;
    $boxing_martial_arts_category_text = ($boxing_martial_arts_category_count === 1) ? 'category' : 'categories'; // Check for pluralization
    echo $boxing_martial_arts_category_count . ' ' . $boxing_martial_arts_category_text;
}

//post tag
function custom_tags_filter($boxing_martial_arts_tag_list) {
    // Replace the comma (,) with an empty string
    $boxing_martial_arts_tag_list = str_replace(', ', '', $boxing_martial_arts_tag_list);

    return $boxing_martial_arts_tag_list;
}
add_filter('the_tags', 'custom_tags_filter');

function custom_output_tags() {
    $boxing_martial_arts_tags = get_the_tags();

    if ($boxing_martial_arts_tags) {
        $boxing_martial_arts_tags_output = '<div class="post_tag">Tags: ';

        $boxing_martial_arts_first_tag = reset($boxing_martial_arts_tags);

        foreach ($boxing_martial_arts_tags as $tag) {
            $boxing_martial_arts_tags_output .= '<a href="' . esc_url(get_tag_link($tag)) . '" rel="tag" class="mr-2">' . esc_html($tag->name) . '</a>';
            if ($tag !== $boxing_martial_arts_first_tag) {
                $boxing_martial_arts_tags_output .= ' ';
            }
        }

        $boxing_martial_arts_tags_output .= '</div>';

        echo $boxing_martial_arts_tags_output;
    }
}
/**
 * Enqueue scripts and styles.
 */
function boxing_martial_arts_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'boxing-martial-arts-fonts', boxing_martial_arts_fonts_url(), array(), null );

	// Bootstrap
	wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

	// Theme stylesheet.
	wp_enqueue_style( 'boxing-martial-arts-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/tp-theme-color.php' );
	wp_add_inline_style( 'boxing-martial-arts-style',$boxing_martial_arts_tp_theme_css );
	require get_parent_theme_file_path( '/tp-body-width-layout.php' );
	wp_add_inline_style( 'boxing-martial-arts-style',$boxing_martial_arts_tp_theme_css );
	wp_style_add_data('boxing-martial-arts-style', 'rtl', 'replace');
	
	// Theme block stylesheet.
	wp_enqueue_style( 'boxing-martial-arts-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'boxing-martial-arts-style' ), '1.0' );

	// Fontawesome
	wp_enqueue_style( 'fontawesome-css', get_theme_file_uri( '/assets/css/fontawesome-all.css' ) );

	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ), true );
	
	wp_enqueue_script( 'boxing-martial-arts-custom-scripts', esc_url( get_template_directory_uri() ) . '/assets/js/boxing-martial-arts-custom.js', array('jquery'), true);

	wp_enqueue_script( 'boxing-martial-arts-focus-nav', esc_url( get_template_directory_uri() ) . '/assets/js/focus-nav.js', array('jquery'), true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	$boxing_martial_arts_body_font_family = get_theme_mod('boxing_martial_arts_body_font_family', '');

	$boxing_martial_arts_heading_font_family = get_theme_mod('boxing_martial_arts_heading_font_family', '');

	$boxing_martial_arts_menu_font_family = get_theme_mod('boxing_martial_arts_menu_font_family', '');

	$boxing_martial_arts_tp_theme_css = '
		body{
		    font-family: '.esc_html($boxing_martial_arts_body_font_family).';
		}
		.more-btn a{
		    font-family: '.esc_html($boxing_martial_arts_body_font_family).';
		}
		h1{
		    font-family: '.esc_html($boxing_martial_arts_heading_font_family).';
		}
		h2{
		    font-family: '.esc_html($boxing_martial_arts_heading_font_family).';
		}
		h3{
		    font-family: '.esc_html($boxing_martial_arts_heading_font_family).';
		}
		h4{
		    font-family: '.esc_html($boxing_martial_arts_heading_font_family).';
		}
		h5{
		    font-family: '.esc_html($boxing_martial_arts_heading_font_family).';
		}
		h6{
		    font-family: '.esc_html($boxing_martial_arts_heading_font_family).';
		}
		#theme-sidebar .wp-block-search .wp-block-search__label{
		    font-family: '.esc_html($boxing_martial_arts_heading_font_family).';
		}
		.menubar,.main-navigation a{
		    font-family: '.esc_html($boxing_martial_arts_menu_font_family).';
		}
	';
	wp_add_inline_style('boxing-martial-arts-style', $boxing_martial_arts_tp_theme_css);
}
add_action( 'wp_enqueue_scripts', 'boxing_martial_arts_scripts' );

//Admin Enqueue for Admin
function boxing_martial_arts_admin_enqueue_scripts(){
	wp_enqueue_style('boxing-martial-arts-admin-style', get_template_directory_uri() . '/assets/css/admin.css');

	wp_enqueue_script( 'boxing-martial-arts-custom-scripts', get_template_directory_uri(). '/assets/js/boxing-martial-arts-custom.js', array('jquery'), true);

	wp_register_script( 'boxing-martial-arts-admin-script', get_template_directory_uri() . '/assets/js/boxing-martial-arts-admin.js', array( 'jquery' ), '', true );

	wp_localize_script(
		'boxing-martial-arts-admin-script',
		'boxing_martial_arts',
		array(
			'admin_ajax'	=>	admin_url('admin-ajax.php'),
			'wpnonce'			=>	wp_create_nonce('boxing_martial_arts_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('boxing-martial-arts-admin-script');

    wp_localize_script( 'boxing-martial-arts-admin-script', 'boxing_martial_arts_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'boxing_martial_arts_admin_enqueue_scripts' );

/*radio button sanitization*/
function boxing_martial_arts_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

// Sanitize Sortable control.
function boxing_martial_arts_sanitize_sortable( $val, $setting ) {
	if ( is_string( $val ) || is_numeric( $val ) ) {
		return array(
			esc_attr( $val ),
		);
	}
	$sanitized_value = array();
	foreach ( $val as $item ) {
		if ( isset( $setting->manager->get_control( $setting->id )->choices[ $item ] ) ) {
			$sanitized_value[] = esc_attr( $item );
		}
	}
	return $sanitized_value;
}

/* Excerpt Limit Begin */
function boxing_martial_arts_excerpt_function($excerpt_count = 35) {
    $boxing_martial_arts_excerpt = get_the_excerpt();

    $boxing_martial_arts_text_excerpt = wp_strip_all_tags($boxing_martial_arts_excerpt);

    $boxing_martial_arts_excerpt_limit = esc_attr(get_theme_mod('boxing_martial_arts_excerpt_count', $excerpt_count));

    $boxing_martial_arts_theme_excerpt = implode(' ', array_slice(explode(' ', $boxing_martial_arts_text_excerpt), 0, $boxing_martial_arts_excerpt_limit));

    return $boxing_martial_arts_theme_excerpt;
}

function boxing_martial_arts_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}


// Change number or products per row to 3
add_filter('loop_shop_columns', 'boxing_martial_arts_loop_columns');
if (!function_exists('boxing_martial_arts_loop_columns')) {
	function boxing_martial_arts_loop_columns() {
		$columns = get_theme_mod( 'boxing_martial_arts_per_columns', 3 );
		return $columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'boxing_martial_arts_per_page', 20 );
function boxing_martial_arts_per_page( $boxing_martial_arts_cols ) {
  	$boxing_martial_arts_cols = get_theme_mod( 'boxing_martial_arts_product_per_page', 9 );
	return $boxing_martial_arts_cols;
}

function boxing_martial_arts_sanitize_number_range( $number, $setting ) {

	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;

	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

function boxing_martial_arts_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function boxing_martial_arts_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

/**
 * Use front-page.php when Front page displays is set to a static page.
 */
function boxing_martial_arts_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template','boxing_martial_arts_front_page_template' );

define('BOXING_MARTIAL_ARTS_CREDIT',__('https://www.themespride.com/products/free-martial-arts-wordpress-theme','boxing-martial-arts') );
if ( ! function_exists( 'boxing_martial_arts_credit' ) ) {
	function boxing_martial_arts_credit(){
		echo "<a href=".esc_url(BOXING_MARTIAL_ARTS_CREDIT)." target='_blank'>".esc_html__(get_theme_mod('boxing_martial_arts_footer_text',__('Boxing Martial Arts WordPress Theme','boxing-martial-arts')))."</a>";
	}
}

add_action( 'wp_ajax_boxing_martial_arts_dismissed_notice_handler', 'boxing_martial_arts_ajax_notice_handler' );

function boxing_martial_arts_ajax_notice_handler() {
	if (!wp_verify_nonce($_POST['wpnonce'], 'boxing_martial_arts_dismissed_notice_nonce')) {
		exit;
	}
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function boxing_martial_arts_activation_notice() { 

	if ( ! get_option('dismissed-get_started', FALSE ) ) { ?>

    <div class="boxing-martial-arts-notice-wrapper updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="boxing-martial-arts-getting-started-notice clearfix">
            <div class="boxing-martial-arts-theme-notice-content">
                <h2 class="boxing-martial-arts-notice-h2">
                    <?php
                printf(
                /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                    esc_html__( 'Welcome! Thank you for choosing %1$s!', 'boxing-martial-arts' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                ?>
                </h2>

                <p class="plugin-install-notice"><?php echo sprintf(__('Click here to get started with the theme set-up.', 'boxing-martial-arts')) ?></p>

                <a class="boxing-martial-arts-btn-get-started button button-primary button-hero boxing-martial-arts-button-padding" href="<?php echo esc_url( admin_url( 'themes.php?page=boxing-martial-arts-about' )); ?>" ><?php esc_html_e( 'Get started', 'boxing-martial-arts' ) ?></a><span class="boxing-martial-arts-push-down">
                <?php
                    /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                    printf(
                        'or %1$sCustomize theme%2$s</a></span>',
                        '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                        '</a>'
                    );
                ?>
            </div>
        </div>
    </div>
<?php }

}

add_action( 'admin_notices', 'boxing_martial_arts_activation_notice' );

add_action('after_switch_theme', 'boxing_martial_arts_setup_options');
function boxing_martial_arts_setup_options () {
    update_option('dismissed-get_started', FALSE );
}

/**
 * Logo Custamization.
 */

function boxing_martial_arts_logo_width(){

	$boxing_martial_arts_logo_width   = get_theme_mod( 'boxing_martial_arts_logo_width', 150 );

	echo "<style type='text/css' media='all'>"; ?>
		img.custom-logo{
		    width: <?php echo absint( $boxing_martial_arts_logo_width ); ?>px;
		    max-width: 100%;
		}
	<?php echo "</style>";
}

add_action( 'wp_head', 'boxing_martial_arts_logo_width' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * About Theme Page
 */
require get_parent_theme_file_path( '/inc/about-theme.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );
/**
 * Load Theme Web File
 */
require get_parent_theme_file_path('/inc/wptt-webfont-loader.php' );
/**
 * Load Toggle file
 */
require get_parent_theme_file_path( '/inc/controls/customize-control-toggle.php' );

/**
 * load sortable file
 */
require get_parent_theme_file_path( '/inc/controls/sortable-control.php' );

// offer Meta
function boxing_martial_arts_bn_custom_meta_offer() {
    add_meta_box( 'bn_meta', __( 'Matches Location Meta Feilds', 'boxing-martial-arts' ), 'boxing_martial_arts_meta_callback_our_funds', 'post', 'normal', 'high' );
}
/* Hook things in for admin*/
if (is_admin()){
  add_action('admin_menu', 'boxing_martial_arts_bn_custom_meta_offer');
}

function boxing_martial_arts_meta_callback_our_funds( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'boxing_martial_arts_our_matches_meta_nonce' );
    $boxing_martial_arts_bn_stored_meta = get_post_meta( $post->ID );
    $boxing_martial_arts_location = get_post_meta( $post->ID, 'boxing_martial_arts_location', true );
    ?>
    <div id="testimonials_custom_stuff">
        <table id="list">
            <tbody id="the-list" data-wp-lists="list:meta">
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Location', 'boxing-martial-arts' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="boxing_martial_arts_location" id="boxing_martial_arts_location" value="<?php echo esc_attr($boxing_martial_arts_location); ?>" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}

/* Saves the custom meta input */
function boxing_martial_arts_bn_metadesig_save( $post_id ) {
    if (!isset($_POST['boxing_martial_arts_our_matches_meta_nonce']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['boxing_martial_arts_our_matches_meta_nonce']) ), basename(__FILE__))) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Save Goal Amount
    if( isset( $_POST[ 'boxing_martial_arts_location' ] ) ) {
        update_post_meta( $post_id, 'boxing_martial_arts_location', strip_tags( wp_unslash( $_POST[ 'boxing_martial_arts_location' ]) ) );
    }
}
add_action( 'save_post', 'boxing_martial_arts_bn_metadesig_save' );
