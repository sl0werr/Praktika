<?php
/**
 * ShogunLite Theme: Functions and Definitions
 */

/**
 * Set a constant that holds the theme's minimum supported PHP version.
 */
define( 'SHOGUNLITE_MIN_PHP_VERSION', '7.0' );

/**
 * Immediately after theme switch is fired we we want to check php version and
 * revert to previously active theme if version is below our minimum.
 */
add_action( 'after_switch_theme', 'shogunlite_test_for_min_php' );

/**
 * Switches back to the previous theme if the minimum PHP version is not met.
 */
function shogunlite_test_for_min_php() {

	// Compare versions.
	if ( version_compare( PHP_VERSION, SHOGUNLITE_MIN_PHP_VERSION, '<' ) ) {
		// Site doesn't meet themes min php requirements, add notice...
		add_action( 'admin_notices', 'shogunlite_min_php_not_met_notice' );
		// ... and switch back to previous theme.
		switch_theme( get_option( 'theme_switched' ) );
		return false;

	};
}

if ( ! function_exists( 'wp_body_open' ) ) {
        function wp_body_open() {
                do_action( 'wp_body_open' );
        }
}

/**
 * An error notice that can be displayed if the Minimum PHP version is not met.
 */
function shogunlite_min_php_not_met_notice() {
	?>
	<div class="notice notice-error is_dismissable">
		<p>
			<?php esc_html_e( 'You need to update your PHP version to run this theme.', 'shogunlite' ); ?> <br />
			<?php
			printf(
				/* translators: 1 is the current PHP version string, 2 is the minmum supported php version string of the theme */
				esc_html__( 'Actual version is: %1$s, required version is: %2$s.', 'shogunlite' ),
				PHP_VERSION,
				SHOGUNLITE_MIN_PHP_VERSION
			); // phpcs: XSS ok.
			?>
		</p>
	</div>
	<?php
}


if ( ! function_exists( 'shogunlite_setup' ) ) :

	function shogunlite_setup() {

		load_theme_textdomain( 'shogunlite', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'html5', array('comment-form', 'comment-list',
			'gallery', 'caption', ) );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'editor-styles' );

		add_editor_style( array( 'css/editor-style.css', 
			get_template_directory_uri() . '/css/font-awesome.css') );

		add_theme_support( 'custom-background', array ('default-color'  => '#ffffff') );

		$GLOBALS['content_width'] = 900;

		register_nav_menus( array( 'primary'   => __( 'Primary Menu', 'shogunlite' ), ) );

	    add_theme_support( 'custom-logo', array( 'flex-height' => false, 'flex-width'  => false,
	    	'header-text' => array( 'site-title', 'site-description' ), ) );

	    // Define and register starter content to showcase the theme on new sites.
		$starter_content = array(

			'widgets' => array(
				'sidebar-widget-area' => array(
					'search',
					'recent-posts',
					'categories',
					'archives',
				),
			),

			'posts' => array(
				'home',
				'blog',
				'about',
				'contact'
			),

			// Default to a static front page and assign the front and posts pages.
			'options' => array(
				'show_on_front' => 'page',
				'page_on_front' => '{{home}}',
				'page_for_posts' => '{{blog}}',
			),

			// Set the front page section theme mods to the IDs of the core-registered pages.
			'theme_mods' => array(
				'shogunlite_social_facebook' => _x( '#', 'Theme starter content', 'shogunlite' ),
				'shogunlite_social_twitter' => _x( '#', 'Theme starter content', 'shogunlite' ),
				'shogunlite_social_linkedin' => _x( '#', 'Theme starter content', 'shogunlite' ),
				'shogunlite_social_instagram' => _x( '#', 'Theme starter content', 'shogunlite' ),
				'shogunlite_social_rss' => _x( '#', 'Theme starter content', 'shogunlite' ),
				'shogunlite_slider_display' => 1,
				'shogunlite_slider_image' => esc_url( get_stylesheet_directory_uri() . '/images/hero-baner.jpg' ),
				'shogunlite_slider_ttl1' => _x( 'MMA', 'Theme starter content', 'shogunlite' ),
				'shogunlite_slider_ttl2' => _x( 'Theme', 'Theme starter content', 'shogunlite' ),
				'shogunlite_slider_subttl' => _x( 'The Best Fighter is Never Angry', 'Theme starter content', 'shogunlite' ),
				'shogunlite_slider_btn1_url' => _x( '#', 'Theme starter content', 'shogunlite' ),
				'shogunlite_slider_btn1_urltext' => _x( 'Subscribe for Newsletter', 'Theme starter content', 'shogunlite' ),
			),

			'nav_menus' => array(
				// Assign a menu to the "primary" location.
				'primary' => array(
					'name' => __( 'Primary Menu', 'shogunlite' ),
					'items' => array(
						'link_home',
						'page_blog',
						'page_contact',
						'page_about',
					),
				),
			),
		);

		$starter_content = apply_filters( 'shogunlite_starter_content', $starter_content );
		add_theme_support( 'starter-content', $starter_content );
	}
