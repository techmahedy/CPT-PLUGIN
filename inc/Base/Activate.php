<?php
/**
 * @package  KD CPT
 */

namespace Inc\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();

		if ( get_option( 'kd_cpt_plugin' ) ) {
			return;
		}

		$default = array();

		update_option( 'kd_cpt_plugin', $default );
	}
}