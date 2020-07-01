<?php
include_once"assets/config.php";
session_start();

$connecti = mysqli_connect('localhost','root','','db_ecommerce') or die(mysqli_error());
if(isset($_GET['order_id']))
{
    $customer=$_SESSION['customer'];
    $order_id = $_GET['order_id'];
    $cancel=mysqli_query($connecti, "UPDATE customer_orders set order_status='cancel' where order_id='$order_id'");
   $query=mysqli_query("SELECT * FROM customer_orders where order_id='$order_id'");
    $array=mysqli_fetch_array($query);
    header("location: MyOrder.php?c_id='".$array['customer_id']."'");
}

?>
