<?php

namespace Elementor;

class Products_Title_Controls
{
    public function register_controls($widget)
    {

        // Title Products Style Section
        $widget->start_controls_section(
            'title_style_section', // Unique ID for widget section
            [
                'label' => __('Title Product Style', 'woocommerce_display_product'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Product Title Color
        $widget->add_control(
            'title_color',
            [
                'label' => __('Product Title Color', 'woocommerce_display_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .product-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Product Title Size
        $widget->add_control(
            'title_size',
            [
                'label' => __('Product Title Size', 'woocommerce_display_product'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 0.5,
                        'max' => 6,
                    ],
                    'rem' => [
                        'min' => 0.5,
                        'max' => 6,
                    ],
                ],
                'default' => [
                    'size' => 16,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .product-title' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $widget->end_controls_section();
    }
}
