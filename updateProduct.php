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
session_start();
include('connectdb.php');
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $id=$_GET['id'];
    $name=$_POST['prod_name'];
    $slug=$_POST['prod_slug'];
    $price=$_POST['prod_price'];
    $desc=$_POST['prod_desc'];

$image_file=$_FILES["prod_img"]["name"];
$tempname = $_FILES["prod_img"]["tmp_name"];
$image_folder= "pic/".$image_file;

if (!empty($image_file)) {
    move_uploaded_file($tempname, $image_folder);
    $update="Update products
    Set prod_name='$name',
    prod_slug='$slug',
    prod_price='$price',
    prod_image='$image_folder',
    prod_desc='$desc'
    Where prod_id= '$id' ";

    $run=mysqli_query($conn, $update);
  
  if($run) 
  {
    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
    Product Updated Successfully
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';

  header("Refresh: 2; url=viewProduct.php");
  }
 
else
{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Updation Failed
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';

  header("Refresh: 2; url=editProduct.php");
}
}

else
{
    $update="Update products
 Set prod_name='$name',
 prod_slug='$slug',
 prod_price='$price',
 prod_desc='$desc'
 Where prod_id= '$id' ";

  $run=mysqli_query($conn, $update);
  
  if($run) 
  {
    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
    Product Updated Successfully
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';

  header("Refresh: 2; url=viewProduct.php");
  }
 
else
{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Updation Failed
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';

  header("Refresh: 2; url=editProduct.php");
}
}
}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="main.js"></script>