<style type="text/css">
	#text{
		background-color: #B7CCFA;
	    border-radius: 10px;
	    padding-top: 3px;
	    padding-bottom: 3px;
	}
</style>
			<?php 
			
				include_once "assets/config.php";
				session_start();
				
				if(!isset($_SESSION['customer']) )
				{
				  header("location: login.php");
				}  
				
				$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysqli_error());
				
				if(isset($_SESSION['customer']))
				{
					$to_user="admin";

					$customer_email=$_SESSION['customer'];	
					$customer_query=mysqli_query($connecti,"SELECT * from customers where customer_email='$customer_email'");
					$customer_data_row=mysqli_fetch_array($customer_query);					
					$from_user = $customer_data_row['customer_id'];
					
					
					$query = "SELECT * FROM user_chat where (from_user='$from_user' and to_user='$to_user' ) or (from_user='$to_user' and to_user='$from_user') ORDER BY date DESC";
					$run = mysqli_query($connecti, $query);
				}
					while ($row =mysqli_fetch_array($run, MYSQLI_BOTH)) 
					{
		
			?>
		
					<tr align="center">
				
				
				<?php
					
						if($row['from_user']==$from_user)
						{
					
					?>
					
					<div id="text"> <span style="color:green; margin-left: 8px; font-weight: bold;"><?php echo ucfirst("You")." :</span><br><span style='color:#3B3803'>". str_repeat('&nbsp', 2); echo $row['message']; ?></span>
					<span style="float:right;"><?php echo $row['date']; echo "&nbsp&nbsp&nbsp&nbsp&nbsp"; ?></span></div><br>
					
					<?php
						}
						else
						{
					?>
					<div id="text"> <span style="color:green; margin-left: 8px; font-weight: bold;"><?php echo ucfirst($row['from_user'])." :</span><br><span style='color:#3B3803'>". str_repeat('&nbsp', 2); echo $row['message']; ?></span>
					<span style="float:right;"><?php echo $row['date']; echo "&nbsp&nbsp&nbsp&nbsp&nbsp"; ?></span></div><br>
					
					<?php
						}
					?>			
				</tr>
	

			<?php
					}
			?>
