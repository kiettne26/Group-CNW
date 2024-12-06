<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa hàng hoa quả</title>
    <!-- Liên kết tới Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Cải tiến header */
        .header {
            display: flex;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 10px 20px;
        }

        .header img {
            width: 120px;
            height: auto;
        }

        .nav-item {
            padding: 0 15px;
        }

        .nav-link {
            font-weight: bold;
            font-size: 16px;
        }

        .nav-link:hover {
            color: #00FF00 !important;
        }

        .search-box {
            margin-left: auto; /* Đẩy hộp tìm kiếm sang bên phải */
        }

        .search-box input {
            padding: 8px;
            font-size: 14px;
            width: 250px;
            border-radius: 25px;
            border: 1px solid #ddd;
        }

        .search-box button {
            padding: 8px 15px;
            background-color: #00FF00;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 25px;
            margin-left: 10px;
        }

        .search-box button:hover {
            background-color: #0078ff;
        }

        .carousel-inner img {
            height: 500px;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.5s ease;
        }

        .carousel-inner img:hover {
            transform: scale(1.1);
        }

        .top-songs {
            padding: 60px 0;
            background-color: #f8f9fa;
        }

        .top-songs h2 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 40px;
            color: #0078ff;
        }

        .song-item {
            text-align: center;
            margin-bottom: 30px;
            transition: transform 0.3s ease;
        }

        .song-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .song-item img {
            width: 100%;
            height: 200px; 
            object-fit: cover; 
            border-radius: 15px;
            margin-bottom: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .song-item p {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #0078ff;
            color: white;
            font-size: 16px;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
        }

        footer a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
        }

        footer a:hover {
            color: #00FF00;
        }

        @media (max-width: 768px) {
            .song-item img {
                height: 180px; 
            }
        }
        .card {
            display: flex;
            flex-direction: column;
            border: 1px solid #ddd;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden; /* Đảm bảo hình ảnh không bị lòi ra ngoài */
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            }

            .card-img-top {
                width: 100%;
                height: 200px;
                object-fit: cover;
                display: block; /* Đảm bảo hình ảnh không bị căn chỉnh lạ */
            }

            .card-title {
                font-size: 1.25rem;
                margin-bottom: 10px;
            }

            .card-text {
                font-size: 0.9rem;
                color: #555;
                margin-bottom: 15px; /* Tăng khoảng cách dưới đoạn văn bản */
            }

            .btn-primary {
                background-color: #0078ff;
                border: none;
                display: block; /* Đảm bảo nút không bị ảnh hưởng bởi layout */
            }

            .btn-primary:hover {
                background-color: #0056b3;
            }



    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <a href="#" class="d-flex align-items-center">
            <img src="images/logohoaqua.jpg" alt="Logo">
        </a>
        <nav>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="#">Trang Chủ</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Giới Thiệu</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Sản Phẩm</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Liên Hệ</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?controller=news&action=login">Đăng Nhập</a></li>
            </ul>
        </nav>
        <div class="search-box">
            <form class="d-flex" method="GET">
                <input type="hidden" name="controller" value="news">
                <input class="form-control me-2" type="text" placeholder="Nhập nội dung tìm kiếm" name="tukhoa">
                <button class="btn btn-outline-dark ms-2" type="submit">Tìm kiếm</button>
                <input type="hidden" name="action" value="tim-kiem">
            </form>
        </div>
    </header>

    <!-- Main -->
    <main class="container mt-5">
        <div class="row g-4">
        <?php if (!empty($data_Search)): ?>
    <?php foreach ($data_Search as $newsItem): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-light">
                <a href="views/news/detail.php?id=<?php echo $newsItem['id']; ?>">
                    <img src="/BaiTH02_MVC/images/<?php echo htmlspecialchars($newsItem['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($newsItem['title']); ?>" style="height: 200px; object-fit: cover;">
                </a>
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($newsItem['title']); ?></h5>
                    <p class="card-text mb-2">
                        <small class="text-muted">
                            Ngày tạo: <?php echo date("d-m-Y H:i:s", strtotime($newsItem['created_at'])); ?>
                        </small>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Không tìm thấy kết quả nào cho từ khóa "<?php echo htmlspecialchars($_GET['tukhoa']); ?>".</p>
<?php endif; ?>
</div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 Tin tức Hoa Quả. Mọi quyền được bảo lưu.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
