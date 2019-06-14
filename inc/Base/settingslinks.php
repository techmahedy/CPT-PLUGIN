<?php
/**
 * @package  KD CPT
 */

use \Inc\Base\BaseController;

namespace Inc\Base;

class SettingsLinks extends BaseController
{   

	public function register() {
		add_filter( "plugin_action_links_$this->plugin_name", array( $this, 'settings_link' ) ); //For installed plugin page settings button
    }
    
    public function settings_link( $links ) {   //Getting settings button for managing plugin 
        $settings_link = '<a href="admin.php?page=kd_cpt">Settings</a>';
        array_push( $links, $settings_link );
        return $links;
    }

}