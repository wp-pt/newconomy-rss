<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://zorca.org
 * @since             1.0.0
 * @package           Newconomy_Rss
 *
 * @wordpress-plugin
 * Plugin Name:       Newconomy RSS
 * Plugin URI:        https://oxboot.org/newconomy-rss
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.1
 * Author:            Zorca Orcinus
 * Author URI:        https://zorca.org
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       newconomy-rss
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('PLUGIN_NAME_VERSION', '1.0.1');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-newconomy-rss-activator.php
 */
function activate_newconomy_rss()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-newconomy-rss-activator.php';
    Newconomy_Rss_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-newconomy-rss-deactivator.php
 */
function deactivate_newconomy_rss()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-newconomy-rss-deactivator.php';
    Newconomy_Rss_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_newconomy_rss');
register_deactivation_hook(__FILE__, 'deactivate_newconomy_rss');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-newconomy-rss.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_newconomy_rss()
{
    $plugin = new Newconomy_Rss();
    $plugin->run();
}
run_newconomy_rss();
