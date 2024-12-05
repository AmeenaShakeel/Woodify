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
    $email = $_POST['email'];
    $password=$_POST['password'];
    $_SESSION['admin_email']="adr3822@gmail.com";
    $_SESSION['user_email']="tahawaseem043@gmail.com";


    if($email==$_SESSION['admin_email'])
    {
        $admin="Select * From admin WHERE email='$email' AND password='$password' ";
    
        $run_admin=mysqli_query($conn, $admin);

        $num_admin=mysqli_num_rows($run_admin);

        if($num_admin == 1 )
        {
            header("Location: admin_panel.php");
        }
      
        else
        {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Check your login Credentials
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
          header("Refresh: 2; url=login.php");
        }
    }
    elseif($email == $_SESSION['user_email']) {
      $user = "SELECT * FROM logged_user WHERE username='$email' AND password='$password'";
      $run_user = mysqli_query($conn, $user);
      $num_user = mysqli_num_rows($run_user);
  
      if ($num_user > 0) {
          $_SESSION['logged_in_email'] = $email;
          header("Location: index.php");
          exit();
      } else {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  Check your login Credentials
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
      }
  }    
  else {
    
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Check your login Credentials
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      header("Refresh: 2; url=login.php");
    }
  }
?>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="main.js?v=<?php echo time(); ?>"></script>
</body>
</html>