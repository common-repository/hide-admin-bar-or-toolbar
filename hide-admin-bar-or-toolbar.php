<?php
/**
 * Plugin Name: Hide Admin Bar or Toolbar
 * Text Domain: hide-admin-bar-or-toolbar
 * Domain Path: /languages/
 * Description: A simple Admin Bar Hide and this plugin is used to hide admin toolbar from website. It will hide that bar when you are logged in and viewing the site. Also work with Gutenberg shortcode block.
 * Version: 1.0
 * Author: Urmil Patel
 * Author URI: https://urmil.wordpress.com/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Contributors: urmilwp
 * @package WordPress
 * @author Urmil Patel
 */

if( !defined( 'WPHAB_VERSION' ) ) {
	define( 'WPHAB_VERSION', '1.0' ); // Version of plugin
}
if( !defined( 'WPHAB_DIR' ) ) {
	define( 'WPHAB_DIR', dirname( __FILE__ ) ); // Plugin dir
}

register_activation_hook( __FILE__, 'install_hide_bar_version' );
function install_hide_bar_version() {
	if( is_plugin_active('hide-admin-bar-or-toolbar/hide-admin-bar-or-toolbar.php') ){
		 add_action('update_option_active_plugins', 'deactivate_hide_bar_version');
	}
}

function deactivate_hide_bar_version() {
   deactivate_plugins('hide-admin-bar-or-toolbar/hide-admin-bar-or-toolbar',true);
}

add_filter('show_admin_bar', '__return_false');

add_action('admin_print_scripts-profile.php', 'wphab_add_css_style');
function wphab_add_css_style() { ?>
    <style type="text/css">
        .show-admin-bar {display: none !important;}
    </style>
<?php } ?>
