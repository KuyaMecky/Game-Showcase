<?php
// includes/post-type.php

function game_showcase_register_post_type() {
    $labels = [
        'name'               => __('Games', 'game-showcase'),
        'singular_name'      => __('Game', 'game-showcase'),
        'menu_name'          => __('Games', 'game-showcase'),
        'all_items'          => __('All Games', 'game-showcase'),
        'add_new'            => __('Add New Game', 'game-showcase'),
        'add_new_item'       => __('Add New Game', 'game-showcase'),
        'edit_item'          => __('Edit Game', 'game-showcase'),
        'view_item'          => __('View Game', 'game-showcase'),
    ];

    $args = [
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => ['slug' => 'game'],
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-games',
        'supports'            => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest'        => true,
    ];

    register_post_type('gs_game', $args);
}

add_action('init', 'game_showcase_register_post_type');
