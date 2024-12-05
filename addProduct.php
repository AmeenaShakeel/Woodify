<?php
session_start();
include('connectdb.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="main.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
include('header1.php')
?>

    <div class="container mt-5">
        <h2>Add Product</h2>
        <form action="submitProduct.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
    <label for="exampleFormControlSelect1">Select Category</label>
    <select class="form-control eyebtn passwordinfo" name="category_id" id="exampleFormControlSelect1" style="-webkit-appearance: none; -ms-appearance: none; appearance: none; height:48px;">
   
    <?php
    $category_table="Select cat_id , cat_name from categories";
    $result=mysqli_query($conn,$category_table);
    if(mysqli_num_rows($result)> 0)
    {
        while ($row=mysqli_fetch_assoc($result)) {

    ?> 
    <option value="<?= $row['cat_id'];?>"> <?= $row['cat_name'];?> </option>
    <?php
        }
    }
    ?>
    </select>
  </div>
                <div class="form-group">
                <label for="prodName">Product Name</label>
                <input type="text" class="form-control eyebtn passwordinfo pt-4 pb-4" id="prodName" name="prod_name" required>
            </div>
        
            <div class="form-group">
                <label for="prodslug">Product Slug</label>
                <input type="text" class="form-control eyebtn passwordinfo pt-4 pb-4" id="prodslug" name="prod_slug" required>
            </div>

            <div class="form-group">
                <label for="prodimg">Product Image</label>
                <input type="file" class="form-control eyebtn passwordinfo pb-5 pt-3" id="prodimg" name="prod_img" required>
            </div>

            <div class="form-group">
            <label for="prodvideo">Product Video (Optional)</label>
            <input type="file" class="form-control eyebtn passwordinfo pt-3 pb-5" id="prodvideo" name="prod_video" accept="video/*">
            </div>


            <div class="form-group">
                <label for="prodprice">Product Price</label>
                <input type="number" class="form-control eyebtn passwordinfo pt-4 pb-4" id="prodprice" name="prod_price" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" rows="3" name="prod_desc"></textarea>
            </div>

           
            <div class="form-group">
                <input type="submit" value="Add Product">
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
