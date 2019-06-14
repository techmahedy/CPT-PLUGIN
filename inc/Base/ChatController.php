<?php 
/**
 * @package  KD CPT
 */
namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

/**
* 
*/
class ChatController extends BaseController
{
	public $callbacks;

	public $subpages = array();

	public function register()
	{
		if ( ! $this->activated( 'media_widget' ) ) return;

		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->setSubpages();

		$this->settings->addSubPages( $this->subpages )->register();
	}

	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'kd_cpt_plugin', 
				'page_title' => 'Widgets Manager', 
				'menu_title' => 'Widgets Manager', 
				'capability' => 'manage_options', 
				'menu_slug' => 'kd_chat', 
				'callback' => array( $this->callbacks, 'adminWidget' )
			)
		);
	}
}