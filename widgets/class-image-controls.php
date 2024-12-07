<?php

namespace Elementor;

class Products_Image_Controls
{
    public function register_controls($widget)
    {
        // Image Style Section
        $widget->start_controls_section(
            'image_style_section', // Unique ID for widget section
            [
                'label' => __('استایل تصویر', 'woocommerce_display_product'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Thumbnail Size
        $widget->add_control(
            'thumbnail_size',
            [
                'label' => __('سایز تصویر', 'woocommerce_display_product'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 500,
                    ],
                ],
                'default' => [
                    'size' => 150,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .product-image img' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                ],
            ]
        );

        // Image Alignment
        $widget->add_control(
            'image_alignment',
            [
                'label' => __('تراز سازی', 'woocommerce_display_product'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'woocommerce_display_product'),
                        'icon' => 'eicon-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'woocommerce_display_product'),
                        'icon' => 'eicon-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'woocommerce_display_product'),
                        'icon' => 'eicon-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .product-image' => 'text-align: -webkit-{{VALUE}};'

                ],
            ]
        );

        $widget->end_controls_section();
    }
}
