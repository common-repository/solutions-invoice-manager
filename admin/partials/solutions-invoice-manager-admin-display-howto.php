<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://solutionsbysteve.com
 * @since      0.1.0
 *
 * @package    Solutions_Invoice_Manager
 * @subpackage Solutions_Invoice_Manager/admin/partials
 */

 if( !( is_user_logged_in() && current_user_can('manage_options') ) ){ die("You do not have permission to be here."); }

?>

<div class="wrap solutions-invoice-manager" id="how-to">
	<h1>Solutions Invoice Manager v<?php echo $this->version; ?></h1>
	<p><strong>by: <a href="http://solutionsbysteve.com">Solutions by Steve</a></strong></p>
	<div class="postbox">
		<h2>How to use Solutions Invoice Manager</h2>
		<ol>
			<li><a href="<?php echo get_admin_url(NULL, 'edit-tags.php?taxonomy=sim-payee&post_type=sim-invoice'); ?>">Create a Payee</a></li>
			<li><a href="<?php echo get_admin_url(NULL, 'edit-tags.php?taxonomy=sim-client&post_type=sim-invoice'); ?>">Create a Client</a></li>
			<li><a href="<?php echo get_admin_url(NULL, 'post-new.php?post_type=sim-invoice'); ?>">Create an Invoice</a></li>
		</ol>
	</div>
	<div class="postbox">
		<h3 class="title">How to backup your invoices</h3>
		<p>Invoices can be backed up by using the <a href="<?php echo get_admin_url(NULL, 'export.php'); ?>">Export</a> feature that comes with WordPress. And if you need to restore them use the <a href="<?php echo get_admin_url(NULL, 'import.php'); ?>">Import</a> feature that comes with Wordpress.</p>
	</div>
	<div class="postbox">
		<h3 class="title">How to make feature requests</h3>
		<p>If you would like to make requests for specific features please feel free to do so at <a href="http://solutionsbysteve.com/contact/">http://solutionsbysteve.com/contact/</a> Remember, these are simply requests and no guarantee that it will fit in to the scope of the plugin but will absolutely be taken into consideration. </p>
	</div>
	<div class="postbox">
		<h3 class="title">How to Donate</h3>
		<p>Donations are the foundation of this plugin, without them it will cease to exist. Thank you for your consideration and it is truly appreciated. <a href="http://bit.ly/Donate-SolutionsInvoiceManager">Donate here</a> or use the button below.</p>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
			<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
	</div>
</div>
