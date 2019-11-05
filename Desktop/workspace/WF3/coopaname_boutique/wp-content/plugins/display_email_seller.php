<?php
/*
Plugin Name: Display email seller
Plugin URI:
Description: Affichage de(s) email(s) du vendeur dans le dashboard des commandes
Version: 0.1
Author: Jules Allamigeon
Author URI:
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

add_filter( 'manage_edit-shop_order_columns', 'custom_shop_order_column', 20 );
function custom_shop_order_column($columns)
{
    $reordered_columns = array();

   
    foreach( $columns as $key => $column){
        $reordered_columns[$key] = $column;
        if( $key ==  'order_status' ){
            
            $reordered_columns['email_vendeur'] = __( 'Email(s) du vendeur','theme_domain');
        }
    }
    return $reordered_columns;
}

add_action( 'manage_shop_order_posts_custom_column' , 'custom_orders_list_column_content', 20, 2 );
function custom_orders_list_column_content( $column, $user_id )
{

    
    $order = new WC_Order($user_id);
    $items = $order->get_items();
    $mailDuVendeur = '';
    
    switch ( $column )
    {
        case 'email_vendeur' :
			
            foreach($items as $item) {
                $product = wc_get_product($item['product_id']);
                echo $mailDuVendeur = $item->get_product()->get_description() . '</br>' ;
              
            }
			break;
    }
    
}



function add_multiple_email_recipients($recipient, $object) {
    $recipient = $recipient . ', ' . $mailDuVendeur;
    return $recipient;
}
add_filter( 'woocommerce_email_recipient_customer_completed_order', 'add_multiple_email_recipients', 10, 2);
 

