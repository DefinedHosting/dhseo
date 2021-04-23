<?php
/*
Plugin Name: Defined Hosting | All-in-one SEO
Plugin URI: http://www.definedhosting.co.uk/plugins
Description: Out-of-the-box SEO for WordPress. Features like XML Sitemaps, SEO for custom post types, SEO for blogs or business sites, SEO for ecommerce sites, and much more.
Author: R. Cush
Version: 1.0.3
Author URI: https://www.definedhosting.co.uk
GitHub Plugin URI: DefinedHosting/dhseo
GitHub Plugin URI: https://github.com/DefinedHosting/dhseo
*/

/*
Based upon DH SEO 3.7.1, https://semperplugins.com
*/

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

if ( ! defined( 'DHSEO_PLUGIN_DIR' ) ) {
	/**
	 * Plugin Directory
	 *
	 * @since 3.4
	 *
	 * @var string $DHSEO_PLUGIN_DIR Plugin folder directory path. Eg. `C:\WebProjects\UW-WPDev-aioseop\src-plugins/DH-SEO-pack/`
	 */
	define( 'DHSEO_PLUGIN_DIR', dirname( __FILE__ ).'/' );
}
define( 'DHSEOPRO', false );

if ( ! defined( 'DHSEO_PLUGIN_FILE' ) ) {

	/**
	 * Plugin File
	 *
	 * @since 3.4
	 *
	 * @var string $AIOSEOP_PLUGIN_FILE Plugin folder directory path. Eg. `C:\WebProjects\UW-WPDev-aioseop\src-plugins/DH-SEO-pack/`
	 */
	define( 'DHSEO_PLUGIN_FILE', __FILE__ );
}

if ( ! class_exists( 'AIOSEOP_Core' ) ) {
	require_once plugin_dir_path( __FILE__ ) . 'class-aioseop-core.php';
	global $aioseop_core;
	if ( is_null( $aioseop_core ) ) {
		$aioseop_core = new AIOSEOP_Core();
	}
}
