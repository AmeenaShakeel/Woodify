<?php
session_start();
$cart_count = isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woodify</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="main.css">
    <style>
        .user-icon {
            width: 25px;           
            height: 25px;          
            border-radius: 50%;     
            object-fit: cover;      
            border: 2px solid #ddd; 
        }

    </style>
</head>
<body> 


<header id="header" style="background-color:burlywood;">
    <div class="logo">
        <a href="index.php"><img id="lol" src="pic/bulb.png" alt="">Woodify</a>
    </div>
    <ul class="navigation">
        <li><a href="index.php" class="active">home</a></li>
        <li><a href="newstock.php">new stock</a></li>
        <li><a href="preloved.php">pre-loved stock</a></li>
        <li><a href="index.php#pre_loved_stock">new arrival</a></li>
        <li><a href="index.php#team" id="team-link">team</a></li>
        <li><a href="contact.php">contact</a></li>
    </ul>
    
    <!-- Login Icon -->
  
   
    <div class="login-icon bg-white ml-3" style="width: 26px; height: 26px; border-radius:50%; display: inline-block;">
        <a href="login.php"><img src="pic/user.png" alt="Login" style="width: 26px; height: 26px;"></a>
    </div>



    <div class="bars">
        <img id="bar" src="pic/menu.png" alt="">
    </div>
</header>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>
</html>
    
