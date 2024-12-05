<?php
session_start();
include('connectdb.php');
$session_id=$_SESSION['session_id'];
$subtotal=$_SESSION['subtotal'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woodify - Checkout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="main.css?v=<?php echo time(); ?>">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .btn-primary {
            background-color: #00917e;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
        }
        .btn-primary:hover {
            background-color: #007a68;
        }
        select
        {
            -webkit-appearance: none;
            -moz-appearance:none;
            appearance:none;
        }
        .product-row {
    margin-bottom: 15px;
    padding: 15px;
    background-color: #f9f9f9;
    border-radius: 8px;
    border: 1px solid #ddd;
}

.product-image {
    border-radius: 5px;
    width: 50px;
    height: 50px;
    object-fit: cover;
}



.product-info {
    display: flex;
    align-items: center;
}

.product-name {
    font-size: 16px;
    font-weight: bold;
    margin-left: 10px;
}

.product-qty {
    background-color: #4d4d4d;
    color: white;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    margin-right: 10px;
}

.product-price {
    font-weight: bold;
    font-size: 16px;
}

.payment-option {
            padding: 15px;
            border: 2px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        
        .payment-option img {
            max-width: 30px;
            margin-left: 10px;
        }

        #bankDetails {
  max-height: 0; 
  overflow: hidden;
  transition: max-height 0.5s ease;
}
.chatbot-btn {
            position: fixed;
            bottom: 30px;
            right: 20px;
            z-index: 1000;
            background-color: #007bff; 
            color: white;
            border-radius: 50px;
            width: 70px;
            height: 70px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .chatbot-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php

include('header.php')
?>
<header id="header" style="background-color:burlywood;">
    <div class="logo">
        <a href="index.php"><img id="lol" src="pic/bulb.png" alt="">Woodify</a>
    </div>
    <ul class="navigation">
        <li><a href="index.php" class="active">home</a></li>
        <li><a href="newstock.php">new stock</a></li>
        <li><a href="preloved.php">pre-loved stock</a></li>
        <li><a href="index.php#pre_loved_stock">new arrival</a></li>
        <li><a href="index.php#team" id="team-link">team</a></li>
        <li><a href="contact.php">contact</a></li>
    </ul>
    
    <!-- Login Icon -->
  
   
    <div class="login-icon bg-white ml-3" style="width: 26px; height: 26px; border-radius:50%; display: inline-block;">
        <a href="login.php"><img src="pic/user.png" alt="Login" style="width: 26px; height: 26px;"></a>
    </div>



    <div class="bars">
        <img id="bar" src="pic/menu.png" alt="">
    </div>
</header>





<div class="admin_dashboard mt-3">
    <div class="row">
        <!-- Form Section -->
    <div class="col-md-6 pl-5 ">
    <h2>Billing Information</h2>
    <form method="POST" action="ordercompletion.php" class="mt-4">
        <!-- Name and Email in one row -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Your Name:</label>
                <input type="text" class="form-control pt-3 pb-3 passwordinfo pt-4 pb-4" id="name" name="name" required>
            </div>
            <div class="form-group col-md-6">
                <label for="email">Your Email:</label>
                <input type="email" class="form-control pt-3 pb-3 passwordinfo pt-4 pb-4" id="email" name="email" required>
            </div>
        </div>

        <!-- City and Phone Number in one row -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="city">City</label>
                <input type="text" class="form-control pt-3 pb-3 passwordinfo pt-4 pb-4" id="city" name="city" required>
            </div>
            <div class="form-group col-md-6">
                <label for="phoneNumber">Phone Number</label>
                <input type="tel" class="form-control pt-3 pb-3 passwordinfo pt-4 pb-4" id="phoneNumber" name="phoneNumber" required>
            </div>
        </div>

          <!-- Payment Method -->
        <div class="form-group">
            <label for="paymentMethod">Payment Method</label>
        </div>

        <div class="payment-option bg-white">
    <div class="custom-control custom-radio">
        <input type="radio" id="cod" name="paymentMethod" value="cod" class="custom-control-input" checked onclick="toggleBankDetails()">
        <label class="custom-control-label" for="cod">
            Cash on Delivery (COD)
        </label>
    </div>
</div>

<div class="payment-option bg-white">
    <div class="custom-control custom-radio">
        <input type="radio" id="safepay" name="paymentMethod" value="Bank Deposit" class="custom-control-input" onclick="toggleBankDetails()">
        <label class="custom-control-label" for="safepay">Bank Deposit</label>
        <div id="bankDetails" class="bank-details-transition" style="max-height: 0; overflow: hidden; transition: max-height 0.5s ease;">
        <h6 class="pt-4">Here is Company Bank Details:</h6>
        <p class="mt-3"><strong>Bank Name:</strong> HBL</p>
        <p><strong>Account Number:</strong> 35101-XXXXXXXXXXX</p>
    </div>
    </div>
</div>
        
        <!-- Delivery Address -->
        <div class="form-group mt-3">
            <label for="address">Delivery Address</label>
            <textarea class="form-control passwordinfo" id="address" name="address" rows="4" required></textarea>
        </div>

        <!-- Submit Button -->
        <div class="form-group mt-3">
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>
    </form>
</div>

        <!-- Order Summary Section -->
        <div class="col-md-5 ml-auto order-summary bg-white">
            <?php
            $session_id = $_SESSION['session_id'];
            $prod_names=$_SESSION['prod_names']; 
            foreach ($prod_names as $prod_name) {
            $sql="Select * from cart_table where session_id = '$session_id' And prod_name='$prod_name'";
            $result=mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) == 1)
            {
                while($row=mysqli_fetch_assoc($result))
                {
                   
            ?>
            <div class="row product-row">
        <div class="set">
        <div class="col-1">
            <span class="product-qty"><?= $row['qty'] ?></span>
        </div>
        <div class="col-2">
            <img src="<?= $row['prod_image'];  ?>" alt="Product Image" class="product-image" style="border:1px solid grey;">
        </div>
        </div>
        <div class="col-6 product-info">
            <div class="product-name">
                <?= $row['prod_name'];?>
            </div>
        </div>
        <div class="col-3 text-right product-price pt-4 ml-4">
        <?= $row['prod_price'];?>
        </div>
    </div>
    
            <?php
            }
        }
        else
        {
          
          $row=mysqli_fetch_assoc($result);
          ?>
          <div class="row product-row">
        <div class="set">
        <div class="col-1">
            <span class="product-qty"><?= $row['qty'] ?></span>
        </div>
        <div class="col-2">
            <img src="<?= $row['prod_image'];  ?>" alt="Product Image" class="product-image" style="border:1px solid grey;">
        </div>
        </div>
        <div class="col-6 product-info">
            <div class="product-name">
                <?= $row['prod_name'];?>
            </div>
        </div>
        <div class="col-3 text-right product-price pt-4 ml-4">
        <?= $row['prod_price'];?>
        </div>
    </div>
<?php
        }
    }
?>
            
              <div class="summary-item d-flex justify-content-between">
            <h5 class="pr-5 pl-3">Total Price :</h5>
            <h5 class="pr-5 pb-4 ">Rs <?= $subtotal ?></h5>
        </div>

</div>
    </div>

    <a href="https://cdn.botpress.cloud/webchat/v2/shareable.html?botId=2517dcdc-eb07-47ef-9801-b438aa68355c" class="chatbot-btn">
        <img src="pic/robot.png" alt="" height="50" width="50"> 
    </a>
</div>


<script>
function toggleBankDetails() {
   
    var paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
    var bankDetailsDiv = document.getElementById('bankDetails');

    if (paymentMethod === "Bank Deposit") {
        bankDetailsDiv.style.maxHeight = bankDetailsDiv.scrollHeight + "px";
    } else {
        bankDetailsDiv.style.maxHeight = "0"; 
    }
}

document.addEventListener("DOMContentLoaded", function() {
    toggleBankDetails();
});

</script>

<?php
if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']); 
}
exit;
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
