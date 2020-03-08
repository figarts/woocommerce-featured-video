<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://figarts.co
 * @since      1.0.0
 *
 * @package    Wcfv
 * @subpackage Wcfv/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wcfv
 * @subpackage Wcfv/public
 * @author     David Towoju <hello@figarts.co>
 */
class Wcfv_Public {

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
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
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
		 * defined in Wcfv_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wcfv_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wcfv-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wcfv_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wcfv_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wcfv-public.js', array( 'jquery' ), $this->version, false );

	}

	public function add_video($html, $current_thumbnail_id){
		
		$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
		
		if( $post_thumbnail_id !== $current_thumbnail_id)
			return $html;


		$video = '<div data-thumb="http://figarts.local/wp-content/uploads/2020/02/hoodie_3_front-100x100.jpg" class="woocommerce-product-gallery__image woofv_video">' . do_shortcode('[video width="1280" height="720" autoplay=off mp4="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4"][/video]') . '</div>';

		$html = $video . $html;

		// $html .= '<div data-thumb="http://figarts.local/wp-content/uploads/2020/02/hoodie_3_front-100x100.jpg" data-thumb-alt="" class="woocommerce-product-gallery__image"><a href="http://figarts.local/wp-content/uploads/2020/02/hoodie_3_front.jpg"><img width="600" height="600" src="http://figarts.local/wp-content/uploads/2020/02/hoodie_3_front-600x600.jpg" class="wp-post-image" alt="" title="hoodie_3_front.jpg" data-caption="" data-src="http://figarts.local/wp-content/uploads/2020/02/hoodie_3_front.jpg" data-large_image="http://figarts.local/wp-content/uploads/2020/02/hoodie_3_front.jpg" data-large_image_width="1000" data-large_image_height="1000" srcset="http://figarts.local/wp-content/uploads/2020/02/hoodie_3_front-600x600.jpg 600w, http://figarts.local/wp-content/uploads/2020/02/hoodie_3_front-300x300.jpg 300w, http://figarts.local/wp-content/uploads/2020/02/hoodie_3_front-100x100.jpg 100w, http://figarts.local/wp-content/uploads/2020/02/hoodie_3_front-150x150.jpg 150w, http://figarts.local/wp-content/uploads/2020/02/hoodie_3_front-768x768.jpg 768w, http://figarts.local/wp-content/uploads/2020/02/hoodie_3_front.jpg 1000w" sizes="(max-width: 600px) 100vw, 600px"></a></div>';
		return $html;
	}

}
