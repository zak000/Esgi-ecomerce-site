<?php
global $earthPorn_db_version;
// Database version
$earthPorn_db_version = "0.0";
// databases prefix variables
global $table_prefix;
$table_prefix = $wpdb->prefix . "earthPorn_";
function set_plugin() {
	global $wpdb;
	global $earthPorn_db_version;
	global $table_prefix;
	
	// create the tables
	$table_slideshow = $table_prefix . 'slideshow';
	$sql_tables_slideshows = "CREATE TABLE IF NOT EXISTS " . $table_slideshow . " (
  id int(11) NOT NULL AUTO_INCREMENT,
  name tinytext NOT NULL,
  date_insert datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
  post_status tinytext NOT NULL,
  UNIQUE KEY id (id)
    );";
	require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta ( $sql_tables_slideshows );
	add_option ( "earthPorn_db_version", $earthPorn_db_version );
	
	// add some datas
	$wpdb->insert ( $table_slideshow, array (
			'name' => 'test1',
			'date_insert' => current_time ( 'mysql' ),
			'post_status' => 'publish'
	) );
}
function remove_plugin() {
	global $wpdb;
	global $table_prefix;
	
	$table_name = $table_prefix . 'slideshow';
	$sql_tables_slideshows = "DROP TABLE IF EXISTS " . $table_name . ";";
	require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
	$wpdb->query ( $sql_tables_slideshows );
}
?>