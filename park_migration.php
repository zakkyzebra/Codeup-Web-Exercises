<?
	define("DB_HOST", '127.0.0.1');
	define("DB_NAME", 'parks_db');
	define("DB_USER", 'parks_user');
	define("DB_PASS", '');
	require 'db_connect.php';

	$dbc->exec('DROP TABLE IF EXISTS national_parks');
	$dbc->exec('CREATE TABLE national_parks(
		id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		name VARCHAR(150),
		location VARCHAR(150),
		date_established DATE,
		area_in_acres DOUBLE,
		PRIMARY KEY (id)
	)');
?>