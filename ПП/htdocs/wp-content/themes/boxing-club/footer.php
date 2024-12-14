<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Boxing Club
 */

/**
 *
 * @hooked boxing_club_footer_start
 */
do_action( 'boxing_club_action_before_footer' );

/**
 * Hooked - boxing_club_footer_top_section -10
 * Hooked - boxing_club_footer_section -20
 */
do_action( 'boxing_club_action_footer' );

/**
 * Hooked - boxing_club_footer_end. 
 */
do_action( 'boxing_club_action_after_footer' );

wp_footer(); ?>

</body>  
</html>