<?php include_once "assets/config.php";
session_start();

date_default_timezone_set('Europe/London');

require 'PHPMailer/PHPMailerAutoload.php';

	if(!isset($_SESSION['customer'])):
	  header("location: login.php");
	endif;

$conn = mysqli_connect('localhost','root','','db_ecommerce') or die(mysqli_error());

$product_id=$_GET['product_id'];
$product_query=mysqli_query($conn, "SELECT * from products where product_id='$product_id'");
$data_row=mysqli_fetch_array($product_query);
						
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
		<meta charset="utf-8">
		<title>Farmer SuperMarket</title>
		<link rel="stylesheet" href="bootstrap\bootstrap.min.css">
     <link rel="stylesheet" href="css\body.css">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
	<link rel="stylesheet" type="text/css" href="css/carrers_css.css">
	<style>
	.w-100 {
    width: 10%!important;
}

.bg-primary {
    background-color: #4877a9;
}
	</style>
	
  </head>
  <body>
<?php include"assets/header.php"?>

	<nav style="margin-left:2%">
		<a href="index.php">Home</a> >
		<?php
			if(count($_GET) <1)
			{
		?>
			<a href="product.php">Product</a> >
		<?php
			}
			else
			{	
		?>
		<a href="product.php">Product</a> >
		<a href="product.php?category_name=<?= $data_row['product_category'];?>"> <?= $data_row['product_category'];?> </a> >
		<a href="item.php?product_id=<?= $data_row['product_id'];?>"> <?= $data_row['product_name'];?> </a> >
		<a href="order.php?product_id=<?= $data_row['product_id'];?>"> Order </a> 
		<?php
			}
		?>
	</nav>



