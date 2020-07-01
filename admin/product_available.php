
<?php
$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysql_error());
include_once"../assets/config.php";
session_start();
if(isset($_GET['Available']))
{
    $product_id = $_GET['Available'];
	
	$available_query=mysqli_query( $connecti,"select * from products WHERE product_id='$product_id'");
	$product_row = mysqli_fetch_array($available_query);
	$vendor_email=$product_row["vendor_email"];
	
	echo "<script>console.log('$vendor_email');</script>";
	
	$available_query=mysqli_query( $connecti,"select vendor_status from product_vendor WHERE vendor_email='$vendor_email'");
	$product_row = mysqli_fetch_array($available_query);	
	$vendor_status = $product_row["vendor_status"];
	
	echo "<script>console.log('$vendor_status');</script>";
	echo "<script>console.log('Disable');</script>";
	
	
	$Disable = "Disable";
	if (strcmp($vendor_status, $Disable) == 0)
	{
		echo "<script>alert('Product Vendor is disabled, Product status cannot be changed...!');
		 window.location = 'admin_products.php';
				
		</script>";
		//header('location: admin_products.php');	
	}
	else
	{
		    $available_query=mysqli_query( $connecti,"UPDATE products set product_status='Available' WHERE product_id='$product_id'");
			if(is_bool($available_query)=== true)
			{			
					header("location: admin_products.php");	
			}
		
	}
	
	

}

?>
