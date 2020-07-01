<?php include_once "assets/config.php";
session_start();
$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysql_error());
		if(isset($_POST["place_cart"]))
		{
			$product_id=$_POST['product_id'];
			$quantity=$_POST['quantity'];
		    $customer_id=$_POST['customer_id'];
		    $vendor_email=$_POST['vendor_email'];
		    $duplicate=mysqli_query($connecti ,"SELECT * FROM customer_cart WHERE product_id='$product_id' AND customer_id='$customer_id'");
		    if(mysqli_num_rows($duplicate)==0)
			{
		        $insert = mysqli_query($connecti ,"INSERT INTO customer_cart (product_id,customer_id,vendor_email,quantity) values ('$product_id','$customer_id','$vendor_email','$quantity')");
			}
			else
			{
				echo '<script>alert("Item Already Added")</script>';
			}
			header("Location: {$_SERVER["HTTP_REFERER"]}");
		}
?>
<!DOCTYPE html>
<html lang="en" dir="auto">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Farmer SuperMarket</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Satisfy">
  

</head>
  <body>
  <style>
	
	.card-img-wrap {
  overflow: hidden;
  position: relative;
}
.card-img-wrap:after {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  background: rgba(255,255,255,0.3);
  opacity: 0;
  transition: opacity .25s;
    position: relative;
}
.card-img-wrap img {
  transition: transform .25s;
  width: 100%;
    position: relative;
}
.card-img-wrap:hover img {
  transform: scale(1.2);
    position: relative;
}
.card-img-wrap:hover:after {
  opacity: 1;
    position: relative;
}
</style>
  
  
    <?php include"assets/header.php" ?>
	<?php
		$all_category = mysqli_query($connecti,"SELECT * FROM all_categories");	
	?>
	
	<nav style="margin-left:2%">
		<a href="index.php">Home</a> >
		<?php
			if(count($_GET) ==0)
			{
		?>
			<a href="product.php">Product</a> >
		<?php
			}
			else
			{	
		?>
		<a href="product.php">Product</a> >
		<a href="product.php?category_name=<?= $_GET['category_name'];?>"><?= $_GET['category_name'];?></a> 
		<?php
			}
		?>
	</nav>
	
        <div class="container-fluid" style="margin-top:30px">
		
          <div class="row">
				<div class="col-9 col-lg-2 col-md-4 col-sm-6 ">
					<div class="list-group shadow">
						<a  href="product.php" class="list-group-item list-group-item-action list-group-item-primary active">category</a>
						<?php
							while ($each_row_data = mysqli_fetch_array($all_category)):
						?>
						  <a href="product.php?category_name=<?= $each_row_data['category_name'];?>" class="list-group-item list-group-item-action list-group-item-success"><?= $each_row_data['category_name'];?></a>
						  <?php endwhile;?>
					</div>

				</div>
	<?php 
		if(isset($_GET['find']))
		{
		  $search = $_GET['search'];
		  $calling = mysqli_query($connecti,"SELECT * FROM products WHERE product_name LIKE '%$search%' AND product_status='Available'");
		}
		elseif(isset($_GET['category_name']))
		{
			  $product_category = $_GET['category_name'];
			  $calling = mysqli_query($connecti,"SELECT * FROM products WHERE product_category='$product_category' AND product_status='Available' ");
		}
		else
		{
			$calling = mysqli_query($connecti,"SELECT * FROM products WHERE product_status='Available'");
		}
		$count = mysqli_num_rows($calling);
	?>
            <div class="col-9 col-lg-10 col-md-4 col-sm-6 ">
				<h3 class="btn btn-success"  style="position:relative;margin-left:30%">All products (<?=$count?>) </h3><hr></b>
              <div class="row">
                <?php
                if ($count > 0):
                      while($row = mysqli_fetch_array($calling)):
                ?>

                <div class="col-9 col-lg-3 col-md-4 col-sm-6 ">
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
					<div class="card" >
						 <div class="card-img-wrap">
							<a href="item.php?product_id=<?= $row['product_id'];?>"><img class="card-img-top" src="image\<?= $row['product_image'];?>" alt="Card image cap"></a><hr>
						 </div>
						<div class="card-block">
							<h6 class="card-text text-center" ><?php echo $row["product_name"]; ?></h6>
							<h6 class="card-text text-center">₹ <?php echo $row["product_price"]; ?></h6>
						</div>
						<?php															 
							if(isset($_SESSION['customer'])):
								$customer_email=$_SESSION['customer'];
								$cust_query = mysqli_query($connecti,"SELECT * from customers where customer_email='$customer_email'");
								$cust_row = mysqli_fetch_array($cust_query);
								$customer_id=$cust_row['customer_id'];
								echo "<script>console.log(JSON.parse('" . json_encode($customer_id) . "'));</script>";
						?>
							<input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>">
							<input type="hidden" name="vendor_email" value="<?php echo $row['vendor_email'];?>">
							<input type="hidden" name="customer_id" value="<?php echo $customer_id;?>">
							<input type="hidden" name="hidden_image" value="<?php echo $row["product_image"]; ?>" />
							<input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>" />
							<input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>" />
							<input  min="1" max="30" type="number" name="quantity" value="1" class="form-control text-center" />
							<input type="submit" name="place_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
					<?php endif?>
					</div><br>

				</form>
                </div>
                <?php endwhile;
              else:
                ?>
                  <div class='card'>
                      <div class='card-body'>
                        <h1> Product is not available</h1>
                      </div>
                  </div>
                <?php endif;?>
          </div>
        </div>
      </div>
    </div>
<hr>
<br>
   <?php include"assets/footer.php"?>
 </body>
</html>
