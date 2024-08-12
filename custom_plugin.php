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


?>
