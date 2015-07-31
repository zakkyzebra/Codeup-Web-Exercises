<?
	session_start();
	$toHome = false;
	if(!empty($_POST['delete']) && $_POST['delete'] == "delete this song"){
		if(!empty($_SESSION)){
			foreach ($_SESSION['songs'] as $key => $value) {
				if($value['artist'] == $_GET['a'] && $value['song'] == $_GET['s']){
					unset($_SESSION['songs'][$key]);
				}
			}
		}
		$toHome = true;
	}
	if($toHome == true){
		header('Location: index.php');
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		table{
			border: 1px solid black;
			width: 50%;
			margin-left: auto;
			margin-right: auto;
		}
		td{
			border: 1px solid black;
			width: 150px;
			height: 50px;
		}
		.song{
			background-color: lightblue;
		}
		.artist{
			background-color: lightgreen;
		}
		.deleteSong{
			margin-bottom: 15px;
			margin-top: 15px;
		}
		body{
			text-align: center;
		}
	</style>
	<title>Songs</title>
</head>
<body>
	<table>
		<tr>
			<td><strong>Artist</strong></td>
			<td><strong>Song</strong></td>
		</tr>
		<tr>
			<?
				echo "<td class='artist'>" . $_GET['a'] . "</td>";
				echo "<td class='song'>" . $_GET['s'] . "</td>";
			?>
		</tr>
	</table>
	<form method="POST">
		<input class="deleteSong" type="submit" name="delete" value="delete this song">
	</form>
	<a href="http://codeup.dev/songs/index.php">Home </a>
</body>
</html>