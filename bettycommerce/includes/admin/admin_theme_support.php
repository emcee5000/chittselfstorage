<?php

/*****************************************
* Menus
******************************************/
function pro_menus() 
{
	register_nav_menus( array(
		'top-header' => __( 'Top Navigation' ),
		'header' => __( 'Header Navigation' ),
		'footer' => __( 'Footer Navigation' )
	)); 
}

add_action ( 'init', 'pro_menus');

/*****************************************
* add_theme_support()
******************************************/

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails', array( 'post', 'slider', 'product' ) );