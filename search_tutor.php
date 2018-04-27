<?php

	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	include 'utils.php';
	require_once 'dbconnect.php';
	require_once 'SearchTutor.php';

	//session_start();
	//var_dump($_SESSION);

	$errors = array();
	$results = array();

	if (isset($_POST['submit'])) {
		$location = $_POST['location'];
		$subject = $_POST['subject'];

		$searchtutor = new SearchTutor();
		$errors = $searchtutor->validate($location, $subject, $db);

		if (count($errors) == 0) {
			$results = $searchtutor->search_tutor_results($location, $subject, $db);
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
			<form action = "search_tutor.php" method = "post">
				
				<div class = "form-group">
					<input type = "text" class="form-control" name = "location" placeholder = "Location">
				</div>

				<div class = "form-group">
					<select name = "subject" class="form-control">
						<option value = "" disabled selected>Subject</option>
						<option value = "science">Science</option>
						<option value = "math">Math</option>
						<option value = "commerce">Commerce</option>
						<option value = "computer">Computer</option>
						<option value = "all">All</option>
						<option value = "other">Other</option>

					</select>
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
				foreach ($results as $tutor) {
					echo "<div>";
						echo "<p>";
							echo ucfirst($tutor["subject"]) . " coaching available at " . $tutor["location"] . " for " . $tutor["num_days"] . " days / week in the " . $tutor["coaching_session"] . " session at Rs. " . $tutor["fees"];
							echo "<br />";
							echo "Contact : <a href = '#'>". $tutor["owner"] . "</a>";
						echo "</p>";
					echo "</div>";
					echo "<hr />";
				}
				if (isset($_POST['submit']) && count($errors) == 0 && count($results) == 0) {
					echo "<p>No Tutor Available</p>";
				}
			?>
		</div>

	</body>

</html>