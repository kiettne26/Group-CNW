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
            <a class="navbar-brand" href="">
            <img src="/BaiTH02_MVC/images/logohoaqua.jpg">
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
                        <a class="nav-link" href="index.php?controller=news&action=dashboard">Quản lý tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=news&action=index">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=news&action=login">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </header>
    <!-- Liên kết file Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Zg+zbnMqa/w9KJIRDMG+Ecs7kBmlzVbhU9p+UZZx5pTOSTwrG3QmEwR4mxFYPkfi" crossorigin="anonymous"></script>
</body>
</html>
