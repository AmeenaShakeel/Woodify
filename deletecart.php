<?php
session_start();
include('connectdb.php');


if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['id'] == $productId) {
                $_SESSION['cart_count'] -= $_SESSION['cart'][$key]['qty'];
                echo "Removing Product ID: " . $productId;
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
        
            }
        }
    }

    $_SESSION['cart_count'] = 0;
    foreach ($_SESSION['cart'] as $item) {
        $_SESSION['cart_count'] += $item['qty'];
       
    }
    header("Location:cart.php");
}

?>
