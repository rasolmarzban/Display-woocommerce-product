<?php

/**
 * Plugin Name: Elementor WooCommerce Product Widget
 * Description: Custom Elementor widget to display WooCommerce products.
 * Version: 1.0
 * Author: Your Name
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function register_elementor_woocommerce_product_widget($widgets_manager)
{
    require_once(__DIR__ . '/widgets/class-woocommerce-products-widget.php');
    define('WPPD_PATH', plugin_dir_path(__FILE__));
    define('WPPD_URL', plugin_dir_url(__FILE__));
    $widgets_manager->register(new \Elementor\WooCommerce_Products_Widget()); // Notice the namespace prefix
}
add_action('elementor/widgets/register', 'register_elementor_woocommerce_product_widget');

function enqueue_elementor_widget_scripts()
{
    // Enqueue CSS files
    wp_enqueue_style('bootstrap', plugins_url('css/bootstrap.min.css', __FILE__));
    wp_enqueue_style('main', plugins_url('css/main.css', __FILE__));
    wp_enqueue_style('glightbox', plugins_url('css/glightbox.min.css', __FILE__));
    wp_enqueue_style('LineIcons', plugins_url('css/LineIcons.3.0.css', __FILE__));
    wp_enqueue_style('tiny-slider', plugins_url('css/tiny-slider.css', __FILE__));

    // Enqueue JavaScript files
    wp_enqueue_script('bootstrap', plugins_url('js/bootstrap.min.js', __FILE__), ('jquery'), true);
    wp_enqueue_script('glightbox', plugins_url('js/glightbox.min.js', __FILE__), ('jquery'), true);
    wp_enqueue_script('main', plugins_url('js/main.js', __FILE__), ('jquery'), true);
    wp_enqueue_script('tiny-slider', plugins_url('js/tiny-slider.js', __FILE__), ('jquery'), true);
}
add_action('wp_enqueue_scripts', 'enqueue_elementor_widget_scripts');
