<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Modak&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
     <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Satisfy&display=swap" rel="stylesheet">
	
<style type="text/css">
    .bs-example{
        margin: 20px;
    }
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #e997b3;;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>

<nav class="navbar navbar-expand-md navbar-light bg-light"  style="background: linear-gradient(#eba4b6,#ff3669,#ff0041);">

<a href="index.php" class="navbar-brand"><img src="..\css\rytu.jpg" alt=""  style=" width:45%;height:76px;position:relative;" ></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" >
      <span class="navbar-toggler-icon"></span>
  </button>

			<?php
				$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysql_error());
				if(isset($_SESSION['vendor'])):
				  $log = $_SESSION['vendor'];
				  $query = mysqli_query($connecti,"SELECT * FROM product_vendor where vendor_email='$log'");
				  $row = mysqli_fetch_array($query);
			?>
<h3  style="position:relative;margin-left:22%;font-family: 'Lobster', cursive;font-size:163%;">Farmer SuperMarket </h3><hr></b>

    <div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar nav ml-auto">
			<li class="nav-item">  			
				<div class="nav-item dropdown" style="position:relative;    margin-left: -50%;">
				<img src="../image/vendor_image/<?= $row['vendor_image']; ?>" width="20px" class="mr-2 rounded-circle"><?= $row['vendor_first_name'];?>
					<div class="dropdown-content">
						<a class="dropdown-item" href="logout.php">Logout</a>
					</div>
				</div>
				
			</li>
			<li class="nav-item">
				<a href="index.php" class="text-dark mr-3">Home</a>
			</li>
			<li class="nav-item">
				<a href="vendor_products.php" class="text-dark mr-2">Actions</a>
			</li>
			<li class="nav-item">
				<a href="insertProduct.php" class="text-dark mr-2">Insert</a>
			</li>
		</ul>
	</div>
			<?php endif; ?>
	
</nav>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Modak&display=swap" rel="stylesheet">
