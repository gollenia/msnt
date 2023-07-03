<?php

require_once __DIR__ . '/conditional.php';

function msn_block_init() {
	$dir = __DIR__;
	
	$script_asset_path = "$dir/build/index.asset.php";
	if ( ! file_exists( $script_asset_path ) ) {
		throw new Error(
			'You need to run `npm start` or `npm run build` for the "create-block/icon" block first.'
		);
	}
	$index_js     = 'build/index.js';
	$script_asset = require( $script_asset_path );
	wp_register_script(
		'msn-block-editor',
		'/wp-content/themes/schule/' . $index_js,
		$script_asset['dependencies'],
		$script_asset['version']
	);
	wp_set_script_translations( 'msn-block-editor', 'icon' );

	$editor_css = 'build/index.css';
	wp_register_style(
		'msn-block-editor',
		'/wp-content/themes/schule/' . $editor_css,
		array(),
		filemtime( "$dir/$editor_css" )
	);

	$style_css = 'build/style-index.css';
	wp_register_style(
		'msn-block',
		'/wp-content/themes/schule/' . $style_css,
		array(),
		filemtime( "$dir/$style_css" )
	);

	register_block_type( 'msn/icon', array(
		'editor_script' => 'msn-block-editor',
		'editor_style'  => 'msn-block-editor',
		'style'         => 'msn-block',
	) );

	register_block_type( 'msn/conditional', array(
		'render_callback' => [ 'Conditional', 'render' ],
		'attributes' => [
			'fromDate' => [
				'type' => 'string',
				'default' => '1970-01-01'
			],
			'toDate' => [
				'type' => 'string',
				'default' => '2100-01-01'
			],
			'hideWithinDateRange' => [
				'type' => 'boolean',
				'default' => false
			]
		]
	) );
}
add_action( 'init', 'msn_block_init' );
