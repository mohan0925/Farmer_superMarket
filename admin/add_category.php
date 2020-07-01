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
		<a href="add_category.php">Add Category</a>
		
	</nav>
	
	<div class="container mt-3">
		<div class="container form-top">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12" style="	margin-left: 350px;"> 
					<div class="panel panel-danger">
						<div class="panel-body">
							<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" method="post">
 
								<div class="form-group">
									<span style="color:black"><label>Present Categories</label></span> 
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
									<span style="color:black"><label>New Category Name</label></span>
									<input type="text" name="Category_Name" class="form-control" placeholder="Enter Category Name"  required oninvalid="this.setCustomValidity('Required Category Name Field')" oninput="this.setCustomValidity('')"> 
								</div>
								<div class="form-group"> 
									<span style="color:black"><label>Category Image</label></span>
									<input type="file" name="p_img" class="form-control">
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-raised btn-block btn-danger" value="Add Category" name="update_category">
								</div> 
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	if(isset($_POST['update_category']))
	{
		$category_name=$_POST['Category_Name'];
		$category_image = $_FILES['p_img']['name'];
		$p_img_tmp =  $_FILES['p_img']['tmp_name'];
		move_uploaded_file($p_img_tmp,"../image/category/$category_image");
		
		$query = mysqli_query($connecti,"INSERT INTO all_categories (category_name,category_image) value('$category_name','$category_image')");
	}
	 ?>
</body>
</html>
