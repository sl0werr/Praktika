<?php
/**
 * Boxing Martial Arts Theme Page
 *
 * @package Boxing Martial Arts
 */

function boxing_martial_arts_admin_scripts() {
	wp_dequeue_script('boxing-martial-arts-custom-scripts');
}
add_action( 'admin_enqueue_scripts', 'boxing_martial_arts_admin_scripts' );

if ( ! defined( 'BOXING_MARTIAL_ARTS_FREE_THEME_URL' ) ) {
	define( 'BOXING_MARTIAL_ARTS_FREE_THEME_URL', 'https://www.themespride.com/products/free-martial-arts-wordpress-theme' );
}
if ( ! defined( 'BOXING_MARTIAL_ARTS_PRO_THEME_URL' ) ) {
	define( 'BOXING_MARTIAL_ARTS_PRO_THEME_URL', 'https://www.themespride.com/products/boxing-wordpress-theme' );
}
if ( ! defined( 'BOXING_MARTIAL_ARTS_DEMO_THEME_URL' ) ) {
	define( 'BOXING_MARTIAL_ARTS_DEMO_THEME_URL', 'https://www.themespride.com/boxing-martial-arts/' );
}
if ( ! defined( 'BOXING_MARTIAL_ARTS_DOCS_THEME_URL' ) ) {
    define( 'BOXING_MARTIAL_ARTS_DOCS_THEME_URL', 'https://page.themespride.com/demo/docs/boxing-martial-arts/' );
}
if ( ! defined( 'BOXING_MARTIAL_ARTS_RATE_THEME_URL' ) ) {
    define( 'BOXING_MARTIAL_ARTS_RATE_THEME_URL', 'https://wordpress.org/support/theme/boxing-martial-arts/reviews/#new-post' );
}
if ( ! defined( 'BOXING_MARTIAL_ARTS_SUPPORT_THEME_URL' ) ) {
    define( 'BOXING_MARTIAL_ARTS_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/boxing-martial-arts/' );
}
if ( ! defined( 'BOXING_MARTIAL_ARTS_CHANGELOG_THEME_URL' ) ) {
    define( 'BOXING_MARTIAL_ARTS_CHANGELOG_THEME_URL', get_template_directory() . '/readme.txt' );
}
if ( ! defined( 'BOXING_MARTIAL_ARTS_THEME_BUNDLE' ) ) {
    define( 'BOXING_MARTIAL_ARTS_THEME_BUNDLE', 'https://www.themespride.com/products/wordpress-theme-bundle' );
}
/**
 * Add theme page
 */
function boxing_martial_arts_menu() {
	add_theme_page( esc_html__( 'About Theme', 'boxing-martial-arts' ), esc_html__( 'About Theme', 'boxing-martial-arts' ), 'edit_theme_options', 'boxing-martial-arts-about', 'boxing_martial_arts_about_display' );
}
add_action( 'admin_menu', 'boxing_martial_arts_menu' );

/**
 * Display About page
 */
function boxing_martial_arts_about_display() {
	$boxing_martial_arts_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $boxing_martial_arts_theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$boxing_martial_arts_description = explode( '. ', $boxing_martial_arts_theme->get( 'Description' ) );

					array_pop( $boxing_martial_arts_description );

					$boxing_martial_arts_description = implode( '. ', $boxing_martial_arts_description );

					echo esc_html( $boxing_martial_arts_description . '.' );
				?></p>
				<p class="actions">
					<a target="_blank" href="<?php echo esc_url( BOXING_MARTIAL_ARTS_FREE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'boxing-martial-arts' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( BOXING_MARTIAL_ARTS_DEMO_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'boxing-martial-arts' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( BOXING_MARTIAL_ARTS_DOCS_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'boxing-martial-arts' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( BOXING_MARTIAL_ARTS_RATE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Rate this theme', 'boxing-martial-arts' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( BOXING_MARTIAL_ARTS_PRO_THEME_URL ); ?>" class="green button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'boxing-martial-arts' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $boxing_martial_arts_theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'boxing-martial-arts' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'boxing-martial-arts-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'boxing-martial-arts-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'boxing-martial-arts' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'boxing-martial-arts-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'boxing-martial-arts' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'boxing-martial-arts-about', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Changelog', 'boxing-martial-arts' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'boxing-martial-arts-about', 'tab' => 'get_bundle' ), 'themes.php' ) ) ); ?>" class="blink wp-bundle nav-tab<?php echo ( isset( $_GET['tab'] ) && 'get_bundle' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Get WordPress Theme Bundle', 'boxing-martial-arts' ); ?></a>
		</nav>

		<?php
			boxing_martial_arts_main_screen();

			boxing_martial_arts_changelog_screen();

			boxing_martial_arts_free_vs_pro();

			boxing_martial_arts_get_bundle();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'boxing-martial-arts' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'boxing-martial-arts' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'boxing-martial-arts' ) : esc_html_e( 'Go to Dashboard', 'boxing-martial-arts' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function boxing_martial_arts_main_screen() {
	if ( isset( $_GET['page'] ) && 'boxing-martial-arts-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'boxing-martial-arts' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'boxing-martial-arts' ) ?></p>
				<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'boxing-martial-arts' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'boxing-martial-arts' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'boxing-martial-arts' ) ?></p>
				<p><a target="_blank" href="<?php echo esc_url( BOXING_MARTIAL_ARTS_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'boxing-martial-arts' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Upgrade To Premium With Straight 20% OFF.', 'boxing-martial-arts' ); ?></h2>
				<p><?php esc_html_e( 'Get our amazing WordPress theme with exclusive 20% off use the coupon', 'boxing-martial-arts' ) ?>"<input type="text" value="GETPro20" id="myInput">".</p>
				<button class="button button-primary"><?php esc_html_e( 'GETPro20', 'boxing-martial-arts' ); ?></button>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function boxing_martial_arts_changelog_screen() {
	if ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) {
		global $wp_filesystem;
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'boxing-martial-arts' ); ?></p>

			<?php
				$changelog_file = apply_filters( 'boxing_martial_arts_changelog_file', BOXING_MARTIAL_ARTS_CHANGELOG_THEME_URL );
				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = boxing_martial_arts_parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
	<?php
	}
}

