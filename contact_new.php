<?php  include_once"assets/config.php";
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Farmer SuperMarket</title>
	<link rel="stylesheet" href="bootstrap\bootstrap.min.css">
	<link rel="stylesheet" href="css\body.css">
<link rel="stylesheet" type="text/css" href="css/carrers_css.css">
<link rel="stylesheet" type="text/css" href="css/chat.css">

</head>
<body style="  background: url(css/Contact_us.jpg) no-repeat;  background-size: contain;">
	 <?php include"assets/header.php"?>
	
	<nav style="margin-left:2%">
		<a href="index.php">Home</a> >
		<a href="contact_new.php">Contact Us</a> 
	</nav>

	
<div class="container">
	<div class="container form-top">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12" style="	margin-left: 350px;"> 
				<div class="panel panel-danger">
					<div class="panel-body">
						<form action="contact_new.php" method="post">
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
						 		<label><i class="fa fa-comment" aria-hidden="true"></i> Message</label> 
						 		<textarea rows="3" name="message" class="form-control" placeholder="Type Your Message" required oninvalid="this.setCustomValidity('Required Message Field')" oninput="this.setCustomValidity('')"></textarea> 
						 	</div>  	
						 	<div class="form-group">
								<input type="submit" class="btn btn-raised btn-block btn-danger" value="Post->" name="post">
						 	</div> 
							<?php 
								if(isset($_GET['message'])):
							?>
								<h6 style="color:green;">Success! Your Message was Sent Successfully.</h6>
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
		$message=$_POST['message'];
		  if(is_bool(mysqli_query ($connecti,"INSERT INTO contact (first_name,phone,email,message) value('$name','$phone','$email','$message')"))===true)
		  {
			echo "<script>document.getElementById('success_message').style.display = 'block' </script>";
			echo "<script>window.open('contact_new.php?message=success','_self')</script>";
			
		  }

	}
?>