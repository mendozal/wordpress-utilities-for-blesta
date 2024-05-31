<?php
/*
Plugin Name: Utilities for Blesta
Description: A collection of utilities for Blesta, starting with a domain search shortcode.
Version: 1.0
Author: Proxy Development
*/

// Enqueue styles and scripts for the plugin
function ufb_enqueue_assets()
{
    wp_enqueue_style('ufb-domain-search', plugins_url('css/domain-search.css', __FILE__));
    wp_enqueue_script('ufb-domain-search', plugins_url('js/domain-search.js', __FILE__), array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'ufb_enqueue_assets');

// Include shortcode registration file
require_once plugin_dir_path(__FILE__) . 'shortcodes/domain-search.php';
