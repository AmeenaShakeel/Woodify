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
    <div class="container text-center">
        <h2>Edit Category</h2>

<?php
$id = $_GET['id'];
$editcategory = "SELECT * FROM categories WHERE cat_id = '$id'";
$runcategory = mysqli_query($conn, $editcategory);
if (mysqli_num_rows($runcategory) > 0) {
    while ($c_row = mysqli_fetch_assoc($runcategory)) {
?>

        <form action="updateCategory.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data" class="text-left">
        <div class="form-group">
                <label for="catName">Category Name</label>
                <input type="text" class="form-control eyebtn passwordinfo pt-4 pb-4" id="catName" name="cat_name" value="<?php echo $c_row['cat_name'];?>" required>
            </div>
        
            <div class="form-group">
                <label for="catslug">Category Slug</label>
                <input type="text" class="form-control eyebtn passwordinfo pt-4 pb-4" id="catslug" name="cat_slug" value="<?php echo $c_row['cat_slug']; ?>" required>
            </div>

            <div class="form-group">
                <label for="catimg">Category Image</label>
                <input type="file" class="form-control eyebtn passwordinfo pb-5 pt-3" id="catimg" name="cat_img">
            </div>
            
    
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" rows="3" name="cat_desc" required><?php echo $c_row['cat_desc']; ?></textarea>
            </div>

            <div class="form-group">
                <input type="submit" value="Edit Category">
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