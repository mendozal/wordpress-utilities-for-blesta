<?php
function ufb_domain_search_shortcode($atts)
{
    // Example usage
    // [ufb_domain_search action_url="https://clientes.proxy.com.py/order/config/preconfig/pedidos/" button_color="red" input_bg_color="#ffffff" input_text_color="#000000"]
    $atts = shortcode_atts(
        array(
            'action_url' => '', // Default action URL is empty
            'button_color' => 'rgb(55, 126, 249)', // Default button color
            'input_bg_color' => 'rgba(122, 125, 140, 0.05)', // Default input background color
            'input_text_color' => 'rgba(3, 15, 39, 0.7)', // Default input text color
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
                <button type="submit" name="lookup" style="background-color: <?php echo esc_attr($atts['button_color']); ?>; border-color: <?php echo esc_attr($atts['button_color']); ?>;">Search</button>
            </div>
            <div id="error-message" class="error-message"></div>
        </form>
    </div>
<?php
    return ob_get_clean();
}

// Register the shortcode
function ufb_register_domain_search_shortcode()
{
    add_shortcode('ufb_domain_search', 'ufb_domain_search_shortcode');
}
add_action('init', 'ufb_register_domain_search_shortcode');
