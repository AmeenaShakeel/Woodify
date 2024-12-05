<?php
session_start();
include('connectdb.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$name=$_POST['prod_name'];
$slug=$_POST['prod_slug'];
// $status=isset($_POST['cat_status'])? '1' : '0';
$desc=$_POST['prod_desc'];

$image_file=$_FILES["prod_img"]["name"];
$tempname = $_FILES["prod_img"]["tmp_name"];
$image_folder= "pic/".$image_file;

}

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
    <link rel="stylesheet" href="main.css?v=<?php echo time(); ?>">
    <style>
     .tv-frame {
        position: relative;
        width: 100%;
        max-width: 800px; /* Adjust the size for the TV */
        padding: 15px;
        background: #333; /* Dark color for TV frame */
        border-radius: 20px; /* Rounded edges for TV look */
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3); /* Shadow for 3D effect */
        border: 8px solid #222; /* TV border */
    }

    .tv-frame::before {
        content: '';
        position: absolute;
        top: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 5px;
        background: #555; /* Top black strip to mimic TV */
        border-radius: 10px;
    }

    .screen {
        background-color: black; /* Screen color when video isn't playing */
        border-radius: 10px;
        overflow: hidden;
    }

    .screen video {
        border-radius: 10px;
    }

</style>
</head>
<body>
<?php
include('header.php');
?>

<div class="big-shop" id="new_stock">
        <div class="shop-title">
            <h2 style="font-weight: bold; font-size: 3rem;">
                Chairs Section 
            </h2>
            <p style="font-weight: 500;">
                "A house that does not have one warm, comfy chair in it is soulless."
            </p>
        </div>

        <div class="product-flex ">
    <?php
        $product = "SELECT prod_id , prod_name, prod_image, prod_price FROM products WHERE category_id = '1'";
        $runquery = mysqli_query($conn, $product);
        if(mysqli_num_rows($runquery)> 0)
        {
        while($row= mysqli_fetch_assoc($runquery))
        {
    ?> 
    <div class="product-one col-lg-6">
        <div class="product-image">
            <img src="<?= $row['prod_image'] ?>" alt="" width="300px" height="600px">
            <div class="overlay">
                <a href="showproduct.php?id=<?= $row['prod_id']; ?>" style="text-decoration: none; color: black;">
                    <i class="fas fa-shopping-bag"></i>
                </a>

                <a href="preloved.php?id=<?= $row['prod_id'];?>" style="text-decoration: none; color: black;" onclick="addToFavourites(<?= $row['prod_id']; ?>)">
    <i class="far fa-heart heart-icon"></i>
</a>
                
                <i class="fas fa-search"></i>
            </div>
        </div>

        <section><?= $row['prod_name'] ?></section>
        <div class="content">
            <div class="left"></div>
            <div class="right">
                <section>Rs <?= $row ['prod_price'] ?></section>
            </div>
        </div>
    </div>
    <?php
        }
    }
    ?>
</div>

<?php 
    $video = "SELECT prod_video FROM products WHERE category_id = '1' AND prod_video != '' ";
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</div>
       
<?php
include('footer.php');
?> 

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="main.js"></script>
</body>
</html>

