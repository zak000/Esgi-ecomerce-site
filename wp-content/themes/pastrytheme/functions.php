<?php
	/**
	 * Created by PhpStorm.
	 * User: hugo
	 * Date: 15/10/14
	 * Time: 10:50
	 */
	add_action('wp_enqueue_scripts' , 'add_theme_scripts');

	function add_theme_scripts () {
		wp_enqueue_style('style-name' , get_stylesheet_uri());
	}

	include_once('widget.php');
	include_once('custom_post_type.php');


	//add feature image

	function featured_image () {
		add_theme_support('post-thumbnails');
		//different size of pictures -- always use soft crop (resize image proportionally)
		add_image_size('pastry-post' , 350 , 350); // normal post sizes
		add_image_size('pastry-single' , 350 , 550); // normal pages sizes
		add_image_size('pastry-custom' , 1050 , 350); // custom pages sizes

	}

	add_action('after_setup_theme' , 'featured_image');


	// add menu

	/*function register_pastry_menu () {
		register_nav_menu('pastry-menu' , __('Pastry Menu'));
	}

	add_action('init' , 'register_pastry_menu');*/