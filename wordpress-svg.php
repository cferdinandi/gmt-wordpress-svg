<?php

/**
 * Plugin Name: GMT WordPress SVG
 * Plugin URI: https://github.com/cferdinandi/gmt-wordpress-svg/
 * GitHub Plugin URI: https://github.com/cferdinandi/gmt-wordpress-svg/
 * Description: Adds SVG support to the WordPress Media Library, and an [svg] shortcode for inlining SVGs.
 * Version: 1.0.1
 * Author: Chris Ferdinandi
 * Author URI: http://gomakethings.com
 * License: MIT
 */


	/**
	 * Allow SVGs in wp_kses
	 */
	$allowedposttags['svg']['xmlns'] = true;
	$allowedposttags['svg']['class'] = true;
	$allowedposttags['svg']['id'] = true;
	$allowedposttags['svg']['viewbox'] = true;
	$allowedposttags['path']['d'] = true;



	/**
	 * Allow SVGs in the Media Uploader
	 */
	function wp_svg_allow_svg_mime_type( $mimes ) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter( 'upload_mimes', 'wp_svg_allow_svg_mime_type' );



	/**
	 * Add a shortcode for svg icons
	 * @param array $atts Shortcode arguments
	 */
	function wp_svg_shortcode( $atts ) {

		// Get user options
		$svg = shortcode_atts(array(
			'id'  => '',
			'url' => '',
			'class' => '',
		), $atts);

		// Bail if no link or label is set
		if ( empty( $svg['id'] ) && empty( $svg['url'] ) ) return;

		// Get SVG url
		$img = $svg['url'];
		if ( empty( $img ) ) {
			$img = wp_get_attachment_image_src( $svg['id'] );
		}

		// Get SVG content and add classes
		$file = @file_get_contents( $img );
		if ( empty( $file ) ) return;
		if ( !empty( $svg['class'] ) ) {
			$file = str_replace ( '<svg', '<svg class="' . $svg['class'] . '"', $file );
		}

		// Return SVG contents
		return $file;

	}
	add_shortcode( 'svg', 'wp_svg_shortcode' );