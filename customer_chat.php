
<?php 
	include_once "assets/config.php";
	session_start();
	
	if(!isset($_SESSION['customer'])):
	  header("location: login.php");
	endif;
	
?>


<!DOCTYPE html> 
<html>
	<head>
		<title>Farmer SuperMarket</title>
	    <link rel="stylesheet" type="text/css" href="css_chat/ScrollBar.css">
		<link rel="stylesheet" type="text/css" href="css_chat/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	
	
	
	<style type="text/css">
		hr{
			height: 2px;
		}
		.btn{
			height: 24px;
			line-height: 12px;
		}
		
	</style>
	</head>
	
<body style="background-color: #F0EEEE">

<?php include "assets/header.php"?>

<?php
	$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysqli_error());
	if(isset($_SESSION['customer']) )
	{	
		$customer_email=$_SESSION['customer'];
		$customer_query=mysqli_query($connecti,"SELECT * from customers where customer_email='$customer_email'");
		$customer_data_row=mysqli_fetch_array($customer_query);
		
		$customer_name=$customer_data_row['customer_first_name'];
		
		$from_user = $customer_data_row['customer_id'];
		$to_user ="admin";
	}
?>

	<nav style="margin-left:2%">
		<a href="index.php">Home</a> >
		<a href="customer_chat.php">Chat With Us</a> 	
	</nav>


<div class="container">
	<div class="row">
				
		<div class="col-sm-4">
			<div class="panel panel-success">
				<div class="panel-heading" align="center">Chat Room</div>
				<div class="panel-body" style="max-height: 450px; overflow-y: scroll;" class="scrollbar" id="style-2">
					<div id="load_data" >No Chat</div>

				</div>
				
				<div class="panel-footer" id="footer">
					<div class="row">
						<form action="customer_chat.php" method="post">
						
							<input type="hidden" name="from_user" id="from_user" value="<?php echo $from_user; ?>"  class="form-control" >
							<input type="hidden" name="customer_first_name" id="customer_first_name" value="<?=$customer_data_row['customer_first_name']; ?> <?=$customer_data_row['customer_last_name']; ?>"  class="form-control" >
							<input type="hidden" name="to_user" id="to_user" value="admin"  class="form-control" >
							
							<div class="col-sm-10">
								<input type="text" name="message" id="message"  class="form-control">
							</div>
							<div class="col-sm-2" style="padding-left: 35px">
								<input type="submit" name="send" id="send" value="Send" class="btn btn-primary " style="height:30px;">
							</div>
						</form>
		
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="col-sm-8"></div>
		
	</div>
</div>

<hr>
<br>

   <?php include"assets/footer.php"?>

</body>
</html>

<script type="text/javascript">
				
		$(document).ready(function(){

				var from_user=$("#from_user").val();
				var customer_first_name= $("#customer_first_name").val();
				var to_user = $("#to_user").val();
				var message;
				
				console.log("from_user	:",from_user);
				console.log("customer_first_name	:",customer_first_name);
				console.log("to_user	:",to_user);
				console.log("message	:",message);
				
			$("#send").click(function(){
					message = $("#message").val();
             	$.post("action.php", {submit:1,from_user:from_user,customer_first_name:customer_first_name,to_user:to_user,message:message}, function(data){
             		$("#done").text(data);
             	});
             });
			setInterval(function () {
					$('#load_data').load('data.php');
				
			}, 1000);

		});

</script>