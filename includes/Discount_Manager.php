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
		add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
		register_activation_hook( DISCOUNTKIT_PLUGIN_FILE, array( $this, 'activate' ) );
		register_deactivation_hook( DISCOUNTKIT_PLUGIN_FILE, array( $this, 'deactivate' ) );
		add_action( 'before_woocommerce_init', array( $this, 'declare_compatibility' ) );
	}

	/**
	 * Initialize plugin after all plugins are loaded
	 */
	public function plugins_loaded() {
		if ( ! $this->is_woocommerce_active() ) {
			add_action( 'admin_notices', array( $this, 'woocommerce_missing_notice' ) );
			return;
		}

		$this->init();
		$this->check_database();
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
	 * Check if WooCommerce is active
	 */
	private function is_woocommerce_active() {
		return class_exists( 'WooCommerce' );
	}

	/**
	 * Display notice if WooCommerce is not active
	 */
	public function woocommerce_missing_notice() {
		?>
		<div class="notice notice-error">
			<p><?php esc_html_e( 'DiscountKit requires WooCommerce to be installed and active.', 'discountkit' ); ?></p>
		</div>
		<?php
	}

	/**
	 * Declare compatibility with WooCommerce features
	 */
	public function declare_compatibility() {
		if ( class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', DISCOUNTKIT_PLUGIN_FILE, true );
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'cart_checkout_blocks', DISCOUNTKIT_PLUGIN_FILE, false );
		}
	}



	/**
	 * Check and repair database if needed
	 */
	private function check_database() {
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