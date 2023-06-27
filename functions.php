<?php

function msn_add_css() {
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', false, '1.1', 'all');
}

add_action( 'wp_enqueue_scripts', 'msn_add_css' );
