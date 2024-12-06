<?php if (!defined('ABSPATH')) exit; ?>

<!-- Start Trending Product Area -->
<section class="trending-product section" style="direction:rtl;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2><?php echo esc_html($settings['section_title']); ?></h2>
                    <p><?php echo esc_html($settings['section_description']); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            // Loop through products returned in the query
            while ($query->have_posts()) : $query->the_post(); ?>
                <div class="<?php echo esc_attr($columns_class); ?>">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <?php
                            // Get the current product object
                            global $product;

                            // Ensure the product object is defined
                            if (!$product) {
                                $product = wc_get_product(get_the_ID());
                            }

                            // Check if the product object is valid
                            if ($product && is_object($product)) {
                                // Check if the product is on sale
                                if ($product->is_on_sale()) {
                                    // Get the regular price and sale price
                                    $regular_price = $product->get_regular_price();
                                    $sale_price = $product->get_sale_price();

                                    // Calculate the discount percentage
                                    if ($regular_price > 0) {
                                        $discount_percentage = round((($regular_price - $sale_price) / $regular_price) * 100); ?>
                                        <span class="sale-tag" style="color: <?php echo esc_attr($settings['discount_color']); ?>;">-<?php echo esc_html($discount_percentage); ?>%</span>
                            <?php
                                    }
                                }

                                // Display the product thumbnail with dynamic size style
                                $thumbnail_size = !empty($settings['thumbnail_size']['size']) ? $settings['thumbnail_size']['size'] . $settings['thumbnail_size']['unit'] : '150px';
                                if (has_post_thumbnail()) {
                                    echo '<div style="width: ' . esc_attr($thumbnail_size) . '; height: auto;">' . get_the_post_thumbnail(get_the_ID(), 'full') . '</div>';
                                } else {
                                    echo '<img src="' . esc_url(get_template_directory_uri() . '/images/placeholder.png') . '" alt="' . esc_attr(get_the_title()) . '" style="width: ' . esc_attr($thumbnail_size) . '; height: auto;" />';
                                }
                            } else {
                                echo '<div>Product not found.</div>';
                            }
                            ?>
                            <?php include(WPPD_PATH . 'temp/add-to-cart.php'); ?>
                        </div>
                        <div class="product-info">
                            <?php include(WPPD_PATH . 'temp/category.php'); ?>
                            <?php include(WPPD_PATH . 'temp/review.php'); ?>
                            <?php include(WPPD_PATH . 'temp/price.php'); ?>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<!-- End Trending Product Area -->