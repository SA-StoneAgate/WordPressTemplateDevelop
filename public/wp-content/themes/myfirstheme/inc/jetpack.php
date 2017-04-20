<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package myfirstheme
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function myfirstheme_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'myfirstheme_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function myfirstheme_jetpack_setup
add_action( 'after_setup_theme', 'myfirstheme_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function myfirstheme_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function myfirstheme_infinite_scroll_render
