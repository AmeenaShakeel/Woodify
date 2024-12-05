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
$username=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$_SESSION['password']=$password;
$cpassword=$_POST['cpassword'];

$checkemail="Select * from signupuser where email='$email'";
$_SESSION['checkemail']=$checkemail;
$confirm=mysqli_query($conn,$checkemail);
$num=mysqli_num_rows($confirm);
// $exists=false;
if($num > 0)
{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    User Already Exists
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';

  header("Refresh: 3; url=signup.php");
 }
else
{
if($password==$cpassword)
{
$sql="INSERT INTO signupuser (name, email, password ) VALUES ('$username', '$email', '$password')";

$result=mysqli_query($conn , $sql);

if($result)
{
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Account created successfully
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  header("Refresh: 2; url=login.php");

}

else
{

    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Account Creation Failed! Check your Entered Data
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  header("Refresh: 2; url=signup.php");

}
}

else
{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    Password not Match
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  header("Refresh: 3; url=signup.php");

}
}
}
?>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</body>
</html>
