<?php
/*
* Plugin Name: Table-View
* Description: Wordpress plugin to create a custom table with form to seed table data and give a tabular representation of the data. Also has shortcodes, Shortcode for form: [display], Shortcode for table: [custom-table]
* Version: 1.0
* Author: Biraj
* Author URI: birajgtm.com.np
* Text Domain: table-view
*/
if( !function_exists('add_action') ) {
    die('Hi there, im just a plugin not much i can do when called directly');
}
//includes
include('includes/activate.php');
//hooks
register_activation_hook(__FILE__, 'r_activate_plugin');
//shortcodes
add_shortcode('display', 'custom_form');
add_shortcode('custom-table', 'fetch_table_data');
//functions
function custom_form() {
ob_start();
 ?>
 <form action ="#" method ="post">
 <label for name=""> Insert Entries to Table:</label><br>
 <input type = "text" name = "entry" id = "name" placeholder = "Enter name" required>
 <input type = "submit" name = "submit" value = "Insert">
</form>
 <?php

if($_POST['submit']) {
 global $wpdb;
$table_name = $wpdb->prefix . "techstack_list";
$charset_collate_is = $wpdb->get_charset_collate();
 $name = $_POST['entry'];
  $success = $wpdb->insert($table_name, array(
   "name" => $name));
 }
    if($success) {
 echo ' Inserted Successfully';
      } else {
   echo 'Not Inserted';}
   return ob_get_clean();
 }
function fetch_table_data(){
ob_start();
global $wpdb;
$table_name = $wpdb->prefix . "techstack_list";
$retrieve_data = $wpdb->get_results( "SELECT * FROM $table_name" );
     echo'<table>';
     echo '<tr>';
      echo '<th>ID</th>';
      echo '<th>Name</th>';
      echo '</tr>';
foreach ( $retrieve_data as $print )   {
      echo '<tr>';
      echo '<td>' . $print->ID.'</td>';
      echo '<td>' . $print->name.'</td>';
      echo '</tr>';
  }
    echo'</table>'; 
    return ob_get_clean();
    }
?>