endif; // shogunlite_setup
add_action( 'after_setup_theme', 'shogunlite_setup' );



if ( ! function_exists( 'shogunlite_load_scripts' ) ) :
	// the main function to load scripts in the shogunlite theme
	function shogunlite_load_scripts() {
		// load main stylesheet.
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array( ) );
		wp_enqueue_style( 'shogunlite-style', get_stylesheet_uri(), array() );
		
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Load Utilities JS Scripts
		wp_enqueue_script( 'particles', get_template_directory_uri() . '/js/particles.js',
			array( 'jquery' ) );

		wp_enqueue_script( 'shogunlite-utilities',
			get_template_directory_uri() . '/js/utilities.js', array( 'jquery', 'particles' ) );
	}
endif; // shogunlite_load_scripts
add_action( 'wp_enqueue_scripts', 'shogunlite_load_scripts' );

if ( ! function_exists( 'shogunlite_widgets_init' ) ) :
	//	widgets-init action handler. Used to register widgets and register widget areas
	function shogunlite_widgets_init() {	
		// Register Sidebar Widget.
		register_sidebar( array (
							'name'	 		 =>	 __( 'Sidebar Widget Area', 'shogunlite'),
							'id'		 	 =>	 'sidebar-widget-area',
							'description'	 =>  __( 'The sidebar widget area', 'shogunlite'),
							'before_widget'	 =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
							'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
						) );
	}
endif; // shogunlite_widgets_init
add_action( 'widgets_init', 'shogunlite_widgets_init' );

if ( ! function_exists( 'shogunlite_custom_header_setup' ) ) :
  function shogunlite_custom_header_setup() {
  	add_theme_support( 'custom-header', array (
                       'default-image'          => '%s/images/custom-header.jpg',
                       'flex-height'            => true,
                       'flex-width'             => true,
                       'uploads'                => true,
                       'width'                  => 1200,
                       'height'                 => 560,
                       'default-text-color'        => '#000000',
                       'wp-head-callback'       => 'shogunlite_header_style',
                      ) );
  }
endif; // shogunlite_custom_header_setup
add_action( 'after_setup_theme', 'shogunlite_custom_header_setup' );

if ( ! function_exists( 'shogunlite_header_style' ) ) :
  // Styles the header image and text displayed on the blog.
  function shogunlite_header_style() {

  	$header_text_color = get_header_textcolor();

      if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color
               || 'blank' === $header_text_color ) {

          return;
      }
  ?>
      <style id="shogunlite-custom-header-styles" type="text/css">

          <?php if ( get_theme_support( 'custom-header', 'default-text-color' ) !== $header_text_color
                      && 'blank' !== $header_text_color ) : ?>

                  #page-header, #page-header h1.entry-title {color: #<?php echo sanitize_hex_color_no_hash( $header_text_color ); ?>;}

          <?php endif; ?>
      </style>
  <?php
  }
endif; // End of shogunlite_header_style.

if ( class_exists('WP_Customize_Section') ) {
	class shogunlite_Customize_Section_Pro extends WP_Customize_Section {

		// The type of customize section being rendered.
		public $type = 'shogunlite';

		// Custom button text to output.
		public $pro_text = '';

		// Custom pro button URL.
		public $pro_url = '';

		// Add custom parameters to pass to the JS via JSON.
		public function json() {
			$json = parent::json();

			$json['pro_text'] = $this->pro_text;
			$json['pro_url']  = esc_url( $this->pro_url );

			return $json;
		}

		// Outputs the template
		protected function render_template() { 
?>

			<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

				<h3 class="accordion-section-title">
					{{ data.title }}

					<# if ( data.pro_text && data.pro_url ) { #>
						<a href="{{ data.pro_url }}" class="button button-primary alignright" target="_blank">{{ data.pro_text }}</a>
					<# } #>
				</h3>
			</li>
		<?php }
	}
}

