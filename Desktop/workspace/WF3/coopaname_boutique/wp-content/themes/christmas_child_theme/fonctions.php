<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_enqueue_styles() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
			}
			add_filter('widget_text', 'do_shortcode');
			function show_loggedin_function( $atts ) {
			
				global $current_user, $user_login;
					  get_currentuserinfo();
				
				if ($user_login) 
				return 'Welcome ' . $current_user->display_name . '!';
				else
				return '<a href="' . wp_login_url() . ' ">Login</a>';
				
				}
			add_shortcode( 'show_loggedin_as', 'show_loggedin_function' );		