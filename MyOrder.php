<?php include_once "assets/config.php";
session_start();

if(!isset($_SESSION['customer'])):
  header("location: login.php");
endif;

$connection = mysqli_connect('localhost','root','','db_ecommerce') or die(mysqli_error());
date_default_timezone_set('Europe/London');
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
  </head>
  <body>
      <?php include"assets/header.php"?>
	  
	<nav style="margin-left:2%">
		<a href="index.php">Home</a> >
		<a href="MyOrder.php">My Order</a>
	</nav>
	  
	  
      <div class="container-fluid" style="padding-right:100px;padding-left:120px;margin-top:30px">
      <u> <h2 style="font-family:'Times New Roman'">MY ORDERS</h2></u>
      <?php
			
			if(isset($_SESSION['customer'])):
			$log=$_SESSION['customer'];
			$calling = mysqli_query($connection, "select * from customers where customer_email='$log'");
			$row = mysqli_fetch_array($calling);
			$query = mysqli_query($connection, "select DISTINCT order_invoice from customer_orders  
								inner join customers on customer_orders.customer_id=customers.customer_id
								inner join products on customer_orders.product_id=products.product_id
								inner join product_vendor on customer_orders.vendor_email=product_vendor.vendor_email where customer_orders.customer_id='".$row['customer_id']."' ORDER BY customer_orders.order_id desc");

		  $count = mysqli_num_rows($query);
		  if($count>0){
		  while($order_data = mysqli_fetch_array($query)): 
	  ?>

        <div class="col-lg-12">
          <div class="card mb-4">
                  <div class=" bordered p-1">
                    <div class="btn btn-success card " style="height:40px;width:15%;"> OD<?= $order_data['order_invoice'];?></div>
                  </div>
					<div class="row">
						<div class="col-lg-2" style="align-text:center;position:relative;"><b>Product Image</b></div>
						<div class="col-lg-2" style="align-text:center"><b>Product Name</b></div>
						<div class="col-lg-2" style="align-text:center"><b>Seller</b></div>
						<div class="col-lg-2" style="align-text:center"><b>Quantity</b></div>
						<div class="col-lg-2" style="align-text:center"><b>Price</b></div>
						<div class="col-lg-2" style="align-text:center"><b>Actions</b></div>
					</div>
					<hr size="2px">
					<?php
						$order = mysqli_query($connection, "select * from customer_orders
						inner join customers on customer_orders.customer_id=customers.customer_id
						inner join products on customer_orders.product_id=products.product_id
						inner join product_vendor on customer_orders.vendor_email=product_vendor.vendor_email where customer_orders.customer_id='".$row['customer_id']."'" );
						while ($data = mysqli_fetch_array($order)):
							if($order_data['order_invoice']==$data['order_invoice']){
								$t=$data['order_time'];
								$delivery_time=date('d-m-Y H:i:s',strtotime('+0 hour +2 minutes',strtotime($data['order_time'])));
                    ?>
                        <div class="card " style="padding-right:50px;padding-left:50px;border-radius:1px">
                          <div class="row" >
                                <div class="col-lg-2 p-4">
									<img src="image\<?= $data['product_image'];?>" alt="" height="170px" width="80%">
                                </div>
                                <div class="col-lg-2 p-4">
									<p><?= $data['product_name']?></p>
									<p>Price: £<?= $data['product_price']?>/-</p>
                                </div>
                                <div class="col-lg-2 p-4">
									<p ><?= $data['vendor_first_name']?></p>
                                </div>
                                <div class="col-lg-2 p-4">
									<p ><?= $data['quantity']?></p> 
                                </div>
                                <div class="col-lg-2 p-4">
									<p ><?=$p= $data['product_price']* $data['quantity']?></p> 
                                </div>
                                <div class="col-lg-2 p-4">
									
                                <?php
									if($data['order_status']=='Active' || $data['order_status']=='Delivered'):
				
									$delivery_time=date('Y-m-d h:i:s',strtotime('+0 hour +2 minutes',strtotime($data['order_time'])));
									
                                    if( date('Y-m-d h:i:s', time())>$delivery_time):
										$order_id= $data['order_id'];
										$delevered=mysqli_query($connection, "UPDATE customer_orders set order_status='Delivered' where order_id='$order_id'");
                                ?>
                                    <b class="text-success"> <i class="fas fa-shuttle-van text-info"></i>  <i class="fas fa-check text-success"></i> Delivered</b><br> <br>
                                <?PHP
										else:
											$delivery_time=date('h:i:s d-m-Y',strtotime('+0 hour +2 minutes',strtotime($data['order_time'])));
                                ?>
                                    <i class="fas fa-shuttle-van text-info"></i>  Delivery expected till <strong><?= date(' g:ia d M y ', strtotime($delivery_time)); ?></strong> <br><br>
                                    <a  href="cancel.php?order_id=<?= $data['order_id']?>"><i class="fas fa-times-circle text-info">CANCEL ITEM</i></a><br><br>
                                <?php
										endif;
									else:
										$delivery_time=date('h:i:s d-m-Y',strtotime('+0 hour +2 minutes',strtotime($data['order_time'])));
                                      ?>
                                          <del>  <i class="fas fa-shuttle-van text-info"></i>  Delivery expected till <strong><?= date(' g:ia d M y ', strtotime($delivery_time)); ?></strong> </del><br><br>
                                           <b style="color:red"> CANCELLED</b><br><br>
                                <?PHP endif; ?>
                                </div>
                            </div>
                        </div>
                  <?PHP    
				  }
                    endwhile;
                  ?>
                  <div class=" container-fluid row p-3 ml-0" style="border:solid 1px #ccc">
                    <u> Ordered On:</u>&nbsp;&nbsp;&nbsp;&nbsp;<?=$t?>
                  </div>

          </div>
        </div>
      <?php endwhile;
    }
    else{?>	  
	</div>
						<br>
	  				<div class="container">
						<div class="card shadow wrapper">
							<i class="fa fa-frown-o fa-6" aria-hidden="true" style="height:300px;width:300px ;margin:auto;font-size: 16em"></i>  
							<h2 style="margin:auto">You have not ordered yet!</h2><br>
							<a href="product.php" class="btn btn-success text-white" style="height:40px;width:15%;margin:auto">
 								<b>SHOP NOW</b></a>	<br>
						</div>
											
					</div>
  <?PHP	}
    endif;?>


<hr>
<br>

<?php include"assets/footer.php"?>

  </body>
</html>