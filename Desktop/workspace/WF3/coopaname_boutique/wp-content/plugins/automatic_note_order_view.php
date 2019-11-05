<?php
/*
Plugin Name: Automatic Note on Order View
Plugin URI:
Description: Ajout automatique d'une note sur le résumé de la commande.
Version: 0.1
Author: Jules Allamigeon
Author URI:
*/
add_action('woocommerce_order_details_after_order_table', 'action_order_details_after_order_table', 10, 4 );
function action_order_details_after_order_table( $user_id ) {
    
    $order = new WC_Order($user_id);
    $items = $order->get_items();
	$mailDuVendeur = '';


    if ( is_wc_endpoint_url( 'view-order' ) ) {

    ob_start();
  
        foreach ($items as $item) {
        $product = wc_get_product($item['product_id']);
		$mailDuVendeur = $item->get_product()->get_description();
        $nomDuProduit = $item->get_product()->get_name();
        $photoDuProduit = $item->get_product()->get_image();
        $attributDuProduit = $item->get_product()->get_attribute('pa_nom-coopanamien');
        
        ?>
        
        
        
        <div class="modal" tabindex="-1" role="dialog"
         style="margin-bottom:15px; margin-top:15px;">
		    <div class="modal-dialog" role="document">
	  	        <div class="modal-content">
	  	            <h2 class="modal-title">Details de la livraison</h5>
                    <div class="modal-header orderViewDiv"style="border: 1px solid rgba(0,0,0,.1);padding: 6px 12px; "> 
                        
                            <div class=" leftOrder">
                                <p class="productOrderView" style="font-weight:bold;">Pour la livraison du : <span style="font-weight:bold;color:#00008B; font-size:125%" ><?=$nomDuProduit ?></span><br/>
                                Vendu par : <span  style="font-weight:bold; color:#EA5527;"><?= $attributDuProduit ?></span>
                            </p>  
                            </div>
                            <div class="rightOrder">
                                  <p><?= $photoDuProduit ?></p>  
                            </div>
                                
                            <div class="bottomOrder" style="font-weight:bold;">
                            Veuillez contacter le vendeur via son email : <span style="font-weight:bold; color:#B22222;"><?= $mailDuVendeur ?></span>   
                            </div>
        

		            </div>
	            </div>
	        </div>
        </div>
  
  <?php
    echo ob_get_clean();
        }
    }
    
   
}