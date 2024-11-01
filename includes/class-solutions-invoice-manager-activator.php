<?php

/**
 * Fired during plugin activation
 *
 * @link       http://solutionsbysteve.com
 * @since      1.0.0
 *
 * @package    Solutions_Invoice_Manager
 * @subpackage Solutions_Invoice_Manager/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Solutions_Invoice_Manager
 * @subpackage Solutions_Invoice_Manager/includes
 * @author     Steven Maloney <steve@solutionsbysteve.com>
 */
class Solutions_Invoice_Manager_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		//Force Rewrite Flush
		$need_flush = get_option( 'sim_invoice_need_flush' );
		if( !$need_flush ){
			add_option( 'sim_invoice_need_flush', 'true' );
		}else{
			update_option( 'sim_invoice_need_flush', 'true' );
		}
		
	}

}
