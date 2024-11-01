<?php
/**
 * Plugin Name: Show Current Version
 * Plugin URI: https://github.com/abley/wp-show-current-version
 * Description: Display the current WordPress version in the footer alongside the available update.
 * Author: Dan Baley
 * Version: 1.0
 * Author URI: https://github.com/abley
 */

class show_current_version {
	function __construct() {
		add_action('admin_init', array($this, 'admin_init'));
	}

	function admin_init() {
		add_filter('update_footer', array($this, 'update_footer'));
	}

	function update_footer($text) {
		global $wp_version;
		if ( preg_match('|update\-core\.php|', $text) ) {
			$text .= ' (Currently running ' . $wp_version . ')';
		}
		return $text;
	}
}

$show_current_version = new show_current_version();