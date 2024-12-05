<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết rau củ quả</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   
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



<?php 

    include '../../models/Database.php';

    $contentId = isset($_GET['id']) ? intval($_GET['id']) : 0; // Lấy ID của quả từ URL
global $pdo;

// Truy vấn dữ liệu chi tiết của quả
$sql = "SELECT 
            news.title, 
            news.content, 
            news.image, 
            news.created_at 
        FROM news
        WHERE news.id = :id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $contentId, PDO::PARAM_INT);
$stmt->execute();

// Lấy kết quả từ truy vấn
$fruit = $stmt->fetch(PDO::FETCH_ASSOC);

// Kiểm tra xem có dữ liệu không
if ($fruit) {
    // Gán dữ liệu vào các biến
    $title = $fruit['title'];
    $content = $fruit['content'];
    $image = $fruit['image'];
    $created_at = $fruit['created_at'];
} else {
    echo "<p>Không tìm thấy thông tin chi tiết của quả.</p>";
    exit;
}



?>
    
    <main class="container mt-5">
        <div class="row mb-5">
            <div class="col-sm-4">
                <img src="./images/<?php echo $image; ?>" class="img-fluid" alt="<?php echo $title; ?>">
            </div>
            <div class="col-sm-8">
                <h5 class="card-title mb-2"><?php echo $title; ?></h5>
                <p class="card-text"><span class="fw-bold">Mô tả:</span> <?php echo $content; ?></p>
                <p class="card-text"><span class="fw-bold">Ngày tạo:</span> <?php echo $created_at ? date("d-m-Y H:i:s", strtotime($created_at)) : 'Không có thông tin'; ?></p>
            </div>
        </div>
    </main>


    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">Cửa hàng rau củ quả</h4>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>






