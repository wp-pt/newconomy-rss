<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://zorca.org
 * @since      1.0.0
 *
 * @package    Newconomy_Rss
 * @subpackage Newconomy_Rss/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Newconomy_Rss
 * @subpackage Newconomy_Rss/includes
 * @author     Zorca Orcinus <vs@zorca.org>
 */
class Newconomy_Rss_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'newconomy-rss',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
