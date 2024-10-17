# WordPress Utilities for Blesta

The **WordPress Utilities for Blesta** aims to provide various utilities that enhance the functionality of Blesta within WordPress. Currently, the plugin only supports a shortcode for performing domain searches directly from a WordPress site.

## Features

- **Domain Search Shortcode**: Allows users to search for domain availability from any WordPress page or post using a simple shortcode. Once a search is performed, the page will post to the Blesta's order form preconfig page and perform the domain search.

## Installation

1. **Download the Plugin**  
   Clone the repository or download the latest release from [GitHub](#).

2. **Install the Plugin**  
   Upload the plugin to your WordPress installation's `wp-content/plugins` directory.

3. **Activate the Plugin**  
   Go to the WordPress admin dashboard, navigate to **Plugins**, and activate **WordPress Utilities for Blesta**.

## Usage

### Domain Search Shortcode

Use the `[ufb_domain_search]` shortcode in any page or post to add a simple domain search form. The shortcode will render a form where users can search for domain availability.

A menu item will be made available in WordPress' admin page in Settings->Utilities for Blesta. You need to set the "Action URL" field with the URL of your Blesta's order form preconfig page, which performs domain searches. for example: 

`https://[blesta-domain]/order/config/preconfig/custom-order`. 

The custom-order portion is the name of your order form. You'll have also the ability to set colors for a few elements of the domain search component.

**Shortcode Attributes**

The shortcode supports the following attributes:

- `action_url` (string, optional): The URL where the form will send the search request. If not specified, the default action URL from the settings will be used.
- `button_color` (string, optional): The background color of the search button. The default is `rgb(55, 126, 249)`.
- `button_hover_color` (string, optional): The background color of the search button when hovered. If not specified, the button hover color from the settings will be used.
- `input_bg_color` (string, optional): The background color of the input field. The default is `#ffffff`.
- `input_text_color` (string, optional): The text color of the input field. The default is `#000000`.

**Example Usages**

1. Basic usage with default settings:

   ```
   [ufb_domain_search]
   ```

2. Custom action URL and button color:

   ```
   [ufb_domain_search action_url="https://example.com/search" button_color="rgb(34, 150, 243)"]
   ```

3. Customized input and button colors:

   ```
   [ufb_domain_search input_bg_color="#f0f0f0" input_text_color="#333333" button_hover_color="rgb(100, 200, 100)"]
   ```

## Blesta configuration

**Important Notice**: To make this project work, you need to disable CSRF protection for a specific route in your application. Please be aware that disabling CSRF protection can introduce security risks. Make sure to analyze the implications and proceed with caution. Use this approach at your own risk.

You'll need to disable CSRF protection specifically for the "preconfig" route, as the plugin will post data from an external source to that page. There is no need to disable CSRF protection for any other route.

**Procedure**

1. In your blesta installation folder, edit the file config/blesta.php.
2. Search for `Configure::set('Blesta.csrf_bypass', '');`. In a new installation, the second parameter should be empty.
3. Add the "preconfig" route to the parameter, like this: `Configure::set('Blesta.csrf_bypass', ['config::preconfig']);`
4. Save the file.

## Requirements

- **WordPress** version 5.0 or higher.
- **Blesta** installed and configured.

## Contributing

Contributions are welcome! Feel free to submit issues, pull requests, or feature requests.

## License

This project is licensed under the [MIT License](LICENSE).
