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

<div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-light bg-light" style="background: linear-gradient(#eba4b6,#ff3669,#ff0041);">
        <a href="index.php" class="navbar-brand"><img src="css\rytu.jpg" alt=""  style=" width:45%;height:76px;position:relative;" ></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
			<form action="product.php"  method="get" class="form-inline">
				<input type="search" placeholder="Search Products"  required oninvalid="this.setCustomValidity('Please enter valid product')" oninput="this.setCustomValidity('')"  class="form-control" size="25" name="search"  value="<?php 
				if(isset($_GET['search']))
				{
					echo $_GET['search'];}?>">
					<?php
						$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysqli_error());
						if(isset($_GET['search'])): 
						
					?>
							<a href="product.php" class="btn btn-info" ><b>X</b></a>

				  <?php else: ?>
					<input type="submit" value="Go" name="find" class="btn btn-success">
				  <?php endif;?>
			</form>
					<h3  style="position:relative;margin-left:5%;font-family: 'Lobster', cursive;font-size:150%;">Farmer SuperMarket </h3><hr></b>
			<ul class="navbar-nav">
			
					<li class="nav-item ">
						<a class="nav-link text-white" href="index.php" class="item ">Home</a>
					</li>
					<li class="nav-item">
						<a href="product.php" class="nav-link text-white"  class="item">products</a>
					</li>
			<?php
				if(!isset($_SESSION['customer'])):
			?>
                    <li class="nav-item">
           
					  	<div class="nav-item dropdown">
							<a href="#" class="nav-link text-white"   class="item">Login</a>
							<div class="dropdown-content">
								<a href="login.php" class="dropdown-item">Customer</a>
								<a href="vendor_login.php" class="dropdown-item">Vendor</a>
								<a href="admin_login.php" class="dropdown-item">Admin</a>
							</div>
						</div>
                    </li>					
			<?php else:  
					$log = $_SESSION['customer'];
					$calling = mysqli_query($connecti,"select * from customers where customer_email='$log'");
					$data = mysqli_fetch_array($calling);
					$cart_query=mysqli_query($connecti,"SELECT * FROM customer_cart
						inner join customers on customer_cart.customer_id=customers.customer_id
						inner join products on customer_cart.product_id=products.product_id
						inner join product_vendor on customer_cart.vendor_email=product_vendor.vendor_email
						where customer_cart.customer_id='".$data['customer_id']."' ORDER BY customer_cart.cart_id desc");
					$n=mysqli_num_rows($cart_query);
					$query = mysqli_query($connecti,"SELECT * FROM customers where customer_email='$log'");
					$row = mysqli_fetch_array($query);	
            ?>
					<li>
<!--						<div class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><img src="image/<?= $row['customer_image']; ?>" width="20px" class="rounded-circle"><?= $row['customer_first_name'];?></a>
							<div class="dropdown-menu">
								<a href="MyOrder.php" class="dropdown-item">My Orders</a>
								<a href="MyCart.php" class="dropdown-item">My Cart</a>
								<div class="dropdown-divider"></div>
								<a href="logout.php" class="dropdown-item">Logout</a>
							</div>
						</div>
-->						
						
						<div class="nav-item dropdown">
							<img src="image/<?= $row['customer_image']; ?>" width="20px" class="rounded-circle"><?= $row['customer_first_name'];?>
							<div class="dropdown-content">
								<a href="MyOrder.php" class="dropdown-item">My Orders</a>
								<a href="MyCart.php" class="dropdown-item">My Cart</a>
								<a href="logout.php" class="dropdown-item">Logout</a>
							</div>
						</div>
						
						
						
						
					</li>	
					<li class="nav-item  cart.php">
						<a  href="MyCart.php" class="btn btn-link text-white "><i class="fa" style="font-size:24px;">&#xf07a;</i><span class='badge badge-info' style="border-radius:15px; position:relative;background:#222f3e;"><?php echo $n ?></span></a>
					</li>
				<?php endif ?>
			</ul>
               
        </div>
    </nav>
</div>