/**
 * Parse changelog from readme file.
 * @param  string $content
 * @return string
 */
function boxing_martial_arts_parse_changelog( $content ) {
	// Explode content with ==  to juse separate main content to array of headings.
	$content = explode ( '== ', $content );

	$changelog_isolated = '';

	// Get element with 'Changelog ==' as starting string, i.e isolate changelog.
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}

	// Now Explode $changelog_isolated to manupulate it to add html elements.
	$changelog_array = explode( '= ', $changelog_isolated );

	// Unset first element as it is empty.
	unset( $changelog_array[0] );

	$changelog = '<pre class="changelog">';

	foreach ( $changelog_array as $value) {
		// Replace all enter (\n) elements with </span><span> , opening and closing span will be added in next process.
		$value = preg_replace( '/\n+/', '</span><span>', $value );

		// Add openinf and closing div and span, only first span element will have heading class.
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div>';

		// Remove empty <span></span> element which newr formed at the end.
		$changelog .= str_replace( '<span></span>', '', $value );
	}

	$changelog .= '</pre>';

	return wp_kses_post( $changelog );
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function boxing_martial_arts_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'boxing-martial-arts' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'boxing-martial-arts' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'boxing-martial-arts' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'Theme Demo Set Up', 'boxing-martial-arts' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Templates, Color options and Fonts', 'boxing-martial-arts' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Included Demo Content', 'boxing-martial-arts' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Section Ordering', 'boxing-martial-arts' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Multiple Sections', 'boxing-martial-arts' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Plugins', 'boxing-martial-arts' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Premium Technical Support', 'boxing-martial-arts' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access to Support Forums', 'boxing-martial-arts' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Free updates', 'boxing-martial-arts' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Unlimited Domains', 'boxing-martial-arts' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Responsive Design', 'boxing-martial-arts' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Live Customizer', 'boxing-martial-arts' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a class="sidebar-button single-btn" href="<?php echo esc_url(BOXING_MARTIAL_ARTS_PRO_THEME_URL);?>" target="_blank"><?php esc_html_e( 'Go For Premium', 'boxing-martial-arts' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}
function boxing_martial_arts_get_bundle() {
	if ( isset( $_GET['tab'] ) && 'get_bundle' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'Get WordPress Theme Bundle', 'boxing-martial-arts' ); ?></p>
			<div class="col card">
				<h2 class="title"><?php esc_html_e( ' WordPress Theme Bundle of 65+ Themes At 15% Discount. ', 'boxing-martial-arts' ); ?></h2>
				<p><?php esc_html_e( 'Spring Offer Is To Get WP Bundle of 65+ Themes At 15% Discount use the coupon', 'boxing-martial-arts' ) ?>"<input type="text" value=" TPRIDE15 "  id="myInput">".</p>
				<p><a target="_blank" href="<?php echo esc_url( BOXING_MARTIAL_ARTS_THEME_BUNDLE ); ?>" class="button button-primary"><?php esc_html_e( 'Theme Bundle', 'boxing-martial-arts' ); ?></a></p>
			</div>
		</div>
	<?php
	}
}
