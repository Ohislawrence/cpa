<?php
/*
Plugin Name: WooCommerce URL Webhook Plugin
Description: Associates a URL value with a purchase and sends a success response to a webhook on order completion.
Version: 1.3
Author: Your Name
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Admin menu, settings registration, and form rendering (unchanged)
add_action('admin_menu', 'wc_add_admin_menu');
add_action('admin_init', 'wc_register_settings');

function wc_add_admin_menu() {
    add_menu_page(
        'WC URL Webhook Settings',
        'WC Webhook Settings',
        'manage_options',
        'wc-webhook-settings',
        'wc_webhook_settings_page',
        'dashicons-admin-generic'
    );
}

function wc_webhook_settings_page() {
    ?>
    <div class="wrap">
        <h1>WC URL Webhook Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('wc_webhook_settings_group');
            do_settings_sections('wc-webhook-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function wc_register_settings() {
    register_setting('wc_webhook_settings_group', 'wc_webhook_url');
    register_setting('wc_webhook_settings_group', 'wc_secret_key');

    add_settings_section(
        'wc_webhook_settings_section',
        'Webhook Configuration',
        'wc_webhook_settings_section_callback',
        'wc-webhook-settings'
    );

    add_settings_field(
        'wc_webhook_url',
        'Webhook URL',
        'wc_webhook_url_render',
        'wc-webhook-settings',
        'wc_webhook_settings_section'
    );

    add_settings_field(
        'wc_secret_key',
        'Secret Key',
        'wc_secret_key_render',
        'wc-webhook-settings',
        'wc_webhook_settings_section'
    );
}

function wc_webhook_settings_section_callback() {
    echo 'Enter the details for your webhook integration.';
}

function wc_webhook_url_render() {
    $webhook_url = get_option('wc_webhook_url');
    ?>
    <input type="text" name="wc_webhook_url" value="<?php echo esc_attr($webhook_url); ?>" style="width: 100%;" />
    <?php
}

function wc_secret_key_render() {
    $secret_key = get_option('wc_secret_key');
    ?>
    <input type="text" name="wc_secret_key" value="<?php echo esc_attr($secret_key); ?>" style="width: 100%;" />
    <?php
}

// Send webhook on order completion with product IDs
add_action('woocommerce_order_status_completed', 'wc_send_webhook_on_order_complete', 10, 1);

function wc_send_webhook_on_order_complete($order_id) {
    $order = wc_get_order($order_id);

    // Get the product price and custom value from the order meta data
    $custom_value = $order->get_meta('custom_value');
    $order_total = $order->get_total();
    
    // Retrieve the webhook URL and secret key from settings
    $webhook_url = get_option('wc_webhook_url');
    $secret_key = get_option('wc_secret_key');

    // Get product IDs
    $product_ids = [];
    foreach ($order->get_items() as $item_id => $item) {
        $product_ids[] = $item->get_product_id();
    }

    // Prepare the data to send to the webhook
    $data = array(
        'price' => $order_total,
        'custom_value' => $custom_value,
        'product_ids' => $product_ids,
        'secret_key' => $secret_key,
    );

    // Send the data to the webhook URL
    if ($webhook_url) {
        $response = wp_remote_post($webhook_url, array(
            'method'    => 'POST',
            'body'      => json_encode($data),
            'headers'   => array('Content-Type' => 'application/json'),
        ));
        
        // Optionally, handle the response from the webhook
        if (is_wp_error($response)) {
            error_log('Webhook failed: ' . $response->get_error_message());
        } else {
            error_log('Webhook succeeded: ' . wp_remote_retrieve_body($response));
        }
    }
}
