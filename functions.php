<?php

require_once('block.php');

function msn_add_css() {
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', false, '1.1', 'all');
	wp_enqueue_style( 'icons', get_template_directory_uri() . '/assets/css/icons.css', false, '1.1', 'all');
	wp_enqueue_script( 'menu', get_template_directory_uri() . '/assets/menu.js', [], 1.1, true);
}

function msn_add_admin() {
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/icons.css', false, '1.1', 'all');
}

add_action( 'wp_enqueue_scripts', 'msn_add_css' );
add_action( 'admin_enqueue_scripts', 'msn_add_admin' );
