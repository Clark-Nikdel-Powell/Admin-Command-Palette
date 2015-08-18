<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    ACP
 * @subpackage ACP/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    ACP
 * @subpackage ACP/public
 * @author     Your Name <email@example.com>
 */
class ACP_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $admin_command_palette    The ID of this plugin.
	 */
	private $admin_command_palette;

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
	 * @param      string    $admin_command_palette       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $admin_command_palette, $version ) {

		$this->admin_command_palette = $admin_command_palette;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in ACP_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ACP_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->admin_command_palette, plugin_dir_url( __FILE__ ) . 'css/acp-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in ACP_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ACP_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->admin_command_palette, plugin_dir_url( __FILE__ ) . 'js/acp-public.js', array( 'jquery' ), $this->version, false );

	}

}