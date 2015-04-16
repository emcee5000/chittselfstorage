<?php

/*****************************************
* Register Scripts
******************************************/
function pro_scripts()
{
	if (!is_admin()) 
	{
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' );
		wp_register_script( 'custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), true );
		wp_register_script( 'less', get_template_directory_uri() . '/js/less-1.3.0.min.js', array( 'jquery' ), true );
		wp_register_script( 'slider', get_template_directory_uri() . '/js/s3Slider.js', array( 'jquery' ), true );
		
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'custom' );
		wp_enqueue_script( 'less' );
		wp_enqueue_script( 'slider' );
	}
}

add_action( 'init', 'pro_scripts' );