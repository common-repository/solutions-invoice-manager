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
class Solutions_Invoice_Manager_CPT_sim_invoice {

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
    public function __construct( $solutions_invoice_manager, $version ) {

        $this->solutions_invoice_manager = $solutions_invoice_manager;
        $this->version = $version;

    }









    /**
     * Registers the post type.
     *
     * @since     1.0.0
     */
    public function Register_Post_Type() {
        //Invoice Post Type
        $labels = array(
            'name'                => _x( 'Invoices', 'Post Type General Name', 'solutions-invoice-manager' ),
            'singular_name'       => _x( 'Invoice', 'Post Type Singular Name', 'solutions-invoice-manager' ),
            'menu_name'           => __( 'Invoice Manager', 'solutions-invoice-manager' ),
            'name_admin_bar'      => __( 'Invoice', 'solutions-invoice-manager' ),
            'parent_item_colon'   => __( 'Parent Invoice:', 'solutions-invoice-manager' ),
            'all_items'           => __( 'Invoices', 'solutions-invoice-manager' ),
            'add_new_item'        => __( 'Add New Invoice', 'solutions-invoice-manager' ),
            'add_new'             => __( 'Add New', 'solutions-invoice-manager' ),
            'new_item'            => __( 'New Invoice', 'solutions-invoice-manager' ),
            'edit_item'           => __( 'Edit Invoice', 'solutions-invoice-manager' ),
            'update_item'         => __( 'Update Invoice', 'solutions-invoice-manager' ),
            'view_item'           => __( 'View Invoice', 'solutions-invoice-manager' ),
            'search_items'        => __( 'Search Invoices', 'solutions-invoice-manager' ),
            'not_found'           => __( 'Not found', 'solutions-invoice-manager' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'solutions-invoice-manager' ),
        );
        $args = array(
            'label'               => __( 'invoice', 'solutions-invoice-manager' ),
            'description'         => __( 'Invoice', 'solutions-invoice-manager' ),
            'labels'              => $labels,
            'supports'            => array( 'title' ),
            'taxonomies'          => array( 'sim-client', 'sim-payee' ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 101,
            'menu_icon'           => 'dashicons-groups',
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
        );
        register_post_type( 'sim-invoice', $args );
    }



    /**
     * Registers taxonomies.
     *
     * @since     1.0.0
     */
    public function Register_Taxonomies() {
        //Client
        $labels = array(
            'name'                       => _x( 'Client', 'Taxonomy General Name', 'solutions-invoice-manager' ),
            'singular_name'              => _x( 'Client', 'Taxonomy Singular Name', 'solutions-invoice-manager' ),
            'menu_name'                  => __( 'Clients', 'solutions-invoice-manager' ),
            'all_items'                  => __( 'All Clients', 'solutions-invoice-manager' ),
            'parent_item'                => __( 'Parent Client', 'solutions-invoice-manager' ),
            'parent_item_colon'          => __( 'Parent Client:', 'solutions-invoice-manager' ),
            'new_item_name'              => __( 'New Client Name', 'solutions-invoice-manager' ),
            'add_new_item'               => __( 'Add New Client', 'solutions-invoice-manager' ),
            'edit_item'                  => __( 'Edit Client', 'solutions-invoice-manager' ),
            'update_item'                => __( 'Update Client', 'solutions-invoice-manager' ),
            'view_item'                  => __( 'View Client', 'solutions-invoice-manager' ),
            'separate_items_with_commas' => __( 'Separate menus with commas', 'solutions-invoice-manager' ),
            'add_or_remove_items'        => __( 'Add or remove menus', 'solutions-invoice-manager' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'solutions-invoice-manager' ),
            'popular_items'              => __( 'Popular Clients', 'solutions-invoice-manager' ),
            'search_items'               => __( 'Search Clients', 'solutions-invoice-manager' ),
            'not_found'                  => __( 'Not Found', 'solutions-invoice-manager' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => false,
            'public'                     => false,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => false,
            'show_tagcloud'              => false,
            'rewrite' => array('slug' => 'invoice-client'),
        );
        register_taxonomy( 'sim-client', array( 'sim-invoice' ), $args );

        //Payee
        $labels = array(
            'name'                       => _x( 'Payee', 'Taxonomy General Name', 'solutions-invoice-manager' ),
            'singular_name'              => _x( 'Payee', 'Taxonomy Singular Name', 'solutions-invoice-manager' ),
            'menu_name'                  => __( 'Payees', 'solutions-invoice-manager' ),
            'all_items'                  => __( 'All Payees', 'solutions-invoice-manager' ),
            'parent_item'                => __( 'Parent Payee', 'solutions-invoice-manager' ),
            'parent_item_colon'          => __( 'Parent Payee:', 'solutions-invoice-manager' ),
            'new_item_name'              => __( 'New Payee Name', 'solutions-invoice-manager' ),
            'add_new_item'               => __( 'Add New Payee', 'solutions-invoice-manager' ),
            'edit_item'                  => __( 'Edit Payee', 'solutions-invoice-manager' ),
            'update_item'                => __( 'Update Payee', 'solutions-invoice-manager' ),
            'view_item'                  => __( 'View Payee', 'solutions-invoice-manager' ),
            'separate_items_with_commas' => __( 'Separate menus with commas', 'solutions-invoice-manager' ),
            'add_or_remove_items'        => __( 'Add or remove menus', 'solutions-invoice-manager' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'solutions-invoice-manager' ),
            'popular_items'              => __( 'Popular Payees', 'solutions-invoice-manager' ),
            'search_items'               => __( 'Search Payees', 'solutions-invoice-manager' ),
            'not_found'                  => __( 'Not Found', 'solutions-invoice-manager' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => false,
            'public'                     => false,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => false,
            'show_tagcloud'              => false,
            'rewrite' => array('slug' => 'invoice-payee'),
        );
        register_taxonomy( 'sim-payee', array( 'sim-invoice' ), $args );
    }


    /**
     * Custom rewrites and permalinks.
     *
     * @since     1.0.0
     */
    function Custom_Rewrites( ){
        $queryarg = 'post_type=sim-invoice&p=';
        add_rewrite_tag('%cpt_id%', '([^/]+)', $queryarg);
        add_permastruct('invoice', '/invoice/%cpt_id%/', false);
    }
    function Custom_Permalinks( $link, $id=NULL ){
        if( is_null($id) ){ return $link; }
        $post = get_post($id);
        if ( $post->post_type == 'sim-invoice' ){
            global $wp_rewrite;
            if ( is_wp_error( $post ) )
                return $post;
            $newlink = $wp_rewrite->get_extra_permastruct('invoice');
            $newlink = str_replace("%cpt_id%", $post->ID, $newlink);
            $newlink = home_url(user_trailingslashit($newlink));
            return $newlink;
        } else {
            return $link;
        }
    }


}



?>
