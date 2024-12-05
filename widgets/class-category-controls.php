<?php

namespace Elementor;

class Products_Category_Controls
{
    public function register_controls($widget)
    {

        // Category Style Section
        $widget->start_controls_section(
            'category_style_section', // Unique ID for widget section
            [
                'label' => __('Category Style', 'woocommerce_display_product'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Category Color
        $widget->add_control(
            'category_color',
            [
                'label' => __('Category Color', 'woocommerce_display_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#888888', // Default color
                'selectors' => [
                    '{{WRAPPER}} .product-category' => 'color: {{VALUE}};',
                ],
            ]
        );

        $widget->end_controls_section();
    }
}
