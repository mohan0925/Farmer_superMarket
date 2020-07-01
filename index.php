<?php include_once "assets/config.php";
session_start();
$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysql_error());
?>
<!DOCTYPE html>
<html lang="en" dir="auto">
  <head>
    <meta charset="utf-8">
    <title>Farmer SuperMarket</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Satisfy">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	.product-item 
	{
		float: left;
		background: #ffffff;
		margin: 20px 20px 0px 0px;
		border: #E0E0E0 1px solid;
	}
	
	form {
    display: block;
    margin-top: 0em;
}

.product-image {
    height: 155px;
    width: 250px;
    background-color: #FFF;
}

.product-tile-footer {
    padding: 15px;
    overflow: auto;
}


	</style>
	
  </head>

  <body>
    <?php include"assets\header.php";?>

    <div class="container-fluid" style="margin:20px;">
		<div class="row">
			<div class="col-1g-12">
                <div id="carousel_div" class="carousel slide" data-ride="carousel" >
                        <div class="carousel-inner">
                          <div class="carousel-item active" >
                          <a href="product.php?category_name=Fertilisers"> <img src="image\banner\organic.jpg" class="banner" width="1600" height="400" ></a>
                          </div>
                          <div class="carousel-item">
                            <a href="product.php?category_name=Spices"><img src="image\banner\spices_banner.jpg"  class="banner" width="100%"  height="400"></a>
                          </div>
                          <div class="carousel-item">
                          <a href="product.php?category_name=Solar">  <img src="image\banner\solar_power.jpg" class="banner" width="1600" height="400"></a>
                          </div>
                        </div>
						<ul class="carousel-indicators">
                          <li data-target="#carousel_div" data-slide-to="0"></li>
                          <li data-target="#carousel_div" data-slide-to="1"></li>
                          <li data-target="#carousel_div" data-slide-to="2" class="active"></li>
                        </ul>
                </div>
            </div>
        </div>
    </div> 

    <div class="container-fluid">
		<div class="col-8 col-lg-10 col-md-10">
		<br>
		        <div class="col-12" style="text-align:center;">
                  <b> <h3 class="btn btn-info"  id="inf">All Categories</h3><hr></b>
                </div>
			<div class="row">
			
			    <?php
					$calling = mysqli_query($connecti,"SELECT * FROM all_categories");
					$count = mysqli_num_rows($calling);
					if ($count > 0):
						while($row = mysqli_fetch_array($calling)):
                ?>
			
				<div class="col-9 col-lg-2 col-md-4 col-sm-6 ">
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
						<div style="border:1px solid #333; background-color:#fff; border-radius:1px;  margin-bottom:10%" align="center">
							<a href="product.php?category_name=<?= $row['category_name'];?>"><img src="image\category\<?= $row['category_image'];?>" alt="" height="170px" class="w-100"></a><hr>
							<h6 class="text-dark"><?= $row['category_name'];?></h6>
						</div>
					</form>
				</div>			
				<?php endwhile;
						endif;
				?>
			</div>
		</div>
    </div> 
	<hr>
<br>
		<?php include"assets/footer.php";?>
        </body>
</html>
