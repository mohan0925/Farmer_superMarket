
<?php include_once "../assets/config.php";
session_start();
if(!isset($_SESSION['vendor'])):
  header("location: ../vendor_login.php");
endif;
$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysqli_error());
?><!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Farmer SuperMarket</title>
		<link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>

	<body style="background-color: #e8cfcf;">
		<?php include"header.php"?>

	<nav style="margin-left:2%">
		<a href="index.php">Home</a> >
		<a href="vendor_products.php">Product Actions</a> 
	</nav>


		<div class="container">
			<div class="row">
				<div class="col-9">
				<h3 class="text-center" style="margin-left:15%">PRODUCT ACTIONS</h3>
					<div class="row">
						<div class="col-8"  style="margin-left: 25%;">
							<table class="table table-bordered text-center mt-3">
								<tr>
									<th>Number</th>
									<th>Product Name</th>
									<th>Edit/Delete Product</th>
								</tr>
								<tr>
									<?php
										$vendor_email = $_SESSION['vendor'];
										$query_statement=mysqli_query($connecti,"SELECT * from products where vendor_email='$vendor_email'");
										$no_of_rows=mysqli_num_rows($query_statement);
										if($no_of_rows>0):
											$Each_row_value=0;
												while($Each_row=mysqli_fetch_array($query_statement)):
													$Each_row_value++;
									?>
									<td><?= $Each_row_value?></td>
									<td><?= $Each_row["product_name"]?></td>
									<td> 
										<a href='edit_product.php?edit=<?= $Each_row['product_id']?>' class="btn btn-info">
										  <i class="fas fa-pen-alt" name="edit"></i>
										</a>
										<a href='delete_product.php?delete=<?= $Each_row['product_id']?>' class="btn btn-danger">
											<i class="fas fa-trash-alt" name="edit"></i>
										</a>
									</td>
								</tr>
								<?php
									endwhile;
									endif;
								?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include"footer.php"?>
	</body>
</html>
