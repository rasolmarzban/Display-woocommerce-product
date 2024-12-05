<span class="category" style="color: <?php echo esc_attr($settings['category_color']); ?>;">
    <?php
    // Get and display the product category list
    echo wp_kses(wc_get_product_category_list(get_the_ID(), ', '), array('a' => array('href' => array(), 'rel' => array())));
    ?>
</span>
<h4 class="product-title" style="color: <?php echo esc_attr($settings['title_color']); ?>; font-size: <?php echo esc_attr($settings['title_size']['size']) . $settings['title_size']['unit']; ?>;">
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</h4>