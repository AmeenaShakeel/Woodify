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

</head>
<body>

 <?= include('header.php');?>
<div class="admin_dashboard mt-5">
 <div class="product-details row mt-5 mb-3  d-flex flex-column">
    <?php
    $id=$_GET['id'];
    $sql="Select * from products where prod_id= '$id' ";
    $result=mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
    while($row=mysqli_fetch_assoc($result))
    {

    ?>
    <form action="cart.php?id=<?= $id ?>" method=post>
    <div class="image-container col-md-12 d-flex justify-content-center">
        <img src="<?= $row['prod_image'] ?>" alt="Selected Product" id="selected-product-image" style="height:365px;width:450px;">  
        <input type="hidden" name="prod_image" value="<?= $row['prod_image'] ?>">
    
    </div>
    <div class="description-container col-md-12 mt-4 d-flex align-items-center flex-column ">

          <h4 id="selected-product-name"><?= $row['prod_name'] ?></h4>
          <h5 class="text-dark" id="total-price1">  Rs <?= $row['prod_price'] ?></h5>
          <input type="hidden" name="prod_name" value="<?= $row['prod_name'] ?>">
          <input type="hidden" name="prod_price" value="<?= $row['prod_price'] ?>">
          <input type="hidden" name="qty" value="1">
          <input type="hidden" name="tax" value="2.5">

          <div class="form-group">
            <button type="submit" class="btn btn-lg text-white add-to-cart pl-5" onclick="addToCart()" id="count" style="background-color:#207178;">Add to Cart
                <img src="pic/cart.png" alt="" height="25px" width="25px" class="mr-3 ml-2">
            </button>
            </div>
    </div>
    </form>
    <?php
}
}
?>

  
</div>
</div>


<script>
     const button = document.getElementById('count');
    const countDisplay = document.getElementById('cart-count');

    // Initialize counter
    let count = 0;

    // Event listener for button click
    button.addEventListener('click', function() {
        count++; // Increase count
        countDisplay.textContent = count;
       
       
    });
        
    </script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="main.js?v=<?php echo time(); ?>"></script>

</body>
</html>