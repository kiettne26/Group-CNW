<?php 
 require_once '../../models/Database.php';

$database = new Database();
$pdo = $database->connect(); 

// Lấy ID của bài viết từ URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Truy vấn dữ liệu chi tiết của bài viết
$sql = "SELECT 
            title, 
            content, 
            image, 
            created_at 
        FROM news
        WHERE id = :id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT); // Chỉnh sửa ở đây
$stmt->execute();

$newsItem = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$newsItem) {
    echo "<p>Không tìm thấy thông tin chi tiết của bài viết.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                            <a class="nav-link active" aria-current="page" href="./">Trang chủ</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Tìm</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
   

    <main class="container mt-5">
        <div class="row mb-5">
            <div class="col-sm-4">
            <img src="/BaiTH02_MVC/views/news/images/<?php echo htmlspecialchars($newsItem['image']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($newsItem['title']); ?>">
            </div>
            <div class="col-sm-8">
                <h5 class="card-title mb-2"><?php echo htmlspecialchars($newsItem['title']); ?></h5>
                <p class="card-text">
                    <span class="fw-bold">Mô tả:</span> 
                    <?php echo htmlspecialchars($newsItem['content']); ?>
                </p>
                <p class="card-text">
                    <span class="fw-bold">Ngày tạo:</span> 
                    <?php echo date("d-m-Y H:i:s", strtotime($newsItem['created_at'])); ?>
                </p>
            </div>
        </div>
    </main>

    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">Cửa hàng rau củ quả</h4>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
