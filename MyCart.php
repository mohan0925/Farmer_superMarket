<?php include_once "assets/config.php";
session_start();

if(!isset($_SESSION['customer'])):
  header("location: login.php");
endif;

require 'PHPMailer/PHPMailerAutoload.php';

$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysql_error());
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
		<meta charset="utf-8">
		<title>Farmer SuperMarket</title>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
  </head>
  <body>

	<?php include"assets/header.php"?>
	
	<nav style="margin-left:2%">
		<a href="index.php">Home</a> >
		<a href="MyCart.php">Cart</a>
	</nav>
	
	<?php
		if(isset($_SESSION['customer'])):
			  $customer_email=$_SESSION['customer'];
			  $customer_data = mysqli_query($connecti,"select * from customers where customer_email='$customer_email'");
			  $array_data= mysqli_fetch_array($customer_data);
			  $cart_query=mysqli_query($connecti,"SELECT * FROM customer_cart
				inner join customers on customer_cart.customer_id=customers.customer_id
				inner join products on customer_cart.product_id=products.product_id
				inner join product_vendor on customer_cart.vendor_email=product_vendor.vendor_email
				where customer_cart.customer_id='".$array_data['customer_id']."' ORDER BY customer_cart.cart_id desc");

				$Total_price=0;
				$count=0;
				$cart_array=[];
				$num_row=mysqli_num_rows($cart_query);
				
				if($num_row>0):
	?>
	
	
	
	
	<div class="container-fluid" >

	<div class="wrapper" >
					<hr size="2px">
					<div class="row">
						<div class="col-lg-2" style="align:center"><b>Product Image</b></div>
						<div class="col-lg-2" style="align:center"><b>Product Name</b></div>
						<div class="col-lg-2" style="align:center"><b>Seller</b></div>
						<div class="col-lg-2" style="align:center"><b>Quantity</b></div>
						<div class="col-lg-2" style="align:center"><b>Price</b></div>
						<div class="col-lg-2" style="align:center"><b>Actions</b></div>
					</div>
					<hr size="2px">
		<?php

					while($cart_row = mysqli_fetch_array($cart_query)):
					
					$cart_details=$cart_row;
					
						  $o_id  = hash('sha256', microtime() );
					 $cart_array[$count]=[$cart_row['customer_id'],$cart_row['product_id'],$cart_row['vendor_email'],$o_id,$cart_row['quantity']];
					 $count++;
	?>
		<div class="wrapper row" style="height:100px;">
			<div class="col-lg-2" style="align:center">
	            <a href="item.php?p_id=<?= $cart_row['product_id'];?>"><img src="image\<?= $cart_row['product_image'];?>" alt="" height="50%" width="60%"></a>
	        </div>
			<div class="col-lg-2" style="align:center">
	            <p><?= $cart_row['product_name']?></p>
	        </div>
			<div class="col-lg-2" style="align:center">
	            <p ><?= $cart_row['vendor_first_name']?></p>
	        </div>
			<div class="col-lg-2" style="align:center">		
	            <p ><?= $cart_row['quantity']?></p> 
	        </div>
			<div class="col-lg-2" style="align:center">				
	            <p ><?= $cart_row['product_price']?>*<?= $cart_row['quantity']?> = ₹ <?=$p= $cart_row['product_price']* $cart_row['quantity']?></p>  
	        </div>
			<div class="col-lg-2" style="align:center">
	                <?=date_default_timezone_set('Europe/London');?>
					<i class="fas fa-shuttle-van text-info"></i>Product will be delivered within <strong><?= date(' g:ia d M y ', strtotime(date('d-m-Y H:i',strtotime('+0 hour +2 minutes',strtotime(date('d-m-Y h:i:s', time()))))));?></strong> <br>
					<a href="RemoveCart.php?cart_id=<?= $cart_row['cart_id']?>"><i class="fas fa-times-circle text-danger">REMOVE</i></a><br><br>
					<?php
						$Total_price = $Total_price + $p;
					?>
	        </div>
		</div><hr>
		<?php
						endwhile;
		?>
			</div>
	</div>

	<div class="container-fluid">
		<div class="row">
					<form class="" action="MyCart.php" method="post">						

						<a href="product.php" class="btn btn-success col-md-3" style="height: 54px;width: 147px;margin-left: 628px;position: relative;display: inline-block;"><b>CONTINUE SHOPPING</b></a>

						<a href="RemoveAll.php?customer_id=<?= $cart_details['customer_id']?>"  class="btn btn-danger col-md-3" style="height: 54px;width: 147px;margin-left: 36px;position: relative;display:inline-block"> <b>EMPTY CART</b></a>	

						<a class="btn btn-info col-md-3" style="height: 54px;width: 254px;margin-left: 18px;position: relative;display:inline-block"><b >Total ₹ <?= $Total_price+20?>/-(includes 20/- delivery)</b> </a>
							
						<input type="submit" name="order" value="ORDER NOW" class="btn btn-warning col-md-3" style="height: 54px;width: 147px;margin-left: 26px;position: relative;display:inline-block">
					</form>				

		</div>
	</div><br>
	<?PHP	 
				else:?>
					<div class="container">
						<div class="card shadow">
							<i class="fa fa-frown-o fa-6" aria-hidden="true" style="height:300px;width:300px ;margin:auto;font-size: 16em"></i>  
							<h2 style="margin:auto">Your cart is empty!</h2>
							<a href="product.php" class="btn btn-success text-white mt-3 mb-3" style="height:40px;width:15%;margin:auto">
 								<b>SHOP NOW</b></a>
						</div>
					</div>
					<br>
	<?php include"assets/footer.php"?>
		<?PHP	endif; ?>
		<?php endif;  ?>
		<?php
			$id=date('Ymdhis');
			if(isset($_POST['order']))
			{		
				foreach ($cart_array as $key => $value)
				{
					$insert = mysqli_query($connecti,"INSERT INTO customer_orders (order_invoice,product_id,customer_id,quantity,vendor_email) values ('$id','$value[1]','$value[0]','$value[4]','$value[2]')");
				}
				$mail = new PHPMailer;
				$mail->isSMTP();
				$mail->Host = 'smtp.gmail.com;';
				$mail->SMTPAuth = true;       
				$mail->Username = 'dharavath.mohan47@gmail.com';
				$mail->Password = 'mohan@112';          
				$mail->SMTPSecure = 'tls';         
				$mail->Port = 587;              
				$mail->setFrom('dharavath.mohan47@gmail.com', 'dharavath mohan');
				$mail->addAddress($customer_email);
				$mail->addReplyTo('dharavath.mohan47@gmail.com', 'dharavath mohan');
				$mail->isHTML(true); 
				$mail->Subject = "Order placed on Farmer Super Market $id";
				$mail->Body    = "Hi '".$array_data['customer_first_name']."', Your order has beeen placed. Your order id is $id.\n Thank You for shopping with us....!";

				if(!$mail->send()) 
				{
					$output = $mail->ErrorInfo;
					echo "<script>alert($output)</script>";
				} 
				else {
					echo "Order confirmation has been sent..!";
				}
					
				$del=mysqli_query($connecti,"DELETE FROM customer_cart where customer_cart.customer_id='".$array_data['customer_id']."'");
				echo "<script>window.open('MyOrder.php','_self')</script>";
			}	
		?>
		
		<hr>
<br>
		
<?php include"assets/footer.php"?>
  </body>
</html>