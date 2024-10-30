<?php
/*
Plugin Name: Mansplainer
Plugin URI: https://wordpress.org/plugins/mansplainer/
Description: Fixes comments to be more technically accurate, naturally.
Version: 1.1.0
Text Domain: mansplainer
Author: Morgan Estes
Author URI: https://morganestes.com/
License: GPLv2+
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Mansplainer is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Mansplainer is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Mansplainer. If not, see http://www.gnu.org/licenses/gpl-3.0.html.
*/

namespace Mansplainer;

add_action( 'plugins_loaded', __NAMESPACE__ . '\\setup' );

/**
 * Sets up the plugin the only acceptable way.
 *
 * @since 1.0.0
 */
function setup() {
	// Don't modify comments in the admin screens, just on the front end.
	if ( ! is_blog_admin() ) {
		add_filter( 'comment_text', __NAMESPACE__ . '\\fix_the_comments', 10, 3 );
		add_filter( 'comment_excerpt', __NAMESPACE__ . '\\fix_the_comments', 10, 2 );
	}
}

/**
 * You've got some 'splainin' to do!
 *
 * @since 1.0.0
 * @since 1.1.0 Pick random comments to "fix", with filter for all comments.
 *
 * @param string           $comment_text Text of the current comment.
 * @param \WP_Comment|null $comment      The comment object.
 * @param array            $args         An array of arguments.
 * @return string The comment as it should be, really.
 */
function fix_the_comments( $comment_text, $comment, $args ) {

	/**
	 * Enable fixing all the comments or random ones.
	 *
	 * @since 1.1.0
	 *
	 * @param bool $not_all_comments Whether to fix all the comments, or random ones. Default true (random).
	 */
	$not_all_comments = apply_filters( 'mansplainer_not_all_comments', true );

	if ( $not_all_comments && boolval( random_int( 0, 1 ) ) ) {
		return $comment_text;
	}

	/**
	 * Filter the splains, though why would you? These are fantastic.
	 *
	 * @since 1.0.0
	 *
	 * @param array $splains A collection of proper comment prefixes.
	 */
	$splains = apply_filters( 'mansplainer_splains', [
		__( 'Actually,', 'mansplainer' ),
		__( 'Really,', 'mansplainer' ),
		__( 'I\'m sure you probably meant to say', 'mansplainer' ),
		__( 'Not to sound rude, but', 'mansplainer' ),
		__( 'I don\'t want to sealion, but', 'mansplainer' ),
		__( 'But have you considered...', 'mansplainer' ),
		__( 'I can\'t believe I have to say this, but', 'mansplainer' ),
		__( 'I\'m sure you\'ll agree that', 'mansplainer' ),
		__( '💩', 'mansplainer' ),
	] );

	$pick_a_splain = random_int( 0, count( $splains ) - 1 );
	$new_splain    = sprintf( '%1$s %2$s',
		esc_html( trim( $splains[ $pick_a_splain ] ) ),
		$comment_text
	);

	return $new_splain;
}
