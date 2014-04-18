<?php
/*
* Include menu items for the plugin
*/

function cd_sc_add_menu_items(){
  add_dashboard_page('Client Dash Status Cake', 'Status Cake', 'read', 'cd-status-cake', 'cd_status_cake_page');
}
add_action('admin_menu', 'cd_sc_add_menu_items');
?>