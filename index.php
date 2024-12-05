<?php
session_start();
include('connectdb.php');
$cart_count = isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$_SESSION['category_id']=$_GET['cat_id'];
$name=$_POST['cat_name'];
$slug=$_POST['cat_slug'];
$desc=$_POST['cat_desc'];
$id = $_GET['id'];

$image_file=$_FILES["cat_img"]["name"];
$tempname = $_FILES["cat_img"]["tmp_name"];
$image_folder= "pic/".$image_file;

}

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
        .chatbot-btn {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 1000;
            background-color: #007bff; 
            color: white;
            border-radius: 50px;
            width: 70px;
            height: 70px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .chatbot-btn:hover {
            background-color: #0056b3;
        }
        .cart-icon {
    position: relative; /* Set position to relative for the badge to position correctly */
}

.badge {
    position: absolute;
    top: -10px; 
    right: -15px; 
    background-color: red; 
    color: white; 
    border-radius: 50%; 
    padding: 4px 8px; 
    font-size: 12px; 
    display: inline-flex; 
    align-items: center; 
    justify-content: center;
}

    </style>
</head>
<body>
<header id="header">
    <div class="logo">
        <a href="#"><img id="lol" src="pic/bulb.png" alt="">Woodify</a>
    </div>
    <ul class="navigation">
        <li><a href="index.php" class="active">home</a></li>
        <li><a href="newstock.php">new stock</a></li>
        <li><a href="preloved.php">pre-loved stock</a></li>
        <li><a href="#pre_loved_stock">new arrival</a></li>
        <li><a href="#team" id="team-link">team</a></li>
        <li><a href="contact.php">contact</a></li>
    </ul>
    <div class="d-flex">
    <div class="cart-icon d-flex justify-content-center align-items-center" style="font-size: 21px; position: relative;">
    <a href="cart.php">
        <i class="fa-solid fa-bag-shopping" style="color: red;"></i>
        <span class="badge" id="cart-notification"><?= $cart_count ?></span> <!-- Notification badge -->
    </a>
</div>
    <div class="login-icon bg-white ml-3" style="width: 26px; height: 26px; border-radius:50%; display: inline-block;">
        <a href="login.php"><img src="pic/user.png" alt="Login" style="width: 26px; height: 26px;"></a>
    </div>
   
    </div>
    <div class="bars">
        <img id="bar" src="pic/menu.png" alt="">
    </div>
</header>

        <div class="big-bg" id="home">
        <div class="bg-content">
            <h1>Quality is the best thing <br> in the business</h1>
            <hr>
            <p>
                We make our products in the best shape for your happiness, <br> so we hope to build a bridge of trust with you.
            </p>
            <div class="bg-link">
                <a href="#shop">shop Now</a>
            </div>
        </div>
    </div>
    


<div class="big-collection" id="shop">
        <div class="collect-flex">
        <?php

        $category = "SELECT cat_id , cat_name, cat_image, cat_slug FROM categories LIMIT 4";
         $runquery = mysqli_query($conn, $category);
        if(mysqli_num_rows($runquery)> 0)
        {
        while($row= mysqli_fetch_assoc($runquery))
        {
?>
                <div class="collect">
                <a href="<?php echo $row['cat_slug']; ?>">
                <div class="image">
                <img src="<?php echo $row['cat_image']?>" alt="" width="230px" height="230px">
                </div>
                </a>
                <div class="link">
                    <a href="#"><?php echo $row['cat_name']?></a>
                </div>
          
                </div>

                <?php
                }}?>
    </div>
</div>

    <div class="big-product" id="pre_loved_stock">
        <div class="product-title">
            <p>
                browse our items
            </p>
            <h2>
                Ideal for your home
            </h2>
            <hr>
        </div>
<div class="product-flex">
        <?php
        $product = "SELECT prod_id ,prod_name, prod_image, prod_price, prod_desc FROM products WHERE category_id = '5'";

$runquery = mysqli_query($conn, $product);
if(mysqli_num_rows($runquery)> 0)
{
$row= mysqli_fetch_assoc($runquery)

?> 
            <div class="product-one">
                <div class="product-image">
                    <img src="<?= $row['prod_image'];?>" alt="">
                    <div class="overlay">
                    <a href="showproduct.php?id=<?= $row['prod_id']; ?>" style=" text-decoration: none; color:black;"><i class="fas fa-shopping-bag"></i></a>
                    <a href="preloved.php?id=<?= $row['prod_id'];?>" style="text-decoration: none; color: black;" onclick="addToFavourites(<?= $row['prod_id']; ?>)">
                    <i class="far fa-heart heart-icon"></i>
                    </a>
     
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <div class="content">
                    <div class="left">
                        <h4>
                        <?= $row['prod_name'];?>
                        </h4>
                    </div>
                    <div class="right">
                        
                    </div>
                </div>
                <article><?= $row['prod_desc'];?></article>
            </div>
<?php
}
?>

<!-- ===================================================== -->

<?php
        $product = "SELECT prod_id ,prod_name, prod_image, prod_price, prod_desc FROM products WHERE category_id = '6'";

$runquery = mysqli_query($conn, $product);
if(mysqli_num_rows($runquery)> 0)
{
$row= mysqli_fetch_assoc($runquery)

?> 
            <div class="product-one">
                <div class="product-image">
                    <img src="<?= $row['prod_image'];?>" alt="">
                    <div class="overlay">
                    <a href="showproduct.php?id=<?= $row['prod_id']; ?>" style=" text-decoration: none; color:black;"><i class="fas fa-shopping-bag"></i></a>
                    <a href="preloved.php?id=<?= $row['prod_id'];?>" style="text-decoration: none; color: black;" onclick="addToFavourites(<?= $row['prod_id']; ?>)">
                    <i class="far fa-heart heart-icon"></i>
                    </a>
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <div class="content">
                    <div class="left">
                        <h4>
                        <?= $row['prod_name'];?>
                        </h4>
                    </div>
                    <div class="right">
                        
                    </div>
                </div>
                <article><?= $row['prod_desc'];?></article>
            </div>
<?php
}
?>

<!-- ============================================================== -->
<?php
        $product = "SELECT prod_id ,prod_name, prod_image, prod_price, prod_desc FROM products WHERE category_id = '7'";

$runquery = mysqli_query($conn, $product);
if(mysqli_num_rows($runquery)> 0)
{
$row= mysqli_fetch_assoc($runquery)

?> 
            <div class="product-one">
                <div class="product-image">
                    <img src="<?= $row['prod_image'];?>" alt="">
                    <div class="overlay">
                    <a href="showproduct.php?id=<?= $row['prod_id']; ?>" style=" text-decoration: none; color:black;"><i class="fas fa-shopping-bag"></i></a>
                    <a href="preloved.php?id=<?= $row['prod_id'];?>" style="text-decoration: none; color: black;" onclick="addToFavourites(<?= $row['prod_id']; ?>)">
                    <i class="far fa-heart heart-icon"></i>
                    </a>
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <div class="content">
                    <div class="left">
                        <h4>
                        <?= $row['prod_name'];?>
                        </h4>
                    </div>
                    <div class="right">
                        
                    </div>
                </div>
                <article><?= $row['prod_desc'];?></article>
            </div>
<?php
}
?>

<!-- ================================================================== -->

<?php
        $product = "SELECT prod_id ,prod_name, prod_image, prod_price, prod_desc FROM products WHERE category_id = '5' LIMIT 1 OFFSET 1";

$runquery = mysqli_query($conn, $product);
if(mysqli_num_rows($runquery)> 0)
{
$row= mysqli_fetch_assoc($runquery)

?> 
            <div class="product-one">
                <div class="product-image">
                    <img src="<?= $row['prod_image'];?>" alt="">
                    <div class="overlay">
                    <a href="showproduct.php?id=<?= $row['prod_id']; ?>" style=" text-decoration: none; color:black;"><i class="fas fa-shopping-bag"></i></a>
                    <a href="preloved.php?id=<?= $row['prod_id'];?>" style="text-decoration: none; color: black;" onclick="addToFavourites(<?= $row['prod_id']; ?>)">
                    <i class="far fa-heart heart-icon"></i>
                    </a>
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <div class="content">
                    <div class="left">
                        <h4>
                        <?= $row['prod_name'];?>
                        </h4>
                    </div>
                    <div class="right">
                        
                    </div>
                </div>
                <article><?= $row['prod_desc'];?></article>
            </div>
<?php
}
?>

<!-- ============================================================================ -->

<?php
        $product = "SELECT prod_id ,prod_name, prod_image, prod_price, prod_desc FROM products WHERE category_id = '6' LIMIT 1 OFFSET 1";

$runquery = mysqli_query($conn, $product);
if(mysqli_num_rows($runquery)> 0)
{
$row= mysqli_fetch_assoc($runquery)

?> 
            <div class="product-one">
                <div class="product-image">
                    <img src="<?= $row['prod_image'];?>" alt="">
                    <div class="overlay">
                    <a href="showproduct.php?id=<?= $row['prod_id']; ?>" style=" text-decoration: none; color:black;"><i class="fas fa-shopping-bag"></i></a>
                    <a href="preloved.php?id=<?= $row['prod_id'];?>" style="text-decoration: none; color: black;" onclick="addToFavourites(<?= $row['prod_id']; ?>)">
                    <i class="far fa-heart heart-icon"></i>
                    </a>
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <div class="content">
                    <div class="left">
                        <h4>
                        <?= $row['prod_name'];?>
                        </h4>
                    </div>
                    <div class="right">
                        
                    </div>
                </div>
                <article><?= $row['prod_desc'];?></article>
            </div>
<?php
}
?>

<?php
        $product = "SELECT prod_id ,prod_name, prod_image, prod_price, prod_desc FROM products WHERE category_id = '7' LIMIT 1 OFFSET 1";

$runquery = mysqli_query($conn, $product);
if(mysqli_num_rows($runquery)> 0)
{
$row= mysqli_fetch_assoc($runquery);

?> 
            <div class="product-one">
                <div class="product-image">
                    <img src="<?= $row['prod_image'];?>" alt="">
                    <div class="overlay">
                    <a href="showproduct.php?id=<?= $row['prod_id']; ?>" style=" text-decoration: none; color:black;"><i class="fas fa-shopping-bag"></i></a>
                    <a href="preloved.php?id=<?= $row['prod_id'];?>" style="text-decoration: none; color: black;" onclick="addToFavourites(<?= $row['prod_id']; ?>)">
                    <i class="far fa-heart heart-icon"></i>
                    </a>
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <div class="content">
                    <div class="left">
                        <h4>
                        <?= $row['prod_name'];?>
                        </h4>
                    </div>
                    <div class="right">
                        
                    </div>
                </div>
                <article><?= $row['prod_desc'];?></article>
            </div>
<?php
}

?>


<?php
        $product = "SELECT prod_id ,prod_name, prod_image, prod_price, prod_desc FROM products WHERE category_id = '7' LIMIT 1 OFFSET 2";

$runquery = mysqli_query($conn, $product);
if(mysqli_num_rows($runquery)> 0)
{
    $row= mysqli_fetch_assoc($runquery);
?> 
            <div class="product-one">
                <div class="product-image">
                    <img src="<?= $row['prod_image'];?>" alt="">
                    <div class="overlay">
                    <a href="showproduct.php?id=<?= $row['prod_id']; ?>" style=" text-decoration: none; color:black;"><i class="fas fa-shopping-bag"></i></a>
                    <a href="preloved.php?id=<?= $row['prod_id'];?>" style="text-decoration: none; color: black;" onclick="addToFavourites(<?= $row['prod_id']; ?>)">
                    <i class="far fa-heart heart-icon"></i>
                    </a>
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <div class="content">
                    <div class="left">
                        <h4>
                        <?= $row['prod_name'];?>
                        </h4>
                    </div>
                    <div class="right">
                        
                    </div>
                </div>
                <article><?= $row['prod_desc'];?></article>
            </div>
<?php

}
?>


<?php
        $product = "SELECT prod_id ,prod_name, prod_image, prod_price, prod_desc FROM products WHERE category_id = '7' LIMIT 1 OFFSET 3";

$runquery = mysqli_query($conn, $product);
if(mysqli_num_rows($runquery)> 0)
{
    $row= mysqli_fetch_assoc($runquery);
?> 
            <div class="product-one">
                <div class="product-image">
                    <img src="<?= $row['prod_image'];?>" alt="">
                    <div class="overlay">
                    <a href="showproduct.php?id=<?= $row['prod_id']; ?>" style=" text-decoration: none; color:black;"><i class="fas fa-shopping-bag"></i></a>
                    <a href="preloved.php?id=<?= $row['prod_id'];?>" style="text-decoration: none; color: black;" onclick="addToFavourites(<?= $row['prod_id']; ?>)">
                    <i class="far fa-heart heart-icon"></i>
                    </a>
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <div class="content">
                    <div class="left">
                        <h4>
                        <?= $row['prod_name'];?>
                        </h4>
                    </div>
                    <div class="right">
                        
                    </div>
                </div>
                <article><?= $row['prod_desc'];?></article>
            </div>
<?php

}
?>

</div>


    <div class="big-furn" id="new-arrival">
        <div class="furn-title">
            <h2>
                Discover our furniture from our <br> resources 
            </h2>
            <p>
                View our everday amazing products.
            </p>
        </div>
        <div class="big-part">
            <img src="pic/bg_image.png" alt="">
            <div class="text-inside">
                <img src="pic/plus.png" alt="" class="plus">
                <div class="text-box">
                    <div>
                        <img src="pic/product6.jpg" alt="">
                    </div>
                    <div>
                        <h5>new couch</h5>
                        <p>
                            take our furniture with perfect quality and price.
                        </p>
                        <div class="link">
                            <a href="couches.php">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
       if (isset($_SESSION['logged_in_email']) && $_SESSION['logged_in_email'] === "tahawaseem043@gmail.com") {
        ?>
    <div class="bg-show">
        <div class="link">
            <a href="adduserproduct.php" class="link_a">Upload <img src="pic/right-chevron.png" alt=""></a>
        </div>
        <div class="overlay">
            <div class="image">
                <img src="pic/x.png" alt="" class="cancel">
                <video src="furnn.mp4" id="video"></video>
                <div class="bg-player">
                    <img class="player" src="pic/play.png" alt="">
                </div>
            </div>
        </div>
    </div>

   <?php
    }
    else
    {
    ?>
    <div class="bg-show d-none">
        <div class="link">
            <a href="adduserproduct.php" class="link_a">Upload <img src="pic/right-chevron.png" alt=""></a>
        </div>
        <div class="overlay">
            <div class="image">
                <img src="pic/x.png" alt="" class="cancel">
                <video src="furnn.mp4" id="video"></video>
                <div class="bg-player">
                    <img class="player" src="pic/play.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <?php
    }
    ?>


    <div class="bg-team" id="team">
        <div class="team-title">
            <section>our creative team</section>
            <h2>Meet our team</h2>
            <hr>
        </div>
        <div class="team-flex swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="team-one swiper-slide">
                    <img src="pic/t1 (3).jpeg" alt="" width="300px" height="500px">
                    <h4>Muhammad Moarij</h4>
                </div>
                <div class="team-one swiper-slide">
                    <img src="pic/t1 (2).jpeg" alt="" width="300px" height="500px">
                    <h4>Sawaira</h4>
                </div>
                <div class="team-one swiper-slide">
                    <img src="pic/ww.jpeg" alt="" width="300px" height="500px">
                    <h4>Taha Waseem </h4>
                </div>
                
            </div>
        </div>
    </div>


    <div class="footer-image"  id="contact">
        <div class="image1"style="background-image: url(./pic/a4.png);" >
            <img src="pic/bl1.jpg" alt="">
            <div class="insta">
                <img src="pic/insta.png" alt="">
            </div>
        </div>
        <div class="image1">
            <img src="pic/bl2.jpg" alt="">
            <div class="insta">
                <img src="pic/insta.png" alt="">
            </div>
        </div>
        <div class="image1">
            <img src="pic/bll.jpg" alt="">
            <div class="insta">
                <img src="pic/insta.png" alt="">
            </div>
        </div>
        <div class="image1">
            <img src="pic/bl4.jpg" alt="">
            <div class="insta">
                <img src="pic/insta.png" alt="">
            </div>
        </div>
        <div class="image1">
            <img src="pic/bll2.jpg" alt="">
            <div class="insta">
                <img src="pic/insta.png" alt="">
            </div>
        </div>
        <div class="image1">
            <img src="pic/bl6.jpg" alt="">
            <div class="insta">
                <img src="pic/insta.png" alt="">
            </div>
        </div>
    </div>

    <div class="bg-footer" >
    <a href="https://cdn.botpress.cloud/webchat/v2/shareable.html?botId=2517dcdc-eb07-47ef-9801-b438aa68355c" class="chatbot-btn">
        <img src="pic/robot.png" alt="" height="50" width="50"> 
    </a>
        <div class="footer-flex" >
            <div class="footer1">
                <h2>Woodify</h2>
                <section class="foot">
                    Woodify is a revolutionary online platform that combines the ease of buying and selling pre-loved furniture with the power of cutting-edge machine learning. 
                    We understand the desire for beautiful and unique pieces that reflect your personal style, all while making environmentally conscious choices.
                </section>
            </div>
            <div class="footer1">
                <h2>helpful links</h2>
                <li><a href="#">about us</a></li>
                <li><a href="#">our blog</a></li>
                <li><a href="#">visit site</a></li>
                <li><a href="#">contact us</a></li>
                <li><a href="#">apply a job</a></li>
            </div>
            <div class="footer1">
                <h2>shopping</h2>
                <li><a href="#">online cards</a></li>
                <li><a href="#">return policy</a></li>
                <li><a href="#">privacy policy</a></li>
                <li><a href="#">shipping</a></li>
                <li><a href="#">inventory</a></li>
            </div>
            <div class="footer1">
                <h2>payment methods</h2>
                <section>
                    Select one of the most common ways to Pay a Money for our Products.
                </section>
                <div class="footer-logo">
                    <img src="pic/payment meathod.png" alt="">
                </div>
            </div>
        </div>
        <hr>
        <div class="copy">
            <section>
                copyright &copy; at 2024 by <span> Moarij,Taha and Sawaira</span>
            </section>
        </div>
    </div>

    
    

    <div class="top">
        <i class="fas fa-chevron-up"></i>
    </div>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        autoplay: true,
        speed: 600,
        breakpoints: {
          576: {
            slidesPerView: 2,
            spaceBetween: 30,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 10,
          },
          991: {
            slidesPerView: 3,
            spaceBetween: 20,
          },
        },
      });
    </script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>
</html>