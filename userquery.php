<?php
session_start();
include('connectdb.php');
?>

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
<style>
   
</style>
<body>

    <?php
include('header1.php')
?>

<section class="admin_dashboard text-center">
<h3>User Query Page</h3>

<div class="row d-flex justify-content-end pr-4 pl-4 mt-4">
<nav class="col-md-3 col-lg-2 d-md-block pl-0 pr-0 sidebar admin_sidebar">
        <h5 class="p-3 bg-dark text-white">Admin Menu</h5>        
        <div class="sidebar-sticky">
        <ul class="nav flex-column">
                    <li class="nav-item admin_item">
                        <a class="nav-link text-dark font-weight-bold" href="admin_panel.php">Admin Dashboard</a>
                    </li>
                    <li class="nav-item admin_item">
                        <a class="nav-link active text-dark text-bold font-weight-bold" href="signup.php">Add User</a>
                    </li>
                    <li class="nav-item admin_item">
                            <a class="nav-link text-dark text-bold font-weight-bold" href="viewUser.php">View User</a>
                        </li>
                    <li class="nav-item admin_item">
                        <a class="nav-link text-dark font-weight-bold" href="addCategory.php">Add Category</a>
                    </li>
                    <li class="nav-item admin_item">
                        <a class="nav-link text-dark font-weight-bold" href="viewCategory.php">View Categories</a>
                    </li>
                    <li class="nav-item admin_item">
                        <a class="nav-link text-dark font-weight-bold" href="addProduct.php">Add Product</a>
                    </li>
                    <li class="nav-item admin_item">
                        <a class="nav-link text-dark font-weight-bold" href="viewProduct.php">View Product</a>
                    </li>
                    <li class="nav-item admin_item">
                        <a class="nav-link text-dark font-weight-bold" href="userquery.php">User Queries</a>
                    </li>
                </ul>

                </div>
            </nav>




<div class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                 $fetch="SELECT * FROM contact";

                $result = mysqli_query($conn, $fetch);
                if(mysqli_num_rows($result)> 0)
                {
                 while($row= mysqli_fetch_assoc($result))
                {

                ?>
                    
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['message'] ?></td>
                    </tr>
                 <?php
                }
            }

?>
                </tbody>
            </table>
            </div>
            </div>
            </div>
</section>  


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
<script src="main.js?v=<?php echo time(); ?>"></script>

</body>
</html>