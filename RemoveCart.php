<?php
include_once"assets/config.php";
session_start();
if(isset($_GET['cart_id'])){
$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysql_error());
    $del = $_GET['cart_id'];
    $delete=mysqli_query($connecti, "DELETE FROM customer_cart where cart_id='$del'");?>

    <?PHP

      header("location: MyCart.php");

}
?>
