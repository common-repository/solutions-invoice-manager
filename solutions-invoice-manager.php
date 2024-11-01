<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://solutionsbysteve.com
 * @since             1.0.0
 * @package           Solutions_Invoice_Manager
 *
 * @wordpress-plugin
 * Plugin Name:       Solutions Invoice Manager
 * Plugin URI:        http://solutionsbysteve.com/services/custom-wordpress-plugin/
 * Description:       Manage invoices on your very own wordpress installation. Supports emailing, PDF viewing and Reports.
 * Version:           1.2.4
 * Author:            Solutions by Steve
 * Author URI:        http://solutionsbysteve.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       solutions-invoice-manager
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-solutions-invoice-manager-activator.php
 */
function activate_solutions_invoice_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-solutions-invoice-manager-activator.php';
	Solutions_Invoice_Manager_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-solutions-invoice-manager-deactivator.php
 */
function deactivate_solutions_invoice_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-solutions-invoice-manager-deactivator.php';
	Solutions_Invoice_Manager_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_solutions_invoice_manager' );
register_deactivation_hook( __FILE__, 'deactivate_solutions_invoice_manager' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-solutions-invoice-manager.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_solutions_invoice_manager() {

	$plugin = new Solutions_Invoice_Manager();
	$plugin->run();

}
run_solutions_invoice_manager();
