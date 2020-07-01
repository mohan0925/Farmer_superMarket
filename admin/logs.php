<?php
session_start();
$con = mysqli_connect('localhost','root','','db_ecommerce') or die(mysqli_error());

if(isset($_GET['to_user']) && isset($_GET['from_user']) )
{
	$to_user=$_GET['to_user'];
	$from_user=$_GET['from_user'];
	
		echo "<script>console.log('$to_user');</script>";
		echo "<script>console.log('$from_user');</script>";
	
	$result1 = mysqli_query($con,"SELECT * FROM user_chat where (from_user='$from_user' and to_user='$to_user' ) and (from_user='$to_user' and to_user='$from_user') ORDER BY chat_id DESC");
	
			while($extract = mysqli_fetch_array($result1)) 
			{
				if($extract['from_user']==$to_user)
				{
					echo "" . $extract['customer_first_name'] . ": " . $extract['message'] . "<br />";
				}
				else
				{
					echo "" . $extract['from_user'] . ": " . $extract['message'] . "<br />";
				}
				
			}


}

?>



