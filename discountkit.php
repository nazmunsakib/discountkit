<?php
/**
 * Plugin Name: DiscountKit
 * Plugin URI: https://github.com/nazmunsakib/discountkit
 * Description: Create flexible WooCommerce discount rules with percentage discounts, fixed discounts, and bulk pricing options.
 * Version: 1.0.0
 * Author: Nazmun Sakib
 * Author URI: https://nazmunsakib.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: discountkit
 * Domain Path: /languages
 * Requires at least: 5.0
 * Tested up to: 6.9
 * Requires PHP: 7.4
 * Requires Plugins: woocommerce
 * WC requires at least: 5.0
 * WC tested up to: 8.5
 *
 * @package Discount_Kit
 * @author Nazmun Sakib
 * @since 1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define plugin file constant.
if ( ! defined( 'DISCOUNTKIT_PLUGIN_FILE' ) ) {
	define( 'DISCOUNTKIT_PLUGIN_FILE', __FILE__ );
}

// Include Composer autoloader.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

// Include the main class.
require_once plugin_dir_path( __FILE__ ) . 'includes/Discount_Manager.php';

/**
 * Main instance of Discount_Kit\Discount_Manager.
 *
 * @return Discount_Kit\Discount_Manager
 */
function discount_kit() {
	return Discount_Kit\Discount_Manager::instance();
}

// Initialize the plugin.
discount_kit();