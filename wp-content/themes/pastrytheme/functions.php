<?php
	/**
	 * Created by PhpStorm.
	 * User: hugo
	 * Date: 15/10/14
	 * Time: 10:50
	 */
	add_action('wp_enqueue_scripts', 'add_theme_scripts');

	function add_theme_scripts()
	{
		wp_enqueue_style('style-name', get_stylesheet_uri());
	}

	include_once('widget.php');


	//add feature image

	function futured_image()
	{
		add_theme_support('post-thumbnails');
		//diferent size of pictures
		add_image_size('post_normal',500,120,true);
		add_image_size('big_size',920,210,true);

	}
	add_action('after_setup_theme','futured_image');