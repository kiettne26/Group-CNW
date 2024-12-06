<?php
require_once './models/Database.php';

// Tạo kết nối Database
$database = new Database();
$pdo = $database->connect();

// Truy vấn dữ liệu sản phẩm
$sql = "SELECT id, title, image, created_at FROM news";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$news = $stmt->fetchAll(PDO::FETCH_ASSOC); // Đổi biến $fruits thành $news cho thống nhất
?>

<h1 class="mb-4">Danh sách Sản phẩm</h1>
<div class="row">
    <?php if (!empty($news)): ?>
        <?php foreach ($news as $newsItem): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <!-- Hiển thị hình ảnh -->
                    <img src="images/<?php echo htmlspecialchars($newsItem['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($newsItem['title']); ?>">
                    <div class="card-body">
                        <!-- Hiển thị tiêu đề sản phẩm -->
                        <h5 class="card-title"><?php echo htmlspecialchars($newsItem['title']); ?></h5>
                        <!-- Hiển thị ngày tạo -->
                        <p class="card-text">
                            <small class="text-muted">
                                Ngày tạo: <?php echo date("d-m-Y H:i:s", strtotime($newsItem['created_at'])); ?>
                            </small>
                        </p>

                        <a href="../detail.php?id=<?php echo $newsItem['id']; ?>" class="btn btn-primary">Xem chi tiết</a>



                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <!-- Hiển thị thông báo nếu không có sản phẩm -->
        <p>Không có sản phẩm nào để hiển thị.</p>
    <?php endif; ?>
</div>
