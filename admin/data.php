<style type="text/css">
	#text{
		background-color: #B7CCFA;
	    border-radius: 10px;
	    padding-top: 3px;
	    padding-bottom: 3px;
	}
</style>
			<?php 
			
				include_once "../assets/config.php";
				session_start();
				
				if(!isset($_SESSION['admin']) )
				{
				  header("location: ../admin_login.php");
				}  

	
			?>

			<?php 
				$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysqli_error());
				
				// function formatDate($date)
				// {
				//	return date('g:i a', strtotime($date));
					// return date('Y-m-d h:i:s', strtotime($date));
				// }
				
				
				if(isset($_SESSION['admin']) && isset($_SESSION['customer_id']))
				{
					$to_user=$_SESSION['customer_id'];
					$from_user = $_SESSION['admin'];				
					
					$query = "SELECT * FROM user_chat where (from_user='$from_user' and to_user='$to_user' ) or (from_user='$to_user' and to_user='$from_user') ORDER BY date DESC";
					$run = mysqli_query($connecti, $query);
				}
					while ($row =mysqli_fetch_array($run, MYSQLI_BOTH)) 
					{
		
			?>
		
					<tr align="center">
				<?php
					
						if($row['from_user']==$to_user)
						{
					
					?>
					
					<div id="text"> <span style="color:green; margin-left: 8px; font-weight: bold;"><?php echo ucfirst($row['customer_first_name'])." :</span><br><span style='color:#3B3803'>". str_repeat('&nbsp', 2); echo $row['message']; ?></span>
					<span style="float:right;"><?php echo $row['date']; echo "&nbsp&nbsp&nbsp&nbsp&nbsp"; ?></span></div><br>
					
					<?php
						}
						else
						{
					?>
					<div id="text"> <span style="color:green; margin-left: 8px; font-weight: bold;"><?php echo ucfirst("You")." :</span><br><span style='color:#3B3803'>". str_repeat('&nbsp', 2); echo $row['message']; ?></span>
					<span style="float:right;"><?php echo $row['date']; echo "&nbsp&nbsp&nbsp&nbsp&nbsp"; ?></span></div><br>
					
					<?php
						}
					?>			
				</tr>
	

			<?php
					}
			?>
