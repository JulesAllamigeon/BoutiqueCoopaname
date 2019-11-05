<?php
/**
 * Enqueue Parent and child theme style
 */
function christmas_gift_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'christmas_gift_enqueue_styles' );

function christmas_gift_default_background() {
	return array(
		'default-image' => get_stylesheet_directory_uri() . '/images/bg.jpg',
		'default-repeat'         => 'repeat',
		'default-position-x'     => 'center',
		'default-position-y'     => 'top',
		'default-size'           => 'cover',
		'default-attachment'     => 'fixed',
	);
}

add_filter ( 'twentysixteen_custom_background_args', 'christmas_gift_default_background');


function christmas_gift_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'christmas-gift' ) ) {
		$fonts[] = 'Lato:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'christmas-gift' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}