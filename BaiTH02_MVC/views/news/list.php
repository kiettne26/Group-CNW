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
<div class="row g-4">
    <?php if (!empty($news)): ?>
        <?php foreach ($news as $newsItem): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-light">
                    <!-- Thêm thẻ <a> quanh hình ảnh để khi nhấn vào hình ảnh sẽ chuyển đến chi tiết sản phẩm -->
                    <a href="views/news/detail.php?id=<?php echo $newsItem['id']; ?>">
                        <img src="/BaiTH02_MVC/images/<?php echo htmlspecialchars($newsItem['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($newsItem['title']); ?>" style="height: 200px; object-fit: cover;">
                    </a>
                    <div class="card-body">
                        <!-- Hiển thị tiêu đề sản phẩm -->
                        <h5 class="card-title"><?php echo htmlspecialchars($newsItem['title']); ?></h5>
                        <!-- Hiển thị ngày tạo -->
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
        <!-- Hiển thị thông báo nếu không có sản phẩm -->
        <p>Không có sản phẩm nào để hiển thị.</p>
    <?php endif; ?>
</div>


<style>
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
