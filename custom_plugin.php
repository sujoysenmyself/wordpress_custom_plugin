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

// Hook to add CSS/JS to admin area
add_action("admin_enqueue_scripts", "ems_add_plugin_assets");

function ems_add_plugin_assets() {

    // Enqueue Bootstrap CSS from CDN
    wp_enqueue_style("ems-bootstrap-css", "https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css", array(), "4.5.3", "all");
    
    // Enqueue custom CSS file
    wp_enqueue_style("ems-custom-css", EMS_PLUGIN_URL . "css/style.css", array(), "1.0.0", "all");

    // Enqueue DataTables CSS from CDN
    wp_enqueue_style("ems-datatables-css", "//cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css", array(), "2.1.3", "all");

    // Enqueue jQuery Slim from CDN
    wp_enqueue_script("ems-jquery-slim", "https://code.jquery.com/jquery-3.5.1.slim.min.js", array(), "3.5.1", true);

    // Enqueue Bootstrap Bundle JS from CDN (includes Popper.js)
    wp_enqueue_script("ems-bootstrap-js", "https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js", array("ems-jquery-slim"), "4.5.3", true);

    // Enqueue DataTables JS from CDN
    wp_enqueue_script("ems-datatables-js", "//cdn.datatables.net/2.1.3/js/dataTables.min.js", array("jquery"), "2.1.3", true);

    // Enqueue jQuery Validate JS from CDN
    wp_enqueue_script("ems-jquery-validate", "https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js", array("jquery"), "1.19.5", true);

    // Enqueue custom JS file with jQuery dependency
    wp_enqueue_script("ems-custom-js", EMS_PLUGIN_URL . "js/custom.js", array("jquery"), "1.0.0", true);
}





?>