<div class="container-fluid" style="margin-top:10px">
    <div class="row">
        <div class="col-8">
            <?php
			    if(!isset($_SESSION['customer']))
				{
            ?>
				<div class="card" style="width:50%">
					<div class="card-header bg-success">
					  1.LOGIN
					</div>
					<div class="card-body" style="background-color: antiquewhite;">
						<div class="row">
							<div class="col-lg-6">
								<form action="order.php" method="post">
									<div class="form-group"> 
										<label><i class="fa fa-envelope" aria-hidden="true"></i> Email</label> 
										<input type="email" name="customer_email" class="form-control" placeholder="Enter Email" required oninvalid="this.setCustomValidity('Required Email Field')" oninput="this.setCustomValidity('')"> 
									</div>
									<div class="form-group"> 
										<label><i class="fa fa-lock" aria-hidden="true"></i> Password</label>
										<input type="password" name="customer_pass" class="form-control" placeholder="Enter password" required oninvalid="this.setCustomValidity('Required password field')" oninput="this.setCustomValidity('')"> 
									</div>  
									<input type="hidden" name="product_id" value="<?= $_GET['product_id'];?>">
									<div class="form-group">
										<input type="submit" class="btn btn-raised btn-block btn-danger" value="Login" name="Customer_login">
									</div>
								</form>
								<div class="form-group">
									<a style="color:black;position:relative;" href="forgot_password.php" >Forgot Password? </a><br>
								</div> 
								<div class="form-group">
									<label style="font-size: 14px;">Don't hava an account 	</label><a style="color:black;position:relative;" href="register_customer_account.php?product_id=<?= $_GET['product_id'];?>" >	Sign Up</a>
								</div> 
							</div>
						</div>
					</div>
				</div>

            <?php
					if(isset($_POST['Customer_login']))
					{
						$customer_email = $_POST['customer_email'];
						$customer_pass = $_POST['customer_pass'];
						$product_query = mysqli_query($conn, "select * from customers where customer_email ='$customer_email' AND customer_pass ='$customer_pass'");
						$no_of_rows = mysqli_num_rows($product_query);
						if($no_of_rows > 0)
						{
							$_SESSION['customer'] = $customer_email;
							$product_id = $_POST['product_id'];
							echo"<script>window.open('order.php?product_id=$product_id','_self')</script>";
						}
						else{
							echo "<script>alert('Credentials are incorrect')</script>";
						}
					}
				}
				else
				{
					$customer_email = $_SESSION['customer'];
					$customer_product_query = mysqli_query($conn, "SELECT * FROM customers where customer_email='$customer_email'");
					$customer_row = mysqli_fetch_array($customer_product_query);
            ?>
		<div class="container" >
			<div class="row">
				<div class="col-lg-3" >
					<div class="panel panel-danger" >
						<div class="panel-header text-white" style="background-color: #555555;">
								Delivery Address
						</div><br>
						<div class="panel-body" >
							<div class="row">
								<form action="order.php" method="post">
									<div class="form-group"> 
										<label><i class="fas fa-address-card"></i> Address</label>
										<input type="text" name="customer_address" class="form-control" placeholder="Enter Address" required oninvalid="this.setCustomValidity('Required Address Field')" oninput="this.setCustomValidity('')" value="<?=$customer_row['customer_address']?>"> 
									</div> 
									<div class="form-group"> 
										<label><i class="fa fa-address-card-o" aria-hidden="true"></i> Postcode</label>
										<input type="text" name="customer_postcode" class="form-control" placeholder="Enter postcode" required oninvalid="this.setCustomValidity('Required postcode Field')" oninput="this.setCustomValidity('')" value="<?=$customer_row['customer_postcode']?>"> 
									</div> 
									<div class="form-group"> 
										<label><i class="fa fa-phone" aria-hidden="true"></i> Phone</label>
										<input type="number" name="customer_phone" class="form-control" placeholder="Enter phone number" required oninvalid="this.setCustomValidity('Required phone Field')" oninput="this.setCustomValidity('')" value="<?=$customer_row['customer_phone']?>"> 
									</div> 
									<input type="hidden" class="form-control" value="<?=$customer_row['customer_id']?>" name='customer_id'>
									<input type="hidden" class="form-control" value="<?= $_GET['product_id'];?>" name='product_id'>
									<div class="form-group">
										<input type="submit" class="btn btn-raised btn-block btn-primary" value="Update" name="adddress_update">
									</div> 
								</form>
							</div>						
					<?php
						if(isset($_POST['adddress_update']))
						{
							$customer_id=$_POST['customer_id'];
							$customer_address=$_POST['customer_address'];
							$customer_postcode=$_POST['customer_postcode'];
							$customer_phone=$_POST['customer_phone'];
							$product_id=$_POST['product_id'];

							$update=mysqli_query($conn, "UPDATE customers set customer_address='$customer_address',customer_postcode='$customer_postcode',customer_phone='$customer_phone' where customer_id='$customer_id'");
							echo"<script>window.open('order.php?product_id=$product_id','_self')</script>";
						}
					?>
						</div>
					</div><br>
				</div>
					<div class="col-lg-9">
						<div class="panel panel-danger">
							<div class="panel-header text-white" style="background-color: #555555;">
								Order Details
							</div><br>
							<div class="panel-body">
								<?php
									$product_id=$_GET['product_id'];
									$_SESSION['products']=$product_id;
									$product_query=mysqli_query($conn, "SELECT * FROM products inner join product_vendor on products.vendor_email=product_vendor.vendor_email WHERE product_id='$product_id'");
									$product_row=mysqli_fetch_array($product_query);
								?>
								<hr>
									<div class="row">
										<div class="col-lg-3" style="align:center"><b>Product Image</b></div>
										<div class="col-lg-2" style="align:center"><b>Product Name</b></div>
										<div class="col-lg-2" style="align:center"><b>Seller</b></div>
										<div class="col-lg-1" style="align:center"><b>Price</b></div>
										<div class="col-lg-4" style="align:center"><b>Actions</b></div>
									</div><hr>
									<div class="row" style="height:100px;">
										<div class="col-lg-3" style="align:center">
											<a href="item.php?product_id=<?= $product_row['product_id'];?>"><img src="image\<?= $product_row['product_image'];?>" alt="" height="70%" width="70%"></a>
										</div>
										<div class="col-lg-2" style="align:center">
											<p><?= $product_row['product_name']?></p>
										</div>
										<div class="col-lg-2" style="align:center">
											<p ><?= $product_row['vendor_first_name']?></p>
										</div>
										<div class="col-lg-1" style="align:center">				
											<p ><?= $product_row['product_price']?></p>  
										</div>
										<div class="col-lg-4" style="align:center">
												<i class="fas fa-shuttle-van"></i>Product will be delivered by <strong><?= date(' g:ia d M y ', strtotime(date('d-m-Y H:i',strtotime('+0 hour +2 minutes',strtotime(date('d-m-Y h:i:s', time()))))));?></strong> <br>
										</div>
									</div>
							</div>	
						</div><br>
						
					<form class="" action="order.php" method="post" style="position:relative;margin-left:85%">
						<input type="hidden" name="product_id" value="<?= $product_row['product_id']?>">
						<input type="hidden" name="vendor_email" value="<?= $product_row['vendor_email']?>">
						<input type="hidden" name="customer_id" value="<?= $customer_row['customer_id']?>">
						<input type="hidden" name="product_quantity" id="update_quantity" value="<script>quantity</script>">	
						
						<input type="submit" class="card mb-5 text-white py-2" value="PLACE ORDER" name="place_order" style="height:50px;background-color: #4877a9">
					</form>
						
					<?php
						$order_invoice=date('Ymdhis');
						if(isset($_POST['place_order']))
						{
							$product_quantity=$_POST['product_quantity'];
							$product_id=$_POST['product_id'];
							$customer_id=$_POST['customer_id'];
							$vendor_email=$_POST['vendor_email'];
							$insert = mysqli_query($conn, "INSERT INTO customer_orders (order_invoice,product_id,customer_id,quantity,vendor_email) values ('$order_invoice','$product_id','$customer_id','$product_quantity','$vendor_email')");
							
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
							$mail->Subject = "Order placed on Farmer Super Market $order_invoice";
							$headers  = 'MIME-Version: 1.0' . "\r\n";
							$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
							$mail->$headers;
							
							
							$mail->Body    = "
									
									Hi '".$customer_row['customer_first_name']."', 
									Your order has beeen placed. \n 
									Your Order id is $order_invoice.
									\n Thank You for shopping with us....!
									
							";

							if(!$mail->send()) 
							{
								$output = $mail->ErrorInfo;
								echo "<script>alert($output)</script>";
							} 
							else {
								echo "Order confirmation has been sent..!";
							}						
							
							echo "<script>window.open('OrderPlaced.php?product_id=$product_id','_self')</script>";
						}
					?>
						
					</div><hr>
				</div>
			</div>
		</div>
		<div class="col-lg-3 ml-3">
			<div class="panel panel-danger">		
				<div class="panel-header text-white" style="background-color: #555555;">
					Price
				</div><br>
				<div class="panel-body">
						<table style="width:100%">
                                <tr>
                                   <th>Item Price</th>
                                   <td style="float:right">₹<span class="item_price"><?= $data_row['product_price']?></span></td>
                                </tr>
                                <tr>
									<th>Quantity</th>
                                     <td class="float-right">
                                       <span>
                                         <button type="button" id="decrease" class="btn btn-sm decrease_quantity">-</button>
                                         <span class=" btn btn-outline-info bordered btn-sm text-dark quantity_display" >1</span>
                                         <button type="button" id="increase" class="btn btn-sm increase_quantity">+</button>
                                       </span>
                                     </td>
                                 </tr>
                                 <tr style="border-bottom:1px solid #ccc">
                                   <th>Delivery Charge</th>
                                   <td style="float:right">₹20/-</td>
                                 </tr>

                                <tr>
                                   <th>Total</th>
                                   <td style="float:right">₹ <span class="product_total_price"><?= $data_row['product_price']+20?></span></td>
                                </tr>
                        </table>
				</div>
			</div>	   
		</div><br>
	</div>
			<?php 
				}
			?>
			
