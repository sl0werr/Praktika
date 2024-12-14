<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Boxing Martial Arts
 * @subpackage boxing_martial_arts
 */

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function boxing_martial_arts_categorized_blog() {
	$boxing_martial_arts_category_count = get_transient( 'boxing_martial_arts_categories' );

	if ( false === $boxing_martial_arts_category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$boxing_martial_arts_category_count = boxing_martial_arts_count( $categories );

		set_transient( 'boxing_martial_arts_categories', $boxing_martial_arts_category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $boxing_martial_arts_category_count > 1;
}

if ( ! function_exists( 'boxing_martial_arts_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since boxing_martial_arts
 */
function boxing_martial_arts_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in boxing_martial_arts_categorized_blog.
 */
function boxing_martial_arts_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'boxing_martial_arts_categories' );
}
add_action( 'edit_category', 'boxing_martial_arts_category_transient_flusher' );
add_action( 'save_post',     'boxing_martial_arts_category_transient_flusher' );