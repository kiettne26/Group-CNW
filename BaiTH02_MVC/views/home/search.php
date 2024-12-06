<?php
require_once "./models/Database.php";
require_once "./models/News.php";

// Kết nối đến cơ sở dữ liệu
$db = new Database();
$pdo = $db->connect();

// Khởi tạo đối tượng News
$newsModel = new News($pdo);

// Lấy giá trị từ form
$query = isset($_POST['query']) ? intval($_POST['query']) : 0;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Kết quả tìm kiếm</h1>
        <?php if ($newsItem): ?>
            <div class="card">
            <img src="images/<?php echo htmlspecialchars($newsItem['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($newsItem['title']); ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($newsItem['title']); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($newsItem['content']); ?></p>
                    <p class="card-text"><small class="text-muted">Ngày tạo: <?php echo date("d-m-Y H:i:s", strtotime($newsItem['created_at'])); ?></small></p>
                </div>
            </div>
        <?php else: ?>
            <p>Không tìm thấy sản phẩm với ID: <?php echo $query; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
