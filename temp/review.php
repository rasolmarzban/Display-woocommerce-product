<ul class="review">
    <?php
    // Logic to display ratings
    $average = $product->get_average_rating();
    $rating_count = $product->get_rating_count();

    // Display stars based on the rating
    $full_stars = floor($average);
    $half_star = ($average - $full_stars >= 0.5) ? 1 : 0;
    $empty_stars = 5 - ($full_stars + $half_star);

    // Display full stars
    for ($i = 0; $i < $full_stars; $i++) {
        echo '<li><i class="lni lni-star-filled"></i></li>';
    }

    // Display half star if applicable
    if ($half_star) {
        echo '<li><i class="lni lni-star-half"></i></li>';
    }

    // Display empty stars
    for ($i = 0; $i < $empty_stars; $i++) {
        echo '<li><i class="lni lni-star"></i></li>';
    }

    // Display review count
    if ($rating_count > 0) {
        echo '<li><span>' . esc_html($average) . ' (' . esc_html($rating_count) . ' Review' . ($rating_count > 1 ? 's' : '') . ')</span></li>';
    } else {
        echo '<li><span>No reviews yet</span></li>';
    }
    ?>
</ul>