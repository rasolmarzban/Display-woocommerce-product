<?php

namespace Elementor;

class Add_To_Cart_Btn_Controls
{
    public function register_controls($widget)
    {
        // Button Style Section
        $widget->start_controls_section(
            'button_style_section', // Unique ID for widget section
            [
                'label' => __('Button Style', 'woocommerce_display_product'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Text Color Control
        $widget->add_control(
            'button_text_color', // Control ID
            [
                'label' => __('Text Color', 'woocommerce_display_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff', // Default text color
                'selectors' => [
                    '{{WRAPPER}} .single-product .product-image .button .btn' => 'color: {{VALUE}};', // Use your button CSS class
                ],
            ]
        );

        // Background Color Control
        $widget->add_control(
            'button_background_color', // Control ID
            [
                'label' => __('Background Color', 'woocommerce_display_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#007cba', // Default background color
                'selectors' => [
                    '{{WRAPPER}} .single-product .product-image .button .btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Text Size Control
        $widget->add_control(
            'button_text_size', // Control ID
            [
                'label' => __('Text Size', 'woocommerce_display_product'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 16, // Default text size
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-product .product-image .button .btn' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Hover Text Color
        $widget->add_control(
            'button_hover_text_color', // Control ID
            [
                'label' => __('Hover Text Color', 'woocommerce_display_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff', // Default hover text color
                'selectors' => [
                    '{{WRAPPER}} .single-product .product-image .button .btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Hover Background Color
        $widget->add_control(
            'button_hover_background_color', // Control ID
            [
                'label' => __('Hover Background Color', 'woocommerce_display_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#005177', // Default hover background color
                'selectors' => [
                    '{{WRAPPER}} .single-product .product-image .button .btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $widget->end_controls_section();
    }
}