/**
 * Singleton class for handling the theme's customizer integration.
 */
final class shogunlite_Customize {

	// Returns the instance.
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	// Constructor method.
	private function __construct() {}

	// Sets up initial actions.
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	// Sets up the customizer sections.
	public function sections( $manager ) {

		// Load custom sections.

		// Register custom section types.
		$manager->register_section_type( 'shogunlite_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new shogunlite_Customize_Section_Pro(
				$manager,
				'shogunlite',
				array(
					'title'    => esc_html__( 'ShogunPro', 'shogunlite' ),
					'pro_text' => esc_html__( 'Upgrade to Pro', 'shogunlite' ),
					'pro_url'  => esc_url( 'https://tishonator.com/product/shogunpro' )
				)
			)
		);
	}

	// Loads theme customizer CSS.
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'shogunlite-customize-controls', trailingslashit( get_template_directory_uri() ) . 'js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'shogunlite-customize-controls', trailingslashit( get_template_directory_uri() ) . 'css/customize-controls.css' );
	}
}

// Doing this customizer thang!
shogunlite_Customize::get_instance();

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function shogunlite_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'shogunlite_skip_link_focus_fix' );

function shogunlite_register_block_styles() {

	register_block_style(
		'core/button',
		array(
			'name'  => 'btn',
			'label' => __( 'Hover Effect', 'shogunlite' ),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'tgroup',
			'label' => __( 'Margin Bottom Space', 'shogunlite' ),
		)
	);

	register_block_style(
		'core/site-title',
		array(
			'name'  => 'tsitetitle',
			'label' => __( 'Bold', 'shogunlite' ),
		)
	);

	register_block_style(
		'core/post-title',
		array(
			'name'  => 'tposttitle',
			'label' => __( 'Bold', 'shogunlite' ),
		)
	);

	register_block_style(
		'core/social-link',
		array(
			'name'  => 'tsociallinks',
			'label' => __( 'Square', 'shogunlite' ),
		)
	);
}
add_action( 'init', 'shogunlite_register_block_styles' );


if ( ! function_exists( 'shogunlite_show_social_sites' ) ) :
	
	function shogunlite_show_social_sites() {

		$socialURL = get_theme_mod('shogunlite_social_facebook');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Facebook', 'shogunlite') . '" class="facebook16"></a></li>';
		}

		$socialURL = get_theme_mod('shogunlite_social_twitter');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Twitter', 'shogunlite') . '" class="twitter16"></a></li>';
		}

		$socialURL = get_theme_mod('shogunlite_social_linkedin');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on LinkedIn', 'shogunlite') . '" class="linkedin16"></a></li>';
		}

		$socialURL = get_theme_mod('shogunlite_social_instagram');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Instagram', 'shogunlite') . '" class="instagram16"></a></li>';
		}

		$socialURL = get_theme_mod('shogunlite_social_rss');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow our RSS Feeds', 'shogunlite') . '" class="rss16"></a></li>';
		}
	}

endif; // End of shogunlite_show_social_sites.

if ( ! function_exists( 'shogunlite_sanitize_url' ) ) :

	function shogunlite_sanitize_url( $url ) {
		return esc_url_raw( $url );
	}

endif; // shogunlite_sanitize_url

/**
 * Register theme settings in the customizer
 */
