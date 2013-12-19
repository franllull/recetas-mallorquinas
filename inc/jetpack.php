<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package receptes
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function receptes_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'receptes_jetpack_setup' );
