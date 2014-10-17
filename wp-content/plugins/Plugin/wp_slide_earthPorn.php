<?php

/**
 * Plugin Name: EarthPorn's Slideshow
 * Plugin URL: NONE
 * Description: Ajouter un slideshow
 * Version: 0.0.2
 * Author URI: NONE
 */



$site_url = get_option('siteurl');

//get wordpress' database global

global $wpdb;

//define some important variables

define("PLUGIN_FOLDER", dirname(__FILE__), TRUE);

define("BASE_FUNCTIONS_FILES", PLUGIN_FOLDER . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'wp_slide_earthPorn', TRUE);

define("PLUGIN_SETUP", BASE_FUNCTIONS_FILES . '-setups.php', TRUE);

define("PLUGIN_FUNCTIONS", BASE_FUNCTIONS_FILES .'-functions.php', TRUE);

define("PLUGIN_CSS", PLUGIN_FOLDER . DIRECTORY_SEPARATOR . 'slideshow' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'style.css', true);

define("PLUGIN_JQUERY_UI_CSS", PLUGIN_FOLDER . DIRECTORY_SEPARATOR . 'slideshow' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'smoothness' . DIRECTORY_SEPARATOR . 'jquery-ui-1.10.4.custom.min.css', true);

define("PLUGIN_JQUERY", PLUGIN_FOLDER . DIRECTORY_SEPARATOR . 'slideshow' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'jquery-1.10.2.js', true);

define("PLUGIN_JQUERY_UI", PLUGIN_FOLDER . DIRECTORY_SEPARATOR . 'slideshow' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'jquery-ui-1.10.4.custom.min.js', true);

//setup (or remove) the plugin

require_once(PLUGIN_SETUP);

register_activation_hook(__FILE__, 'set_plugin');//add table + default values

register_deactivation_hook(__FILE__, 'remove_plugin');//drop tables



add_action('admin_menu', 'setup_admin_menu');



//start using the plugin

require_once(PLUGIN_FUNCTIONS);

function setup_admin_menu() {

	add_menu_page(

		'EP SlideShow',

		'EarthPorn\'s Slideshow',

		'manage_options',

		'EPS',

		'home',

		plugins_url( 'images/favicon.jpg' , __FILE__ ),

		66

	);

	//submenu test

	add_submenu_page(

		'EPS',

		'Ajouter Slideshow',

		'Ajouter',

		'manage_options',

		'add_slideshow',

		'add_slideshow'

	);

}



//load css file

wp_register_style( 'wp_slideshow_earthporn_css', plugins_url('slideshow' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'style.css', __FILE__), array('wp_slideshow_earthporn_jqueryui_css'));

//load jquery ui's css file

wp_register_style( 'wp_slideshow_earthporn_jqueryui_css', plugins_url('slideshow' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'smoothness' . DIRECTORY_SEPARATOR . 'jquery-ui-1.10.4.custom.min.css', __FILE__));

//load jquery

wp_register_script( 'wp_slideshow_earthporn_jquery',  plugins_url('slideshow' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'jquery-1.10.2.js', __FILE__));

//load jquery ui

wp_register_script( 'wp_slideshow_earthporn_jqueryui',  plugins_url('slideshow' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'jquery-ui-1.10.4.custom.min.js', __FILE__), array('wp_slideshow_earthporn_jquery'));

//load js file

wp_register_script( 'wp_slideshow_earthporn_js',  plugins_url('slideshow' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'script.js', __FILE__), array('wp_slideshow_earthporn_jqueryui', 'wp_slideshow_earthporn_jquery'));



add_shortcode('earthporn_slideshow_deploy', 'earthporn_slideshow_deploy_func');



function earthporn_slideshow_deploy_func($atts){

	//load css & js files

	wp_enqueue_style('wp_slideshow_earthporn_css');

	wp_enqueue_style('wp_slideshow_earthporn_jqueryui_css');

	wp_enqueue_script('wp_slideshow_earthporn_jquery');

	wp_enqueue_script('wp_slideshow_earthporn_jqueryui');

	wp_enqueue_script('wp_slideshow_earthporn_js');

	return "Ceci est un slideshow d'id : " . $atts['id']. '<div class="ep_slideshow"></div>';

}



?>