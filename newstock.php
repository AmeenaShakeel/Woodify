<?php
session_start();
include('connectdb.php');
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
<style>
    .tv-frame {
        position: relative;
        width: 100%;
        max-width: 800px; 
        padding: 15px;
        background: #333; 
        border-radius: 20px; 
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3); 
        border: 8px solid #222; 
    }

    .tv-frame::before {
        content: '';
        position: absolute;
        top: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 5px;
        background: #555; 
        border-radius: 10px;
    }

    .screen {
        background-color: black; 
        border-radius: 10px;
        overflow: hidden;
    }

    .screen video {
        border-radius: 10px;
    }
</style>
</head>

<body>
  <?php include('header.php');?>
    
     <div class="big-shop" id="new_stock">
        <div class="shop-title">
            <h2 style="font-weight: bold; font-size: 3rem;">
                New Stock 
            </h2>
            <p style="font-weight: 300;">
                "New furniture has the power to transform a house into a home, bringing warmth and personality to every room.
            </p>
        </div>
       
        <div class="shop-flex">
            <?php
        $product = "SELECT prod_id , prod_name, prod_image, prod_price FROM products WHERE category_id = '8'";
        $runquery = mysqli_query($conn, $product);
        if(mysqli_num_rows($runquery) > 0)
        {
        while($row= mysqli_fetch_assoc($runquery))
        {
    ?> 
            <div class="shop-one">
                <div class="image-one">
                    <img src="<?= $row['prod_image'] ?>" alt="" width="800px" height="300px">
                    <div class="overlay">
                        <div class="txt">
                            <h3><?= $row['prod_name'] ?></h3>
                            <section>
                                <span>Starting from <?= $row['prod_price'] ?>rs</span> 
                            </section>
                            <div class="link">
                                <a href="showproduct.php?id=<?= $row['prod_id'];?>">Shop Now <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
            <?php
        }
    }
?>
          

        </div>

        <?php 
    $video = "SELECT prod_video FROM products WHERE category_id = '8' AND prod_video != '' ORDER BY prod_id DESC LIMIT 1 ";
    $runv = mysqli_query($conn, $video);
    if (mysqli_num_rows($runv) > 0) {
        $rowv = mysqli_fetch_assoc($runv)
?>
<div class="video-section my-5 text-center">
    <div class="container">
        <h5 class="video-title" style="font-weight: bold; margin-bottom: 20px;">
            Product Spotlight
        </h5>
        <div class="tv-frame col-md-9 mx-auto">
            <div class="screen">
                <video class="embed-responsive-item" width="100%" height="300" controls>
                    <source src="<?php echo $rowv['prod_video']; ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
        <?php
        }
    else {
        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        No video available for this category.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
     
      
    }
?>
    </div>
</div>

    </div>

    <?php include('footer.php');?>
    
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="main.js"></script>


</body>
</html>
   