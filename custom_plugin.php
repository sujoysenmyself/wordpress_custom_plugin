<?php


/*
 * Plugin Name:       Custom Plugin 1
 * Plugin URI:        https://example.com/custom_plugin
 * Description:       This is the custom plugin
 * Version:           1.0
 * Requires at least: 6.6.1
 * Requires PHP:      8.1.6
 * Author:            Sujoy Sen
 * Author URI:        https://sujoysen.com
 */


// Calling action hook to add menu 
add_action("admin_menu", "cp_add_admin_menu");


// Add Menu
function cp_add_admin_menu() {
    add_menu_page("Custom Plugin Menu", "Custom Plugin", "manage_options", "cp-plugin", "cp_handle_admin_menu", "dashicons-admin-home", 23);
}


// Menu handle callback
function cp_handle_admin_menu() {
    echo "<h2>Welcome to Custom Plugin Menu</h2>";
}


?>
