<?php
session_start();
$con = mysqli_connect('localhost','root','','db_ecommerce') or die(mysqli_error());

$from_user = $_SESSION['admin'];
$to_user = $_SESSION['customer_id'];
$customer_first_name = $_REQUEST['customer_first_name'];
$message = $_REQUEST['message'];


// $customer_first_name = mysqli_real_escape_string($con,$_REQUEST['customer_first_name']);
// $message = mysqli_real_escape_string($con,$_REQUEST['message']);



if(mysqli_query($con,"INSERT INTO user_chat (`from_user`, `customer_first_name`,`to_user`, `message`) VALUES ('$from_user', '$customer_first_name','$to_user', '$message')")===true)
{
	$result1 = mysqli_query($con,"SELECT * FROM user_chat where (from_user='$from_user' and to_user='$to_user' ) and (from_user='$to_user' and to_user='$from_user') ORDER BY chat_id DESC");
	while($extract = mysqli_fetch_array($result1)) 
	{
				if($extract['from_user']==$to_user)
				{
					echo "<span>" . $extract['customer_first_name'] . "</span>: <span>" . $extract['message'] . "</span><br />";
				}
				else
				{
					echo "<span>" . $extract['from_user'] . "</span>: <span>" . $extract['message'] . "</span><br />";
				}
	}
}

