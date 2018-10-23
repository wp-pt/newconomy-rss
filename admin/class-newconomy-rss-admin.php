<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://zorca.org
 * @since      1.0.0
 *
 * @package    Newconomy_Rss
 * @subpackage Newconomy_Rss/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Newconomy_Rss
 * @subpackage Newconomy_Rss/admin
 * @author     Zorca Orcinus <vs@zorca.org>
 */
class Newconomy_Rss_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->options_page();
	}

	public function options_page() {
        add_action('admin_menu', function () {
            $page_title = 'Newconomy RSS Options';
            $menu_title = 'Newconomy RSS Options';
            $capability = 'edit_posts';
            $menu_slug = 'newconomy-rss-options';
            $function = array($this, 'newconomy_rss_options_display');
            $icon_url = '';
            $position = 24;
            add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
        });
    }

    public function newconomy_rss_options_display() {
        if (isset($_POST['newconomy_rss_options_channel'])) {
            $newconomy_rss_options_channel = $_POST['newconomy_rss_options_channel'];
            update_option('newconomy_rss_options_channel', $newconomy_rss_options_channel);
        }

        $newconomy_rss_options_channel = get_option('newconomy_rss_options_channel', '');

        include 'partials/newconomy-rss-admin-display.php';
    }

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Newconomy_Rss_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Newconomy_Rss_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/newconomy-rss-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Newconomy_Rss_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Newconomy_Rss_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/newconomy-rss-admin.js', array( 'jquery' ), $this->version, false );

	}

}
