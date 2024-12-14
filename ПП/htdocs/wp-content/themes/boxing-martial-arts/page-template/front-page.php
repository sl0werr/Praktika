<?php
/**
 * Template Name: Custom Home Page
 *
 * @package Boxing Martial Arts
 * @subpackage boxing_martial_arts
 */

get_header(); ?>

<main id="tp_content" role="main">
		<?php do_action( 'boxing_martial_arts_before_slider' ); ?>

		<?php get_template_part( 'template-parts/home/slider' ); ?>
		<?php do_action( 'boxing_martial_arts_after_slider' ); ?>

		<?php get_template_part( 'template-parts/home/matches' ); ?>
		<?php do_action( 'boxing_martial_arts_after_matches' ); ?>
		<?php get_template_part( 'template-parts/home/home-content' ); ?>
		<?php do_action( 'boxing_martial_arts_after_home_content' ); ?>
</main>

<?php get_footer();
