<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woodify</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <?php include('header.php'); ?> 

    <div class="big-shop" id="new_stock">
        <div class="shop-title">
            <h2 style="font-weight: bold; font-size: 3rem;">
                Pre-Loved Stock 
            </h2>
            <p style="font-weight: 300;">
                "Pre-loved furniture has a story to tell, adding character and history to your home." 
            </p>
        </div>
        <div class="shop-flex">
        
        <?php     
        include('connectdb.php');
        $preloved_id = session_id();

        if (isset($_GET['id'])) {
            $prod_id = mysqli_real_escape_string($conn, $_GET['id']);

            $product_query = "SELECT prod_id, prod_name, prod_image, prod_price FROM products WHERE prod_id = '$prod_id'";
            $result = mysqli_query($conn, $product_query);

            if ($result && mysqli_num_rows($result) > 0) {
                $product = mysqli_fetch_assoc($result);

              
                $insert_query = "INSERT INTO favourites (prod_id, prod_name, prod_image, prod_price, session_id)
                                 VALUES ('{$product['prod_id']}', '{$product['prod_name']}', '{$product['prod_image']}', '{$product['prod_price']}', '$preloved_id')";

                $insert_result = mysqli_query($conn, $insert_query);

                if ($insert_result) {
                    $getdata = "SELECT * FROM favourites WHERE session_id = '$preloved_id'";
                    $runquery = mysqli_query($conn, $getdata);

                    if (mysqli_num_rows($runquery) > 0) {
                        while ($show = mysqli_fetch_assoc($runquery)) {
        ?>

            <div class="shop-one">
                <div class="image-one">
                    <img 
                        src="<?= !empty($show['prod_image']) ? $show['prod_image'] : 'pic/cr3.jpg' ?>" 
                        alt="Product Image" 
                        width="800px" 
                        height="300px"
                    >
                    <div class="overlay">
                        <div class="txt">
                            <h3>  Pre Loved <?=  $show['prod_name'] ?></h3>
                            <section>
                                <span>Starting from <?=  $show['prod_price'] ?></span> 
                            </section>
                            <div class="link">
                                <a href="showproduct.php?id=<?= $show['prod_id'] ?>">Shop Now <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
                        } 
                    } 
                } 
            } 
        } 
        else {
           
            $getdata = "SELECT * FROM favourites WHERE session_id = '$preloved_id'";
            $runquery = mysqli_query($conn, $getdata);

            if (mysqli_num_rows($runquery) > 0) {
                while ($show = mysqli_fetch_assoc($runquery)) {
        ?>

            <div class="shop-one">
                <div class="image-one">
                    <img 
                        src="<?= !empty($show['prod_image']) ? $show['prod_image'] : 'pic/cr3.jpg' ?>" 
                        alt="Product Image" 
                        width="800px" 
                        height="300px"
                    >
                    <div class="overlay">
                        <div class="txt">
                            <h3>  Pre Loved <?=  $show['prod_name'] ?></h3>
                            <section>
                                <span>Starting from <?=  $show['prod_price'] ?></span> 
                            </section>
                            <div class="link">
                                <a href="showproduct.php?id=<?= $show['prod_id'] ?>">Shop Now <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
                } 
            } else {
                echo '<h2 style="color:red;">No Product Selected</h2>';
            } 
        } 
        ?>

        </div>
    </div>

    <?php include('footer.php'); ?> 
    
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            autoplay: true,
            speed: 600,
            breakpoints: {
                576: { slidesPerView: 2, spaceBetween: 30 },
                768: { slidesPerView: 3, spaceBetween: 10 },
                991: { slidesPerView: 3, spaceBetween: 20 }
            },
        });
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="main.js"></script>
</body>
</html>
