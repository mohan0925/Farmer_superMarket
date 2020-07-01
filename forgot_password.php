<?php include_once "assets/config.php";
session_start();
require 'PHPMailer/PHPMailerAutoload.php';

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

</head>
<body style="background-color: #92e3e3;">
	 <?php include"assets/header.php"?>
	 
	<nav style="margin-left:2%">
		<a href="index.php">Home</a> >
		<a href="forgot_password.php">Forgot password</a>
	</nav>	 
	
	 
<div class="container" style="  background: url(css/forgot.png) no-repeat;  background-size: contain;">
	<div class="row">
		<div class="col-md-6 col-md-offset-3" style="margin-left: 30%;">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form action="forgot_password.php" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input name="customer_email" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="reset" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>
                      
                    </form>
    
                  </div>
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
$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysql_error());
if(isset($_POST['reset']))
{
	$customer_email = $_POST['customer_email'];
	$query = mysqli_query($connecti,"select * from customers where customer_email ='$customer_email'");
	$count = mysqli_num_rows($query);
	$array_data= mysqli_fetch_array($query);
	if($count > 0)
	{
			$Customer_email=$array_data['customer_email'];
			$Customer_name=$array_data['customer_first_name'];
			
			$mail = new PHPMailer;	
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com;';
			$mail->SMTPAuth = true;       
			$mail->Username = 'dharavath.mohan47@gmail.com';
			$mail->Password = 'mohan@112';          
			$mail->SMTPSecure = 'tls';         
			$mail->Port = 587;              
			$mail->setFrom('dharavath.mohan47@gmail.com', 'dharavath mohan');
			$mail->addAddress($Customer_email);
			$mail->isHTML(true); 
			$mail->Subject = "Farmer Super Market Password Recovery.........!";
			$mail->Body    = "Hi '".$array_data['customer_first_name']."',\n Your Password is: '".$array_data['customer_pass']."'. \n Please login to website to shop with us...! :)";

			if(!$mail->send()) 
			{
				$output = $mail->ErrorInfo;
				echo "<script>alert('$output')</script>";
			} 
			else {
				echo "<script>alert('Your Password has been sent to email..!')</script>";
			}
	}
	else
	{
		echo "<script>alert('No user found....!')</script>";
	}
}
?>
