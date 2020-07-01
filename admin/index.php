
<?php 
	include_once "../assets/config.php";
	session_start();
	
	if(!isset($_SESSION['admin'])):
	  header("location: ../admin_login.php");
	endif;
	
?>


<!DOCTYPE html> 
<html>
	<head>
		<title>Farmer SuperMarket</title>
		<link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="css/ScrollBar.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
	
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

<?php include "header.php"?>

<?php
	$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysqli_error());
	
	
	if(isset($_GET['customer_id']) && isset($_SESSION['admin']) )
	{
		$_SESSION['customer_id']=$_GET['customer_id'];
		
		$customer_id=$_SESSION['customer_id'];
			
		
		$customer_query=mysqli_query($connecti,"SELECT * from customers where customer_id=$customer_id");
		$customer_data_row=mysqli_fetch_array($customer_query);
		
		$customer_name=$customer_data_row['customer_first_name'];
		
		echo "<script>console.log('customer id: $customer_id');</script>";
		echo "<script>console.log('customer name: $customer_name');</script>";
		
		$from_user = $_SESSION['admin'];
		$to_user = $_SESSION['customer_id'];
		
		
		$seen_query = "UPDATE user_chat set seen='1' where (from_user='$from_user' and to_user='$to_user' and seen='0') or (from_user='$to_user' and to_user='$from_user' and seen='0')";
		$seen_query_data=mysqli_query($connecti,$seen_query);
		
	}
?>

	<nav style="margin-left:2%">
		<a href="">Home</a> >
		<a href="message.php">Messages</a> >
		<a href="index.php?customer_id=<?=$customer_data_row['customer_id'];?>">Chat Room(<?=$customer_data_row['customer_first_name'];?> <?=$customer_data_row['customer_last_name'];?>)</a>		
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
						<form action="index.php?customer_id=<?= $_GET['customer_id'];?>" method="post">
						
							<input type="hidden" name="from_user" id="from_user" value="<?php echo $_SESSION['admin'] ?>"  class="form-control" >
							<input type="hidden" name="customer_first_name" id="customer_first_name" value="<?=$customer_data_row['customer_first_name']; ?> <?=$customer_data_row['customer_last_name']; ?>"  class="form-control" >
							<input type="hidden" name="to_user" id="to_user" value="<?php echo $_GET['customer_id'] ?>"  class="form-control" >
							
							<div class="col-sm-10">
								<input type="text" name="message" id="message"  class="form-control">
							</div>
							<div class="col-sm-2" style="padding-left: 35px">
								<input type="reset" name="send" id="send" value="Send" class="btn btn-primary " style="line-height:0.5;margin-left:-17px;border-radius:1.25rem;height:28px;">
							</div>
						</form>
					
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="col-sm-8"></div>
		
	</div>
</div>
<br><br>
<br>
</body>
</html>

<script type="text/javascript">
				
		$(document).ready(function(){

				var from_user=$("#from_user").val();
				var customer_first_name= $("#customer_first_name").val();
				var to_user = $("#to_user").val();
				var message;
				
				console.log("from_user",from_user);
				console.log("customer_first_name",customer_first_name);
				console.log("to_user",to_user);
				console.log("message",message);
				
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