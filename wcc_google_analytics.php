<?php
/**
* Plugin Name: WCC Google Analytics
* Description: WCC Google Analytics Plugin by We Connect Code.
* Version: 1.0.0
* Author: WeConnectCode
**/
global $google_analytics_db_version;
$google_analytics_db_version = '1.0';
register_activation_hook( __FILE__, 'google_analytics_plugin_install' );
register_deactivation_hook( __FILE__, "google_analytics_plugin_deactivated");
function google_analytics_myplugin_update_db_check() {
    global $google_analytics_db_version;
    if ( get_site_option( 'google_analytics_db_version' ) != $google_analytics_db_version ) {
        google_analytics_plugin_install();
    }
}
function google_analytics_plugin_install() {
	global $wpdb;
	global $google_analytics_db_version;
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	add_option( 'google_analytics_db_version', $google_analytics_db_version );
}
function google_analytics_plugin_deactivated()
{
	global $wpdb;

	$url = "https://crmentries.com/marketing_plugins/api/deleteWebsite";
	$api_key = get_option("google_analytics_api_key");
	$request = array(
		"website" => get_home_url(),
		"api_key" => $api_key,
	);
	$api_response = wp_remote_post($url,array(
		    'method'      => 'POST',
		    'timeout'     => 45,
		    'redirection' => 5,
		    'httpversion' => '1.0',
		    'blocking'    => true,
		    'headers'     => array(),
		    'body'        => $request,
		    'cookies'     => array()
	));
	if(isset($_SESSION['google_analytics_api_key_checked'])){
		unset($_SESSION['google_analytics_api_key_checked']);
	}
	delete_site_option( 'google_analytics_db_version' );
	delete_site_option( 'google_analytics_api_key' );
	delete_site_option( 'google_analytics_auth' );
	delete_site_option( 'google_analytics_client_id' );
	delete_site_option( 'google_analytics_client_secret' );
}
add_action( 'plugins_loaded', 'google_analytics_myplugin_update_db_check' );
add_action('admin_menu', 'google_analytics_main_menu');


function google_analytics_main_menu(){
    add_menu_page( 'WCC Google Analytics', 'WCC Google Analytics', 'manage_options', 'wcc-google-analytics', 'wcc_google_analytics_menu_fun' );
    add_submenu_page( 'wcc-google-analytics', 'Setting', 'Setting', 'manage_options', 'wcc-google-analytics-setting', "wcc_google_analytics_dashboard_fun");
}
function wcc_google_analytics_menu_fun(){
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['generate_api'])) {
		$url = "https://crmentries.com/marketing_plugins/api/addWebsite";
		$api_key = get_option("google_analytics_api_key");
		$request = array(
			"website" => get_home_url(),
			"plugin" => "WCC Google Analytics Dashboard",
			"first_name" => (isset($_POST['first_name']) ? sanitize_text_field($_POST['first_name']) : ""),
			"last_name" => (isset($_POST['last_name']) ? sanitize_text_field($_POST['last_name']) : ""),
			"email" => (isset($_POST['email']) ? sanitize_text_field($_POST['email']) : ""),
			"contact_no" => (isset($_POST['contact_no']) ? sanitize_text_field($_POST['contact_no']) : ""),
		);
		$api_response = wp_remote_post($url,array(
			    'method'      => 'POST',
			    'timeout'     => 45,
			    'redirection' => 5,
			    'httpversion' => '1.0',
			    'blocking'    => true,
			    'headers'     => array(),
			    'body'        => $request,
			    'cookies'     => array()
		));
		$api_response = isset($api_response['body']) && $api_response['body'] ? json_decode($api_response['body'],1) : array();

		if(isset($api_response['success']) && $api_response['success']){
			$_SESSION['google_analytics_api_key_success'] = "1";
			update_option("google_analytics_api_key",sanitize_text_field($api_response['success']));
		}else{
			$_SESSION['error_message'] = "Something Wrong Try Again.";
		}
	}
	if(isset($_SESSION['google_analytics_api_key_success'])){
		unset($_SESSION['google_analytics_api_key_success']);
		require_once(plugin_dir_path( __FILE__ ) .'includes/api_key_success.php');
	}else{
		if(isset($_SESSION['google_analytics_api_key_checked']) && $_SESSION['google_analytics_api_key_checked']){
			require_once(plugin_dir_path( __FILE__ ) .'includes/dashboard.php');
		}else{
			$url = "https://crmentries.com/marketing_plugins/api/getWebsite";
			$api_key = get_option("google_analytics_api_key");
			$request = array(
				"website" => get_home_url(),
				"api_key" => $api_key,
			);
			$api_response = wp_remote_post($url,array(
				    'method'      => 'POST',
				    'timeout'     => 45,
				    'redirection' => 5,
				    'httpversion' => '1.0',
				    'blocking'    => true,
				    'headers'     => array(),
				    'body'        => $request,
				    'cookies'     => array()
			));
			$api_response = isset($api_response['body']) && $api_response['body'] ? json_decode($api_response['body'],1) : array();
			if(isset($api_response['success']) && $api_response['success']){
				$_SESSION['google_analytics_api_key_checked'] = 1;
		    	require_once(plugin_dir_path( __FILE__ ) .'includes/dashboard.php');
			}else{
		    	require_once(plugin_dir_path( __FILE__ ) .'includes/getApiKey.php');
			}
		}
	}
}
function wcc_google_analytics_start_session() {
	if(!session_id()) {
	session_start();
	}
}
add_action('init', 'wcc_google_analytics_start_session', 1);


