
<?php include_once "assets/config.php";
session_start();
$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysql_error());
		if(isset($_SESSION['customer']))
		{
			if(isset($_POST["add_to_cart"]))
			{
				$product_id=$_POST['product_id'];
				$customer_id=$_POST['customer_id'];
				$vendor_email=$_POST['vendor_email'];
				$quantity=1;
				
				$duplicate=mysqli_query($connecti ,"SELECT * FROM customer_cart WHERE product_id='$product_id' AND customer_id='$customer_id'");
				if(mysqli_num_rows($duplicate)==0)
				{
					$insert = mysqli_query($connecti ,"INSERT INTO customer_cart (product_id,customer_id,vendor_email,quantity) values ('$product_id','$customer_id','$vendor_email','$quantity')");
				}
				else
				{
					echo '<script>alert("Item present in Cart")</script>';
				}
				header("Location: {$_SERVER["HTTP_REFERER"]}");
			}
		}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
   	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="designer" content="imgix">
	<meta name="developer" content="imgix">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,maximum-scale=1">
	<meta http-equiv="Accept-CH" content="DPR, Width, Viewport-Width">
	<meta charset="utf-8">
	<title>Farmer SuperMarket</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Satisfy">
	<style type="text/css">
		body {
			font-family: Helvetica Neue, Arial, sans;
			margin-top: 2em;
			background: #FAFAFA;
		}

		.wrapper {
			margin: 0 auto;
			width: 860px;
		}

		.drift-demo-trigger {
			width: 40%;
			float: left;
		}

		.detail {
			position: relative;
			width: 55%;
			margin-left: 5%;
			float: left;
		}

		h1 {
			color: #013C4A;
			margin-top: 1em;
			margin-bottom: 1em;
		}

		p {
			max-width: 32em;
			margin-bottom: 1em;
			color: #23637f;
			line-height: 1.6em;
		}

		p:last-of-type {
			margin-bottom: 2em;
		}

		a {
			color: #00C0FA;
		}

		.ix-link {
			display: block;
			margin-bottom: 3em;
		}

		@media (max-width: 900px) {
			.wrapper {
				text-align: center;
				width: auto;
			}

			.detail,
			.drift-demo-trigger {
				float: none;
			}

			.drift-demo-trigger {
				max-width: 100%;
				width: auto;
				margin: 0 auto;
			}

			.detail {
				margin: 0;
				width: auto;
			}

			p {
				margin: 0 auto 1em;
			}

			.responsive-hint {
				display: none;
			}

			.drift-bounding-box {
				display: none;
			}
		}
		
		prod_name {
    color: #212121;
    font-size: 18px;
    font-weight: 400;
    display: contents;
}

._9E25nV ._2J4LW6, ._9E25nV .U7dD2g {
    color: #878787;
    font-size: 16px;
    display: block;
    font-weight: 500;
}
		
		._2AkmmA._7UHT_c {
    background: #fb641b;
    box-shadow: 0 1px 2px 0 rgba(0,0,0,.2);
    border: none;
    color: #fff;
}

._2MWPVK {
    padding: 11px 8px;
    border-radius: 36px;
    box-shadow: 0 1px 2px 0 rgb(251, 100, 28);
    width: 98%;
    border: beige;
    float: left;
    background: #111111;
    color: #eee;
    height: 43%;
}

._2Npkh4 {
    text-transform: uppercase;
    width: 44%;
    font-size: 11px;
}

._2AkmmA._7UHT_c {
    background: #161515;
    box-shadow: 0 1px 2px 0 rgba(233, 0, 0, 0.2);
    border: beige;
    color: #fdfdfd;
}
.fonts-loaded body, .fonts-loaded button, .fonts-loaded input, .fonts-loaded select, .fonts-loaded textarea {
    font-family: Roboto,Arial,sans-serif;
    letter-spacing: 0;
}
._2kuvG8 {
    padding: 10px 8px;
    border-radius: 39px;
    box-shadow: 0 1px 2px 0 rgba(0,0,0,.2);
    float: right;
    width: 98%;
}
._2Npkh4 {
    text-transform: uppercase;
    width: 44%;
    font-size: 16px;
}

._279WdV {
    vertical-align: middle;
    background-repeat: no-repeat;
    width: 14px;
    height: 14px;
}

	</style>
  
  
