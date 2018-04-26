<?php

	require 'validations.php';
	
	class SellItems {

	    public function validate($item_name, $item_type, $quantity, $item_price, $db) {
	    	
	    	$errors = array();

	    	if (empty($item_name)) { array_push($errors, "Item Name is required"); }

	    	if (empty($item_type)) { array_push($errors, "Item Type is required"); }

	    	if (empty($quantity)) { array_push($errors, "Quantity is required"); }
	    	else if (is_numeric($quantity) === false) { array_push($errors, "Quantity must be an integer"); }

	    	if (empty($item_price)) { array_push($errors, "Item Price is required"); }
	    	else if (is_numeric($item_price) === false) { array_push($errors, "Item Price must be a number"); }

			return $errors;

	    }

	}

?>