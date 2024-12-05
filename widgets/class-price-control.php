<?php

namespace Elementor;

class Product_Price_Controls
{
    public function register_controls($widget)
    {
        // Price Style Section
        $widget->start_controls_section(
            'price_style_section', // Unique ID for this section
            [
                'label' => __('Price Style', 'woocommerce_display_product'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Regular Price Color
        $widget->add_control(
            'regular_price_color',
            [
                'label' => __('Regular Price Color', 'woocommerce_display_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000', // Default color
                'selectors' => [
                    '{{WRAPPER}} .regular-price' => 'color: {{VALUE}};', // Note the space at the end removed
                ],
            ]
        );

        // Regular Price Strikethrough Color
        $widget->add_control(
            'regular_price_strikethrough_color',
            [
                'label' => __('Regular Price Strikethrough Color', 'woocommerce_display_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#888888', // Default strikethrough color
                'selectors' => [
                    '{{WRAPPER}} .regular-price-discounted' => 'text-decoration: line-through; color: {{VALUE}};', // Apply strikethrough effect
                ],
            ]
        );

        // Sale Price Color
        $widget->add_control(
            'sale_price_color',
            [
                'label' => __('Sale Price Color', 'woocommerce_display_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FF0000', // Example color for sale prices
                'selectors' => [
                    '{{WRAPPER}} .sale-price' => 'color: {{VALUE}};',
                ],
            ]
        );

        $widget->end_controls_section();
    }
}
