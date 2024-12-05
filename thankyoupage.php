<?php
session_start();
include('connectdb.php');
$payment=$_SESSION['payment'];
$email=$_SESSION['order_email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank You for Your Purchase!</title>
  <!-- Bootstrap 4.6 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="main.css?v=<?php echo time(); ?>">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f7f7f7;
    }
    .thankyou-container {
      margin-top: 50px;
    }
    .thankyou-icon {
      font-size: 100px;
      color: #28a745;
    }
    .thankyou-message {
      font-size: 24px;
      font-weight: bold;
    }
    .order-summary {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .user-icon {
            width: 25px;           
            height: 25px;          
            border-radius: 50%;     
            object-fit: cover;      
            border: 2px solid #ddd; 
        }
  </style>
</head>
<body>


<div class="admin_dashboard thankyou-container text-center">
  <!-- Thank You Message -->
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="order-summary">
        <i class="fas fa-check-circle thankyou-icon"></i>
        <h1 class="thankyou-message mt-5">Thank You for Your Purchase!</h1>
        <p class="lead">Your order has been successfully placed. We appreciate your business and hope you enjoy your new products!</p>
        <hr>
        <!-- Order Summary -->
        <div class="text-left">
          <h4 class="text-center">Order Summary</h4>
        <?php
        if($payment=="cod")
        {
        $sql = "SELECT * FROM user_table where email='$email'";
        $result=mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0);
        {
        $row=mysqli_fetch_assoc($result)
        ?>
        <div class="row">
        <div class="col-md-6">
            <p class="pt-3"><strong>Order ID:</strong> 09<?= $row['user_id']; ?></p>
            <p><strong>Name:</strong> <?= $row['user_name']; ?></p>
            <p><strong>City:</strong> <?= $row['city']; ?></p>

        </div>

        <div class="col-md-6">
        <p class="pt-3"><strong>Phone:</strong> +92<?= $row['phone']; ?></p>
        <p><strong>Address:</strong> <?= $row['address']; ?></p>
        <p><strong>Total Price:</strong>  Rs <?= $row['subtotal']; ?> </p>
        </div>
        </div>
            
          <!-- here only last digit of product is real id of product all other digits are fake -->
      <?php
        }
      }

      else
      {
        $sql = "SELECT * FROM user_table where email='$email'";
        $result=mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0);
        {
        $row=mysqli_fetch_assoc($result)
        ?>

        <div class="row">
        <div class="col-md-6 text-left pt-1">
        <p class="pt-3"><strong>Order ID:</strong> 09<?= $row['user_id']; ?></p>
            <p><strong>Name:</strong> <?= $row['user_name']; ?></p>
            <p><strong>Email:</strong><?= $row['email']; ?></p>
            <p><strong>Phone:</strong> +92<?= $row['phone']; ?></p>
            <p><strong>City:</strong><?= $row['city']; ?></p>
        </div>

        <div class="col-md-6 text-left">
            <p class="pt-3"><strong>Address:</strong> <?= $row['address']; ?></p>
            <p><strong>Bank Account No:</strong> 35101-XXXXXXXXX</p>
            <p><strong>Bank Name:</strong> HBL</p>
            <p><strong>Estimated Delivery:</strong> 3-5 Business Days</p>
            <p><strong>Bank Deposit:</strong>  Rs <?= $row['subtotal'] ?></p>
        </div>
        </div>
          <!-- here only last digit of product is real id of product all other digits are fake -->
      <?php
        }
      }
      session_destroy();
      ?>
</div>
      
        <!-- Continue Shopping Button -->
        <a href="index.php" class="btn mt-4 text-white" style="background-color:#207178;;">Continue Shopping</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap 4.6 JS and dependencies -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
