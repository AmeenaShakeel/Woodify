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
    <link rel="stylesheet" href="main.css?v=<?php echo time(); ?>">
</head>
<body>
<?php
include('header1.php')
?>
    <div class="container">
        <h2>Edit Product</h2>

<?php
$id = $_GET['id'];
$editproduct= "SELECT * FROM products WHERE prod_id = '$id'";


$runproduct = mysqli_query($conn, $editproduct);
if (mysqli_num_rows($runproduct) > 0) {
    while ($p_row = mysqli_fetch_assoc($runproduct)) {
?>

<form action="updateProduct.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="prodName">Product Name</label>
                <input type="text" class="form-control eyebtn passwordinfo pt-4 pb-4" id="prodName" name="prod_name"  value="<?= $p_row['prod_name']  ?>" required>
            </div>
        
            <div class="form-group">
                <label for="prodslug">Product Slug</label>
                <input type="text" class="form-control eyebtn passwordinfo pt-4 pb-4" id="prodslug" name="prod_slug" value="<?= $p_row['prod_slug']  ?>" required>
            </div>

            <div class="form-group">
                <label for="prodimg">Product Image</label>
                <input type="file" class="form-control eyebtn passwordinfo pb-5 pt-3" id="prodimg" name="prod_img">
            </div>

            <div class="form-group">
                <label for="prodprice">Product Price</label>
                <input type="number" class="form-control eyebtn passwordinfo pt-4 pb-4" id="prodprice" name="prod_price" value="<?= $p_row['prod_price']  ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" rows="3" name="prod_desc"><?= $p_row['prod_desc']  ?></textarea>
            </div>

           
            <div class="form-group">
                <input type="submit" value="Edit Product">
            </div>
        </form>
<?php
     
}
}

?>
    </div>
    
<?php
include('togglepassword.php');
?>

    
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