<?
	define("DB_HOST", '127.0.0.1');
	define("DB_NAME", 'parks_db');
	define("DB_USER", 'parks_user');
	define("DB_PASS", '');
	require 'db_connect.php';
	$dbc->exec('TRUNCATE TABLE national_parks');


?>