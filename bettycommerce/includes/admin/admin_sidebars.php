<?php

/*****************************************
* Register Sidebars
******************************************/

if ( function_exists( 'register_sidebar' ) )

	register_sidebar( array(
		'name' => 'Blog Sidebar',
		'description' => 'Widgets in this area will be shown in the sidebar.',
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="sidebar-title">',
		'after_title' => '</div>',
		));
		
	register_sidebar( array(
		'name' => 'Page Sidebar',
		'description' => 'Widgets in this area will be shown in the sidebar.',
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="sidebar-title">',
		'after_title' => '</div>',
		));

	register_sidebar( array(
		'name' => 'Footer',
		'description' => 'Widgets in this area will be shown in the footer.',
		'before_widget' => '<div class="footer-widget-container">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
		));