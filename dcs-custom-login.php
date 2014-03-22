<?php
/*
Plugin Name: DCS Custom Login
Plugin URI: http://douglasconsulting.net/
Description: A custom login wordpress plugin
Version: 1.0
Author: Jason Douglas
Author URI: http://douglasconsulting.net
License: GPL
*/

/**
 * Force login for the site. Redirect to our page. 
 */
function dcs_forceLogin()
{
	if( !is_user_logged_in() )
	{
		wp_redirect( site_url('/custom-login/') );
		exit;
	}
}
add_action( 'get_header', 'dcs_forceLogin' );


/**
 * Shortcode for our login page. 
 */
function dcs_custom_login_page_shortcode($atts, $content=null)
{
	$retval = "";

	$retval .= "<form method='post' action='".site_url("/wp-login.php")."' class='wp-user-form'>";
	$retval .= "<div class='username'>";
	$retval .= "    <label for='user_login'>Username</label>";
	$retval .= "    <input type='text' name='log' value='' size='20' id='user_login' tabindex='11' />";
	$retval .= "</div>";
	$retval .= "<div class='password'>";
	$retval .= "    <label for='user_pass'>Password</label>";
	$retval .= "    <input type='password' name='pwd' value='' size='20' id='user_pass' tabindex='12' />";
	$retval .= "</div>";
	$retval .= "<div class='login_fields'>";
	$retval .= "    <div class='rememberme'>";
	$retval .= "        <label for='rememberme'>";
	$retval .= "            <input type='checkbox' name='rememberme' value='forever' checked='checked' id='rememberme' tabindex='13' /> Remember me";
	$retval .= "        </label>";
	$retval .= "    </div>";
	$retval .= "    <?php do_action('login_form'); ?>";
	$retval .= "    <input type='submit' name='user-submit' value='Login' tabindex='14' class='user-submit' />";
	$retval .= "    <input type='Button' name='request-access' value='Request Access' tabindex='15'/>";
	$retval .= "    <input type='hidden' name='redirect_to' value='".home_url()."' />";
	$retval .= "    <input type='hidden' name='user-cookie' value='1' />";
	$retval .= "</div>";
	$retval .= "</form>";

	return $retval;
}
add_shortcode( 'dcs_custom_login_page', 'dcs_custom_login_page_shortcode' );


