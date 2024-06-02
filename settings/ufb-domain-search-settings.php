<?php
// Render input fields dynamically with color picker
function ufb_render_input_field($field_key, $field_label, $options)
{
?>
    <input type="text" class="ufb-color-picker" name="ufb_domain_search_settings[<?php echo esc_attr($field_key); ?>]" value="<?php echo isset($options[$field_key]) ? esc_attr($options[$field_key]) : ''; ?>" />
<?php
}

// Render Action URL field
function ufb_render_action_url_field()
{
    $options = get_option('ufb_domain_search_settings');
?>
    <input type="text" name="ufb_domain_search_settings[ufb_action_url]" value="<?php echo isset($options['ufb_action_url']) ? esc_attr($options['ufb_action_url']) : ''; ?>" size="70" />
<?php
}

// Register settings and fields for the domain search plugin
function ufb_register_domain_search_settings()
{
    // Register settings group
    register_setting('ufb_settings_group', 'ufb_domain_search_settings', 'ufb_sanitize_domain_search_settings');

    // Add settings section for domain search plugin
    add_settings_section('ufb_domain_search_settings_section', 'Domain Search Settings', 'ufb_render_domain_search_settings_section_callback', 'ufb-settings');

    // Add fields for domain search plugin
    $fields = array(
        'ufb_action_url' => 'Action URL',
        'ufb_button_color' => 'Button Color',
        'ufb_button_hover_color' => 'Button Hover Color', // New field for button hover color
        'ufb_input_bg_color' => 'Input Background Color',
        'ufb_input_text_color' => 'Input Text Color',
    );

    $options = get_option('ufb_domain_search_settings');

    foreach ($fields as $field_key => $field_label) {
        add_settings_field($field_key, $field_label, function () use ($field_key, $field_label, $options) {
            ufb_render_input_field($field_key, $field_label, $options);
        }, 'ufb-settings', 'ufb_domain_search_settings_section');
    }
}
add_action('admin_init', 'ufb_register_domain_search_settings');

// Enqueue color picker script
function ufb_enqueue_color_picker_script()
{
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('ufb-color-picker-script', plugin_dir_url(dirname(__FILE__)) . 'js/color-picker.js', array('wp-color-picker'), false, true);
}
add_action('admin_enqueue_scripts', 'ufb_enqueue_color_picker_script');

// Sanitize domain search settings input
function ufb_sanitize_domain_search_settings($input)
{
    // Initialize sanitized options array
    $sanitized_options = array();

    // Sanitize each option
    foreach ($input as $key => $value) {
        $sanitized_options[$key] = sanitize_text_field($value);
    }

    // Return sanitized options
    return $sanitized_options;
}

// Render domain search settings section callback
function ufb_render_domain_search_settings_section_callback()
{
    echo '<p>Customize settings for the Domain Search plugin.</p>';
}
