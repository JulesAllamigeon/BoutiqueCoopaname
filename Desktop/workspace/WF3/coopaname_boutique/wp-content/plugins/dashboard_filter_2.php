<?php
/*
Plugin Name: Dashboard filter 
Plugin URI:
Description: Permet d'afficher dans le backoffice le champs activité Coopaname 
Version: 0.1
Author: Jules Allamigeon
Author URI:
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
function activity_column_admin_user($activities) {
    $activities['activity_coopaname'] = '<p style="border:2px solid red;color:red;padding-left:5px;" >Activité au sein de Coopaname</p>';
    return $activities;
 };

 
add_filter( 'user_contactmethods', 'activity_column_admin_user', 10, 1 );

function new_modify_user_table( $column ) {
    $column['activity_coopaname'] = 'Activité';
    return $column;
}
add_filter( 'manage_users_columns', 'new_modify_user_table' );

function new_modify_user_table_row( $val, $column, $user_id ) {
    switch ($column) {
        case 'activity_coopaname' :
            return get_the_author_meta( 'activity_coopaname', $user_id );
        default:
    }
    return $val;
}
add_filter( 'manage_users_custom_column', 'new_modify_user_table_row', 10, 3 );

