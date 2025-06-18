<?php
/*
Plugin Name: CB Countdown Timer Widget for Elementor
Description: Custom widget for Elementor that displays a countdown timer.
Version: 1.1.0
Author: Md Abul Bashar
Author URI: https://facebook.com/hmbashar
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

define('CB_COUNTDOWN_DIR_URI', plugin_dir_url( __FILE__ ));

// Load the text domain for translations
function cbCountdown_file_load()
{
    load_plugin_textdomain('cb-countdown-timer', false, dirname(plugin_basename(__FILE__)) . '/languages/');

    	// Load plugin file
	require_once( __DIR__ . '/config.php' );

	// Run the plugin
	\cbCownDownWidgetConfig\Plugin::instance();

}

add_action('plugins_loaded', 'cbCountdown_file_load');


function cbCountDown_assets_enqu() {
   

    wp_enqueue_style( 'cb-countdown-stylesheet', CB_COUNTDOWN_DIR_URI. '/assets/style.css');
}

add_action( 'wp_enqueue_scripts', 'cbCountDown_assets_enqu' );

