<?php

namespace Elementor;

class Title_Section_Controls
{
    public function register_controls($widget)
    {

        // Title Content Section
        $widget->start_controls_section(
            'title_content_section',
            [
                'label' => __('Title Content', 'woocommerce_display_product'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Add Control for Title
        $widget->add_control(
            'section_title',
            [
                'label' => __('Title', 'woocommerce_display_product'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Trending Products', 'woocommerce_display_product'), // Default value
                'placeholder' => __('Enter your section title', 'woocommerce_display_product'), // Placeholder for input
            ]
        );

        // Add Control for Description
        $widget->add_control(
            'section_description',
            [
                'label' => __('Description', 'woocommerce_display_product'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.', 'woocommerce_display_product'), // Default value
                'placeholder' => __('Enter your section description', 'woocommerce_display_product'), // Placeholder for input
            ]
        );

        $widget->end_controls_section();

        //Title and Discription Style
        $widget->start_controls_section(
            'title_discription_style_section', // Unique ID for widget section
            [
                'label' => __('Title & Discription', 'woocommerce_display_product'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Title Color
        $widget->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'woocommerce_display_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000', // Default color
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        // Title Color On Hover
        $widget->add_control(
            'title_color_hover',
            [
                'label' => __('Title Color On Hover', 'woocommerce_display_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000', // Default color
                'selectors' => [
                    '{{WRAPPER}} .section-title h2:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Title Typography
        $widget->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Title Typography', 'woocommerce_display_product'),
                'selector' => '{{WRAPPER}} .section-title h2',
            ]
        );

        // Title Alignment
        $widget->add_control(
            'title_alignment',
            [
                'label' => __('Title Alignment', 'woocommerce_display_product'),
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
                'default' => 'left', // Default Alignment
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // Description Color
        $widget->add_control(
            'description_color',
            [
                'label' => __('Description Color', 'woocommerce_display_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#777777', // Default color
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );
        // Description Color Hover
        $widget->add_control(
            'description_color_hover',
            [
                'label' => __('Description Color on hover', 'woocommerce_display_product'),
                'type' => Controls_Manager::COLOR,
                'default' => '#777777', // Default color
                'selectors' => [
                    '{{WRAPPER}} .section-title p:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Description Typography
        $widget->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __('Description Typography', 'woocommerce_display_product'),
                'selector' => '{{WRAPPER}} .section-title p',
            ]
        );

        // Description Alignment (Optional, if you want to control alignment separately)
        $widget->add_control(
            'description_alignment',
            [
                'label' => __('Description Alignment', 'woocommerce_display_product'),
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
                'default' => 'left', // Default Alignment
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'text-align: {{VALUE}};',
                ],
            ]
        );


        $widget->end_controls_section();
    }
}
