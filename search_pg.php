<?php

	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	include 'utils.php';
	require_once 'dbconnect.php';
	require_once 'SearchPG.php';

	//session_start();
	//var_dump($_SESSION);

	$errors = array();
	$results = array();

	if (isset($_POST['submit'])) {
		$pg_type = $_POST['pg_type'];
		$location = $_POST['location'];
		$budget = $_POST['budget'];

		$searchpg = new SearchPG();
		$errors = $searchpg->validate($pg_type, $location, $budget, $db);

		if (count($errors) == 0) {
			$results = $searchpg->search_pg_results($pg_type, $location, $budget, $db);
		}
	}

?>


<!DOCTYPE html>

<html>

	<head>
		<title>Search PG</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Search PG</h3>

		<div class = "forms">
			<?php include('errors.php'); ?>
			<br />
			<form action = "search_pg.php" method = "post">
				
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
				
				<div class = "text-center">
					<button type = "submit" name = "submit" class = "btn btn-primary btn-lg btn-block">Search</button>
				</div>

			</form>

			<br />

		</div>

		<br /> <br /> <br />

		<div>
			<?php
				usort($results, "compare_sort_factor");
				foreach ($results as $pg) {
					echo "<div>";
						echo "<p>";
							echo ucfirst($pg["pg_type"]) . " PG - " . $pg["pg_name"] . ": " . $pg["vacancy"] . " vacancies available at " . $pg["rent"];
							echo "<br />";
							echo "Contact : <a href = '#'>". $pg[owner] . "</a>";
						echo "</p>";
					echo "</div>";
					echo "<hr />";
				}
				if (isset($_POST['submit']) && count($errors) == 0 && count($results) == 0) {
					echo "<p>No PG Vacancy Available</p>";
				}
			?>
		</div>

	</body>

</html>