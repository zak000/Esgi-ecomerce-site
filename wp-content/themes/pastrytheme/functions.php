<?php
	/**
	 * Created by PhpStorm.
	 * User: hugo
	 * Date: 15/10/14
	 * Time: 10:50
	 */
	add_action('wp_enqueue_scripts', 'add_theme_scripts');

	function add_theme_scripts(){
		wp_enqueue_style('style-name', get_stylesheet_uri());
	}

	include_once('widget.php');
	include_once('custom_post_type.php');