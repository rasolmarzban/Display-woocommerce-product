<div class="button">
    <a href="<?php echo esc_url(wc_get_cart_url()); ?>"
        data-product_id="<?php echo esc_attr(get_the_ID()); ?>"
        class="btn add_to_cart_button"
        data-quantity="1"
        role="button"
        aria-label="<?php echo esc_attr__('Add to cart', 'woocommerce_display_product') . ' ' . get_the_title(); ?>">
        <i class="lni lni-cart" aria-hidden="true"></i> <!-- Hides icon from screen readers -->
        <span><?php esc_html_e('Add to Cart', 'woocommerce_display_product'); ?></span>
    </a>
</div>