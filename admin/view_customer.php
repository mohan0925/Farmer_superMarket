<?php include_once"../assets/config.php";
session_start();

if(!isset($_SESSION['admin'])):
  header("location: ../admin_login.php");
endif;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>Farmer SuperMarket</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/carrers_css.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body style="background-color: #e8cfcf;">
    <?php include "header.php"?>
		
    <?php
		$conn = mysqli_connect('localhost','root','','db_ecommerce') or die(mysqli_error());
        $customer_id= $_GET['view'];
        $query = mysqli_query($conn, "SELECT * FROM customers where customer_id='$customer_id'");
        $row=mysqli_fetch_array($query);
	?>
	
	<nav style="margin-left:2%">
		<a href="">Action</a> >
		<a href="customers.php">Customers</a> >
		<a href="view_customer.php?view=<?=_GET['view']?>">Customer Details</a> 
		
	</nav>
	
	
		<h3 class="text-center" style="margin-left:15%"> CUSTOMER DETAILS </h3>
		<div class="container mt-3">
			<div class="container form-top">
				<div class="row">
					<div class="col-md-6 col-md-offset-3" style="	margin-left: 350px;"> 
						<div class="panel panel-danger">
							<div class="panel-body">
								<form >
									<div class="form-group"> 
										<span style="color:black"><label>Customer Id</label></span>
										<input type="text" class="form-control" value="<?=$row['customer_id']?>" readonly > 
									</div> 
									<div class="form-group"> 
										<span style="color:black"><label>Customer Image</label></span>
										<img src="..\image\<?= $row['customer_image'];?>" height="100px"> 
									</div> 
									<div class="form-group"> 
										<span style="color:black"><label>Customer Name</label></span>
										<input type="text" class="form-control" value="<?=$row['customer_first_name']?> <?=$row['customer_last_name']?>" readonly > 
									</div> 
									<div class="form-group"> 
										<span style="color:black"><label>Phone</label></span>
										<input type="text" class="form-control" value="<?=$row['customer_phone']?>" readonly > 
									</div> 
									<div class="form-group"> 
										<span style="color:black"><label>Email</label></span>
										<input type="text" class="form-control" value="<?=$row['customer_email']?>" readonly > 
									</div> 
									<div class="form-group"> 
										<span style="color:black"><label>Address</label></span>
										<input type="text" class="form-control" value="<?=$row['customer_address']?>" readonly > 
									</div> 
									<div class="form-group"> 
										<span style="color:black"><label>Postcode</label></span>
										<input type="text" class="form-control" value="<?=$row['customer_postcode']?>" readonly > 
									</div> 
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
		<br><br>
</body>
</html>
