<?php include_once"../assets/config.php";
session_start();

if(!isset($_SESSION['admin'])):
  header("location: ../admin_login.php");
endif;
$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysqli_error());

?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<title>Farmer SuperMarket</title>
		    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/carrers_css.css">
				<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body style="background-color: #e8cfcf;">
    <?php include"header.php"?>

	
	<nav style="margin-left:2%">
		<a href="index.php">Home</a> >
		<a href="delete_category.php">Delete Category</a>
		
	</nav>
	
	
	<h3 class="text-center" style="margin-left:15%"> Delete Category </h3>
	<div class="container mt-3">
		<div class="container form-top">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12" style="	margin-left: 350px;"> 
					<div class="panel panel-danger">
						<div class="panel-body">
							<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" method="post">
								<div class="form-group">
									<span style="color:black"><label>Category</label></span> 
									<select name="product_category" class="form-control">
										 <?php
											$pro_category = mysqli_query($connecti,"SELECT * FROM all_categories");
											while ($each_row = mysqli_fetch_array($pro_category)):
										  ?>
										  <option><?= $each_row['category_name'];?></option>
										  <?php endwhile;?>
									</select>
								</div>	
								<div class="form-group">
									<input type="submit" class="btn btn-raised btn-block btn-danger" value="Delete Category" name="update_data">
								</div> 
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	if(isset($_POST['update_data']))
	{
		$product_category=$_POST['product_category'];		
		
		$delete_category=mysqli_query( $connecti,"DELETE FROM `all_categories` WHERE `category_name`='$product_category'");
		
		if(is_bool($delete_category)===true)
		{
			echo"<script>window.open('delete_category.php','_self')</script>";

		}
	}
	
	 ?>
</body>
</html>
