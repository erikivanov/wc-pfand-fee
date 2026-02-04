<?php
/**
 * Plugin Name: Pfand Plus
 * Description: Adds per-product Pfand fees as a separate checkout fee.
 * Requires Plugins: woocommerce
 * Version: 1.0.2
 * Author: Erik Ivanov
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('woocommerce_product_options_general_product_data', function () {
    woocommerce_wp_text_input([
        'id'          => '_pfand_fee',
        'label'       => 'Pfand (€)',
        'description' => 'Pfand pro Stuck fur dieses Produkt.',
        'desc_tip'    => true,
        'type'        => 'number',
        'custom_attributes' => [
            'step' => '0.01',
            'min'  => '0',
        ],
    ]);
});

add_action('woocommerce_process_product_meta', function ($product_id) {
    $value = isset($_POST['_pfand_fee']) ? wc_format_decimal(wp_unslash($_POST['_pfand_fee'])) : '';

    if ($value === '' || $value <= 0) {
        delete_post_meta($product_id, '_pfand_fee');
        return;
    }

    update_post_meta($product_id, '_pfand_fee', $value);
});

add_action('woocommerce_cart_calculate_fees', function () {
    if (is_admin() && !defined('DOING_AJAX')) {
        return;
    }

    if (!WC()->cart) {
        return;
    }

    $pfand_total = 0.0;

    foreach (WC()->cart->get_cart() as $cart_item) {
        if (empty($cart_item['data'])) {
            continue;
        }

        $product = $cart_item['data'];
        $pfand_fee = (float) $product->get_meta('_pfand_fee', true);

        if ($pfand_fee <= 0) {
            continue;
        }

        $quantity = isset($cart_item['quantity']) ? (int) $cart_item['quantity'] : 0;
        $pfand_total += $pfand_fee * $quantity;
    }

    if ($pfand_total <= 0) {
        return;
    }

    $label = apply_filters('wc_pfand_fee_label', 'Pfand');
    $taxable = apply_filters('wc_pfand_fee_taxable', false);

    WC()->cart->add_fee($label, $pfand_total, $taxable);
});
