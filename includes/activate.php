<?php

function r_activate_plugin(){
    //4.7<4.5 = false
    if(version_compare( get_bloginfo('version'), '4.5', '<' )){
    wp_die( __( 'You must update WordPress to use this plugin', 'recipe'));
    }

//global $wpdb;
//
//$createSQL              =   "
//	CREATE TABLE `" . $wpdb->prefix . "techstack_list` (
//		`ID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
//		`name` VARCHAR(32) NOT NULL,
//		PRIMARY KEY (`ID`)
//	) ENGINE=InnoDB " . $wpdb->get_charset_collate() . " AUTO_INCREMENT=1;";
//
//	require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
//	dbDelta( $createSQL );
//    
//}

global $wpdb;
$table_name = $wpdb->prefix . "techstack_list";
$charset_collate_is = $wpdb->get_charset_collate();

$createSQL              =   "
	CREATE TABLE $table_name (
    `ID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`ID`)
	) ENGINE=InnoDB " . $charset_collate_is . " AUTO_INCREMENT=1;";

	require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
	dbDelta( $createSQL );
    
}