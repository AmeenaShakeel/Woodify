

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
include('header1.php')
?>
 
    <div class="container text-center">
        <h2 class="mt-3">Change Your Password</h2>
        <form action="forgot-password.php" method="POST" class="text-left mt-5">
        <div class="form-group position-relative">
            <label for="password">Password:</label>
            <input type="password" class="form-control passwordinfo pt-4 pb-4" id="password" name="password">
            <button type="button" class="btn position-absolute eyebtn" id="togglePassword">
            <i class="fa fa-eye-slash" id="eyeIcon"></i>
            </button>
            </div>

            <div class="form-group position-relative">
            <label for="cpassword">Confirm Password:</label>
            <input type="password" class="form-control passwordinfo pt-4 pb-4" id="cpassword" name="cpassword">
            <button type="button" class="btn position-absolute eyebtn" id="togglePassword1">
            <i class="fa fa-eye-slash" id="eyeIcon1"></i>
            </button>
            </div>

            <div class="form-group d-flex justify-content-center">
                <input type="submit" value="Change Password">
            </div>
        </form>
    </div>
    


    <?php
include('connectdb.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $email=$_SESSION['$email'];
  $admin=$_SESSION['$admin_email'];
  $newpassword=$_POST['password'];
  $confirmpassword=$_POST['cpassword'];
 
  if($email==$admin)
  {
    $updateadm="Update admin SET password='$newpassword' where email='$email' ";
    $changepassadm=mysqli_query($conn, $updateadm);
    if($newpassword==$confirmpassword)
    {
    if($changepassadm > 0)
    {
        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        Password Updated Successfully
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
  
      header("Refresh:2; url=login.php");
    }
  
    else
    {
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Password Updation Failed
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    }
  
    else
    {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      Check Your Both Entered Passwords
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
  }

  
  else
  {
  $sql="Update signupuser SET password='$newpassword' where email='$email' ";
  $changepass=mysqli_query($conn, $sql);
  if($newpassword==$confirmpassword)
  {
  if($changepass > 0)
  {
      echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
      Password Updated Successfully
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';

    header("Refresh:2; url=login.php");
  }

  else
  {
      echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Password Updation Failed
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
  }
  }

  else
  {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    Check Your Both Entered Passwords
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  }

}

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