if ( ! function_exists( 'shogunlite_customize_register' ) ) :

	function shogunlite_customize_register( $wp_customize ) {

		/**
		 * Add Social Sites Section
		 */
		$wp_customize->add_section(
			'shogunlite_social_section',
			array(
				'title'       => __( 'Social Sites', 'shogunlite' ),
				'capability'  => 'edit_theme_options',
			)
		);
		
		// Add facebook url
		$wp_customize->add_setting(
			'shogunlite_social_facebook',
			array(
			    'sanitize_callback' => 'shogunlite_sanitize_url',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shogunlite_social_facebook',
	        array(
	            'label'          => __( 'Facebook Page URL', 'shogunlite' ),
	            'section'        => 'shogunlite_social_section',
	            'settings'       => 'shogunlite_social_facebook',
	            'type'           => 'text',
	            )
	        )
		);

		// Add Twitter url
		$wp_customize->add_setting(
			'shogunlite_social_twitter',
			array(
			    'sanitize_callback' => 'shogunlite_sanitize_url',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shogunlite_social_twitter',
	        array(
	            'label'          => __( 'Twitter URL', 'shogunlite' ),
	            'section'        => 'shogunlite_social_section',
	            'settings'       => 'shogunlite_social_twitter',
	            'type'           => 'text',
	            )
	        )
		);

		// Add LinkedIn url
		$wp_customize->add_setting(
			'shogunlite_social_linkedin',
			array(
			    'sanitize_callback' => 'shogunlite_sanitize_url',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shogunlite_social_linkedin',
	        array(
	            'label'          => __( 'LinkedIn URL', 'shogunlite' ),
	            'section'        => 'shogunlite_social_section',
	            'settings'       => 'shogunlite_social_linkedin',
	            'type'           => 'text',
	            )
	        )
		);

		// Add Instagram url
		$wp_customize->add_setting(
			'shogunlite_social_instagram',
			array(
			    'sanitize_callback' => 'shogunlite_sanitize_url',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shogunlite_social_instagram',
	        array(
	            'label'          => __( 'LinkedIn URL', 'shogunlite' ),
	            'section'        => 'shogunlite_social_section',
	            'settings'       => 'shogunlite_social_instagram',
	            'type'           => 'text',
	            )
	        )
		);

		// Add RSS Feeds url
		$wp_customize->add_setting(
			'shogunlite_social_rss',
			array(
			    'sanitize_callback' => 'shogunlite_sanitize_url',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shogunlite_social_rss',
	        array(
	            'label'          => __( 'RSS Feeds URL', 'shogunlite' ),
	            'section'        => 'shogunlite_social_section',
	            'settings'       => 'shogunlite_social_rss',
	            'type'           => 'text',
	            )
	        )
		);

		/**
		 * Add Hero Section Section
		 */
		$wp_customize->add_section(
			'shogunlite_slider_section',
			array(
				'title'       => __( 'Hero Section', 'shogunlite' ),
				'capability'  => 'edit_theme_options',
			)
		);

		// Add display Hero Section option
		$wp_customize->add_setting(
				'shogunlite_slider_display',
				array(
						'default'           => 0,
						'sanitize_callback' => 'shogunlite_sanitize_checkbox',
				)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shogunlite_slider_display',
				array(
					'label'          => __( 'Display Hero Section on a Static Front Page', 'shogunlite' ),
					'section'        => 'shogunlite_slider_section',
					'settings'       => 'shogunlite_slider_display',
					'type'           => 'checkbox',
				)
			)
		);

		// Add Hero Section Background Image
		$wp_customize->add_setting( 'shogunlite_slider_image',
			array(
				'default' => get_stylesheet_directory_uri() . '/images/hero-baner.jpg' ,
				'sanitize_callback' => 'shogunlite_sanitize_url'
			)
		);

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $slideImageId,
				array(
					'label'   	 => __( 'Hero Section Background Image', 'shogunlite' ),
					'section' 	 => 'shogunlite_slider_section',
					'settings'   => 'shogunlite_slider_image',
				) 
			)
		);

		// Add Hero Section Title 1
		$wp_customize->add_setting(
			'shogunlite_slider_ttl1',
			array(
			    'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shogunlite_slider_ttl1',
	        array(
	            'label'          => __( 'Title 1', 'shogunlite' ),
	            'section'        => 'shogunlite_slider_section',
	            'settings'       => 'shogunlite_slider_ttl1',
	            'type'           => 'text',
	            )
	        )
		);

		// Add Hero Section Title 2
		$wp_customize->add_setting(
			'shogunlite_slider_ttl2',
			array(
			    'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shogunlite_slider_ttl2',
	        array(
	            'label'          => __( 'Title 2', 'shogunlite' ),
	            'section'        => 'shogunlite_slider_section',
	            'settings'       => 'shogunlite_slider_ttl2',
	            'type'           => 'text',
	            )
	        )
		);

		// Add Hero Section Sub-Title
		$wp_customize->add_setting(
			'shogunlite_slider_subttl',
			array(
			    'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shogunlite_slider_subttl',
	        array(
	            'label'          => __( 'Sub-Title', 'shogunlite' ),
	            'section'        => 'shogunlite_slider_section',
	            'settings'       => 'shogunlite_slider_subttl',
	            'type'           => 'text',
	            )
	        )
		);

		// Add Hero Section URL Button 1
		$wp_customize->add_setting(
			'shogunlite_slider_btn1_url',
			array(
			    'sanitize_callback' => 'shogunlite_sanitize_url',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shogunlite_slider_btn1_url',
	        array(
	            'label'          => __( 'Left Button URL', 'shogunlite' ),
	            'section'        => 'shogunlite_slider_section',
	            'settings'       => 'shogunlite_slider_btn1_url',
	            'type'           => 'text',
	            )
	        )
		);

		// Add Hero Section URL Text Button 1
		$wp_customize->add_setting(
			'shogunlite_slider_btn1_urltext',
			array(
			    'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shogunlite_slider_btn1_urltext',
	        array(
	            'label'          => __( 'Left Button Text', 'shogunlite' ),
	            'section'        => 'shogunlite_slider_section',
	            'settings'       => 'shogunlite_slider_btn1_urltext',
	            'type'           => 'text',
	            )
	        )
		);
	}

