<?php
// includes/taxonomy.php

function game_showcase_register_taxonomy() {
    $labels = [
        'name'              => __('Game Categories', 'game-showcase'),
        'singular_name'     => __('Game Category', 'game-showcase'),
        'search_items'      => __('Search Categories', 'game-showcase'),
        'all_items'         => __('All Categories', 'game-showcase'),
        'parent_item'       => __('Parent Category', 'game-showcase'),
        'edit_item'         => __('Edit Category', 'game-showcase'),
        'update_item'       => __('Update Category', 'game-showcase'),
        'add_new_item'      => __('Add New Category', 'game-showcase'),
        'new_item_name'     => __('New Category Name', 'game-showcase'),
        'menu_name'         => __('Categories', 'game-showcase'),
    ];

    $args = [
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'game-category'],
        'show_in_rest'      => true,
    ];

    register_taxonomy('gs_game_category', 'gs_game', $args);
}

add_action('init', 'game_showcase_register_taxonomy');
