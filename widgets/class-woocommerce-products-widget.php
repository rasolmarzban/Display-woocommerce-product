<?php

namespace Elementor;

class WooCommerce_Products_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'woocommerce-products-widget';
    }

    public function get_title()
    {
        return __('WooCommerce Products', 'woocommerce_display_product');
    }

    public function get_icon()
    {
        return 'fa fa-th';
    }

    public function get_categories()
    {
        return ['woocommerce'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('محتوا', 'woocommerce_display_product'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'category',
            [
                'label' => __('انتخاب دسته بندی', 'woocommerce_display_product'),
                'type' => Controls_Manager::SELECT2,
                'options' => $this->get_product_categories(),
                'default' => 'default',
                'multiple' => true, // Allow multiple selections
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => __('مرتب سازی', 'woocommerce_display_product'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'price' => __('Price', 'woocommerce_display_product'),
                    'price_desc' => __('Price: High to Low', 'woocommerce_display_product'),
                    'price_asc' => __('Price: Low to High', 'woocommerce_display_product'),
                ],
                'default' => 'price',
            ]
        );

        $this->add_control(
            'number_of_products',
            [
                'label' => __('تعداد محصولات در صفحه', 'woocommerce_display_product'),
                'type' => Controls_Manager::NUMBER,
                'default' => 12, // Default to show all products or specify a number
            ]
        );

        $this->add_control(
            'columns',
            [
                'label' => __('تعداد بخش ها', 'woocommerce_display_product'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '2' => __('2 Columns', 'woocommerce_display_product'),
                    '3' => __('3 Columns', 'woocommerce_display_product'),
                    '4' => __('4 Columns', 'woocommerce_display_product'),
                    '5' => __('5 Columns', 'woocommerce_display_product'),
                ],
                'default' => '4', // Default to 4 columns
            ]
        );

        $this->end_controls_section();

        //Title Section Controls
        include_once WPPD_PATH . 'widgets/class-title-section-control.php';
        $additional_controls = new Title_Section_Controls();
        $additional_controls->register_controls($this);

        //Price Controls
        include_once WPPD_PATH . 'widgets/class-price-control.php';
        $additional_controls = new Product_Price_Controls();
        $additional_controls->register_controls($this);

        //Product Title Controls
        include_once WPPD_PATH . 'widgets/class-product-title-controls.php';
        $additional_controls = new Products_Title_Controls();
        $additional_controls->register_controls($this);

        //Category Controls 
        include_once WPPD_PATH . 'widgets/class-category-controls.php';
        $additional_controls = new Products_Category_Controls();
        $additional_controls->register_controls($this);

        //Discount Controls 
        include_once WPPD_PATH . 'widgets/class-discount-controls.php';
        $additional_controls = new Products_Discount_Controls();
        $additional_controls->register_controls($this);

        //Image Controls 
        include_once WPPD_PATH . 'widgets/class-image-controls.php';
        $additional_controls = new Products_Image_Controls();
        $additional_controls->register_controls($this);

        //Button Controls 
        include_once WPPD_PATH . 'widgets/class-button-controls.php';
        $additional_controls = new Add_To_Cart_Btn_Controls();
        $additional_controls->register_controls($this);
    }

    private function get_product_categories()
    {
        $categories = get_terms('product_cat', ['hide_empty' => true]);
        $options = [];
        foreach ($categories as $category) {
            $options[$category->term_id] = $category->name;
        }
        return $options;
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $args = [
            'post_type' => 'product',
            'posts_per_page' => $settings['number_of_products'],
            'orderby' => 'meta_value_num',
            'meta_key' => '_price',
            'order' => $settings['order'] == 'price_asc' ? 'ASC' : 'DESC',
        ];

        // Check if categories are selected
        if (!empty($settings['category'])) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' => $settings['category'],
                ],
            ];
        }

        // Create WP_Query
        $query = new \WP_Query($args);

        // Include the HTML template file
        if ($query->have_posts()) {
            // Pass the column class to the template
            $columns_class = 'col-lg-' . (12 / $settings['columns']) . ' col-md-6 col-12';
            include(WPPD_PATH . 'temp/index.php');
        } else {
            echo '<p>' . __('No products found', 'woocommerce_display_product') . '</p>';
        }

        wp_reset_postdata();
    }
}
