<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://solutionsbysteve.com
 * @since      1.0.0
 *
 * @package    Solutions_Invoice_Manager
 * @subpackage Solutions_Invoice_Manager/admin/partials
 */

 if( !( is_user_logged_in() && current_user_can('manage_options') ) ){ die("You do not have permission to be here."); }

?>

<div class="wrap solutions-invoice-manager" id="options">
	<h1>Solutions Invoice Manager v<?php echo $this->version; ?></h1>
	<p><strong>by: <a href="http://solutionsbysteve.com">Solutions by Steve</a></strong></p>

		<?php
		if(!isset($_GET['tab'])){ $_GET['tab'] = 'options'; }
		DisplayAdminTabs($_GET['tab']);

		switch($_GET['tab']){
			case 'mail':
				echo '<h2>Templates</h2>';

				$tags = array(
					'[id]', '[date]', '[overdue]', '[status]', '[payee-name]', '[payee-address1]', '[payee-address2]',
					'[payee-phone]', '[payee-email]', '[client-name]', '[client-company]', '[client-address1]',
					'[client-address2]', '[client-phone]', '[client-email]'
				);
				for($i=0; $i<sizeof($tags); $i++){
					$str = '<code>';
					$str .= $tags[$i];
					$str .= '</code>';
					$tags[$i] = $str;
				}
				echo "<p>Available Tags: ".join(', ',$tags)."</p>";

				$templates = get_option( 'sim_invoice_templates' );
				foreach($templates as $template=>$default){
					echo '<form action="options.php" method="post">';
					echo '<div class="postbox">';
					settings_fields( 'sim-invoice-template-'.$template );
					do_settings_sections( 'sim-invoice-template-'.$template );
					submit_button();
					echo '</div>';
					echo '</form>';
				}
				break;
			default:
				echo '<form action="options.php" method="post">';
				settings_fields( 'sim-invoice-options' );
				do_settings_sections( 'sim-invoice-options' );
				submit_button();
				echo '</form>';
				break;
		}
		?>

	<div class="postbox">
		<p>Donations are the foundation of this plugin, without them it will cease to exist. Thank you for your consideration and it is truly appreciated. <a href="http://bit.ly/Donate-SolutionsInvoiceManager">Donate here</a> or use the button below.</p>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
	</div>
</div>


<?php

function DisplayAdminTabs( $current = 'options' ) {
    $tabs = array( 'options' => 'Options', 'mail' => 'Mail Templates' );
    //echo '<div id="icon-themes" class="icon32"><br></div>';
    echo '<h2 class="nav-tab-wrapper">';
    foreach( $tabs as $tab => $name ){
        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
        echo "<a class='nav-tab$class' href='?post_type=sim-invoice&page=solutions-invoice-manager-options&tab=$tab'>$name</a>";
    }
    echo '</h2>';
}

?>
