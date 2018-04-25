<?php

	require 'validations.php';
	
	class SearchPG {

	    public function validate($pg_type, $location, $budget, $db) {
	    	
	    	$errors = array();

	    	if (empty($budget)) { array_push($errors, "Budget is required"); }
	    	if (is_numeric($budget) === false) { array_push($errors, "Budget must be a number"); }

	    	if (empty($pg_type)) { array_push($errors, "PG Type is required"); }

			if (empty($location)) { array_push($errors, "Location is required"); }

			return $errors;

	    }

	    public function search_pg_results($pg_type, $location, $budget, $db) {
	    	
	    	$results = array();

	    	$query = "SELECT * FROM pg_vacancy where location = '" . $location . "'" . " AND " . "pg_type = '" . $pg_type . "'";
		  	$data = mysqli_query($db, $query);

		  	if (mysqli_num_rows($data) > 0) {
		  		while ($row = mysqli_fetch_assoc($data)) {
		  			$arr = array();
		  			$arr["pg_name"] = $row["pg_name"];
		  			$arr["pg_type"] = $row["pg_type"];
		  			$arr["vacancy"] = (int) $row["vacancy"];
		  			$arr["rent"] = (int) $row["rent"];
		  			$arr["location"] = $row["location"];
		  			$arr["owner"] = $row["owner"];
		  			$arr["sort_factor"] = abs($budget - ((int) $row["rent"]));
		  			array_push($results, $arr);
		  		}
		  	}

			return $results;

	    }

	}

?>