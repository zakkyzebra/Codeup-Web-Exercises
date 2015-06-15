<?php
  var_dump($_GET);
  var_dump($_POST);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>My First HTML Form</title>
	</head>
	<body>

	<h2>User Login</h2>

		<form method="POST" action="/my_first_form.php">
		    <p>
		        <label for="username">Username</label>
		        <input id="username" name="username" type="text" placeholder="username">
		    </p>
		    <p>
		        <label for="password">Password</label>
		        <input id="password" name="password" type="password" placeholder="password">
		    </p>
		    <p>
		        <button type="submit" name="submit_button" value="Login">Login</button>
		    </p>
		</form>
<br><br>

	<h2>Compose An Email</h2>

		<form method="POST" action="/my_first_form.php">
		    <p>
		        <label for="to">To</label>
		        <input id="to" name="to" type="text" placeholder="friends email here">
		    </p>
		    <p>
		        <label for="from">From</label>
		        <input id="from" name="from" type="text" placeholder="your email here">
		    </p>
		    <p>
		        <label for="subject">Subject</label>
		        <input id="subject" name="subject" type="text" placeholder="Subject">
		    </p>
		    <p>
		        <label for="body">Body</label>
		        <textarea id="body" name="body" type="text" placeholder="Body"></textarea>
		    </p>

		    <input type="checkbox" id="save1" name="save1" value="save" checked>
		    <label for="save1"> Would you like to save as a draft?</label>



		    <p>
		        <input type="submit" name="submit_button" value="Send">
		    </p>
		</form>
		<h2>Multiple choice test</h2>
		<form>
			<p>Whats your favorite time of day?</p>
			<label><input type="radio" id="favetime" name="favetime" value="morning"> Morning</label>
			<label><input type="radio" id="favetime" name="favetime" value="afternoon"> Afternoon</label>
			<label><input type="radio" id="favetime" name="favetime" value="evening"> Evening</label>
			<p>Whats your favorite type of music?</p>
			<label><input type="radio" id="favemusic" name="favemusic" value="punkrock"> Punk rock</label>
			<label><input type="radio" id="favemusic" name="favemusic" value="indie"> Indie</label>
			<label><input type="radio" id="favemusic" name="favemusic" value="metal"> Heavy Metal</label>
			<label><input type="radio" id="favemusic" name="favemusic" value="classical"> Something with a violin</label>
			<p>Whats your favorite thing about Zach?</p>
			<label><input type="checkbox" id="zachqualities" name="zachqualities[]" value="egotistical"> Hes hot</label>
			<label><input type="checkbox" id="zachqualities" name="zachqualities[]" value="cocky"> Hes hot</label>
			<label><input type="checkbox" id="zachqualities" name="zachqualities[]" value="personalityisaight"> Hes hot</label>
			<label><input type="checkbox" id="zachqualities" name="zachqualities[]" value="butheishot"> Hes hot</label>
			<p> No really? How hot is Zach?<p><label for="hot">No really. How hot is Zach? </label>
				<select id="hot" name="hot[]" multiple>
				    <option value="Hot">Hot</option>
				    <option value="So hot">So hot</option>
				    <option value="Sooooo hot">Sooooo hot</option>
				    <option value="Sooooo veryyyyy hotttttttt">Sooooo veryyyyy hotttttttt</option>
				</select>
			
			<input type="submit" value="Submit Answers">
		</form>

		<h2>Select Testing</h2>

		<form>
			<p>Are you human?</p>
			<label><input type="radio" id="human" name="human" value="1">Yes</label>
			<label><input type="radio" id="human" name="human" value="0" checked>No</label>

			<p>Are you 18 or older?<p>
			<label><input type="radio" id="age" name="age" value="1">Yes</label>
			<label><input type="radio" id="age" name="age" value="0" checked>No</label>
			
			<input type="submit" value="Submit">

		</form>


	</body>
</html>









