<?
	define("DB_HOST", '127.0.0.1');
	define("DB_NAME", 'parks_db');
	define("DB_USER", 'parks_user');
	define("DB_PASS", '');
	require '../../db_connect.php';
	if(!empty($_POST['parkName']) && 
		!empty($_POST['parkLocation']) && 
		!empty($_POST['parkDateEstablished']) && 
		!empty($_POST['parkArea']) && 
		!empty($_POST['parkDescription'])
	){
		$query = "	INSERT INTO national_parks (name, location, date_established, area_in_acres, description) 
					VALUES (:name, :location, :date_established, :area_in_acres, :description)";
    	$SMELLZ = $dbc->prepare($query);
    	$SMELLZ->bindValue(':name', $_POST['parkName'], PDO::PARAM_STR);
		$SMELLZ->bindValue(':location', $_POST['parkLocation'], PDO::PARAM_STR);
		$SMELLZ->bindValue(':date_established', $_POST['parkDateEstablished'], PDO::PARAM_STR);

		//STRIPS EVERYTHING BUT DIGITS BEFORE INPUT INTO THE DB. 
		//HOW? 
		//NOBODY KNOOOOOOOOOOWS *spooky noises*
		preg_match_all('!\d+!', $_POST['parkArea'], $matches);
		$park_area = implode('', $matches[0]);
		$SMELLZ->bindValue(':area_in_acres', $park_area, PDO::PARAM_INT);
		$SMELLZ->bindValue(':description', $_POST['parkDescription'], PDO::PARAM_STR);
		$SMELLZ->execute();
	}
	//SETTING UP SOME VARIABLES
	$stmt = $dbc->prepare('SELECT count(*) FROM national_parks');
	$stmt->execute();
	$stmtX = $stmt->fetchColumn();

	if(empty($_POST['parkArea'])){
		$_POST['parkArea'] = '';
	}
	
	//PREVENTS RANDOM JUNK. REDIRECT TO FIRST PAGE
	if(!isset($_GET['pageNum']) || preg_match('/^\d+\.\d+$/',$_GET['pageNum']))
	{
		$_GET['pageNum'] = 0;
		header('Location: ?pageNum=0');
		exit();
	}
	//PREVENTS RANDOM JUNK. REDIRECT TO FIRST PAGE
	if((!empty($_GET['pageNum']) && $_GET['pageNum'] < 0 || $_GET['pageNum']*4 >= $stmtX))
	{
		$_GET['pageNum'] = 0;
	}

	

	//OFFS THE OFFSETS. OR SETS THE SETOFFS. OR SETS THE OFFSET. OR OFF OFF OFF SET SET OFF.
	$offsetX = $_GET['pageNum'] * 4;

	//PREPARES DATA FOR DISPLAY BY GRABBING IT IN CHUNKS
	$dbcX = getUsers($dbc, $offsetX);

    // Bring the $dbc variable into scope somehow
	function getUsers($dbc, $offsetX)
	{
	    $stmt = $dbc->prepare('SELECT * FROM national_parks LIMIT 4 OFFSET :offset');
	    $stmt->bindValue(':offset', $offsetX, PDO::PARAM_INT);
	    $stmt->execute();
	    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IT ONLY SMELLZ</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/4-col-portfolio.css" rel="stylesheet">
    
    <style type="text/css">
    	.noOneLikesLeft{
    		padding-left: 30px;
    	}
    	.containThis{
    		width: 500px;
    		margin-left: auto;
    		margin-right: auto;
    	}
    	.widenThis{
    		width: 100%;
    	}
    	.blue{
    		color: blue;
    	}
    	.red{
    		color: red;
    	}
    	.giveMeABigButt{
    		padding-bottom: 100px;
    		padding-left: 25px;
    	}
    	.centerMyInsides{
    		text-align: center;
    	}
    	.centerMe{
    		margin-right: auto;
    		margin-left: auto;
    	}
    	.takeMyTopOff{
    		padding-top: 5px;
    		margin-top: 0;
    	}
    	.col-centered{
		    float: none;
		    margin: 0 auto;
		}
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="http://codeup.dev/np/national_parks.php">Home</a>
            </div>
        </div>
        <!-- /.container -->
    </nav>

    <div class='row centerMyInsides'>
	<?	//THIS LAYS OUT YOUR NATIONAL PARKS
		echo "	<div class='row noOneLikesLeft'>
		            <div class='col-lg-12'>
		                <h1 class='page-header takeMyTopOff'>National Parks
		                </h1>
		            </div>
		        </div>
		        <h2 class='noOneLikesLeft'>Page: " . ($_GET['pageNum']+1) . "</h2>";
	?>

	<div class="noOneLikesLeft">
		<?
			//PREVIOUS BUTTON
			if ($_GET['pageNum'] > 0) {
				echo "	<a href='http://codeup.dev/np/national_parks.php?pageNum=" . ($_GET['pageNum'] - 1) . "'>
							<button>Previous Page</button>
						</a>";
			}

			//NEXT BUTTON
			if((($_GET['pageNum']*4) + 4) < $stmtX)
			{
				echo "	<a href='http://codeup.dev/np/national_parks.php?pageNum=" . ($_GET['pageNum'] + 1) . "'>
							<button>Next Page</button>
						</a>";
			}
		?>
	</div>

	<?
		foreach ($dbcX as $key => $arrays) {
			echo "<div class='col-md-3 portfolio-item noOneLikesLeft'>";
			echo "<h2>Park Name: " . $arrays['name'] . "</h2>";
			echo "<h3 class='blue noSpace'>Location: " . $arrays['location'] . "</h3>";
			echo "<h3 class='blue noSpace'>Date Est.: " . $arrays['date_established'] . "</h3>";
			echo "<h3 class='blue noSpace'>Area in acres: " . $arrays['area_in_acres'] . "</h3>";
			echo "<h3 class='blue noSpace'>Description: " . $arrays['description'] . "</h3>";
			echo "</div>";
		}
	?>
	</div>

	<div class="col-md-3 col-centered containThis giveMeABigButt">
		<form method="POST">
			<span class="blue">Name</span><input class="widenThis" type="text" name="parkName" placeholder="Park name"><br>
			<span class="blue">Location</span><input class="widenThis" type="text" name="parkLocation" placeholder="Location"><br>
			<span class="blue">Date Established</span><input class="widenThis" type="date" name="parkDateEstablished" placeholder="Date established"><br>
			<span class="blue">Area</span><span class="red">(acres)</span><input class="widenThis" type="text" name="parkArea" placeholder="Area (in acres)"><br>
			<span class="blue">Description</span><textarea rows="5" cols="50" class="widenThis" type="text" name="parkDescription" placeholder="Description"></textarea><br>
			<input class="widenThis" type="submit">
		</form>
	</div>
</body>
</html>



