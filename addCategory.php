<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="main.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
include('header1.php')
?>
    <div class="container mt-5">
        <h2>Add Category</h2>
        <form action="submitCategory.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="catName">Category Name</label>
                <input type="text" class="form-control eyebtn passwordinfo pt-4 pb-4" id="catName" name="cat_name" required>
            </div>
        
            <div class="form-group">
                <label for="catslug">Category Slug</label>
                <input type="text" class="form-control eyebtn passwordinfo pt-4 pb-4" id="catslug" name="cat_slug" required>
            </div>

            <div class="form-group">
                <label for="catimg">Category Image</label>
                <input type="file" class="form-control eyebtn passwordinfo pb-5 pt-3" id="catimg" name="cat_img">
            </div>
            
    
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" rows="3" name="cat_desc" required></textarea>
            </div>

            <div class="form-group">
                <input type="submit" value="Add Category">
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
