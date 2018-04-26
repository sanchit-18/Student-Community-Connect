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
		<title>PG Vacancy or Need for PG</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Post for PG Vacancy or Need for PG</h3>

		<div class = "forms">

			<br />
			
			<form action = "/project/pg_vacancy.php">
				<div class = "text-center">
				<button type = "submit" class = "btn btn-primary btn-lg btn-block">PG Vacancy</button>
				</div>
			</form>

			<br />

			<form action = "/project/need_pg.php">
				<div class = "text-center">
				<button type = "submit" class = "btn btn-primary btn-lg btn-block">Need PG</button>
				</div>
			</form>

			<br />

		</div>

	</body>

</html>