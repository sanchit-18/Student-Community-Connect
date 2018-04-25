<?php
	
	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	require_once 'dbconnect.php';
	require_once 'PGVacancy.php';

	//session_start();
	//var_dump($_SESSION);

	$errors = array();

	if (isset($_POST['submit'])) {
		$pg_name = $_POST['pg_name'];
		$pg_type = $_POST['pg_type'];
		$vacancy = $_POST['vacancy'];
		$location = $_POST['location'];
		$rent = $_POST['rent'];
		$owner = $_SESSION['username'];

		$pgvacancy = new PGVacancy();
		$errors = $pgvacancy->validate($pg_name, $pg_type, $vacancy, $location, $rent, $db);

		if (count($errors) == 0) {
		  	$query = "INSERT INTO pg_vacancy (pg_name, pg_type, vacancy, location, rent, owner) 
		  			  VALUES('$pg_name', '$pg_type', $vacancy, '$location', $rent, '$owner')";
		  	mysqli_query($db, $query);
		  	header("location: done.php");
		}

	}
?>

<!DOCTYPE html>

<html>

	<head>
		<title>Post - PG Vacancy</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Post - Vacancy for PG</h3>

		<div class = "forms">
			<?php include('errors.php'); ?>
			<br />
			<form action = "/project/pg_vacancy.php" method = "post">
				<div class = "form-group">
					<input type = "text" class="form-control" name = "pg_name" placeholder = "PG Name">
				</div>

				<div class = "form-group">
					<select name = "pg_type" class="form-control">
						<option value = "" disabled selected>Select PG Type</option>
						<option value = "male">Male</option>
						<option value = "female">Female</option>
						<option value = "any">Any</option>
					</select>
				</div>

				<div class = "form-group">
					<input type = "text" class="form-control" name = "vacancy" placeholder = "Vacancy">
				</div>
				
				<div class = "form-group">
					<input type = "text" class="form-control" name = "location" placeholder = "Location">
				</div>
				
				<div class = "form-group">
					<input type = "text" class="form-control" name = "rent" placeholder = "Rent">
				</div>
				
				<div class = "text-center">
					<button type = "submit" name = "submit" class = "btn btn-primary btn-lg btn-block">Post</button>
				</div>

			</form>

			<br />

		</div>

	</body>

</html>