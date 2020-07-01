<?php
$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysql_error());
include_once"../assets/config.php";
session_start();
if(isset($_GET['delete'])){
    $customer_id = $_GET['delete'];
    $delete_customer=mysqli_query( $connecti,"DELETE FROM `customers` WHERE `customer_id`='$customer_id'");
	$delete_customer_cart=mysqli_query( $connecti,"DELETE FROM `customer_cart` WHERE `customer_id`='$customer_id'");
	$delete_customer_orders=mysqli_query( $connecti,"DELETE FROM `customer_orders` WHERE `customer_id`='$customer_id'");
	$delete_user_chat=mysqli_query( $connecti,"DELETE FROM `user_chat` WHERE (from_user='$customer_id') or (to_user='$customer_id')");
	
	
    if(is_bool($delete_customer)=== true && is_bool($delete_customer_cart)=== true&& is_bool($delete_customer_orders)=== true&& is_bool($delete_user_chat)=== true)
	{
		header("location: customers.php");
	}
	
}
