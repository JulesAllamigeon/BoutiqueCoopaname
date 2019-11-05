<?php
/*
Plugin Name: Automatic Note on Order
Plugin URI:
Description: Ajout automatique d'une note sur le reçu dès que la commande est validée.
Version: 0.1
Author: Jules Allamigeon
Author URI:
*/

add_action( 'woocommerce_thankyou', 'custom_content_thankyou', 10, 1 );
function custom_content_thankyou( $user_id ) {

	$order = new WC_Order($user_id);
	$items = $order->get_items();
	$mailDuVendeur = '';

	ob_start();
	foreach ($items as $item) {
		$product = wc_get_product($item['product_id']);
		$mailDuVendeur = $item->get_product()->get_description();
		$nomDuProduit = $item->get_product()->get_name();
		?>
		<div class="modal" tabindex="-1" role="dialog" style="margin-bottom:15px; margin-top:15px;">
			<div class="modal-dialog" role="document">wq
	  			<div class="modal-content">
	  				<h2 class="modal-title">Details de la livraison</h5>
      					<div class="modal-header" 
        					style="border: 1px solid rgba(0,0,0,.1);padding: 6px 12px; ">
      						<p style="font-weight:bold;">Pour la livraison du 
							<span style="color:#00008B; font-size:125%;"><?= $nomDuProduit ?></span>
      						<br/>Veuillez contacter le vendeur via son email : 
							<span style="font-weight:bold; color:#B22222;"><?= $mailDuVendeur ?>
      						<br/></span>
     						</p>
						</div>
	  				</div>
				</div>
  			</div>
  <?php
	}
	echo ob_get_clean();
}