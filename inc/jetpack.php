<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Logan County
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 * 
 * @uses 	add_theme_support()
 */
function logancounty_jetpack_setup() {

	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );

} // logancounty_jetpack_setup()
add_action( 'after_setup_theme', 'logancounty_jetpack_setup' );
