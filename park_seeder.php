<?
	define("DB_HOST", '127.0.0.1');
	define("DB_NAME", 'parks_db');
	define("DB_USER", 'parks_user');
	define("DB_PASS", '');
	require 'db_connect.php';

	$dbc->exec('TRUNCATE national_parks');

	$parksArray = array
	(
		[
			'name' => 'Acadia',
			'location' => 'Maine',
			'date_established' => '1919-02-26',
			'area_in_acres' => 47389.67
		],
		[
			'name' => 'American Samoa',
			'location' => 'American Samoa',
			'date_established' => '1988-10-31',
			'area_in_acres' => 9000
		],
		[
			'name' => 'Arches',
			'location' => 'Utah',
			'date_established' => '1929-4-12',
			'area_in_acres' => 76518.98
		],
		[
			'name' => 'Badlands',
			'location' => 'South Dakota',
			'date_established' => '1978-11-10',
			'area_in_acres' => 242755.94
		],
		[
			'name' => 'Big Bend',
			'location' => 'Texas',
			'date_established' => '1944-6-12',
			'area_in_acres' => 801163.21
		],
		[
			'name' => 'Biscayne',
			'location' => 'Florida',
			'date_established' => '1980-6-28',
			'area_in_acres' => 172924.07
		],
		[
			'name' => 'Black Canyon of the Gunnison',
			'location' => 'Utah',
			'date_established' => '1929-4-12',
			'area_in_acres' => 76518.98
		],
		[
			'name' => 'Bryce Canyon',
			'location' => 'Utah',
			'date_established' => '1929-4-12',
			'area_in_acres' => 76518.98
		],
		[
			'name' => 'Canyonlands',
			'location' => 'Utah',
			'date_established' => '1929-4-12',
			'area_in_acres' => 76518.98
		],
		[
			'name' => 'Capitol Reef1',
			'location' => 'Utah',
			'date_established' => '1929-4-12',
			'area_in_acres' => 76518.98
		],
		[
			'name' => 'Capitol Reef12',
			'location' => 'Utah',
			'date_established' => '1929-4-12',
			'area_in_acres' => 76518.98
		],
		[
			'name' => 'Capitol Reef123',
			'location' => 'Utah',
			'date_established' => '1929-4-12',
			'area_in_acres' => 76518.98
		],
		[
			'name' => 'Capitol Reef1234',
			'location' => 'Utah',
			'date_established' => '1929-4-12',
			'area_in_acres' => 76518.98
		]
	);



	foreach ($parksArray as $park) {
			$query = "INSERT INTO national_parks (name, location, date_established, area_in_acres) VALUES ('{$park['name']}', '{$park['location']}', '{$park['date_established']}', '{$park['area_in_acres']}') ";

		    $dbc->exec($query);

		    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
	}
	



?>