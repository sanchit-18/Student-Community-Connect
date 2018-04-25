<?php

	require 'dbconnect.php';
	
	function spaces($s) {
		return (strpos($s, ' ') !== false);
	}

	function user_exists($username) {
		$user_check_query = "SELECT * FROM user WHERE username='$username' LIMIT 1";
		$result = mysqli_query($db, $user_check_query);
		$user = mysqli_fetch_assoc($result);
		if ($user) {
			if ($user['username'] === $username) { return false; }
			else return true;
		}
	}

?>