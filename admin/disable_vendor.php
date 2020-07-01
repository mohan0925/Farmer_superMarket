<?php
$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysql_error());
include_once"../assets/config.php";
session_start();
if(isset($_GET['disable'])){
    $vendor_id = $_GET['disable'];
    $enable_query=mysqli_query( $connecti,"UPDATE product_vendor set vendor_status='Disable' WHERE vendor_id='$vendor_id'");
    if(is_bool($enable_query)=== true)
	{
		$vendor_email_query=mysqli_query( $connecti,"select vendor_email from product_vendor where vendor_id='$vendor_id'");
		$count=mysqli_num_rows($vendor_email_query);
		if($count>0)
		{
			$vendor_row = mysqli_fetch_array($vendor_email_query);
			$vendor_email=$vendor_row['vendor_email'];
			$enable_query=mysqli_query( $connecti,"UPDATE products set product_status='Unavailable' WHERE vendor_email='$vendor_email'");
			
			header("location: vendors.php");
		}
	}
}
