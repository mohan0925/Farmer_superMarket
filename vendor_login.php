<?php include_once "assets/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Farmer SuperMarket</title>
	<link rel="stylesheet" href="bootstrap\bootstrap.min.css">
	<link rel="stylesheet" href="css\body.css">
<link rel="stylesheet" type="text/css" href="css/log_style.css">
<link rel="stylesheet" type="text/css" href="css/carrers_css.css">	</head>
<style>
@import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);


body{
    margin: 0;
    font-size: .9rem;
    font-weight: 400;
    line-height: 1.6;
    color: #212529;
    text-align: left;
    background-color: #f5f8fa;
}

.my-form
{
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
}

.my-form .row
{
    margin-left: 0;
    margin-right: 0;
}

.login-form
{
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
}

.login-form .row
{
    margin-left: 0;
    margin-right: 0;
}
</style>
</head>
<body style="background-color:#996a73">
	 <?php include"assets/header.php"?>
		<div class="container" style="  background: url(css/login_img.png) no-repeat;  background-size: contain;">
			<div class="container form-top" style="margin-left: 336px;">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 center" > 
						<div class="panel panel-danger">
								<div class="panel-body" >
									<h5>Vendor Login</h5>
									<form action="vendor_login.php" method="post">

										<div class="form-group"> 
											<label><i class="fa fa-envelope" aria-hidden="true"></i> Email</label> 
											<input type="email" name="vendor_email" class="form-control" placeholder="Enter Email" required oninvalid="this.setCustomValidity('Required Email Field')" oninput="this.setCustomValidity('')"> 
										</div> 
										<div class="form-group"> 
											<label><i class="fa fa-key" aria-hidden="true"></i> Password</label>
											<input type="password" name="vendor_password" class="form-control" placeholder="Enter Password" required oninvalid="this.setCustomValidity('Required Password Field')" oninput="this.setCustomValidity('')"> 
										</div> 	
										<div class="form-group">
											<input type="submit" class="btn btn-raised btn-block btn-danger" value="Login" name="post">
										</div><br>
										<div class="form-group">
											<a style="color:#fefefe" href="vendor_forgot_password.php" >Forgot Password? </a><br>
										</div> 
										<div class="form-group">
											<label>Don't hava an account </label><a style="color:#fefefe" href="register_vendor_account.php" >Sign Up</a>
										</div>
									</form>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
<?php
	$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysql_error());
	if(isset($_POST['post'])){
		$vendor_email = $_POST['vendor_email'];
		$vendor_password = $_POST['vendor_password'];

		$query = mysqli_query($connecti,"SELECT * from product_vendor where vendor_email='$vendor_email' and vendor_password='$vendor_password'");
		$count = mysqli_num_rows($query);
		if($count > 0)
		{
			$_SESSION['vendor'] = $vendor_email;
			echo"<script>window.open('vendor/index.php','_self')</script>";
		}
		else
		{
			echo "<script>alert('your user name or password is not matched')</script>";
		}
	}
?>		
</body>
<?php include"assets/footer.php"?>
</html>