endif; // End of shogunlite_customize_register.
add_action('customize_register', 'shogunlite_customize_register');

if ( ! function_exists( 'shogunlite_sanitize_checkbox' ) ) :
	/**
	 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
	 * as a boolean value, either TRUE or FALSE.
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function shogunlite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
endif; // shogunlite_sanitize_checkbox

if ( ! function_exists( 'shogunlite_sanitize_html' ) ) :

	function shogunlite_sanitize_html( $html ) {
		return wp_kses_post( $html );
	}

endif; // shogunlite_sanitize_html

if ( ! function_exists( 'shogunlite_sanitize_url' ) ) :

	function shogunlite_sanitize_url( $url ) {
		return esc_url_raw( $url );
	}

endif; // shogunlite_sanitize_url


if ( ! function_exists( 'shogunlite_display_slider' ) ) :

	/**
	 * Displays the slider
	 */
	function shogunlite_display_slider() {
	?>
		<div id="customSlider">
			<?php
				$defaultImage = get_template_directory_uri().'/images/hero-baner.jpg';
				$slideImage = get_theme_mod( 'shogunlite_slider_image', $defaultImage );

				$slideTtl1 = get_theme_mod( 'shogunlite_slider_ttl1' );
				$slideTtl2 = get_theme_mod( 'shogunlite_slider_ttl2' );
				$slideSubTtl = get_theme_mod( 'shogunlite_slider_subttl' );
				$btn1URL = get_theme_mod( 'shogunlite_slider_btn1_url' );
				$btn1URLText = get_theme_mod( 'shogunlite_slider_btn1_urltext' );
			?>
			<?php if ($slideImage) : ?>
		    		<img class="slider-bg" src="<?php echo esc_url($slideImage); ?>" alt="<?php _e('Background Image', 'shogunlite'); ?>">
			<?php endif; ?>

			<?php if ($slideTtl1) : ?>
		        	<h1 class="slide-text" id="title1"><?php echo esc_html($slideTtl1); ?></h1>
		    <?php endif; ?>

		    <?php if ($slideTtl2) : ?>
		        	<h1 class="slide-text" id="title2"><?php echo esc_html($slideTtl2); ?></h1>
		    <?php endif; ?>

		    <?php if ($slideSubTtl) : ?>
		        	<h2 class="slide-text" id="subtitle"><?php echo esc_html($slideSubTtl); ?></h2>
		    <?php endif; ?>

		    <div id="slider-button-wrappers">
		        <?php if ($btn1URL && $btn1URLText) : ?>
					<a class="slider-btn" id="btn1" href="<?php echo esc_url($btn1URL); ?>">
						<?php echo esc_attr($btn1URLText); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
<?php
	}

endif; // shogunlite_display_slider