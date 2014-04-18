<?php
/*
* Include files
*/

function cd_status_cake_register_files(){
  wp_register_script('cd-status-cake', plugins_url('../js/cd-status-cake.js', __FILE__ ), array('jquery'), null, true);
  wp_register_style('cd-status-cake', plugins_url('../css/cd-status-cake.css', __FILE__), array(), null);
}
add_action('admin_init', 'cd_status_cake_register_files');

function cd_status_cake_enqueue_files(){
  wp_enqueue_script('cd-status-cake');
  wp_enqueue_style('cd-status-cake');
}
add_action('admin_enqueue_scripts', 'cd_status_cake_enqueue_files');
?>