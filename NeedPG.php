<?php

	require 'validations.php';
	
	class NeedPG {

	    public function validate($pg_type, $location, $budget, $num_of_people, $db) {
	    	
	    	$errors = array();

	    	if (empty($pg_type)) { array_push($errors, "PG Type is required"); }

	    	if (empty($location)) { array_push($errors, "Location is required"); }

	    	if (empty($budget)) { array_push($errors, "Budget for Rent is required"); }
	    	else if (is_numeric($budget) === false) { array_push($errors, "Budget for Rent must be an integer"); }

	    	if (empty($num_of_people)) { array_push($errors, "No. of People is required"); }
	    	else if (is_numeric($num_of_people) === false) { array_push($errors, "No. Of People must be a number"); }

			return $errors;

	    }

	}

?>