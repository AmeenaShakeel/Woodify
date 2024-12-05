<?php
session_start();
include('connectdb.php');

// Fetch the number of registered users
$query_users = "SELECT COUNT(*) AS total_users FROM user_table";
$result_users = mysqli_query($conn, $query_users);
$row_users = mysqli_fetch_assoc($result_users);
$total_users = $row_users['total_users'];

// Fetch the number of sold products
$query_sold = "SELECT SUM(qty) AS total_sold FROM cart_table"; // Assuming 'orders' table contains sold product info
$result_sold = mysqli_query($conn, $query_sold);
$row_sold = mysqli_fetch_assoc($result_sold);
$total_sold = $row_sold['total_sold'];


$jan_sales=40000;
$feb_sales=120000;

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
 .stat-box,.sold-box {
       padding-top: 25px;
       padding-bottom: 25px;
       border-radius: 10px;
       width: 100px;
       text-align: center;
       margin-bottom: 20px;
       color: white;
   }
   .stat-box {
       background-color: #393977; 
   }

   .sold-box {
       background-color: #c15b5b; 
   }

   .stat-box h3 {
       font-size: 24px;
       font-weight: bold;
   }

   .stat-box h1 {
       font-size: 48px;
       margin-top: 10px;
       font-weight: bold;
   }
</style>
<body>

<?php include('header1.php') ?>

<section class="admin_dashboard text-center">
    <h2 style="padding-left:170px;">Welcome to Admin Dashboard</h2>
    <div class="row d-flex justify-content-end pr-4 pl-4">
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

        <!-- Main content -->
        <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="row mt-2">
                <!-- Registered Users -->
                <div class="col-md-6 d-flex justify-content-end">
                    <div class="stat-box col-md-8">
                        <h3>Total Registered Users</h3>
                        <h1><?php echo $total_users; ?></h1>
                    </div>
                </div>
                <!-- Sold Products -->
                <div class="col-md-6 d-flex justify-content-start">
                    <div class="sold-box col-md-8">
                        <h3>Total Products Sold</h3>
                        <h1><?php echo $total_sold; ?></h1>
                    </div>
                </div>
            </div>

            <div class="row mt-5 d-flex justify-content-center">
            <div class="col-md-8 pt-5">
               
               <canvas id="myBarChart" width="200" height="100"></canvas>

           </div>
            </div>
        </div>
    </div>
</section>
<script>
const dynamicSalesData = [
    { month: "January", sales: <?= $jan_sales ;?>},
    { month: "February", sales: <?= $feb_sales ;?>},
    { month: "March", sales: 600000 },
    { month: "April", sales: 250000 },
    { month: "May", sales: 450000 }
];

// Function to dynamically generate the chart data
function generateChartData(monthSalesData) {
    const labels = monthSalesData.map(item => item.month); 
    const salesData = monthSalesData.map(item => item.sales);

    // Example colors
    const colors = [
        'rgba(255, 99, 132, 0.6)',
        'rgba(54, 162, 235, 0.6)',
        'rgba(255, 206, 86, 0.6)',
        'rgba(75, 192, 192, 0.6)',
        'rgba(153, 102, 255, 0.6)',
        'rgba(255, 159, 64, 0.6)'
    ];

    const borderColor = colors.map(color => color.replace('0.6', '1')); // Adjust border color for each bar

    return {
        labels: labels,
        datasets: [{
            label: 'Monthly Sales',
            data: salesData, 
            backgroundColor: colors.slice(0, salesData.length), 
            borderColor: borderColor.slice(0, salesData.length),
            borderWidth: 1
        }]
    };
}

// Generate the chart data
const data = generateChartData(dynamicSalesData);

// Config for the chart
const config = {
    type: 'bar',
    data: data,
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Sales Target'
                },
                ticks: {
            
                    callback: function(value) {
                        return value; 
                    }
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Months'
                }
            }
        }
    }
};

// Render the chart
const myBarChart = new Chart(
    document.getElementById('myBarChart'),
    config
);
</script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="main.js?v=<?php echo time(); ?>"></script>

</body>
</html>
