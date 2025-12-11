=== DiscountKit – Discount Rules, Bulk Pricing & Dynamic Pricing for WooCommerce ===
Contributors: nazmunsakib
Donate link: https://nazmunsakib.com
Tags: woocommerce discount rules, woocommerce dynamic pricing, bulk discount, cart discount, product discount
Requires at least: 5.0
Tested up to: 6.9
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Create flexible WooCommerce discount rules with percentage discounts, fixed discounts, and bulk pricing options.

== Description ==

DiscountKit is a WooCommerce discount rules plugin that helps store owners create dynamic pricing and discount conditions in a clear and manageable way.

With DiscountKit, you can apply product-level discounts, cart-level discounts, or bulk pricing rules based on selected products or categories. The plugin integrates smoothly with WooCommerce and keeps discount behavior predictable and easy to control.

DiscountKit is suitable for store owners who need a simple yet flexible solution for managing WooCommerce discounts without unnecessary complexity.

= Features =

* Create unlimited WooCommerce discount rules
* Percentage-based discounts
* Fixed amount discounts
* Bulk discount and dynamic pricing support
* Product-based include and exclude rules
* Category-based include and exclude rules
* Calculate discounts from regular price or sale price
* Priority-based rule execution
* Enable or disable rules anytime
* Track discount rule usage
* WooCommerce-native admin interface

== Rule Types ==

DiscountKit supports the following rule types:

* Product Adjustment – Apply discounts directly to individual products
* Cart Adjustment – Apply discounts to the cart subtotal
* Bulk Discount – Create quantity-based pricing tiers

== Discount Types ==

Each rule supports multiple discount calculation methods:

* Percentage – Reduce prices by a percentage value
* Fixed Amount – Subtract a fixed amount from prices
* Fixed Price – Set a specific price for bulk discount tiers

== Product & Category Targeting ==

* Include specific products
* Exclude specific products
* Include entire categories
* Exclude entire categories
* Combine multiple filters for precise discount control

== Settings ==

* Choose whether discounts are calculated from regular price or sale price
* Control global discount behavior
* Reset plugin settings to default values

== Installation ==

1. Upload the plugin files to the /wp-content/plugins/discountkit/ directory, or install the plugin through the WordPress Plugins screen.
2. Activate the plugin through the Plugins menu in WordPress.
3. Ensure WooCommerce is installed and activated.
4. Navigate to WooCommerce > DiscountKit to configure your discount rules.

== Frequently Asked Questions ==

= Does this plugin require WooCommerce? =

Yes. WooCommerce must be installed and activated for DiscountKit to function.

= Can I create multiple discount rules? =

Yes. You can create unlimited discount rules and assign priorities to control which rule applies first.

= What is the difference between Rule Type and Discount Type? =

Rule Type defines where the discount applies:
- Product Adjustment
- Cart Adjustment
- Bulk Discount

Discount Type defines how the discount is calculated:
- Percentage
- Fixed Amount
- Fixed Price (bulk rules only)

= How do bulk discounts work? =

Bulk discounts allow you to create tiered pricing based on quantity ranges. For example, 1–5 items at one price and 6–10 items at a lower price. You can apply bulk discounts based on individual product quantity or combined quantities across matching products.

= Can I exclude products or categories from discounts? =

Yes. DiscountKit supports exclude rules for specific products and categories.

= What happens when multiple rules apply? =

DiscountKit uses rule priority to determine which discount is applied. Rules with lower priority values are evaluated first.

== Screenshots ==

1. Discount rules management dashboard
2. Creating a WooCommerce discount rule
3. Bulk discount tier configuration
4. DiscountKit settings page

== Changelog ==

= 1.0.0 =
* Initial release
* WooCommerce discount rules system
* Percentage discount support
* Fixed amount discount support
* Bulk discount and dynamic pricing support
* Product and category filtering
* Include and exclude logic
* Priority-based rule evaluation
* Settings management
* Discount usage tracking

== Upgrade Notice ==

= 1.0.0 =
Initial release of DiscountKit – WooCommerce Discount Rules, Bulk Discounts & Dynamic Pricing.

== Additional Information ==

For support, feature requests, or bug reports, visit:
https://github.com/nazmunsakib/discountkit