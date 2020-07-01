
<?php include_once "assets/config.php";
session_start();

if(!isset($_SESSION['customer'])):
  header("location: login.php");
endif;

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <title>Farmer SuperMarket</title>
     <link rel="stylesheet" href="bootstrap\bootstrap.min.css">
     <link rel="stylesheet" href="css\body.css">
     <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
  </head>
  <body style="background:#f1f3f6">
      <?php include"assets/header.php"?>
      <?php
	  $connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysqli_error());
        if(isset($_SESSION['customer'])):
          $customer_email=$_SESSION['customer'];
          $product_id=$_GET['product_id'];
          $customer_query=mysqli_query($connecti,"SELECT * FROM customers WHERE customer_email='$customer_email'");
          $customer_row=mysqli_fetch_array($customer_query);

          $product_query=mysqli_query($connecti,"SELECT * FROM products inner JOIN product_vendor on  product_vendor.vendor_email=products.vendor_email WHERE product_id='$product_id'");
          $product_row=mysqli_fetch_array($product_query);
          $orders_query=mysqli_query($connecti,"SELECT * FROM customer_orders WHERE product_id='$product_id'");
          $orders_row=mysqli_fetch_array($orders_query);

        ?>

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
		<a href="product.php?category_name=<?= $product_row['product_category'];?>"> <?= $product_row['product_category'];?> </a> >
		<a href="item.php?product_id=<?= $product_row['product_id'];?>"> <?= $product_row['product_name'];?> </a> >
		<a href="order.php?product_id=<?= $product_row['product_id'];?>"> Order </a> >
		<a href="OrderPlaced.php?product_id=<?= $product_row['product_id'];?>"> Order Placed</a> 
		<?php
			}
		?>
	</nav>

		

      <div class="container-fluid" style="margin-top:20px;padding-right:100px;padding-left:100px;">
           <div class="card shadow-sm mt-4">
              <div class="row">
                <div class="col-lg-8">
                  <img src="image\orderplaced.png" style="height:50px;width:7%;float:left">
                   <span style="position:absolute;font-family: 'Lobster', cursive;font-size:150%;color:#009432;">Thank You for shopping with us. Your Order  Has Been Placed successfully... <i class="fas fa-smile"></i></span>
                </div>

                <div class="col-lg-3 ">
                  <a href="MyOrder.php?OD=<?= $customer_row['customer_id']?>&c_id=<?= $customer_row['customer_id']?>" class="btn btn-info" style="margin-left:5%"> Go to My Orders</a>
                </div>

              </div>
          </div>

          <div class="card shadow-sm mt-4 text-capitalize">
              <div class="row mt-4 ml-3">
			    
				<div class="col-lg-2 p-4">
                   <img src="image\<?= $product_row['product_image'];?>" alt="" height="170px" width="100%">
                </div>
                <div class="col-lg-4">
                    <p style="font-size:200%"><?= $product_row['product_name']?></p><hr>
					<p>Qty: <?= $orders_row['quantity']?> </p>
                    <?php  $v_name = $product_row['vendor_first_name'];?>
                    <p>Seller: <?=   $v_name;?></p>
                    <p>Price: ₹<span><?= ($product_row['product_price'] * $orders_row['quantity'])+20?></span></p>
                </div>
			  
                <div class="col-lg-6">
                  <h6 style="font-size:150%;color:black"><i class="fas fa-bicycle"></i>  Delivery Address</h6><hr>
                  <p style="Color:black" ><?= $customer_row['customer_first_name']?> <?= $customer_row['customer_last_name']?></p>
                  <p><?= $customer_row['customer_address']?></p>
                  <p><?= $customer_row['customer_postcode']?></p><br>
                  <p style="color:black">Phone Number</p>
                  <p><?= $customer_row['customer_phone']?></p>
                </div>
              </div>
          </div>
            </div>
          </div>


      </div>
    <?php endif;
    ?>
	
	<br>
<hr>
<br>

<?php include"assets/footer.php"?>



  </body>
</html>
