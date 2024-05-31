<?php
function ufb_domain_search_shortcode($atts)
{
    // Extract attributes
    $atts = shortcode_atts(
        array(
            'action_url' => '', // Default action URL is empty
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
                <input type="text" id="domain-input" name="domain" placeholder="Enter domain name" />
                <button type="submit" name="lookup">Search</button>
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
