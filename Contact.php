<?php  include_once"assets/config.php";
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <title>FoodStuff | online Dairy products available Here</title>
  <link rel = "icon" href = "image\ico.gif" type = "image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Satisfy&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="bootstrap\bootstrap.min.css">
	<link rel="stylesheet" href="css\body.css">
<link rel="stylesheet" type="text/css" href="css/log_style.css">

</head>
<body>
	 <?php include"assets/header.php"?>
	<!--Login page-->
	<div class="container" style="margin-top:20px">
    <div class="card shadow m-4">
      <div class="container align-items-center">
        <form method="post" action="contact.php" enctype="multipart/form-data">
          <h2 class="mb-5 font-weight-light text-uppercase text-center" style="font-family: 'Kaushan Script', cursive;"> Contact Us</h2>
          <div  class="row" class="form-group">
            <div class="col-lg-12 mr-5">
              <input type="text" class="form-control rounded-pill form-control-lg" placeholder="Full name" name="f_name">
            </div>
          </div>

          <div class="row m-4">
            <div class="col-lg-6">
              <div class="form-group">
                <input type="number" class="form-control rounded-pill form-control-lg" placeholder="Phone no." name="phone">
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <input type="email" class="form-control rounded-pill form-control-lg" placeholder="Email Id" name="email">
              </div>
            </div>
          </div>

          <div class="form-group" style="border-radius:10px;">
              <textarea  type="te"name="message" placeholder="Message" class="w-100" style="height:200px;border-radius:10px;"  ></textarea>
          </div>

          <input type="submit" class="btn btn-success mb-5 btn-block rounded-pill" value="Leave a message" name="contact">
        </form>

        <h3 >customer support</h3>
            <span>call us: <a href="#">+91 6201255655</a></span><br>
            <span>Email: <a href="#">FoodStuff4u@gmail.com</a> </span><br>
            follow us on: <br>
            <div class="row ">
              <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-2  mb-5">
                        <a href="#" style=""> <img src="image\tw.png" alt=""  style="height:40px;width:100%"></a>
                    </div>

                    <div class="col-lg-2  mb-5">
                        <a href="#"><img src="image\fb.png" alt="" style="height:40px;width:100%"></a>
                    </div>

                    <div class="col-lg-2 mb-5">
                        <a href="#"> <img src="image\insta.png" alt="" style="height:40px;width:100%"></a>
                    </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include"assets/footer.php"?>
</body>
</html>
<?php
$connecti = mysqli_connect('localhost','root','','foodstuff') or die(mysqli_error());
 if(isset($_POST['contact']))
 {


$f_name=$_POST['f_name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$message=$_POST['message'];



$query=mysqli_query ($connecti,"INSERT INTO contact (f_name,phone,email,message)
  value('$f_name','$phone','$email','$message')");


echo "<script>window.open('contact.php','_self')</script>";

 }

  ?>
