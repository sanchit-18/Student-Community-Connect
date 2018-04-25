<?php

	require 'validations.php';
	
	class Login {

	    public function validate($username, $password, $db) {
	    	
	    	$errors = array();
			
			if (empty($username)) { array_push($errors, "Username is required"); }
			if (empty($password)) { array_push($errors, "Password is required"); }
			if (invalid_credentials($username, $password, $db)) { array_push($errors, "Invalid Username / Password"); }

			return $errors;

	    }

	}

?>