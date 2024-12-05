<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Delivery Information</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
session_start();
include('connectdb.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
$name=$_POST['name'];
$email=$_POST['email'];
$_SESSION['order_email'] = $email;
$phone=$_POST['phoneNumber'];
$address=$_POST['address'];
$_SESSION['payment']=$_POST['paymentMethod'];
$payment=$_SESSION['payment'];
$city=$_POST['city'];
$subtotal=$_SESSION['subtotal'];

$sql = "INSERT INTO user_table (user_name,email, address, city, phone, payment_method, subtotal)
VALUES ('$name','$email' ,'$address', '$city', '$phone','$payment', '$subtotal')";

$result = mysqli_query($conn, $sql);

if($result)
{
    echo '<div class="alert alert-primary" role="alert">
    Your Order has been Placed successfully
  </div>';
  header("Refresh: 2; url=thankyoupage.php");
}
else
{
    echo '<div class="alert alert-danger" role="alert">
    Sorry! Something wrong ..... Order not Placed
  </div>';
  header("location: index.php");

}
}

?>

