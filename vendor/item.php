
<?php include_once "../assets/config.php";
session_start();

if(!isset($_SESSION['vendor'])):
  header("location: ../vendor_login.php");
endif;

$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysql_error());
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
	<link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/body.css">
	<link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../css/product.css">
 	<link rel="stylesheet" media="screen, projection" href="../dist/drift-basic.css">
			<link href="https://fonts.googleapis.com/css?family=Satisfy">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	
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

      <?php include "header.php"?>
	  
	<nav style="margin-left:2%">
		<a href="index.php">Home</a> >
		<?php
			$product_id=$_GET['product_id'];
			$product_data = mysqli_query($connecti,"SELECT * FROM products where product_id=$product_id");
			$product_row_data = mysqli_fetch_array($product_data);
			if(count($_GET) <1)
			{
				echo"<script>window.open('index.php','_self')</script>";
		?>
			<a href="index.php">Product</a> >
		<?php
			}
			else
			{
		?>
		<a href="index.php">Product</a> >
		<a href="index.php?category_name=<?= $product_row_data['product_category'];?>"> <?= $product_row_data['product_category'];?> </a> >
		<a href="item.php?product_id=<?= $product_row_data['product_id'];?>"> <?= $product_row_data['product_name'];?> </a> 
		<?php
			}
		?>
	</nav>
	  
	  
	  
	<?php
		$all_category = mysqli_query($connecti,"SELECT * FROM all_categories");	
	?>
        <div class="container-fluid" style="margin-top:30px">
			<div class="row">
				<div class="col-9 col-lg-2 col-md-4 col-sm-6 ">
					<div class="list-group shadow">
						<a  href="index.php" class="list-group-item list-group-item-action list-group-item-primary active">category</a>
						<?php
							while ($each_row_data = mysqli_fetch_array($all_category)):
						?>
						  <a href="index.php?category_name=<?= $each_row_data['category_name'];?>" class="list-group-item list-group-item-action list-group-item-success"><?= $each_row_data['category_name'];?></a>
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
						<img class="drift-demo-trigger" data-zoom="..\image\<?= $row['product_image'];?>" src="..\image\<?= $row['product_image'];?>">

						<div class="detail" style="border:1px solid #333; background-color:#fff; border-radius:5px; padding:16px; margin-bottom:10%">
							<section>		
								<div>
									<h4 class="prod_name"><span class="_35KyD6"><?= $row['product_name'];?></span></h4>
								</div>
								<div class="prod_price" style="font-size: 28px;vertical-align: sub;color: black;"><b>₹ <?= $row['product_price'];?></b></div>
								<div class="prod_available" ><b style="font-size: 18px;vertical-align: sub;color: black;">Description: </b><br><?= $row['product_description'];?></div>
									
							</section>
							<br>
						</div>
					</div>
				</div>
				
			</div>
		</div>

<?php include"../assets/footer.php"?>
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
