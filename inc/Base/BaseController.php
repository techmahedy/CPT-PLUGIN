<?php
/**
 * @package  KD CPT
 */

namespace Inc\Base;

class BaseController {

    public $plugin_path , $plugin_url , $plugin_name;
    public $managers = array();

    public function __construct(){
        $this->plugin_path = plugin_dir_path(dirname(__FILE__ , 2 )); // Define plugin directory path
        $this->plugin_url = plugin_dir_url(dirname(__FILE__ , 2 )); // Define plugin directory url
        $this->plugin_name = plugin_basename(dirname(__FILE__ , 3 )) . '/kd-cpt.php'; // Getting plugin name

        $this->managers = array(
		    	'cpt_manager' => 'Activate CPT',
		    	'taxonomy_manager' => 'Activate Taxonomy',
		    	'media_widget' => 'Activate Media Widget',
			    'gallery_manager' => 'Activate Gallery',
		    	'testimonial_manager' => 'Activate Testimonial',
			    'templates_manager' => 'Activate Templates',
			    'login_manager' => 'Activate Ajax Login/Signup',
			    'membership_manager' => 'Activate Membership',
			    'chat_manager' => 'Activate Chat'
		   );
    }

    public function activated( string $key ) {

		$option = get_option( 'kd_cpt_plugin' );
		return isset( $option[ $key ] ) ? $option[ $key ] : false;
	}
}
