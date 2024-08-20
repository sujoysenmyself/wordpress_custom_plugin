<?php

/*
 * Plugin Name:       Employee Management System
 * Plugin URI:        https://example.com/custom_plugin
 * Description:       This is a CRUD Employee Management System
 * Version:           1.0
 * Requires at least: 6.6.1
 * Requires PHP:      8.1.6
 * Author:            Sujoy Sen
 * Author URI:        https://sujoysen.com
 */

//  To attach the php file
 define("EMS_PLUGIN_PATH", plugin_dir_path( __FILE__ ));

//  To attach the image, cs, js file
 define("EMS_PLUGIN_URL", plugin_dir_url( __FILE__ ));


// Calling action hook to add menu 
add_action("admin_menu", "cp_add_admin_menu");


// Add Menu
function cp_add_admin_menu() {
    add_menu_page("Employee System | Employee Management System", "Employee System", "manage_options", "employee-system", "ems_crud_system", "dashicons-admin-home", 23);

// Sub-menus
    add_submenu_page("employee-system", "Add Employee", "Add Employee", "manage_options", "employee-system", "ems_crud_system");

// Sub-menus
add_submenu_page("employee-system", "List Employee", "List Employee", "manage_options", "list-employee", "ems_list_employee");    
}


// Menu handle callback
function ems_crud_system() {
    include_once(EMS_PLUGIN_PATH."pages/add-employee.php");
}


// Submenu handle callback
function ems_list_employee() {
    include_once(EMS_PLUGIN_PATH."pages/list-employee.php");
}

// Hook for creating the table on plugin activation
register_activation_hook( __FILE__, "ems_create_table" );

function ems_create_table() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'ems_form_data';

    $sql = "
    CREATE TABLE $table_name (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(120) DEFAULT NULL,
        `email` varchar(80) DEFAULT NULL,
        `phoneNo` varchar(50) DEFAULT NULL,
        `gender` enum('male','female','other') DEFAULT NULL,
        `designation` varchar(50) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";

    include_once ABSPATH . "wp-admin/includes/upgrade.php";

    dbDelta($sql);
}

// Hook for dropping the table on plugin deactivation
register_deactivation_hook(__FILE__, "ems_drop_table");

function ems_drop_table() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'ems_form_data';

    $sql = "DROP TABLE IF EXISTS $table_name";

    $wpdb->query($sql);
}

?>
