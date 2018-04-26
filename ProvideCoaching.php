<?php

	require 'validations.php';
	
	class ProvideCoaching {

	    public function validate($location, $subject, $fees, $num_days, $coaching_session, $db) {
	    	
	    	$errors = array();

	    	if (empty($location)) { array_push($errors, "Location is required"); }

	    	if (empty($subject)) { array_push($errors, "Subject is required"); }

	    	if (empty($fees)) { array_push($errors, "Fees is required"); }
	    	else if (is_numeric($fees) === false) { array_push($errors, "Fees must be an integer"); }

	    	if (empty($num_days)) { array_push($errors, "Days / Week is required"); }
	    	else if (is_numeric($num_days) === false) { array_push($errors, "Days / Week must be an integer"); }

	    	if (empty($coaching_session)) { array_push($errors, "Coaching Session is required"); }

			return $errors;

	    }

	}

?>