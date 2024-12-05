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
        <h2>Edit User</h2>

        <?php
$id=$_GET['id'];
$editdata= "SELECT * From logged_user  Where  id='$id' ";


$result=mysqli_query($conn, $editdata);
if(mysqli_num_rows($result)> 0)
{

while($row= mysqli_fetch_assoc($result))
{
?>

        <form action="updateuser.php?id=<?php echo $id; ?>" method="POST" class="text-left">
            <div class="form-group">
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $row['username']?>" required>
            </div>

            <div class="form-group position-relative">
            <label for="password">Password:</label>
            <input type="password" class="form-control passwordinfo pt-4 pb-4" id="password" name="password" value="<?php echo $row['password']?>">
            <button type="button" class="btn position-absolute eyebtn" id="togglePassword">
            <i class="fa fa-eye-slash" id="eyeIcon"></i>
            </button>
            </div>


            <div class="form-group">
                <input type="submit" value="Edit User">
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