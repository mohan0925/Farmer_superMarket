<?php include_once "../assets/config.php";
session_start();
if(!isset($_SESSION['vendor'])):
  header("location: ../vendor_login.php");
endif;

$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysql_error());

$vendor_email= $_SESSION['vendor'];

?>
<!DOCTYPE html>
<html lang="en" dir="auto">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Farmer SuperMarket</title>

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
  
  
    <?php include"../vendor/header.php" ?>

	<nav style="margin-left:2%">
		<a href="index.php">Home</a> >
		<?php
			if(count($_GET) ==0)
			{
		?>
			<a href="index.php">Product</a> 
		<?php
			}
			else
			{	
		?>
		<a href="index.php">Product</a> >
		<a href="index.php?category_name=<?= $_GET['category_name'];?>"><?= $_GET['category_name'];?></a> 
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
		if(isset($_GET['category_name']))
		{
			  $category_name = $_GET['category_name'];
			  $calling = mysqli_query($connecti,"SELECT * FROM products WHERE product_category='$category_name' AND product_status='Available' and vendor_email='$vendor_email' ");
		}
		else
		{
			$calling = mysqli_query($connecti,"SELECT * FROM products WHERE product_status='Available' and vendor_email='$vendor_email'");  /*collects all data from product table*/
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
							<a href="item.php?product_id=<?= $row['product_id'];?>"><img class="card-img-top" src="..\image\<?= $row['product_image'];?>" alt="Card image cap"></a><hr>
						 </div>
						<div class="card-block">
							<h6 class="card-text text-center" ><?php echo $row["product_name"]; ?></h6>
							<h6 class="card-text text-center">₹ <?php echo $row["product_price"]; ?></h6>
						</div>
					</div><br>

				</form>
                </div>
                <?php endwhile;
              else:
                ?>
                  <div class='card'>
                      <div class='card-body'>
                        <h1> No items in this category</h1>
                      </div>
                  </div>
                <?php endif;?>
          </div>
        </div>
      </div>
    </div>
	<br>

   <?php include"footer.php"?>
 </body>
</html>
