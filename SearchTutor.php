<?php

	require 'validations.php';
	
	class SearchTutor {

	    public function validate($location, $subject, $db) {
	    	
	    	$errors = array();
			
			if (empty($location)) { array_push($errors, "Location is required"); }

			if (empty($subject)) { array_push($errors, "Subject is required"); }

			return $errors;

	    }

	    public function search_tutor_results($location, $subject, $db) {
	    	
	    	$results = array();

	    	$query = "SELECT * FROM provide_coaching where location = '" . $location . "'" . " AND " . "subject = '" . $subject . "'";
		  	$data = mysqli_query($db, $query);

		  	if (mysqli_num_rows($data) > 0) {
		  		while ($row = mysqli_fetch_assoc($data)) {
		  			$arr = array();
		  			$arr["location"] = $row["location"];
		  			$arr["subject"] = $row["subject"];
		  			$arr["fees"] = (int) $row["fees"];
		  			$arr["num_days"] = (int) $row["num_days"];
		  			$arr["coaching_session"] = $row["coaching_session"];
		  			$arr["owner"] = $row["owner"];
		  			array_push($results, $arr);
		  		}
		  	}

			return $results;

	    }

	}

?>