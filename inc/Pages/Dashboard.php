<?php 
/**
 * @package  KD CPT
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;

class Dashboard extends BaseController
{
	public $settings , $callbacks , $callbacks_manager;

	public $pages    = array();

	public function register() {
		$this->settings = new SettingsApi();
		$this->callbacks = new AdminCallbacks();
		$this->callbacks_manager = new ManagerCallbacks();

		$this->setPages();	
		$this->setSettings();
		$this->setSections();
		$this->setFields();
		
		$this->settings->addPages( $this->pages )->withSubPage( 'General' )->register();
	}

	public function setPages() {
		$this->pages = array(
			array(
				'page_title' => 'CPT', 
				'menu_title' => 'KD-CPT', 
				'capability' => 'manage_options', 
				'menu_slug' => 'kd_cpt_plugin', 
				'callback' => array( $this->callbacks, 'adminDashboard' ), 
				'icon_url' => 'dashicons-store', 
				'position' => 110
			)
		);
	}

	public function setSettings(){
        $args = array(
		    	 array(
						'option_group' => 'kd_cpt_plugin_settings',
						'option_name' => 'kd_cpt_plugin',
						'callback' => array( $this->callbacks_manager , 'checkboxSanitize' )
				 )
			);
		$this->settings->setSettings( $args );
	}

	public function setSections(){
		$args = array(
			array(
				'id' => 'kd_cpt__admin_index',
				'title' => 'Settings Manager',
				'callback' => array( $this->callbacks_manager, 'AdminSectionManager' ),
				'page' => 'kd_cpt_plugin'
			)
		);

		$this->settings->setSections( $args );
	}

	public function setFields(){

		$args = array();
		foreach($this->managers as $key => $value){
			$args[] = array(
				        'id' => $key,
						'title' => $value,
						'callback' => array( $this->callbacks_manager, 'checkboxField' ),
						'page' => 'kd_cpt_plugin',
						'section' => 'kd_cpt__admin_index',
						'args' => array(
							'option_name' => 'kd_cpt_plugin',
							'label_for' => $key,
							'class' => 'ui-toggle'
						)
			);
		}
		$this->settings->setFields( $args );
	}
}