<?php
	
	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	require_once 'dbconnect.php';
	require_once 'ProvideCoaching.php';

	//session_start();
	//var_dump($_SESSION);

	$errors = array();

	if (isset($_POST['submit'])) {
		$location = $_POST['location'];
		$subject = $_POST['subject'];
		$fees = $_POST['fees'];
		$num_days = $_POST['num_days'];
		$coaching_session = $_POST['coaching_session'];
		$owner = $_SESSION['username'];

		$providecoaching = new ProvideCoaching();
		$errors = $providecoaching->validate($location, $subject, $fees, $num_days, $coaching_session, $db);

		if (count($errors) == 0) {
			$query = "INSERT INTO provide_coaching (location, subject, fees, num_days, coaching_session, owner) 
		  			  VALUES('$location', '$subject', $fees, $num_days, '$coaching_session', '$owner')";
		  	mysqli_query($db, $query);
		  	header("location: done.php");
		}

	}
?>

<!DOCTYPE html>

<html>

	<head>
		<title>Post - Provide Coaching</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Post - Provide Coaching</h3>

		<div class = "forms">
			<?php include('errors.php'); ?>
			<br />
			<form action = "/project/provide_coaching.php" method = "post">
				
				<div class = "form-group">
					<input type = "text" class="form-control" name = "location" placeholder = "Location">
				</div>

				<div class = "form-group">
					<select name = "subject" class="form-control">
						<option value = "" disabled selected>Select Subject</option>
						<option value = "science">Science</option>
						<option value = "math">Math</option>
						<option value = "commerce">Commerce</option>
						<option value = "computer">Computer</option>
						<option value = "all">All</option>
						<option value = "other">Other</option>

					</select>
				</div>

				<div class = "form-group">
					<input type = "text" class="form-control" name = "fees" placeholder = "Fees">
				</div>
				
				<div class = "form-group">
					<select name = "num_days" class="form-control">
						<option value = "" disabled selected>No. of Days / Week</option>
						<option value = "1">1</option>
						<option value = "2">2</option>
						<option value = "3">3</option>
						<option value = "4">4</option>
						<option value = "5">5</option>
						<option value = "6">6</option>
						<option value = "7">7</option>
					</select>
				</div>

				<div class = "form-group">
					<select name = "coaching_session" class="form-control">
						<option value = "" disabled selected>Coaching Session</option>
						<option value = "morning">Morning</option>
						<option value = "afternoon">Afternoon</option>
						<option value = "evening">Evening</option>
					</select>
				</div>
				
				<div class = "text-center">
					<button type = "submit" name = "submit" class = "btn btn-primary btn-lg btn-block">Post</button>
				</div>

			</form>

			<br />

		</div>

	</body>

</html>