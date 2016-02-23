<?php
	/*
	Plugin Name: Disposable Email Blocker
	Plugin URI:
	Description: Simply blocks a lot of disposable email domains from registering.
	Version: 0.1
	Author: Herman Slatman
	Author URI: https://hermanslatman.nl
	License: GPLv2 // to decide on
	Text Domain: Disposable Email Blocker
	*/
	
	# define text domain for translations
	define('SLATMAN_TEXT_DOMAIN', 'disposable-email-blocker');
	
	# Loading MailChecker PHP Library: https://github.com/FGRibreau/mailchecker
	require_once( plugin_dir_path( __FILE__ ) . 'lib'.DIRECTORY_SEPARATOR.'MailChecker.php');
	
	function slatman_check_email($errors, $sanitized_user_login, $user_email) {
		
		if (!MailChecker($user_email)){
			$errors->add( 'disposable_email_error', __( '<strong>ERROR</strong>: Please use a nondisposable email address to register.', SLATMAN_TEXT_DOMAIN ));
		} else {
			# do nothing...and happily continue.
		}

		return $errors;
	}
	
	add_filter( 'registration_errors', 'slatman_check_email', 10, 3 );
?>
