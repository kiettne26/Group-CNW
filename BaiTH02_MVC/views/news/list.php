<?php
require_once '../../models/Database.php';

// Tạo đối tượng Database và kết nối
$database = new Database();
$pdo = $database->connect();

// Truy vấn tất cả dữ liệu từ bảng `news`
$sql = "SELECT id, title, image, created_at FROM news";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Lấy tất cả kết quả
$fruits = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách hoa quả</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Cửa hàng rau củ quả</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./list.php">Danh sách</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5">
        <h1 class="mb-4">Danh sách các loại hoa quả</h1>
        <div class="row">
            <?php if (!empty($fruits)): ?>
                <?php foreach ($fruits as $fruit): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="./images/<?php echo $fruit['image']; ?>" class="card-img-top" alt="<?php echo $fruit['title']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $fruit['title']; ?></h5>
                                <p class="card-text"><small class="text-muted">Ngày tạo: <?php echo date("d-m-Y H:i:s", strtotime($fruit['created_at'])); ?></small></p>
                                <a href="detail.php?id=<?php echo $fruit['id']; ?>" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Không có dữ liệu để hiển thị.</p>
            <?php endif; ?>
        </div>
    </main>

    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">Cửa hàng rau củ quả</h4>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