function wcc_google_analytics_dashboard_fun(){
	if(isset($_SESSION['google_analytics_api_key_success'])){
		unset($_SESSION['google_analytics_api_key_success']);
		require_once(plugin_dir_path( __FILE__ ) .'includes/google_analytics_api_key_success.php');
	}else{
		if(isset($_SESSION['google_analytics_api_key_checked']) && $_SESSION['google_analytics_api_key_checked']){
			require_once(plugin_dir_path( __FILE__ ) .'includes/setting.php');
		}else{
			$url = "https://crmentries.com/marketing_plugins/api/getWebsite";
			$api_key = get_option("google_analytics_api_key");
			$request = array(
				"website" => get_home_url(),
				"api_key" => $api_key,
			);
			$api_response = wp_remote_post($url,array(
				    'method'      => 'POST',
				    'timeout'     => 45,
				    'redirection' => 5,
				    'httpversion' => '1.0',
				    'blocking'    => true,
				    'headers'     => array(),
				    'body'        => $request,
				    'cookies'     => array()
			));
			$api_response = isset($api_response['body']) && $api_response['body'] ? json_decode($api_response['body'],1) : array();
			if(isset($api_response['success']) && $api_response['success']){
				$_SESSION['google_analytics_api_key_checked'] = 1;
		    	require_once(plugin_dir_path( __FILE__ ) .'includes/setting.php');
			}else{
		    	require_once(plugin_dir_path( __FILE__ ) .'includes/getApiKey.php');
			}
		}
	}
}

add_action( 'admin_init','wcc_google_analytics_snippet_css');
function wcc_google_analytics_snippet_css() {
    
}

function my_admin_enqueue($hook_suffix) {
    if($hook_suffix == 'toplevel_page_wcc-google-analytics' || $hook_suffix == 'wcc-google-analytics_page_wcc-google-analytics-setting') {
        wp_register_style('wcc_google_analytics_snippet_css', plugins_url('style.css',__FILE__ ));
    	wp_enqueue_style('wcc_google_analytics_snippet_css');

        wp_register_style('wcc_google_analytics_datepickercss', plugins_url('css/daterangepicker.css',__FILE__ ));
    	wp_enqueue_style('wcc_google_analytics_datepickercss');

    	wp_enqueue_script('wcc_google_analytics_moment_js', plugins_url('js/moment.min.js',__FILE__ ));
    	wp_enqueue_script('wcc_google_analytics_datepicker', plugins_url('js/daterangepicker.js',__FILE__ ));

    }
}
add_action('admin_enqueue_scripts', 'my_admin_enqueue');

function google_analytics_GetAccessToken($client_id, $redirect_uri, $client_secret, $code) {	
	$url = 'https://accounts.google.com/o/oauth2/token';
	$request = array(
		"client_id" => $client_id,
		"redirect_uri" => $redirect_uri,
		"client_secret" => $client_secret,
		"code" => $code,
		"grant_type" => "authorization_code",
	);
	$api_response = wp_remote_post($url,array(
		    'method'      => 'POST',
		    'timeout'     => 45,
		    'redirection' => 5,
		    'httpversion' => '1.0',
		    'blocking'    => true,
		    'headers'     => array(),
		    'body'        => $request,
		    'cookies'     => array()
	));

	if ( is_wp_error( $api_response ) ) {
		$_SESSION['error_message'] = "Error : Failed to receieve access token";
		header("location: ".admin_url('admin.php?page=wcc-google-analytics') );die;
	}else{		
		return isset($api_response['body']) && $api_response['body'] ? json_decode($api_response['body'],1) : array();
	}
}

function google_analytics_GetRefreshToken($client_id, $client_secret, $code) {
	$url = 'https://accounts.google.com/o/oauth2/token';
	$request = array(
		"client_id" => $client_id,
		"client_secret" => $client_secret,
		"refresh_token" => $code,
		"grant_type" => "refresh_token",
	);
	$api_response = wp_remote_post($url,array(
		    'method'      => 'POST',
		    'timeout'     => 45,
		    'redirection' => 5,
		    'httpversion' => '1.0',
		    'blocking'    => true,
		    'headers'     => array(),
		    'body'        => $request,
		    'cookies'     => array()
	));

	if ( is_wp_error( $api_response ) ) {
		$_SESSION['error_message'] = "Error : Failed to receieve access token";
		header("location: ".admin_url('admin.php?page=wcc-google-analytics') );die;
	}else{		
		return isset($api_response['body']) && $api_response['body'] ? json_decode($api_response['body'],1) : array();
	}
}


function google_analytics_init(){
	if(isset($_GET['code'])){
		$client_id = get_option("google_analytics_client_id");
		$client_secret = get_option("google_analytics_client_secret");
		$redirect_uri = get_home_url();
		$data = google_analytics_GetAccessToken($client_id, $redirect_uri, $client_secret, $_GET['code']);
		if($data){
			update_option("google_analytics_auth",$data);
		}
		header("location: ".admin_url('admin.php?page=wcc-google-analytics') );
	}
}
add_action( 'init','google_analytics_init');

