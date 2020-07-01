<?php include_once"../assets/config.php";
session_start();

if(!isset($_SESSION['vendor'])):
  header("location: ../vendor_login.php");
endif;

?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<title>Farmer SuperMarket</title>
		    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/carrers_css.css">
</head>

<body style="background-color: #e8cfcf;">
    <?php include"header.php"?>
    <?php
		$conn = mysqli_connect('localhost','root','','db_ecommerce') or die(mysqli_error());
	?>
	
	<nav style="margin-left:2%">
		<a href="index.php">Home</a> >
		<a href="insertProduct.php">Insert Product</a>
		
	</nav>
	
	
	<h3 class="text-center" style="margin-left:15%"> INSERT PRODUCT </h3>
	<div class="container mt-3">
		<div class="container form-top">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12" style="	margin-left: 350px;"> 
					<div class="panel panel-danger">
						<div class="panel-body">
							<form action="insertProduct.php" method="post" enctype="multipart/form-data" method="post">
								<div class="form-group"> 
									<span style="color:black"><label>Name</label></span>
									<input type="text" name="product_name" class="form-control" placeholder="Enter product Name"  required oninvalid="this.setCustomValidity('Required product Name Field')" oninput="this.setCustomValidity('')"> 
								</div> 
								<div class="form-group"> 
									<span style="color:black"><label>price</label></span>
									<input type="number" name="product_price" class="form-control" placeholder="Enter product price"  required oninvalid="this.setCustomValidity('Required price Field')" oninput="this.setCustomValidity('')"> 
								</div> 
								<div class="form-group">
									<span style="color:black"><label>Category</label></span> 
									<select name="product_category" class="form-control">
										 <?php
											$pro_category = mysqli_query($connecti,"SELECT * FROM all_categories");
											while ($each_row = mysqli_fetch_array($pro_category)):
										  ?>
										  <option><?= $each_row['category_name'];?></option>
										  <?php endwhile;?>
									</select>
								</div>	
								<div class="form-group"> 
									<span style="color:black"><label>Description</label></span> 
									<input type="text" name="product_description" class="form-control" placeholder="Enter product description" required oninvalid="this.setCustomValidity('Required description Field')" oninput="this.setCustomValidity('')"> 
								</div> 
								<div class="form-group"> 
									<span style="color:black"><label>Quantity</label></span> 
									<input type="number" name="product_quantity" class="form-control" placeholder="Enter product quantity"  required oninvalid="this.setCustomValidity('Required quantity Field')" oninput="this.setCustomValidity('')"> 
								</div> 
								<div class="form-group"> 
									<span style="color:black"><label>Image</label></span>
									<input type="file" name="p_img" class="form-control">
								</div>
								<div class="form-group">
									<span style="color:black"><label>Status</label></span> 
									<select name="product_status" class="form-control">
										<option value="Available">Available</option>
									</select>
								</div>

								<div class="form-group">
									<input type="submit" class="btn btn-raised btn-block btn-danger" value="Insert" name="update_data">
								</div> 
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	if(isset($_POST['update_data']))
	{
		$vendor_email=$_SESSION['vendor'];
		$product_name=$_POST['product_name'];
		$product_price=$_POST['product_price'];
		$product_category=$_POST['product_category'];
		$product_description=$_POST['product_description'];
		$product_quantity=$_POST['product_quantity'];
		$product_status=$_POST['product_status'];
		$product_status=$_POST['product_status'];
		$product_image = $_FILES['p_img']['name'];
		$p_img_tmp =  $_FILES['p_img']['tmp_name'];
		move_uploaded_file($p_img_tmp,"../image/$product_image");
		
		
		$query = mysqli_query($conn,"INSERT INTO products (product_name,product_price,product_image,product_category,product_description,product_quantity,product_status,vendor_email) value('$product_name','$product_price','$product_image','$product_category','$product_description','$product_quantity','$product_status','$vendor_email')");
		
		if(is_bool($query)===true)
		{
			echo"<script>window.open('index.php','_self')</script>";

		}
	}
	 ?>
	 <?php include"footer.php"?>
</body>
</html>