</div>

<hr>
<br>

   <?php include"assets/footer.php"?>

 <script>
var quantity;
var quantity_display;


  $(document).ready(function(){
    $(".increase_quantity").click(function(){
      	quantity_display = parseInt($(".quantity_display").text());
		if(quantity_display<15)
		{			
			  quantity_display = parseInt($(".quantity_display").text())+1;
		}
		else
		{
			quantity_display = parseInt($(".quantity_display").text());
		}
          $(".quantity_display").text(quantity_display);
      var item_price = parseInt($(".item_price").text());
      var product_total_price = quantity_display * item_price + 20;
      $(".product_total_price").text(product_total_price);
    quantity=  $("#update_quantity").val(quantity_display);

    });

      $(".decrease_quantity").click(function(){
		  
		quantity_display = parseInt($(".quantity_display").text());
		if(quantity_display<2)
		{			
			  quantity_display = parseInt($(".quantity_display").text());
		}
		else
		{
			quantity_display = parseInt($(".quantity_display").text())-1;
		}		
		$(".quantity_display").text(quantity_display);
        var item_price = parseInt($(".item_price").text());
        var product_total_price = quantity_display * item_price + 20;
        $(".product_total_price").text(product_total_price);
      quantity=  $("#update_quantity").val(quantity_display);

      });


    $("#update_quantity").val(1);

  });

 </script>

  </body>
</html>