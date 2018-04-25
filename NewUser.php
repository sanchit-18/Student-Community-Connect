<?php

	require 'validations.php';
	
	class NewUser {

	    public function validate($fullname, $gender, $age, $org, $email, $username, $password, $usertype, $db) {
	    	
	    	$errors = array();

	    	if (empty($fullname)) { array_push($errors, "Name is required"); }

	    	if (empty($gender)) { array_push($errors, "Gender is required"); }

			if (empty($age)) { array_push($errors, "Age is required"); }
			if (is_numeric($age) === false) { array_push($errors, "Age must be an integer"); }

			if (empty($org)) { array_push($errors, "Institute / Orgnisation is required"); }
	    	
	    	if (empty($email)) { array_push($errors, "Email is required"); }
	    	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) { array_push($errors, "Invalid Email"); }
			
			if (empty($username)) { array_push($errors, "Username is required"); }
			if (spaces($username)) { array_push($errors, "Username cannot have spaces");}
			if (user_exists($username, $db)) { array_push($errors, "Username already exists");}
			
			if (empty($password)) { array_push($errors, "Password is required"); }
			if (strlen($password) < 4) { array_push($errors, "Password must have 4 or more characters"); }
			if (spaces($password)) { array_push($errors, "Password cannot have spaces"); }

			if (empty($usertype)) { array_push($errors, "User Type is required"); }

			return $errors;

	    }

	}

?>