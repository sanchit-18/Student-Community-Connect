<?php
	
	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	require_once 'dbconnect.php';
	require_once 'SellItems.php';

	//session_start();
	//var_dump($_SESSION);

	$errors = array();

	if (isset($_POST['submit'])) {
		$item_name = $_POST['item_name'];
		$item_type = $_POST['item_type'];
		$quantity = $_POST['quantity'];
		$item_price = $_POST['item_price'];
		$owner = $_SESSION['username'];

		$sellitems = new SellItems();
		$errors = $sellitems->validate($item_name, $item_type, $quantity, $item_price, $db);

		if (count($errors) == 0) {
			$query = "INSERT INTO sell_items (item_name, item_type, quantity, item_price, owner) 
		  			  VALUES('$item_name', '$item_type', $quantity, $item_price, '$owner')";
		  	mysqli_query($db, $query);
		  	header("location: done.php");
		}

	}
?>

<!DOCTYPE html>

<html>

	<head>
		<title>Post - Sell Items</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Post - Sell Items</h3>

		<div class = "forms">
			<?php include('errors.php'); ?>
			<br />
			<form action = "/project/sell_items.php" method = "post">
				<div class = "form-group">
					<input type = "text" class="form-control" name = "item_name" placeholder = "Item Name">
				</div>

				<div class = "form-group">
					<select name = "item_type" class="form-control">
						<option value = "" disabled selected>Select Item Type</option>
						<option value = "books">Books</option>
						<option value = "notes">Notes</option>
						<option value = "stationary">Stationary</option>
						<option value = "others">Others</option>
					</select>
				</div>

				<div class = "form-group">
					<input type = "text" class="form-control" name = "quantity" placeholder = "Quantity">
				</div>
				
				<div class = "form-group">
					<input type = "text" class="form-control" name = "item_price" placeholder = "Item Price">
				</div>
				
				<div class = "text-center">
					<button type = "submit" name = "submit" class = "btn btn-primary btn-lg btn-block">Post</button>
				</div>

			</form>

			<br />

		</div>

	</body>

</html>