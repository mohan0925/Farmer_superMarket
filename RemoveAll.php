<?php
include_once"assets/config.php";
session_start();
if(isset($_GET['customer_id'])){
$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysql_error());
    $del = $_GET['customer_id'];
    $delete=mysqli_query($connecti, "DELETE FROM
      customer_cart
    where customer_id='$del'");?>

    <?PHP

      header("location: myCart.php");

}
?>
