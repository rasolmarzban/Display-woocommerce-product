<?php

namespace Elementor;

class Products_Discount_Controls
{
    public function register_controls($widget)
    {

        // Discount Style Section
        $widget->start_controls_section(
            'discount_style_section', // Unique ID for widget section
            [
                'label' => __('Discount Style', 'woocommerce_display_product'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Discount Tag Color
        $widget->add_control(
            'discount__title_color',
            [
                'label' => __('Discount Title Color', 'woocommerce_display_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FF0000', // Example color for discount
                'selectors' => [
                    '{{WRAPPER}} .sale-tag' => 'color: {{VALUE}};',
                ],
            ]
        );
        $widget->add_control(
            'discount__background_color',
            [
                'label' => __('Discount Background Color', 'woocommerce_display_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FF0000', // Example color for discount
                'selectors' => [
                    '{{WRAPPER}} .sale-tag' => 'background: {{VALUE}};',
                ],
            ]
        );

        $widget->end_controls_section();
    }
}
