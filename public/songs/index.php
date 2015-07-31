<?
	session_start();
	if(!empty($_POST['artist']) && !empty($_POST['song'])){
		$_SESSION['songs'][] = ['artist' => $_POST['artist'], 'song' => $_POST['song']];
	}
	if(!empty($_POST['delete']) && $_POST['delete'] == "delete all"){
		$_SESSION = array();
	    if (ini_get("session.use_cookies")) {
	        $params = session_get_cookie_params();
	        setcookie(session_name(), '', time() - 42000,
	            $params["path"], $params["domain"],
	            $params["secure"], $params["httponly"]
	        );
	    }
	    session_destroy();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
	.songTable{
		border: 1px solid black;
		margin-left: auto;
		margin-right: auto;
	}
	.songTable td{
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
	.deleteAll{
		margin-top: 15px;
		margin-bottom: 15px;
	}
	body{
		text-align: center;
	}
	</style>
	<title>Songs</title>
</head>
<body>
	<h1>Songs to download</h1>
	<form method="POST">
		<input type="text" name="artist" placeholder="artist">
		<input type="text" name="song" placeholder="song">
		<input type="submit" value-"submit">
	</form>
	<form method="POST">
		<input class="deleteAll" id="deleteAll" type="submit" name="delete" value="delete all">
	</form>
	<table class="songTable">
		<tr>
			<td>Info</td>
			<td>Artist</td>
			<td>Song</td>
		</tr>
		<?	if(!empty($_SESSION)){
				foreach ($_SESSION['songs'] as $key => $value) {
					echo "<tr><td><a href='http://codeup.dev/songs/songs.php?a=" . $value['artist'] . "&s=" . $value['song'] . "'>More Info</a></td><td class='artist'>" . $value['artist'] . "</td><td class='song'>" . $value['song'] . "</td></tr>";
				}
			}
		?>
	</table>
</body>
</html>