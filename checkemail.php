
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



    <header id="header" style="background-color:burlywood;">
        <div class="logo">
            <a href="index.php"><img id="lol" src="pic/bulb.png" alt="">Woodify</a>
        </div>
        <ul class="navigation">
            <li><a href="index.php" class="active">home</a></li>
            <li><a href="newstock.php">new stock</a></li>
            <li><a href="preloved.php">pre-loved stock</a></li>
            <li><a href="index.php">new arrival</a></li>
            <li><a href="index.php">team</a></li>
            <li><a href="contact.php">contact</a></li>
        </ul>
        <div class="bars">
            <img id="bar" src="pic/menu.png" alt="">
        </div>
    </header>

    <div class="container text-center">
        <h2 class="mt-3">Email Verification</h2>
        <form action="checkemail.php" method="POST" class="text-left mt-5">
                <div class="form-group">
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
           
            <div class="form-group d-flex justify-content-center">
                <input type="submit" value="Verify Email" name="verify">
            </div>
        </form>
    </div>
    
<?php
  include('connectdb.php');
  session_start();
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $_SESSION['$email']=$_POST['email'];
  $email= $_SESSION['$email'];
  $_SESSION['$admin_email']="mobilemarkettinggurus@gmail.com";

  if($email==$_SESSION['$admin_email'])
  {
    $checkadm = "SELECT * FROM `admin` WHERE email='$email'";
    $verifyadm = mysqli_query($conn, $checkadm);
    if($verifyadm && mysqli_num_rows($verifyadm) > 0)
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Admin Email Verified successully!;
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
    header("refresh:2; url=forgot-password.php");
  }
  else
  {
    echo "not verfed";
  }
  }
 
  else
  {
    $checkuser = "SELECT * FROM `signupuser` WHERE email='$email'";
  $verify = mysqli_query($conn, $checkuser);
  if($verify && mysqli_num_rows($verify) > 0)
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Your Email Verified successully!;
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
    header("refresh:2; url=forgot-password.php");
  }
  else
  {
    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Check your Email! Or Create Your Account
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
    header("refresh:2; url=signup.php");

  }
  }
}

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