<?php
// Shortcode registration for [ufb_domain_search]
function ufb_register_domain_search_shortcode()
{
    add_shortcode('ufb_domain_search', 'ufb_domain_search_shortcode');
}
add_action('init', 'ufb_register_domain_search_shortcode');

// Shortcode callback function for [ufb_domain_search]
function ufb_domain_search_shortcode($atts)
{
    // Retrieve domain search settings
    $domain_search_settings = get_option('ufb_domain_search_settings');

    // Extract shortcode attributes
    $atts = shortcode_atts(
        array(
            'action_url' => isset($domain_search_settings['ufb_action_url']) ? $domain_search_settings['ufb_action_url'] : '', // Default action URL from settings
            'button_color' => isset($domain_search_settings['ufb_button_color']) ? $domain_search_settings['ufb_button_color'] : 'rgb(55, 126, 249)', // Default color from settings
            'button_hover_color' => isset($domain_search_settings['ufb_button_hover_color']) ? $domain_search_settings['ufb_button_hover_color'] : '', // Default button hover color from settings
            'input_bg_color' => isset($domain_search_settings['ufb_input_bg_color']) ? $domain_search_settings['ufb_input_bg_color'] : '#ffffff', // Default input background color from settings
            'input_text_color' => isset($domain_search_settings['ufb_input_text_color']) ? $domain_search_settings['ufb_input_text_color'] : '#000000', // Default input text color from settings
        ),
        $atts,
        'ufb_domain_search'
    );

    // Output the form
    ob_start();
?>
    <div class="ufb-domain-search">
        <form id="ufb-domain-search-form" method="post" action="<?php echo esc_url($atts['action_url']); ?>">
            <div class="ufb-domain-search-inner">
                <input type="text" id="domain-input" name="domain" placeholder="Enter domain name" style="background-color: <?php echo esc_attr($atts['input_bg_color']); ?>; color: <?php echo esc_attr($atts['input_text_color']); ?>;" />
                <button type="submit" name="lookup" id="ufb-domain-search-button" style="background-color: <?php echo esc_attr($atts['button_color']); ?>; border-color: <?php echo esc_attr($atts['button_color']); ?>;" onmouseover="this.style.backgroundColor='<?php echo esc_attr($atts['button_hover_color']); ?>'; this.style.borderColor='<?php echo esc_attr($atts['button_hover_color']); ?>';" onmouseout="this.style.backgroundColor='<?php echo esc_attr($atts['button_color']); ?>'; this.style.borderColor='<?php echo esc_attr($atts['button_color']); ?>';"><?php echo esc_html__('Search'); ?></button>
            </div>
            <div id="error-message" class="error-message"></div>
        </form>
    </div>
<?php
    return ob_get_clean();
}
?>