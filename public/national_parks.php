<?
	define("DB_HOST", '127.0.0.1');
	define("DB_NAME", 'parks_db');
	define("DB_USER", 'parks_user');
	define("DB_PASS", '');
	require '../db_connect.php';
	
	//sets page number
	if(empty($_GET))
	{
		header('Location: ?pageNum=0');
	}
	
	if(!empty($_GET['pageNum'] && $_GET['pageNum'] < 0))
	{
		$_GET['pageNum'] = 0;
	}

	function getUsers($dbc, $offsetX)
	{
	    // Bring the $dbc variable into scope somehow

	    return $dbc->query('SELECT * FROM national_parks LIMIT 4 OFFSET '. $offsetX)->fetchAll(PDO::FETCH_ASSOC);
	}
	//OFFS THE OFFSETS. OR SETS THE SETOFFS. OR SETS THE OFFSET. OR OFF OFF OFF SET SET OFF.
	$offsetX = $_GET['pageNum'] * 4;

	//PREPARES DATA FOR DISPLAY BY GRABBING IT IN CHUNKS
	$dbcX = getUsers($dbc, $offsetX);
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.blue{
			color: blue;
		}
	</style>
	<title>IT ONLY SMELLZ</title>
</head>
<body>
	<?	//THIS LAYS OUT YOUR NATIONAL PARKS
		foreach ($dbcX as $key => $arrays) {
			echo "<h2>Park Name: " . $arrays['name'] . "</h2>";
			echo "<h3 class='blue'>Location: " . $arrays['location'] . "</h3>";
			echo "<h3 class='blue'>Date Est.: " . $arrays['date_established'] . "</h3>";
			echo "<h3 class='blue'>Area in acres: " . $arrays['area_in_acres'] . "</h3>";
			}	
		//PREVIOUS BUTTON
		if ($_GET['pageNum'] > 0) {
			echo "<a href='http://codeup.dev/national_parks.php?pageNum=" . ($_GET['pageNum'] - 1) . "'>
				<button>Previous Page</button>
			</a>";
		}
		//SETTING UP SOME VARIABLES FOR YOUR NEXT BUTTON
		$stmt = $dbc->query('SELECT count(*) FROM national_parks');
		$stmtX = $stmt->fetchColumn();

		//NEXT BUTTON
		if((($_GET['pageNum']*4) + 4) < $stmtX)
		{
			echo "<a href='http://codeup.dev/national_parks.php?pageNum=" . ($_GET['pageNum'] + 1) . "'>
				<button>Next Page</button>
			</a>";
		}
	?>
</body>
</html>



