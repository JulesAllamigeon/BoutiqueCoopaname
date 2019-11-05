<?php
/*
Plugin Name: Custom Registration Field
Plugin URI:
Description: Permet d'ajouter le champs Activite Coopaname dans le formulaire d'inscription
Version: 0.1
Author: Jules Allamigeon
Author URI:
*/

/**  Ajout du champs Activité dans le formulaire d'inscription  */
add_action( 'register_form', 'crf_registration_form' );
function crf_registration_form() {

    $activity = ! empty( $_POST['activity_coopaname'] ) ? strval( $_POST['activity_coopaname'] ) : '';
    
    ?>
    <p>
        <label   for="activity_coopaname"><?php esc_html_e( 'Activité au sein de Coopaname') ?><br/>
            <input type="text"
                   id="activity_coopaname"
                   name="activity_coopaname"
				   value="<?php echo esc_attr( $activity ); ?>"
                   class="input"     
            />
        </label>
    </p>
    <?php
}



/** Gestion des erreurs dans le formulaire d'inscription */
add_filter( 'registration_errors', 'crf_registration_errors', 10, 3);
function crf_registration_errors( $errors, $user_login, $user_email ) {

    if (  empty( $_POST['activity_coopaname'] ) ) {
        $errors->add( 'activity_coopaname', __( '<strong>ERROR</strong>: Veuillez renseigner votre activité au sein de Coopaname.', 'crf' ) );
    }
    return $errors;
}


add_action( 'user_register', 'crf_user_register' );
function crf_user_register( $user_id ) {
    if ( ! empty( $_POST['activity_coopaname'] ) ) {
        update_user_meta( $user_id, 'activity_coopaname', strval( $_POST['activity_coopaname'] ) );
    }
}

/** Affichage du champs dans le dashboard Admin */
add_action( 'user_new_form', 'crf_admin_registration_form' );
function crf_admin_registration_form( $operation ) {
    if ( 'add-new-user' !== $operation ) {
        // $operation may also be 'add-existing-user'
        return;
    }

    $activity = ! empty( $_POST['activity_coopaname'] ) ? strval( $_POST['activity_coopaname'] ) : '';

    ?>
    <h3 ><?php esc_html_e( 'Informations Coopérateur', 'crf' ); ?></h3>

    <table class="form-table">
        <tr>
            <th><label for="activity_coopaname"><?php esc_html_e( 'Activité Coopaname', 'crf' ); ?></label> <span class="description"></span></th>
            <td>
                <input type="text"
                   id="activity_coopaname"
                   name="activity_coopaname"
                   value="<?php echo esc_attr( $activity ); ?>"
                   class="input "
                />
            </td>
        </tr>
    </table>
    <?php
}



/** Gère la modification du profil dans le backoffice */
add_action( 'user_profile_update_errors', 'crf_user_profile_update_errors', 10, 3 );
function crf_user_profile_update_errors( $errors, $update, $user ) {
    if ( $update ) {
        return;
    }

    if ( empty( $_POST['activity_coopaname'] ) ) {
        $errors->add( 'activity_coopaname_error', __( '<strong>ERROR</strong>: Veuillez renseigner une activité' ) );
    }
    
}

add_action( 'edit_user_created_user', 'crf_user_register' );



