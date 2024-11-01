<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://solutionsbysteve.com
 * @since      1.0.0
 *
 * @package    Solutions_Invoice_Manager
 * @subpackage Solutions_Invoice_Manager/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Solutions_Invoice_Manager
 * @subpackage Solutions_Invoice_Manager/public
 * @author     Steven Maloney <steve@solutionsbysteve.com>
 */
class Solutions_Invoice_Manager_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $solutions_invoice_manager    The ID of this plugin.
	 */
	private $solutions_invoice_manager;

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
	 * @param      string    $solutions_invoice_manager       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $solutions_invoice_manager, $version ) {

		$this->solutions_invoice_manager = $solutions_invoice_manager;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->solutions_invoice_manager, plugin_dir_url( __FILE__ ) . 'css/solutions-invoice-manager-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->solutions_invoice_manager, plugin_dir_url( __FILE__ ) . 'js/solutions-invoice-manager-public.js', array( 'jquery' ), $this->version, false );
	}




	/**
	 * Custom Templates for the Custom Post Type.
	 *
	 * @since     1.0.0
	 */
	public function Solutions_Invoice_Custom_Template( $template ){
		global $post;
		if (isset($post->post_type) && $post->post_type == 'sim-invoice') {
			if ( file_exists( plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/solutions-invoice-manager-public-display.php' ) ) {
				//Load PDF Library
				if ( !file_exists( plugin_dir_path( dirname( __FILE__ ) ) . 'includes/fpdf18/fpdf.php' ) ) {
					die( "ERROR: Can't find PDF library ( ". plugin_dir_path( dirname( __FILE__ ) ) . 'includes/fpdf18/fpdf.php'." )" );
				}
				require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/fpdf18/fpdf.php';
				$template =  plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/solutions-invoice-manager-public-display.php';
			}
		}
		return $template;
	}


}
