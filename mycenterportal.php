<?php
/*
Plugin Name: MyCenterPortal
Plugin URI: https://eyeonllc.com/
Description: Show Deals, Stores & Events of a Center from mycenterportal.com portal.
Version: 0.0.10
Author: EyeOn LLC
Author URI: https://eyeonllc.com/
Licence: GPLv2 or later
*/

require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/eyeonllc-wp-plugins/mycenterportal',
	__FILE__,
	'mycenterportal'
);
$myUpdateChecker->setBranch('master');
// $myUpdateChecker->setAuthentication('token_here');


defined('MCD_REDUX_OPT_NAME')		OR define( 'MCD_REDUX_OPT_NAME', 'mcd_settings' );
// date_default_timezone_set(wp_timezone_string());

if( !defined('ABSPATH') ) die();
$mcd_settings = get_option(MCD_REDUX_OPT_NAME);

// Common Constants
define( 'MCD_PLUGIN_NAME', 'mycenterdeals' );
define( 'MCD_PLUGIN_TITLE', 'My Center Portal' );
define( 'MCD_PLUGIN', plugin_basename( __FILE__ ) );
define( 'MCD_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'MCD_PLUGIN_URL', plugins_url( '', __FILE__ ).'/' );

$plugin_data = get_file_data(MCD_PLUGIN_PATH.'mycenterportal.php', array("version"=>"Version"));
define('MCD_PLUGIN_VERSION', $plugin_data['version']);

// API to get data from mycenterdeals portal
$api_base_url = 'https://mycenterportal.com/';
if( isset($mcd_settings['mcd_site_mode']) ) {
	if( $mcd_settings['mcd_site_mode'] == 'dev' ) {
		$api_base_url = 'https://test.mycenterdeals.com/';
	} elseif( $mcd_settings['mcd_site_mode'] == 'local' ) {
		$api_base_url = 'https://staging.mycenterportal.test/';
	}
}
defined('API_BASE_URL')				OR define( 'API_BASE_URL', $api_base_url );

defined('MCD_API_CENTERS')			OR define( 'MCD_API_CENTERS', API_BASE_URL . 'api/centers' );

defined('MCD_API_DEALS')			OR define( 'MCD_API_DEALS', API_BASE_URL . 'api/dealsAll' );
defined('MCD_API_DEAL')				OR define( 'MCD_API_DEAL', API_BASE_URL . 'api/deal' );
defined('MCD_API_RETAILER_DEALS')	OR define( 'MCD_API_RETAILER_DEALS', API_BASE_URL . 'api/deals' );

defined('MCD_API_STORES')			OR define( 'MCD_API_STORES', API_BASE_URL . 'api/retailers' );
defined('MCD_API_STORE')			OR define( 'MCD_API_STORE', API_BASE_URL . 'api/retailer' );
defined('MCD_API_CATEGORIES')		OR define( 'MCD_API_CATEGORIES', API_BASE_URL . 'api/retailers/categories' );

defined('MCD_API_EVENTS')			OR define( 'MCD_API_EVENTS', API_BASE_URL . 'api/eventsAll' );
defined('MCD_API_EVENT')			OR define( 'MCD_API_EVENT', API_BASE_URL . 'api/event' );

defined('MCD_API_CAREERS')			OR define( 'MCD_API_CAREERS', API_BASE_URL . 'api/careersAll' );
defined('MCD_API_CAREER')			OR define( 'MCD_API_CAREER', API_BASE_URL . 'api/career' );

defined('MCD_API_BLOG_POSTS')		OR define( 'MCD_API_BLOG_POSTS', API_BASE_URL . 'api/blogposts' );
defined('MCD_API_BLOG_POST')		OR define( 'MCD_API_BLOG_POST', API_BASE_URL . 'api/blogposts/details' );

defined('MCD_API_MAP_CONFIG')		OR define( 'MCD_API_MAP_CONFIG', API_BASE_URL . 'api/mapit2/config' );

defined('MCD_API_SEARCH')			OR define( 'MCD_API_SEARCH', API_BASE_URL . 'api/search' );

defined('MCD_INSTAGRAM_POSTS')		OR define( 'MCD_INSTAGRAM_POSTS', API_BASE_URL . 'api/instagram/posts' );
defined('MCD_INSTAGRAM_POSTS_COUNT')OR define( 'MCD_INSTAGRAM_POSTS_COUNT', 30 );

defined('MCD_OPENING_HOURS_WEEK')	OR define( 'MCD_OPENING_HOURS_WEEK', API_BASE_URL . 'api/opening-hours/week' );
defined('MCD_OPENING_HOURS_TODAY')	OR define( 'MCD_OPENING_HOURS_TODAY', API_BASE_URL . 'api/opening-hours/today' );

defined('MCP_SHARERAILS_RETAILERS')	OR define( 'MCP_SHARERAILS_RETAILERS', API_BASE_URL . 'api/sharerails/featured-retailers' );
defined('MCP_SHARERAILS_RETAILER')	OR define( 'MCP_SHARERAILS_RETAILER', API_BASE_URL . 'api/sharerails/get-retailer' );

defined('MCP_API_LINKS')			OR define( 'MCP_API_LINKS', API_BASE_URL.'api/links' );

defined('MCP_CURRENCY')				OR define( 'MCP_CURRENCY', $mcd_settings['sharerails_currency'] );

add_theme_support( 'title-tag' );


// Common functions
require_once MCD_PLUGIN_PATH . 'inc/functions.php';

// Plugin Registration
require_once MCD_PLUGIN_PATH . 'inc/Plugin.php';

if ( is_admin() ) {
	// Backend Settings page
	require_once MCD_PLUGIN_PATH . 'inc/Admin.php';
}

// if ( !is_admin() && !wp_is_json_request() ) {
	// Frontend Shortcodes
	require_once MCD_PLUGIN_PATH . 'inc/Shortcodes.php';
// }
