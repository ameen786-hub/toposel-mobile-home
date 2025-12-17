<?php
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('woocommerce');

function toposel_assets() {
  wp_enqueue_style('mobile-css', get_template_directory_uri() . '/assets/css/mobile.css');
}
add_action('wp_enqueue_scripts', 'toposel_assets');

if (function_exists('acf_add_options_page')) {
  acf_add_options_page([
    'page_title' => 'Homepage Settings',
    'menu_title' => 'Homepage Settings',
    'menu_slug'  => 'homepage-settings',
    'capability' => 'edit_posts',
    'redirect'   => false
  ]);
}
