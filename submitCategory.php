<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="main.css?v=<?php echo time(); ?>">
</head>
<body>



<?php
session_start();
include('connectdb.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$name=$_POST['cat_name'];
$slug=$_POST['cat_slug'];
$desc=$_POST['cat_desc'];

$image_file=$_FILES["cat_img"]["name"];
$tempname = $_FILES["cat_img"]["tmp_name"];
$image_folder= "pic/".$image_file;

$sql = "INSERT INTO categories (cat_name, cat_slug, cat_image, cat_desc) 
        VALUES ('$name', '$slug', '$image_folder', '$desc')";


$result=mysqli_query($conn, $sql);

if ($result) {
    if (move_uploaded_file($tempname, $image_folder)) {

        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                Category Added Successfully
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
              header("Refresh: 2; url=viewCategory.php");
    }
    else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Image not inserted 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';

  header("Refresh: 2; url=addCategory.php");
    }
}
else
{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Insertion Failed
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';

  header("Refresh: 2; url=addCategory.php");
}

}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="main.js?v=<?php echo time(); ?>"></script>
</body>
</html>