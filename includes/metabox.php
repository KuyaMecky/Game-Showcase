<?php
// includes/metabox.php

function game_showcase_register_metabox() {
    add_meta_box(
        'gs_game_details',
        __('Game Details', 'game-showcase'),
        'game_showcase_metabox_callback',
        'gs_game',
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'game_showcase_register_metabox');

function game_showcase_metabox_callback($post) {
    wp_nonce_field('game_showcase_nonce', 'game_showcase_nonce');
    
    $price = get_post_meta($post->ID, 'gs_price', true);
    $sale_price = get_post_meta($post->ID, 'gs_sale_price', true);
    $buy_link = get_post_meta($post->ID, 'gs_buy_link', true);
    $rating = get_post_meta($post->ID, 'gs_rating', true);
    $developer = get_post_meta($post->ID, 'gs_developer', true);
    $genres = get_post_meta($post->ID, 'gs_genres', true);
    $status = get_post_meta($post->ID, 'gs_status', true) ?: 'Available';
    
    ?>
    <div class="game-showcase-metabox">
        <div class="metabox-row">
            <label for="gs_developer"><?php _e('Developer/Studio', 'game-showcase'); ?></label>
            <input type="text" id="gs_developer" name="gs_developer" value="<?php echo esc_attr($developer); ?>" placeholder="e.g., CD Projekt Red">
        </div>

        <div class="metabox-row">
            <label for="gs_genres"><?php _e('Genres (comma separated)', 'game-showcase'); ?></label>
            <input type="text" id="gs_genres" name="gs_genres" value="<?php echo esc_attr($genres); ?>" placeholder="e.g., Action, RPG, Adventure">
        </div>

        <div class="metabox-row">
            <label for="gs_rating"><?php _e('Rating (0-5)', 'game-showcase'); ?></label>
            <input type="number" id="gs_rating" name="gs_rating" min="0" max="5" step="0.1" value="<?php echo esc_attr($rating); ?>">
        </div>

        <div class="metabox-row">
            <label for="gs_price"><?php _e('Price', 'game-showcase'); ?></label>
            <input type="text" id="gs_price" name="gs_price" value="<?php echo esc_attr($price); ?>" placeholder="e.g., $59.99">
        </div>

        <div class="metabox-row">
            <label for="gs_sale_price"><?php _e('Sale Price (optional)', 'game-showcase'); ?></label>
            <input type="text" id="gs_sale_price" name="gs_sale_price" value="<?php echo esc_attr($sale_price); ?>" placeholder="e.g., $39.99">
        </div>

        <div class="metabox-row">
            <label for="gs_buy_link"><?php _e('Buy Link', 'game-showcase'); ?></label>
            <input type="url" id="gs_buy_link" name="gs_buy_link" value="<?php echo esc_attr($buy_link); ?>" placeholder="https://example.com/buy">
        </div>

        <div class="metabox-row">
            <label for="gs_status"><?php _e('Status', 'game-showcase'); ?></label>
            <select id="gs_status" name="gs_status">
                <option value="Available" <?php selected($status, 'Available'); ?>>Available</option>
                <option value="Coming Soon" <?php selected($status, 'Coming Soon'); ?>>Coming Soon</option>
                <option value="Popular" <?php selected($status, 'Popular'); ?>>Popular</option>
                <option value="New" <?php selected($status, 'New'); ?>>New</option>
            </select>
        </div>
    </div>
    <?php
}

function game_showcase_save_metabox($post_id) {
    if (!isset($_POST['game_showcase_nonce']) || !wp_verify_nonce($_POST['game_showcase_nonce'], 'game_showcase_nonce')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    $fields = ['gs_price', 'gs_sale_price', 'gs_buy_link', 'gs_rating', 'gs_developer', 'gs_genres', 'gs_status'];
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}

add_action('save_post_gs_game', 'game_showcase_save_metabox');
