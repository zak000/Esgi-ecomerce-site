<?php

	add_action('init', 'pastry_type_init');

	function pastry_type_init(){
		register_post_type(
			'pastry',
			array(
				'label' => __('Pâtisserie'),
				'singular_label' => __('Pâtisserie'),
				'public' => true,
				'show_ui' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'supports' => array('title', 'excerpt', 'thumbnail'),
				'menu_icon' => 'dashicons-video-alt',
				'menu_position' => 25
			)
		);
	}
