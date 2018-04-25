<?php

	error_reporting(E_ALL);
	ini_set("display_errors","On");

	session_start();
	//var_dump($_SESSION);

	require_once 'dbconnect.php';
	require_once 'Login.php';

	$errors = array();

	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$login = new Login();
		$errors = $login->validate($username, $password, $db);

		if (count($errors) == 0) {
		  	$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
		  	$results = mysqli_query($db, $query);
		  	
		  	if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				header("location: profile.php");
	  	}
	  }
	}
?>


<!DOCTYPE html>

<html>

	<head>
		<title>Student Community Connect</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Student Community Connect</h3>

		<div class = "forms">

			<?php include('errors.php'); ?>
			
			<br />

			<form action = "index.php" method = "post">

				<div class = "form-group">
					<input type = "text" class="form-control" name = "username" placeholder = "Username">
				</div>
				
				<div class = "form-group">
					<input type = "password" class="form-control" name = "password" placeholder = "Password">
				</div>
				
				<div class = "text-center">
					<button type = "submit" name = "submit" class = "btn btn-primary btn-lg btn-block">Login</button>
				</div>
			
			</form>

			<br />
			
			<form action = "new_user.php" method = "post">
				
				<div>
					<button type = "submit" name = "new_user" class = "btn btn-primary btn-lg btn-block">New User Register</button>
				</div>

			</form>

			<br />

		</div>

	</body>

</html>