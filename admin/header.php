

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

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Modak&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Satisfy&display=swap" rel="stylesheet">

<div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-light bg-light" style="background: linear-gradient(#eba4b6,#ff3669,#ff0041);">
	
        <a href="vendors.php" class="navbar-brand"><img src="..\css\rytu.jpg" alt=""  style=" width:45%;height:76px;position:relative;" ></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
			<h3  style="position:relative;margin-left:21%;font-family: 'Lobster', cursive;font-size:173%;">Farmer SuperMarket </h3>
			<ul class="navbar-nav">
			
					<li class="nav-item" style="position:relative;margin-left: 900px;">
					
						<div class="nav-item dropdown">
							<a href="#" class="nav-link text-white"   class="item">Actions</a>
							<div class="dropdown-content">
								<a href="vendors.php" class="dropdown-item">Vendor</a>
								<a href="admin_products.php" class="dropdown-item">Product</a>
								<a href="customers.php" class="dropdown-item">Customers</a>
								<a href="add_category.php" class="dropdown-item">Add Category</a>
								<a href="delete_category.php" class="dropdown-item">Delete Category</a>
								
							</div>
						</div>
						
					</li>
					<li class="nav-item" style="position:relative;margin-left: 9px;">
						<a href="message.php" class="nav-link text-white"  class="item">Messages</a>
					</li>
					<li class="nav-item" style="position:relative;margin-left: 24px;">
						<a href="logout.php" class="nav-link text-white"  class="item">Logout</a>
					</li>
			</ul>
               
        </div>
    </nav>
</div>

