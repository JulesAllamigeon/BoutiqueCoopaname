<?php
/*
Plugin Name: Get Current User
Plugin URI:
Description: Affiche un bouton connexion lorsque l'utilisateur n'est pas connecté, sinon affiche son Nom et Prénom.
Version: 0.1
Author: Jules Allamigeon
Author URI:
*/
// Silence is golden.

/** Affiche l'identifiant du user dans la barre de widget lorsqu'il se connecte */
add_filter('widget_text', 'do_shortcode');
function show_loggedin_function( $atts ) {

    global $current_user, $user_login;
    wp_get_current_user();
    
    if ($user_login) {
        return '<div class="ClassToCenterElements"><div class="displayUsername"> Bienvenue ' . $current_user->display_name . ' !</div></div>';
    } else {
        return '<div class="ClassToCenterElements"><a class="userIsNotLogged" href="' . wp_login_url() . ' ">Connexion</a></div>';
    }
}
add_shortcode( 'show_loggedin_as', 'show_loggedin_function' );