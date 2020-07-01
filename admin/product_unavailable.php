
<?php
$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysql_error());
include_once"../assets/config.php";
session_start();
if(isset($_GET['Unavailable']))
{
    $product_id = $_GET['Unavailable'];
	
	$available_query=mysqli_query( $connecti,"select * from products WHERE product_id='$product_id'");
	$product_row = mysqli_fetch_array($available_query);
	$vendor_email=$product_row["vendor_email"];
	
	echo "<script>console.log('$vendor_email');</script>";
	
	$available_query=mysqli_query( $connecti,"select vendor_status from product_vendor WHERE vendor_email='$vendor_email'");
	$product_row = mysqli_fetch_array($available_query);	
	$vendor_status = $product_row["vendor_status"];
	$Active = "Active";
	
	echo "<script>console.log('$vendor_status');</script>";
	echo "<script>console.log('Active');</script>";
	
	if (strcmp($vendor_status, $Active) == 0) {

		$Unavailable_query=mysqli_query( $connecti,"UPDATE products set product_status='Unavailable' WHERE product_id='$product_id'");
		if(is_bool($Unavailable_query)=== true)
		{			
				header("location: admin_products.php");
		}
		
		// echo "<script>console.log('$vendor_status, $Active) == 0');</script>";
	}
	else
	{
		header("location: admin_products.php");	
	}   
}

?>