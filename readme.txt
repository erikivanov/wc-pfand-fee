=== WC Pfand Fee ===
Contributors: erikivanov
Tags: woocommerce, deposit, pfand, fee, checkout, cart
Requires at least: 6.0
Tested up to: 6.5
Requires PHP: 8.2
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Add per-product Pfand (deposit) fees to WooCommerce and display them as a separate cart and checkout fee.

== Description ==

WC Pfand Fee is a lightweight WooCommerce plugin that allows you to add a per-product deposit ("Pfand") and automatically display it as a separate fee in the cart and checkout.

The Pfand value is defined individually for each product and multiplied by the product quantity in the cart. The resulting amount is shown as a single fee line, keeping product prices clean and transparent.

This plugin is ideal for beverage deposits, reusable packaging, bottle Pfand systems, or any scenario where a refundable deposit is required.

== Features ==

* Adds a **Pfand (€) input field** to WooCommerce products
* Calculates Pfand **per product × quantity**
* Displays Pfand as a **separate fee** in cart and checkout
* Pfand is **not taxable by default**
* Lightweight and fast — no settings page required
* Fully compatible with WooCommerce cart calculations

== Installation ==

1. Upload the plugin folder to `/wp-content/plugins/wc-pfand-fee/`
2. Activate the plugin via the WordPress admin panel
3. Edit a WooCommerce product
4. Set a value in the **Pfand (€)** field under the *General* tab

== Usage ==

1. Go to **Products → Edit Product**
2. Enter a Pfand amount (e.g. `0.25`)
3. Save the product
4. Add the product to the cart

The Pfand will automatically appear as a separate fee in the cart and checkout.

== Filters ==

You can customize the label and tax behavior using filters:

Change the fee label:
add_filter('wc_pfand_fee_label', function () {
    return 'Deposit';
});

Make the Pfand taxable:

add_filter('wc_pfand_fee_taxable', function () {
    return true;
});

== Frequently Asked Questions ==

= Is the Pfand included in the product price? =
No. The Pfand is added as a separate fee in the cart and checkout.

= Is the Pfand taxable? =
No, the Pfand is non-taxable by default. You can enable taxation via a filter.

= Does it work with variable products? =
Yes. The Pfand is applied to the selected variation if a Pfand value is set.

= Does it support refunds? =
Yes. Since the Pfand is added as a WooCommerce fee, it is included in order totals and refunds.

== Screenshots ==

1. Pfand input field in the WooCommerce product editor
2. Pfand displayed as a separate fee in the cart
3. Pfand shown in checkout totals

== Changelog ==

= 1.0.1 =
* Added required plugin woocommerce

= 1.0.0 =
* Initial release
* Per-product Pfand fee
* Cart and checkout fee integration

== Upgrade Notice ==

= 1.0.0 =
Initial release.