<?php
/*
Plugin Name: KD CPT
Plugin URI: 
Description: 
Version: 
Author: Mahedi Hasan
Author URI: 
License: GPLv2 or later
Text Domain: kd-cpt
*/

defined('ABSPATH') or die('You silly man');

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_kd_cpt_plugin(){
   Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_kd_cpt_plugin');

/**
 * The code that runs during plugin deactivation
 */
function deactivate_kd_cpt_plugin(){
   Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_kd_cpt_plugin');

if(class_exists('Inc\\Init')){
   Inc\Init::register_services();
}

