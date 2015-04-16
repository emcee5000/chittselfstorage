<?php

/*****************************************
* Register Styles
******************************************/

function pro_styles() {
	
	wp_register_style( 'fonts', 'http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic', array(), 'all' );
	wp_register_style( 'less', get_template_directory_uri() . '/stylesheets/style.css', array(), 'all' );
	wp_register_style( 'wp', get_template_directory_uri() . '/stylesheets/wp-default.css', array(), 'all' );
	wp_register_style( 'custom', get_template_directory_uri() . '/customstyle/style.css', 'all' );
	
	wp_enqueue_style( 'fonts' );
	wp_enqueue_style( 'less' );
	wp_enqueue_style( 'wp' );
	wp_enqueue_style( 'custom' );
}

add_action( 'wp_enqueue_scripts', 'pro_styles' );

?>