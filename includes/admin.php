<?php
// includes/admin.php

function game_showcase_admin_menu() {
    add_submenu_page(
        'edit.php?post_type=gs_game',
        __('Game Showcase Settings', 'game-showcase'),
        __('Settings', 'game-showcase'),
        'manage_options',
        'game-showcase-settings',
        'game_showcase_settings_page'
    );
}

add_action('admin_menu', 'game_showcase_admin_menu');

function game_showcase_settings_page() {
    if (!current_user_can('manage_options')) {
        return;
    }

    if (isset($_POST['submit'])) {
        check_admin_referer('game_showcase_settings_nonce');
        
        update_option('game_showcase_items_per_page', sanitize_text_field($_POST['items_per_page']));
        update_option('game_showcase_carousel_autoplay', isset($_POST['autoplay']) ? 1 : 0);
        update_option('game_showcase_carousel_dots', isset($_POST['dots']) ? 1 : 0);
        update_option('game_showcase_carousel_arrows', isset($_POST['arrows']) ? 1 : 0);
        update_option('game_showcase_items_to_show', sanitize_text_field($_POST['items_to_show']));
        
        echo '<div class="notice notice-success"><p>' . __('Settings saved!', 'game-showcase') . '</p></div>';
    }

    $items_per_page = get_option('game_showcase_items_per_page', 12);
    $autoplay = get_option('game_showcase_carousel_autoplay', 1);
    $dots = get_option('game_showcase_carousel_dots', 1);
    $arrows = get_option('game_showcase_carousel_arrows', 1);
    $items_to_show = get_option('game_showcase_items_to_show', 4);
    ?>
    <div class="wrap">
        <h1><?php _e('Game Showcase Settings', 'game-showcase'); ?></h1>
        
        <form method="post" action="">
            <?php wp_nonce_field('game_showcase_settings_nonce'); ?>
            
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="items_per_page"><?php _e('Items Per Page', 'game-showcase'); ?></label></th>
                    <td>
                        <input type="number" name="items_per_page" id="items_per_page" value="<?php echo esc_attr($items_per_page); ?>" min="1" max="100">
                        <p class="description"><?php _e('Number of games to display per page', 'game-showcase'); ?></p>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="items_to_show"><?php _e('Items in Carousel', 'game-showcase'); ?></label></th>
                    <td>
                        <input type="number" name="items_to_show" id="items_to_show" value="<?php echo esc_attr($items_to_show); ?>" min="1" max="8">
                        <p class="description"><?php _e('How many games to show in each carousel view', 'game-showcase'); ?></p>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><?php _e('Carousel Settings', 'game-showcase'); ?></th>
                    <td>
                        <label><input type="checkbox" name="autoplay" <?php checked($autoplay); ?>> <?php _e('Enable Autoplay', 'game-showcase'); ?></label><br>
                        <label><input type="checkbox" name="dots" <?php checked($dots); ?>> <?php _e('Show Dots', 'game-showcase'); ?></label><br>
                        <label><input type="checkbox" name="arrows" <?php checked($arrows); ?>> <?php _e('Show Arrows', 'game-showcase'); ?></label>
                    </td>
                </tr>
            </table>

            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
