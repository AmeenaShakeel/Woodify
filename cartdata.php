<?php
session_start();
include('connectdb.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $id=$_GET['id'];
    $session_id=$_SESSION['session_id'];
    $_SESSION['prod_names'] = $_POST['prod_name'];
    $prod_names=$_SESSION['prod_names']; 
    $prod_prices = $_POST['prod_price'];
    $prod_images = $_POST['prod_image'];
    $quantities = $_POST['qty'];
    $_SESSION['subtotal']=$_POST['subtotal'];


    foreach ($prod_names as $key => $prod_name) {
        $prod_price = $prod_prices[$key];
        $prod_image = $prod_images[$key];
        $quantity = $quantities[$key];
      

        $sql="INSERT INTO cart_table (session_id,prod_name, prod_price, prod_image, qty, tax)
        VALUES('$session_id','$prod_name', '$prod_price', '$prod_image','$quantity', 2.5)";

        $result=mysqli_query($conn, $sql);
        if($result)
        {
            header("Refresh: 0.5; url=placeorder.php");
        }
        else
        {
            header("Refresh: 0.5; url=cart.php");
        }
    }
    
}

