<?php
/**
 * Plugin Name: Game Showcase
 * Plugin URI: https://github.com/KuyaMecky/Game-Showcase
 * Description: Display games with a modern, slick design and responsive layout
 * Version: 1.0.0
 * Author: Kuya Mecky
 * Author URI: https://github.com/KuyaMecky
 * License: GPL2
 * Text Domain: game-showcase
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) {
    exit;
}

define('GAME_SHOWCASE_PATH', plugin_dir_path(__FILE__));
define('GAME_SHOWCASE_URL', plugin_dir_url(__FILE__));
define('GAME_SHOWCASE_VERSION', '1.0.0');

// Include plugin files
require_once GAME_SHOWCASE_PATH . 'includes/post-type.php';
require_once GAME_SHOWCASE_PATH . 'includes/taxonomy.php';
require_once GAME_SHOWCASE_PATH . 'includes/admin.php';
require_once GAME_SHOWCASE_PATH . 'includes/frontend.php';
require_once GAME_SHOWCASE_PATH . 'includes/metabox.php';

// Activation and Deactivation hooks
register_activation_hook(__FILE__, 'game_showcase_activate');
register_deactivation_hook(__FILE__, 'game_showcase_deactivate');

function game_showcase_activate() {
    game_showcase_register_post_type();
    game_showcase_register_taxonomy();
    flush_rewrite_rules();
}

function game_showcase_deactivate() {
    flush_rewrite_rules();
}

// Enqueue scripts and styles
add_action('wp_enqueue_scripts', 'game_showcase_enqueue_frontend');
add_action('admin_enqueue_scripts', 'game_showcase_enqueue_admin');

function game_showcase_enqueue_frontend() {
    // Slick Carousel
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', [], '1.8.1');
    wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], '1.8.1', true);
    
    // Plugin styles and scripts
    wp_enqueue_style('game-showcase-style', GAME_SHOWCASE_URL . 'assets/css/style.css', [], GAME_SHOWCASE_VERSION);
    wp_enqueue_script('game-showcase-script', GAME_SHOWCASE_URL . 'assets/js/script.js', ['jquery', 'slick-js'], GAME_SHOWCASE_VERSION, true);
}

function game_showcase_enqueue_admin() {
    wp_enqueue_style('game-showcase-admin', GAME_SHOWCASE_URL . 'assets/css/admin.css', [], GAME_SHOWCASE_VERSION);
    wp_enqueue_script('game-showcase-admin', GAME_SHOWCASE_URL . 'assets/js/admin.js', ['jquery'], GAME_SHOWCASE_VERSION, true);
}
