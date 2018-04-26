<?php
	
	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	require_once 'dbconnect.php';
	require_once 'NeedPG.php';

	//session_start();
	//var_dump($_SESSION);

	$errors = array();

	if (isset($_POST['submit'])) {
		$pg_type = $_POST['pg_type'];
		$location = $_POST['location'];
		$budget = $_POST['budget'];
		$num_of_people = $_POST['num_of_people'];
		$owner = $_SESSION['username'];

		$needpg = new NeedPG();
		$errors = $needpg->validate($pg_type, $location, $budget, $num_of_people, $db);

		if (count($errors) == 0) {
		  	$query = "INSERT INTO need_pg (pg_type, location, budget, num_of_people, owner) 
		  			  VALUES('$pg_type','$location', $budget, $num_of_people, '$owner')";
		  	mysqli_query($db, $query);
		  	header("location: done.php");
		}

	}
?>

<!DOCTYPE html>

<html>

	<head>
		<title>Post - Need PG</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Post - Need for PG</h3>

		<div class = "forms">
			<?php include('errors.php'); ?>
			<br />
			<form action = "/project/need_pg.php" method = "post">
				
				<div class = "form-group">
					<input type = "text" class="form-control" name = "budget" placeholder = "Budget for Rent">
				</div>

				<div class = "form-group">
					<select name = "pg_type" class="form-control">
						<option value = "" disabled selected>Select PG Type</option>
						<option value = "male">Male</option>
						<option value = "female">Female</option>
					</select>
				</div>

				<div class = "form-group">
					<input type = "text" class="form-control" name = "location" placeholder = "Location">
				</div>

				<div class = "form-group">
					<input type = "text" class="form-control" name = "num_of_people" placeholder = "No. Of People">
				</div>
				
				<div class = "text-center">
					<button type = "submit" name = "submit" class = "btn btn-primary btn-lg btn-block">Search</button>
				</div>

			</form>

			<br />

		</div>

	</body>

</html>