<?php
/**
 * @package  KD CPT
 */

use \Inc\Base\BaseController;

namespace Inc\Base;

class Enqueue extends BaseController
{
   public function register(){
      add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
   }

   public function enqueue() {
      wp_enqueue_style( 'pluginstyle', $this->plugin_url . 'assets/style.css' );
   	wp_enqueue_script( 'pluginscript', $this->plugin_url . 'assets/script.js' );
    }
}