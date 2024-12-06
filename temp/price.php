<div class="price">
    <?php if ($product->is_on_sale()) : ?>
        <span class="regular-price-after-discount" style="color: <?php echo esc_attr($settings['regular_price_strikethrough_color']); ?>; text-decoration: line-through;">
            <?php
            // Get the regular price
            $regular_price = $product->get_regular_price();
            // Format the price with currency symbol
            echo wp_kses_post($regular_price . " " . get_woocommerce_currency_symbol());
            ?>
        </span>
        <span class="sale-price" style="color: <?php echo esc_attr($settings['sale_price_color']); ?>;">
            <?php
            // Get the sale price
            $sale_price = $product->get_sale_price();
            // Format the sale price with currency symbol
            echo wp_kses_post($sale_price . " " . get_woocommerce_currency_symbol());
            ?>
        </span>
    <?php else : ?>
        <span class="regular-price" style="color: <?php echo esc_attr($settings['regular_price_color']); ?>;">
            <?php
            // Get the regular price
            $regular_price = $product->get_regular_price();
            // Format the price with currency symbol
            echo wp_kses_post($regular_price . " " . get_woocommerce_currency_symbol());
            ?>
        </span>
    <?php endif; ?>
</div>