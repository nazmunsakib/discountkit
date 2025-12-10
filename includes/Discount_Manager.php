<?php
/**
 * Main plugin class
 *
 * @package Discount_Kit
 * @author Nazmun Sakib
 * @since 1.0.0
 */

namespace Discount_Kit;

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main Discount_Manager class
 */
class Discount_Manager {

	/**
	 * Plugin version
	 *
	 * @var string
	 */
	public $version = '1.0.0';

	/**
	 * Single instance of the class
	 *
	 * @var Discount_Manager
	 */
	protected static $_instance = null;

	/**
	 * Main instance
	 *
	 * @return Discount_Manager
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->define_constants();
		$this->init_hooks();
	}

	/**
	 * Define constants
	 */
	private function define_constants() {
		$this->define( 'DISCOUNTKIT_VERSION', $this->version );
		$this->define( 'DISCOUNTKIT_PLUGIN_BASENAME', plugin_basename( DISCOUNTKIT_PLUGIN_FILE ) );
		$this->define( 'DISCOUNTKIT_PLUGIN_PATH', plugin_dir_path( DISCOUNTKIT_PLUGIN_FILE ) );
		$this->define( 'DISCOUNTKIT_PLUGIN_URL', plugin_dir_url( DISCOUNTKIT_PLUGIN_FILE ) );
	}

	/**
	 * Define constant if not already set
	 *
	 * @param string $name Constant name.
	 * @param string|bool $value Constant value.
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}



	/**
	 * Hook into actions and filters
	 */
	private function init_hooks() {
		add_action( 'init', array( $this, 'init' ), 0 );
		add_action( 'plugins_loaded', array( $this, 'check_database' ) );
		register_activation_hook( DISCOUNTKIT_PLUGIN_FILE, array( $this, 'activate' ) );
		register_deactivation_hook( DISCOUNTKIT_PLUGIN_FILE, array( $this, 'deactivate' ) );
	}

	/**
	 * Init plugin when WordPress initializes
	 */
	public function init() {
		new REST_API();
		new Enqueue();
		new Cart_Handler();
		new Product_Display();
		
		if ( is_admin() ) {
			new Admin();
		}
	}



	/**
	 * Check and repair database if needed
	 */
	public function check_database() {
		$db_version = get_option( 'discountkit_db_version', '0' );
		
		if ( version_compare( $db_version, $this->version, '<' ) ) {
			Database::create_tables();
			Settings::init_defaults();
			update_option( 'discountkit_db_version', $this->version );
		}
	}

	/**
	 * Plugin activation
	 */
	public function activate() {
		Database::create_tables();
		Settings::init_defaults();
		update_option( 'discountkit_db_version', $this->version );
		update_option( 'discountkit_activated', time() );
	}

	/**
	 * Plugin deactivation
	 */
	public function deactivate() {
		// Placeholder for future cleanup
	}
}