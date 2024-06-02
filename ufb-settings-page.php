<?php

// Add submenu page under Settings menu
function ufb_add_settings_page()
{
    add_options_page(
        'Utilities for Blesta Settings',
        'Utilities for Blesta',
        'manage_options',
        'ufb-settings',
        'ufb_render_settings_page'
    );
}
add_action('admin_menu', 'ufb_add_settings_page');

// Render the settings page
function ufb_render_settings_page()
{
?>
    <div class="wrap">
        <h2>Utilities for Blesta Settings</h2>
        <form method="post" action="options.php">
            <?php settings_fields('ufb_settings_group'); ?>
            <?php do_settings_sections('ufb-settings'); ?>
            <?php submit_button(); ?>
        </form>
    </div>
<?php
}

// Include domain search settings file
require_once plugin_dir_path(__FILE__) . 'settings/ufb-domain-search-settings.php';
