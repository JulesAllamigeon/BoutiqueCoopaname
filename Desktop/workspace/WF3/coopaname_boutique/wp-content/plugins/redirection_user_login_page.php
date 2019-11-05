<?php
/*
Plugin Name: Redirection User Login Page
Plugin URI:
Description: Permet la redirection de l'utilisateur lorsqu'il essaye de valider une commande sans être inscrit/connecté sur le site.
Version: 0.1
Author: Jules Allamigeon
Author URI:
*/


/** Gère la redirection vers la page d'inscription/connexion si l'utilisateur veut valider une commande sans etre connecté/inscrit */
add_action( 'template_redirect', 'redirect_to_specific_page' );

function redirect_to_specific_page() {

 if ( is_page('commande/') && ! is_user_logged_in() ) {

wp_redirect( 'http://localhost/coopaname_boutique/wp-login.php?action=register', 301 ); 
  exit;
     }
}
  
