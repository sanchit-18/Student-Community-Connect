<?php

	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	require 'dbconnect.php';
	require_once 'NewUser.php';

	$errors = array();

	if (isset($_POST['submit'])) {
		$fullname = $_POST['fullname'];
		$gender = $_POST['gender'];
		$age = $_POST['age'];
		$org = $_POST['org'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$usertype = $_POST['usertype'];

		$newuser = new NewUser();
		$errors = $newuser->validate($fullname, $gender, $age, $org, $email, $username, $password, $usertype);

		if (count($errors) == 0) {
		  	$query = "INSERT INTO user (fullname, gender, age, org, email, username, password, usertype) 
		  			VALUES('$fullname', '$gender', $age, '$org', '$email', '$username', '$password', '$usertype')";
		  	mysqli_query($db, $query);
		  	$_SESSION['username'] = $username;
		  	header("location: profile.php"); */
		}
	}
?>


<!DOCTYPE html>

<html>

	<head>
		<title>New User - Student Community Connect</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">New User - Sign Up</h3>

		<div class = "forms">

			<?php include('errors.php'); ?>
			
			<br />
			
			<form action = "new_user.php" method = "post">
				
				<div class = "form-group">
					<input type = "text" class="form-control" name = "fullname" placeholder = "Name">
				</div>

				<div class = "form-group">
					<select name = "gender" class="form-control">
						<option value = "" disabled selected>Gender</option>
						<option value = "male">Male</option>
						<option value = "female">Female</option>
						<option value = "other">Choose Not To Specify</option>
					</select>
				</div>

				<div class = "form-group">
					<input type = "text" class="form-control" name = "age" placeholder = "Age">
				</div>

				<div class = "form-group">
					<input type = "text" class="form-control" name = "org" placeholder = "College / Organisation">
				</div>

				<div class = "form-group">
					<input type = "text" class="form-control" name = "email" placeholder = "Email ID">
				</div>

				<div class = "form-group">
					<input type = "text" class="form-control" name = "username" placeholder = "Username">
				</div>
				
				<div class = "form-group">
					<input type = "password" class="form-control" name = "password" placeholder = "Password">
				</div>

				<div class = "form-group">
					<select name = "usertype" class="form-control">
						<option value = "" disabled selected>User Type</option>
						<option value = "student">Student</option>
						<option value = "organiser">Event Organiser</option>
						<option value = "cr">College Representative</option>
					</select>
				</div>
				
				<div class = "text-center">
					<button type = "submit" class = "btn btn-primary btn-lg btn-block" name = "submit">Register</button>
				</div>
			
			</form>

			<br />

		</div>

	</body>

</html>