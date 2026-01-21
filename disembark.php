<?php
/**
 * @wordpress-plugin
 * Plugin Name:       WP Simply Migrator
 * Plugin URI:        https://migrator.wpsimply.io
 * Description:       Safe journeys as you travel to your next WordPress host.
 * Version:           1.0.0
 * Author:            WP Simply
 * Author URI:        https://wpsimply.io
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 * Text Domain:       wp-simply-migrator
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    die;
}

require plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

/**
 * Adds a "Settings" link to the plugin's action links on the Plugins page.
 *
 * This function creates a direct link to the Disembark admin page from the main
 * list of installed plugins, making it easier for users to access.
 *
 * @param array $links An array of existing action links for the plugin.
 * @return array An array of action links with the new "Settings" link added.
 */
function wpsimplymigrator_add_settings_link( $links ) {
    $settings_link = '<a href="tools.php?page=wpsimplymigrator">' . __( 'Settings' ) . '</a>';
    array_unshift( $links, $settings_link );
    return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'wpsimplymigrator_add_settings_link' );

add_action( 'plugins_loaded', static function () {
    new WPSimply\Migrator\Run();
});