</head>
<body">

      <?php include"assets/header.php"?>
	<?php
		$all_category = mysqli_query($connecti,"SELECT * FROM all_categories");	
	?>
	
	<nav style="margin-left:2%">
		<a href="index.php">Home</a> >
		<?php
			$product_id=$_GET['product_id'];
			$product_data = mysqli_query($connecti,"SELECT * FROM products where product_id=$product_id");
			$product_row_data = mysqli_fetch_array($product_data);
			if(count($_GET) <1)
			{
				echo"<script>window.open('product.php','_self')</script>";
		?>
			<a href="product.php">Product</a> >
		<?php
			}
			else
			{
		?>
		<a href="product.php">Product</a> >
		<a href="product.php?category_name=<?= $product_row_data['product_category'];?>"> <?= $product_row_data['product_category'];?> </a> >
		<a href="item.php?product_id=<?= $product_row_data['product_id'];?>"> <?= $product_row_data['product_name'];?> </a> 
		<?php
			}
		?>
	</nav>
	
	
	
        <div class="container-fluid" style="margin-top:20px">
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
					  if(isset($_GET['product_id'])):
						  $product_id = $_GET['product_id'];
						  $calling = mysqli_query($connecti,"SELECT * from products where product_id='$product_id'");
						  $row = mysqli_fetch_array($calling);
						endif
				?>
				
				<div class="col-9 col-lg-4 col-md-4 col-sm-6 ">
					<div class="wrapper">
						<img class="drift-demo-trigger" data-zoom="image\<?= $row['product_image'];?>" src="image\<?= $row['product_image'];?>">

						<div class="detail" style="border:1px solid #333; background-color:#fff; border-radius:5px; padding:16px; margin-bottom:10%">
							<section>		
								<div>
									<h4 class="prod_name"><span class="_35KyD6"><?= $row['product_name'];?></span></h4>
								</div>
								<div class="prod_price" style="font-size: 28px;vertical-align: sub;color: black;"><b>₹ <?= $row['product_price'];?></b></div>
								<div class="prod_available" style="font-size: 15px;vertical-align: sub;color: green;">Status: <?= $row['product_status'];?></div>
								<div class="prod_available" ><b style="font-size: 18px;vertical-align: sub;color: black;">Description: </b><br><?= $row['product_description'];?></div>
									
							</section>
							<br>

							<?php									
								if(isset($_SESSION['customer'])):
									$log=$_SESSION['customer'];
									$cust = mysqli_query($connecti,"SELECT * from customers where customer_email='$log'");
									$cust_row = mysqli_fetch_array($cust);
									$customer_id=$cust_row['customer_id'];
							?>
							<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
									<input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>">
									<input type="hidden" name="vendor_email" value="<?php echo $row['vendor_email'];?>">
									<input type="hidden" name="customer_id" value="<?php echo $customer_id;?>">
									
									<input type="submit" name="add_to_cart" value="Add to Cart"  class="_2AkmmA _2Npkh4 _2MWPVK"><svg class="_3oJBMI" width="16" height="16" viewBox="0 0 16 15" xmlns="http://www.w3.org/2000/svg"><path class="" d="M15.32 2.405H4.887C3 2.405 2.46.805 2.46.805L2.257.21C2.208.085 2.083 0 1.946 0H.336C.1 0-.064.24.024.46l.644 1.945L3.11 9.767c.047.137.175.23.32.23h8.418l-.493 1.958H3.768l.002.003c-.017 0-.033-.003-.05-.003-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92c.99 0 1.805-.75 1.91-1.712l5.55.076c.12.922.91 1.636 1.867 1.636 1.04 0 1.885-.844 1.885-1.885 0-.866-.584-1.593-1.38-1.814l2.423-8.832c.12-.433-.206-.86-.655-.86" fill="#fff"></path></svg>

															<button onclick="location.href = 'order.php?product_id=<?= $row['product_id']?>';" class="_2AkmmA _2Npkh4 _2kuvG8 _7UHT_c" type="button"><span class="_279WdV"></span> <!-- -->BUY NOW</button>
							</form>
							<?php 
							else:
							?>

								<button onclick="location.href = 'order.php?product_id=<?= $row['product_id']?>';" class="_2AkmmA _2Npkh4 _2kuvG8 _7UHT_c" type="button"><span class="_279WdV"></span> <!-- -->BUY NOW</button>
							<?php
							endif;
							?>
						</div>
					</div>
				</div>
				
			</div>
		</div>

<hr>
<br>
<?php include"assets/footer.php"?>
	<script src="dist/Drift.js"></script>
	<script>
		new Drift(document.querySelector('.drift-demo-trigger'), {
			paneContainer: document.querySelector('.detail'),
			inlinePane: 900,
			inlineOffsetY: -85,
			containInline: true,
			hoverBoundingBox: true
		});
	</script>

 </body>
</html>
