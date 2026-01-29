# WC Pfand Fee

WC Pfand Fee is a lightweight WooCommerce plugin that allows you to add a per-product deposit (“Pfand”) and automatically display it as a separate fee in the cart and checkout.

The deposit amount is configured individually per product and multiplied by the product quantity in the cart.

---

## ✨ Features

- Adds a **Pfand (deposit) input field** to WooCommerce products
- Calculates the deposit **per product × quantity**
- Displays the Pfand as a **separate fee** in cart & checkout
- Deposit is **not taxable by default**
- Clean and lightweight — no dependencies, no settings page
- Fully compatible with WooCommerce cart & checkout logic

---

## 🧩 How It Works

1. You define a Pfand amount (€) directly in the **Product → General** tab.
2. The plugin stores the Pfand as product meta.
3. When products are added to the cart, the Pfand is:
   - multiplied by the product quantity
   - added as a **single fee line** in the cart and checkout

---

## ⚙️ Installation

1. Download or clone this repository.
2. Upload the plugin folder to  
   `/wp-content/plugins/wc-pfand-fee/`
3. Activate **WC Pfand Fee** in the WordPress admin panel.
4. Open any WooCommerce product and set a **Pfand (€)** value.

---

## 🛒 Usage

- Go to **Products → Edit Product**
- Enter a value in the **Pfand (€)** field
- Save the product
- Add the product to the cart  
→ The Pfand will appear as a separate fee.

---

## 🔧 Filters

You can customize the fee label and tax behavior using filters:

```php
// Change fee label
add_filter('wc_pfand_fee_label', function () {
    return 'Deposit';
});

// Make Pfand taxable
add_filter('wc_pfand_fee_taxable', function () {
    return true;
});