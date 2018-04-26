<?php
	
	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';

	//session_start();
	//var_dump($_SESSION);

?>

<!DOCTYPE html>

<html>

	<head>
		<title>Provide Coaching or Need Tutor</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Post for Provide Coaching or Need Tutor</h3>

		<div class = "forms">

			<br />
			
			<form action = "/project/provide_coaching.php">
				<div class = "text-center">
				<button type = "submit" class = "btn btn-primary btn-lg btn-block">Provide Coaching</button>
				</div>
			</form>

			<br />

			<form action = "/project/need_tutor.php">
				<div class = "text-center">
				<button type = "submit" class = "btn btn-primary btn-lg btn-block">Need Tutor</button>
				</div>
			</form>

			<br />

		</div>

	</body>

</html>