<?php

/**
 * Custom Post type needed for both public and admin.
 *
 * @link       http://solutionsbysteve.com
 * @since      1.0.3
 *
 * @package    Solutions_Invoice_Manager
 * @subpackage Solutions_Invoice_Manager/includes/cpt
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Solutions_Invoice_Manager
 * @subpackage Solutions_Invoice_Manager/includes/cpt
 * @author     Steven Maloney <steve@solutionsbysteve.com>
 */
class Solutions_Invoice_Manager_CPT_sim_invoice_logs {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.3
     * @access   private
     * @var      string    $solutions_invoice_manager    The ID of this plugin.
     */
    private $solutions_invoice_manager;

    /**
     * The version of this plugin.
     *
     * @since    1.0.3
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.3
     * @param      string    $solutions_invoice_manager       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($solutions_invoice_manager, $version) {

        $this -> solutions_invoice_manager = $solutions_invoice_manager;
        $this -> version = $version;

    }

    /**
     * Registers the post type.
     *
     * @since     1.0.0
     */
    public function Register_Post_Type() {
        //Logs Post Type
        $labels = array(
            'name' => _x('Invoice Logs', 'Post Type General Name', 'solutions-invoice-manager'),
            'singular_name' => _x('Invoice Log', 'Post Type Singular Name', 'solutions-invoice-manager'),
            'menu_name' => __('Logs', 'solutions-invoice-manager'),
            'name_admin_bar' => __('Invoice Log', 'solutions-invoice-manager'),
            'parent_item_colon' => __('Parent Invoice Log:', 'solutions-invoice-manager'),
            'all_items' => __('Logs', 'solutions-invoice-manager'),
            'add_new_item' => __('Add New Invoice Log', 'solutions-invoice-manager'),
            'add_new' => __('Add New', 'solutions-invoice-manager'),
            'new_item' => __('New Invoice Log', 'solutions-invoice-manager'),
            'edit_item' => __('Edit Invoice Log', 'solutions-invoice-manager'),
            'update_item' => __('Update Invoice Log', 'solutions-invoice-manager'),
            'view_item' => __('View Invoice Log', 'solutions-invoice-manager'),
            'search_items' => __('Search Invoice Logs', 'solutions-invoice-manager'),
            'not_found' => __('Not found', 'solutions-invoice-manager'),
            'not_found_in_trash' => __('Not found in Trash', 'solutions-invoice-manager'),
        );
        $args = array('label' => __('invoice-log', 'solutions-invoice-manager'), 'description' => __('Invoice Log', 'solutions-invoice-manager'), 'labels' => $labels, 'supports' => array('title'), 'taxonomies' => array(), 'hierarchical' => false, 'public' => false, 'show_ui' => true, 'show_in_menu' => 'edit.php?post_type=sim-invoice', 'menu_position' => 102, 'menu_icon' => 'dashicons-groups', 'show_in_admin_bar' => false, 'show_in_nav_menus' => false, 'can_export' => true, 'has_archive' => false, 'exclude_from_search' => true, 'publicly_queryable' => false, 'capability_type' => 'post', );
        register_post_type('sim-invoice-logs', $args);
    }

    /**
     * Registers taxonomies.
     *
     * @since     1.0.0
     */
    public function Register_Taxonomies() {
    }

    /**
     * Custom rewrites and permalinks.
     *
     * @since     1.0.0
     */
    public function Custom_Rewrites() {
    }

    public function Custom_Permalinks($link, $id = NULL) {
        return $link;
    }

}
?>