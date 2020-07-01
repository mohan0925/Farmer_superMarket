
<?php include_once"assets/config.php";
session_start();

if(count($_GET)>1)
{
	$product_id=$_GET['product_id'];
}


?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Farmer SuperMarket</title>
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Satisfy&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/Sign_style.css">
		<link rel="stylesheet" href="css\body.css">
		<link rel="stylesheet" type="text/css" href="css/carrers_css.css">	</head>
		
		<style>
		.text-white {
						color: #e99090;
					}
		</style>
		
	</head>
	<body style="  background: url(css/bg.jpg) no-repeat;  background-size: cover;">
    <?php include"assets/header.php";?>
		<div class="container">
			<div class="container form-top">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12" style="	margin-left: 350px;"> 
						<div class="panel panel-danger">
							<div class="panel-body">
								<form action="register_customer_account.php" method="post" enctype="multipart/form-data">
								    <h2 class="mb-2 mt-1 text-uppercase text-white text-center">Sign Up Here</h2>
									<div class="row">
										<div class=" col-md-6 form-group"> 
											<span style="color:#e99090;"><label><i class="fa fa-user" aria-hidden="true"></i>First Name</label></span>
											<input type="text" name="customer_first_name" class="form-control" placeholder="First Name" required oninvalid="this.setCustomValidity('Required First Name Field')" oninput="this.setCustomValidity('')"> 
										</div>
										<div class="col-md-6 form-group"> 
											<span style="color:#e99090;"><label><i class="fa fa-user" aria-hidden="true"></i>Last Name</label></span>
											<input type="text" name="customer_last_name" class="form-control" placeholder="Last Name" required oninvalid="this.setCustomValidity('Required Last Name Field')" oninput="this.setCustomValidity('')"> 
										</div> 
									</div>
									<div class="row">
										<div class=" col-md-6 form-group"> 	
											<span style="color:#e99090;"><label><i class="fa fa-phone" aria-hidden="true"></i> Phone</label></span>
											<input type="number" name="customer_phone" class="form-control" placeholder="Enter phone number" required oninvalid="this.setCustomValidity('Required phone Field')" oninput="this.setCustomValidity('')">
										</div>
										<div class="col-md-6 form-group"> 
											<span style="color:#e99090;"><label><i class="fa fa-envelope" aria-hidden="true"></i> Email</label></span>
											<input type="email" name="customer_email" class="form-control" placeholder="Enter Email" required oninvalid="this.setCustomValidity('Required Email Field')" oninput="this.setCustomValidity('')"> 
										</div> 
									</div>
									<div class="row">
										<div class=" col-md-6 form-group"> 
											<span style="color:#e99090;"><label><i class="fa fa-key" aria-hidden="true"></i> Password</label></span>
											<input type="password" name="customer_pass" class="form-control" placeholder="Enter Password" required oninvalid="this.setCustomValidity('Required Password Field')" oninput="this.setCustomValidity('')"> 
										</div>
										<div class="col-md-6 form-group"> 
											<span style="color:#e99090;"><label><i class="fa fa-address-book" aria-hidden="true"></i> Address</label></span>
											<input type="text" name="customer_address" class="form-control" placeholder="Enter Address" required oninvalid="this.setCustomValidity('Required Address Field')" oninput="this.setCustomValidity('')">  
										</div> 
									</div>
									<div class="row">
										<div class=" col-md-6 form-group"> 
											<span style="color:#e99090;"><label><i class="fa fa-address-card" aria-hidden="true"></i> PostCode</label></span>
											<input type="text" name="customer_postcode" class="form-control" placeholder="Enter Postcode" required oninvalid="this.setCustomValidity('Required Postcode Field')" oninput="this.setCustomValidity('')"> 
										</div>
										<div class="col-md-6 form-group"> 
											<span style="color:#e99090;"><label><i class="fa fa-file-image-o" aria-hidden="true"></i> Profile Picture</label></span>
											<input type="file" name="customer_image" class="form-control">  
										</div> 
									</div>
									<?php 
										if(count($_GET)>1)
										{
									?>
										<input type="hidden" name="product_id" value="<?= $_GET['product_id'];?>">
									<?php 											
										}
									?>
									<div class="form-group">
										<input type="submit" class="btn btn-raised btn-block btn-success" value="Sign Up" name="post">
									</div> 
								</form>
								<div class="col-md-8 text-right text-small text-white" style="margin-left:10%">Already hava an account? <a href="login.php" >Login</a>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			<?php
				 $connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysqli_error());
				if(isset($_POST['post']))
				{
					$customer_first_name=$_POST['customer_first_name'];
					$customer_last_name=$_POST['customer_last_name'];
					$customer_phone= $_POST['customer_phone'];
					$customer_email=$_POST['customer_email'];
					$customer_pass=$_POST['customer_pass'];
					$customer_address=$_POST['customer_address'];
					$customer_postcode=$_POST['customer_postcode'];
					$c_postcode=$_POST['c_postcode'];
					$customer_image = $_FILES['customer_image']['name'];
					$c_img_tmp =  $_FILES['customer_image']['tmp_name'];
					move_uploaded_file($c_img_tmp,"image/$customer_image");
					
					$product_id=$_POST['product_id'];
					 
				   $duplicate=mysqli_query($connecti,"SELECT * FROM customers WHERE customer_email='$customer_email'");
				   if(mysqli_num_rows($duplicate)>0)
				   {
						echo "<script>alert('This Email Id is Already Existed')</script>";
				   }
				   else
				   {
						$query = mysqli_query($connecti,"INSERT INTO customers (customer_first_name,customer_last_name,customer_phone,customer_address,customer_postcode,customer_image,customer_email,customer_pass) value('$customer_first_name','$customer_last_name','$customer_phone','$customer_address','$customer_postcode','$customer_image','$customer_email','$customer_pass')");
						
						if(isset($_POST['product_id']) && is_bool($query)===true)
						{
							// echo "<script>console.log('In if block')</script>";
							
							$_SESSION['customer'] = $customer_email;
							
							echo "<script>window.open('order.php?product_id=$product_id')</script>";
							
						}
						else
						{
							// echo "<script>console.log('In else block')</script>";
							
							 echo "<script>window.open('login.php','_self')</script>";
						}
				   }
				}
			?>
			
			<hr>
<br>
    <?php include"assets/footer.php"?>
	
	</body>
 </html>

