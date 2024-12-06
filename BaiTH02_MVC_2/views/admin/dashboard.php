<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Trị</title>
    <!-- Liên kết tới Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .header img {
            width: 100px;
            height: auto;
        }

        .nav-item {
            padding: 0 10px;
        }

        .nav-link {
            color: #000 !important;
        }

        .stat-box {
            text-align: center;
            padding: 20px;
            border: 1px solid #ddd;
            margin: 10px;
            border-radius: 8px;
            background-color: #f8f9fa;
        }

        .stat-box h4 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .stat-box .count {
            font-size: 30px;
            font-weight: bold;
            color: #0078ff;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #00FF00;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
            <img src="./../home/images/logohoaqua.jpg" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Quản lý tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Quản lý đơn hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Quản lý nội dung</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </header>

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

    <!-- Footer -->
    <footer>
        <p>CỬA HÀNG HOA QUA NỜ SÁU</p>
    </footer>

    <!-- Liên kết file Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Zg+zbnMqa/w9KJIRDMG+Ecs7kBmlzVbhU9p+UZZx5pTOSTwrG3QmEwR4mxFYPkfi" crossorigin="anonymous"></script>
</body>
</html>
