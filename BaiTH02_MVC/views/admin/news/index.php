<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Trị</title>
    <!-- Liên kết tới Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php 
        include './views/template/header.php';
    ?>
    <!-- Main Content -->
    <div class="container mt-4">

        <!-- Stat boxes -->
        <div class="row text-center">
            <div class="col-md-3">
                <div class="stat-box">
                    <h4>Người dùng</h4>
                    <div class="count">110</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box">
                    <h4>Loại rau-củ-quả</h4>
                    <div class="count">3</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box">
                    <h4>Số lượng rau-củ-quả</h4>
                    <div class="count">8</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-box">
                    <h4>Bài viết</h4>
                    <div class="count">8</div>
                </div>
            </div>
        </div>
    </div>
<?php
    include './views/template/Footer.php';
?>

    <!-- Liên kết file Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Zg+zbnMqa/w9KJIRDMG+Ecs7kBmlzVbhU9p+UZZx5pTOSTwrG3QmEwR4mxFYPkfi" crossorigin="anonymous"></script>
</body>
</html>
