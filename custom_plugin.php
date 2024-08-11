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
    echo "<h2>Welcome to Add Employee</h2>";
}


// Submenu handle callback
function ems_list_employee() {
    echo "<h2>Welcome to List Employee</h2>";
}


?>
