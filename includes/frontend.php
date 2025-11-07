<?php
// includes/frontend.php

function game_showcase_display_shortcode($atts) {
    $atts = shortcode_atts([
        'category' => '',
        'limit' => get_option('game_showcase_items_per_page', 12),
        'orderby' => 'date',
        'order' => 'DESC',
        'view' => 'carousel', // carousel or grid
    ], $atts);

    $args = [
        'post_type' => 'gs_game',
        'posts_per_page' => $atts['limit'],
        'orderby' => $atts['orderby'],
        'order' => $atts['order'],
    ];

    if (!empty($atts['category'])) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'gs_game_category',
                'field' => 'slug',
                'terms' => $atts['category'],
            ]
        ];
    }

    $query = new WP_Query($args);

    ob_start();
    
    if ($query->have_posts()) {
        if ($atts['view'] === 'carousel') {
            echo '<div class="game-showcase-carousel">';
            while ($query->have_posts()) {
                $query->the_post();
                game_showcase_game_card();
            }
            echo '</div>';
        } else {
            echo '<div class="game-showcase-grid">';
            while ($query->have_posts()) {
                $query->the_post();
                game_showcase_game_card();
            }
            echo '</div>';
        }
    } else {
        echo '<p>' . __('No games found.', 'game-showcase') . '</p>';
    }

    wp_reset_postdata();

    return ob_get_clean();
}

add_shortcode('game_showcase', 'game_showcase_display_shortcode');

function game_showcase_game_card() {
    global $post;
    
    $price = get_post_meta($post->ID, 'gs_price', true);
    $sale_price = get_post_meta($post->ID, 'gs_sale_price', true);
    $buy_link = get_post_meta($post->ID, 'gs_buy_link', true);
    $rating = get_post_meta($post->ID, 'gs_rating', true);
    $developer = get_post_meta($post->ID, 'gs_developer', true);
    $status = get_post_meta($post->ID, 'gs_status', true) ?: 'Available';
    $featured_image = get_the_post_thumbnail_url($post->ID, 'large');
    $categories = get_the_terms($post->ID, 'gs_game_category');

    ?>
    <div class="game-card">
        <div class="game-card-image">
            <?php if ($featured_image): ?>
                <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
            <?php else: ?>
                <div class="game-card-no-image"><?php _e('No Image', 'game-showcase'); ?></div>
            <?php endif; ?>
            
            <div class="game-card-status">
                <span class="status-badge status-<?php echo esc_attr(strtolower(str_replace(' ', '-', $status))); ?>">
                    <?php echo esc_html($status); ?>
                </span>
            </div>

            <?php if ($rating): ?>
                <div class="game-card-rating">
                    <span class="rating-stars">★ <?php echo esc_html($rating); ?>/5</span>
                </div>
            <?php endif; ?>
        </div>

        <div class="game-card-content">
            <h3 class="game-card-title">
                <a href="<?php echo esc_url(get_permalink()); ?>">
                    <?php echo esc_html(get_the_title()); ?>
                </a>
            </h3>

            <?php if ($developer): ?>
                <p class="game-card-developer">
                    <?php echo __('By', 'game-showcase') . ': ' . esc_html($developer); ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($categories) && !is_wp_error($categories)): ?>
                <div class="game-card-categories">
                    <?php foreach ($categories as $cat): ?>
                        <a href="<?php echo esc_url(get_term_link($cat)); ?>" class="category-tag">
                            <?php echo esc_html($cat->name); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <p class="game-card-excerpt">
                <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
            </p>

            <div class="game-card-footer">
                <div class="game-card-prices">
                    <?php if ($sale_price && $sale_price !== $price): ?>
                        <span class="price-original"><?php echo esc_html($price); ?></span>
                        <span class="price-sale"><?php echo esc_html($sale_price); ?></span>
                    <?php elseif ($price): ?>
                        <span class="price"><?php echo esc_html($price); ?></span>
                    <?php endif; ?>
                </div>

                <?php if ($buy_link): ?>
                    <a href="<?php echo esc_url($buy_link); ?>" class="btn-buy-now" target="_blank" rel="noopener noreferrer">
                        <?php _e('Buy Now', 'game-showcase'); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
}
