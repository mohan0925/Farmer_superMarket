<?php
	$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysqli_error());

	if(isset($_POST['submit']))
	{		
		$from_user = $_POST['from_user'];
		$customer_first_name = $_POST['customer_first_name'];
		$to_user = $_POST['to_user'];
		$message = $_POST['message'];
		date_default_timezone_set('Europe/London');
		$c_time=date('Y-m-d h:i:s', time());
		$query = "INSERT INTO user_chat (`from_user`, `customer_first_name`,`to_user`, `message`,`date`) VALUES ('$from_user', '$customer_first_name','$to_user', '$message','$c_time')";
		
		$run = mysqli_query($connecti, $query);
	}
?>