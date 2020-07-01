
<?php include_once "assets/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Farmer SuperMarket</title>
		<link rel="stylesheet" href="bootstrap\bootstrap.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="css/carrers_css.css">
	</head>
  <body style="  background: url(css/carrer_img.png) no-repeat;  background-size: cover;">

<?php include"assets/header.php"?>

	<nav style="margin-left:2%">
		<a href="index.php">Home</a> >
		<a href="careers.php">Careers</a> 
	</nav>

		<div class="row" style="margin: 10px;">
			<img src="image\careerbanner.jpg" style="width:98%;height:162px">
		</div>
		<div class="container">
			<div class="container form-top">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12" style="	margin-left: 350px;"> 
						<div class="panel panel-danger">
							<div class="panel-body">
								<form action="careers.php" method="post">
									<div class="form-group"> 
										<label><i class="fa fa-user" aria-hidden="true"></i> Name</label>
										<input type="text" name="name" class="form-control" placeholder="Enter Name" required oninvalid="this.setCustomValidity('Required Name Field')" oninput="this.setCustomValidity('')"> 
									</div> 
									<div class="form-group"> 
										<label><i class="fa fa-phone" aria-hidden="true"></i> Phone</label>
										<input type="text" name="phone" class="form-control" placeholder="Enter phone number" required oninvalid="this.setCustomValidity('Required phone Field')" oninput="this.setCustomValidity('')"> 
									</div> 
									<div class="form-group"> 
										<label><i class="fa fa-envelope" aria-hidden="true"></i> Email</label> 
										<input type="email" name="email" class="form-control" placeholder="Enter Email" required oninvalid="this.setCustomValidity('Required Email Field')" oninput="this.setCustomValidity('')"> 
									</div> 
									<div class="form-group"> 
                                        <label><i class="fa fa-upload" aria-hidden="true"></i>Upload Your Resume</label>
                                        <input type="file" name="c_img" class="form-control">
									</div>  	
									<div class="form-group">
										<input type="submit" class="btn btn-raised btn-block btn-danger" value="Submit" name="post">
									</div> 
									<?php 
										if(isset($_GET['file_upload'])):
									?>
										<h6 style="color:green;">Resume Uploaded Successfully....!</h6>
									<?php endif; ?>
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>				
		
		<hr>
<br>
		
<?php include"assets/footer.php"?>
    </body>
</html>
<?php
	$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysqli_error());
	if(isset($_POST['post']))
	{
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$c_img = $_FILES['c_img']['name'];
		$c_img_tmp =  $_FILES['c_img']['tmp_name'];
		move_uploaded_file($c_img_tmp,"image/$c_img");
		
		if(is_bool(mysqli_query ($connecti,"INSERT INTO carrers (Name,Phone,Email,File) value('$name','$phone','$email','$c_img')"))===true)
		{
			echo "<script>console.log('$name');</script>";
			echo "<script>console.log('$phone');</script>";
			echo "<script>console.log('$email');</script>";
			echo "<script>console.log('$c_img');</script>";
			
			// echo "<script>window.open('careers.php?file_upload=success','_self')</script>";
		}
		else
		{
			echo "<script>window.open('careers.php','_self')</script>";
		}
	}
?>