<?php
$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysql_error());
include_once"../assets/config.php";
session_start();
if(isset($_GET['delete'])){
    $delete = $_GET['delete'];
    $delete_query=mysqli_query( $connecti,"DELETE FROM `products` WHERE `product_id`='$delete'");
    if(is_bool($delete_query)=== true)
	{
		header("location: vendor_products.php");
	}
	
}
