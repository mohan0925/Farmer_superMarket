
<?php include_once "../assets/config.php";
session_start();
if(!isset($_SESSION['admin'])):
  header("location: ../admin_login.php");
endif;
$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysqli_error());
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
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
		<style>
		.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 1px solid #ddd;
}

.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 24px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
		
		</style>
		
		
		
	</head>

	<body>
		<?php include"header.php"?>

	<nav style="margin-left:2%">
		<a href="">Action</a> >
		<a href="customers.php">Customers</a>
	</nav>


		<div class="container">
			<div class="row">
				<div class="col-3">
					<div class="row">
						<div class="col-8"  style="margin-left: 75%;">
							<table class="table table-bordered text-center" style="border: 2px solid #151414;">
								<tr style="border: 2px solid #151414;">
									<th class="mt-3 mb-4">Number</th>
									<th class="mt-3 mb-4">Customer Name</th>
									<th class="mt-3 mb-4">Action</th>
								</tr>
								<tr style="border: 2px solid #151414;">
									<?php
										$query_statement=mysqli_query($connecti,"SELECT * from customers");
										$no_of_rows=mysqli_num_rows($query_statement);
										if($no_of_rows>0):
											$Each_row_value=0;
												while($Each_row=mysqli_fetch_array($query_statement)):
													$Each_row_value++;
									?>
									<td class="mt-3 mb-4"><?= $Each_row_value?></td>
									<td class="mt-3 mb-4"><?= $Each_row["customer_first_name"]?> <?= $Each_row["customer_last_name"]?></td>
									<td class="mt-3 mb-4">
									
										<a href='view_customer.php?view=<?= $Each_row['customer_id']?>' class="btn btn-success" title="view customer details">
										  <i class="fas fa-eye"></i>
										</a>
										
										<a href='delete_customer.php?delete=<?= $Each_row['customer_id']?>' class="btn btn-danger" title="delete customer">
											<i class="fas fa-trash" ></i>
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
	</body>
</html>
