<?php

	require 'validations.php';
	
	class PGVacancy {

	    public function validate($pg_name, $pg_type, $vacancy, $location, $rent, $db) {
	    	
	    	$errors = array();

	    	if (empty($pg_name)) { array_push($errors, "PG Name is required"); }

	    	if (empty($pg_type)) { array_push($errors, "PG Type is required"); }

	    	if (empty($vacancy)) { array_push($errors, "Vacancy is required"); }
	    	if (is_numeric($vacancy) === false) { array_push($errors, "Number of vacancies must be an integer"); }

	    	if (empty($location)) { array_push($errors, "Location is required"); }

	    	if (empty($rent)) { array_push($errors, "Rent is required"); }
	    	if (is_numeric($rent) === false) { array_push($errors, "Rent must be a number"); }

			return $errors;

	    }

	}

?>