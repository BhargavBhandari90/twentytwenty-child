<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {

	$parenthandle = 'twentytwenty-style';
	$theme = wp_get_theme();

	// Include parent theme's style.
	wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css',
		array(),
		$theme->parent()->get('Version')
	);

	// Add child-theme's style.
	wp_enqueue_style( 'twentytwenty-child-style', get_stylesheet_uri(),
		array( $parenthandle ),
		$theme->get('Version') // this only works if you have Version in the style header
	);
}