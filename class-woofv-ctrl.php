<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://figarts.co
 * @since      1.0.0
 *
 * @package    Woofv
 * @subpackage Woofv/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Woofv
 * @subpackage Woofv/includes
 * @author     David Towoju <hello@figarts.co>
 */
class Woofv_Ctrl {

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		$this->load_dependencies();
		// $this->set_locale();
		// $this->define_admin_hooks();
		$this->define_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Woofv_Loader. Orchestrates the hooks of the plugin.
	 * - Woofv_i18n. Defines internationalization functionality.
	 * - Woofv_Admin. Defines all hooks for the admin area.
	 * - Woofv_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require plugin_dir_path( __FILE__ ) . 'class-woofv-metabox.php';

	}

	public function enqueue_scripts() {
		wp_enqueue_media();
		wp_enqueue_script( WOOFV_SLUG, plugin_dir_url( __FILE__ ) . 'assets/woofv.js', array( 'jquery' ), WOOFV_VERSION, false );
		wp_localize_script( WOOFV_SLUG, 'meta_image',
			array(
				'title' => __( 'Choose or Upload Media', 'events' ),
				'button' => __( 'Use this mediaf', 'events' ),
			)
		);
	}	

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Woofv_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Woofv_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Woofv_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_hooks() {

		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	public function add_meta_box( $post_type ) {
		if( 'product' != $post_type )
			return;
		
		global $post;

		$meta_box = new Woofv_MetaBox( 'woofv', WOOFV_PATH . 'views/metabox.php', esc_html__( 'Featured Video', 'woofv' ), 'side', 'low', $post_type );
		
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		// $this->loader->run();
	}

}
