<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://zorca.org
 * @since      1.0.0
 *
 * @package    Newconomy_Rss
 * @subpackage Newconomy_Rss/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Newconomy_Rss
 * @subpackage Newconomy_Rss/public
 * @author     Zorca Orcinus <vs@zorca.org>
 */
class Newconomy_Rss_Public
{

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
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;

        add_filter( 'wp_feed_cache_transient_lifetime', array($this, 'speed_up_feed'), 10, 2 );

        add_shortcode('newconomy_rss', array($this, 'rss_print'));
    }

    public function get_rss() {
        $rss = fetch_feed('https://zapier.com/engine/rss/612190/NCMfeed/');

        if( ! is_wp_error( $rss ) ) {
            $rss_items = $rss->get_items(0, $rss->get_item_quantity(10));
            return $rss_items;
        }
        return false;
    }

    public function rss_print() {
        $rss_items = $this->get_rss();
        ob_start();
        include 'partials/newconomy-rss-public-display.php';
        $output = ob_get_clean();
        return $output;
    }

    function speed_up_feed( $interval, $url ) {
        if( 'https://zapier.com/engine/rss/612190/NCMfeed/' == $url ) return 900;
        return $interval;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

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

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/newconomy-rss-public.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

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

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/newconomy-rss-public.js', array( 'jquery' ), $this->version, false);
    }
}
