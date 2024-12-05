<?php
session_start();
include('connectdb.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $prod_name = $_POST['prod_name'];
    $prod_image = $_POST['prod_image'];
    $prod_price = $_POST['prod_price'];
    $qty = $_POST['qty'];
    $tax = $_POST['tax'];
    $_SESSION['session_id'] = session_id();  
    $session_id = $_SESSION['session_id'];  
    $total = ($prod_price * $qty) + (($prod_price * $qty) * ($tax / 100));
    $_SESSION['cart_count'] = 0;

    if (isset($_SESSION['cart'])) {
        $session_array_id = array_column($_SESSION['cart'], "id");
        if (!in_array($id, $session_array_id)) {
            $product_data = array(
                'id' => $id,
                'prod_name' => $prod_name,
                'prod_price' => $prod_price,
                'prod_image' => $prod_image,
                'qty' => $qty,
                'tax' => $tax,
                'total' => $total
            );
            $_SESSION['cart'][] = $product_data;
        } else {
            // Update quantity if product already in cart
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['id'] == $id) {
                    $_SESSION['cart'][$key]['qty'] += $qty;
                    $_SESSION['cart'][$key]['total'] = ($_SESSION['cart'][$key]['prod_price'] * $_SESSION['cart'][$key]['qty']) + 
                        (($_SESSION['cart'][$key]['prod_price'] * $_SESSION['cart'][$key]['qty']) * ($_SESSION['cart'][$key]['tax'] / 100));
                }
            }
        }
    } else {
        $product_data = array(
            'id' => $id,
            'prod_name' => $prod_name,
            'prod_price' => $prod_price,
            'prod_image' => $prod_image,
            'qty' => $qty,
            'tax' => $tax,
            'total' => $total
        );
        $_SESSION['cart'][] = $product_data;
    }

    $_SESSION['cart_count'] = 0; 
    foreach ($_SESSION['cart'] as $item) {
        $_SESSION['cart_count'] += $item['qty']; 
    }
}


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
    <link rel="stylesheet" href="main.css">
</head>
<style>
    input{
            background-color: #f4f4f4;
            border:none;
        }
    input:focus{
            outline:none;
        }
</style>
<body>
<?php include('header.php'); ?>
<div class="admin_dashboard mt-5">
    <h2 class="text-center mb-4 mt-3">Shopping Cart</h2>

    <form action="cartdata.php" method="post">
    <table class="table table-bordered">
            <thead class="table-dark text-center">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Tax (%)</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                  
                </tr>
            </thead>
            <tbody>
    <?php
     
        if (!empty($_SESSION['cart'])) {
        $_SESSION['subtotal']= 0;
        foreach ($_SESSION['cart'] as $key => $value) {
        $_SESSION['subtotal'] += $value['total'];
        $session_id = $_SESSION['session_id']; 
?>
      
      <tr class='text-center'>
        <td>
            <?php echo $value['prod_name']; ?>
            <input type="hidden" name="prod_name[]" value="<?php echo $value['prod_name']; ?> ">
        </td>
        <td>
            <input type='text' id='price' name="prod_price[]" value='<?php echo $value['prod_price']; ?>' readonly style='width:50px'>
        </td>
        <td>
            <img src='<?php echo $value['prod_image']; ?>' name="prod_image[]" alt='Product Image' height='50px' width='50px' style='border-radius:50%'>
            <input type="hidden" name="prod_image[]" value="<?php echo $value['prod_image']; ?>">
        
        </td>
        <td>
    <input type='number' class='qty' id="qty"  name='qty[]' value="<?php echo $value['qty']; ?>"   data-product-id='<?php echo $value['product_id']; ?>' min='1'  style='width:50px'>
</td>
        <td>
            <input type='number' class='tax' name="tax" value='2.5' style='width:50px' disabled>
        </td>
        <td>
            <span class='total-price'><?php echo number_format($value['total'], 2); ?></span>
            <input type="hidden" name="total[]" value="<?php echo $value['total']; ?>">
        </td>
        <td class='d-flex justify-content-center'>
            <a href='deletecart.php?id=<?= $value['id'];?>' class='table-action-btns text-danger'><i class='fas fa-trash'></i></a>
        </td>
</tr>

<?php
        }
    }
    else
    {
    echo "<tr><td colspan='7' class='text-center'>Your cart is empty.</td></tr>";
    }
?>
</tbody>
<tfoot>
                <tr>
                    <td colspan="5" class="text-right font-weight-bold">Subtotal:</td>
                    <td colspan="1" class="font-weight-bold text-center" id="subtotal"><?= number_format($subtotal, 2) ?> </td>
                    <input type="hidden" name="subtotal" id="subtotal-input" value="">
                </tr>
            </tfoot>
    </table>

        <div class="d-flex justify-content-end">
            <a href="index.php" class="btn mr-2 text-white" style="background-color:#207178;">Continue Shopping</a>
           <?php
           if (!empty($_SESSION['cart'])) {
            ?>
            <button type="submit" class="btn mr-2 text-white" style="background-color:#343a40;">Proceed to Checkout</button>
        <?php   
        }
           else
           {
            ?>
            <button type="submit" class="btn mr-2 text-white d-none" style="background-color:#343a40; ">Proceed to Checkout</button>
            <?php
           }
           ?>
        </div>
        </form>
    
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Function to calculate total price for each row
        function calculateTotal() {
            $('tbody tr').each(function() {
                var $row = $(this);
                var price = parseFloat($('#price').val()) || 0; 
                var qty = parseInt($row.find('.qty').val()) || 1;
                var tax = parseFloat($row.find('.tax').val()) || 0;

                // Calculate total price: price * qty + tax percentage
                var total = (price * qty) + ((price * qty) * (tax / 100));

                // Update the total price in the table inside the span element
                $row.find('.total-price').text(total.toFixed(2));
            });

            // Update subtotal
            var subtotal = 0;
            $('.total-price').each(function() {
                subtotal += parseFloat($(this).text()) || 0;
            });
            $('#subtotal').text(subtotal.toFixed(2));
            $('input[name="subtotal"]').val(subtotal.toFixed(2));
        }

        // Recalculate total price when quantity or tax is changed
        $(document).on('input', '.qty, .tax', function() {
            calculateTotal();
        });

        // Initial calculation
        calculateTotal();
    });


    $('.qty').on('change', function() {
      var qty = $(this).val();
      var productId = $(this).data('product-id');

      // AJAX request
      $.ajax({
        url: 'update_quantity.php',
        type: 'POST',
        data: {
          product_id: productId,
          qty: qty
        },
        success: function(response) {
          if (response == 'success') {
            alert('Quantity updated successfully');
          } else {
            alert('Error updating quantity');
          }
        }
      });
    });

    </script>
</script>
</body>
</html>
