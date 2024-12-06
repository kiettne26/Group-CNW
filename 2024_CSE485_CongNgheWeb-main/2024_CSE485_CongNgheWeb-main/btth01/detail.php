<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="my-logo">
                    <a class="navbar-brand" href="#">
                        <img src="images/logo2.png" alt="" class="img-fluid">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="./login.php">Đăng nhập</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Nội dung cần tìm" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Tìm</button>
                </form>
                </div>
            </div>
        </nav>


<?php 

include './database/db1.php';
    $contentId = isset($_GET['song_id']) ? intval($_GET['song_id']) : 0;
    global $pdo;
    $sql = "SELECT 
                baiviet.tieude,
                baiviet.tenbhat, 
                baiviet.tomtat, 
                baiviet.noidung,
                baiviet.hinhthanh,
                theloai.ten_tloai,
                tacgia.ten_tgia
                FROM baiviet
                INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
                INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia               
                WHERE ma_bviet = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $contentId, PDO::PARAM_INT);
    $stmt->execute();

    // Lấy kết quả từ truy vấn
    $song = $stmt->fetch(PDO::FETCH_ASSOC);

    // Kiểm tra xem có kết quả hay không
    if ($song) {
        // Gán dữ liệu vào các biến
        $tieude = $song['tieude'];
        $tenbhat = $song['tenbhat'];
        $tomtat = $song['tomtat'];
        $noidung = $song['noidung'];
        $hinhthanh = $song['hinhthanh'];
        $ten_tloai = $song['ten_tloai'];
        $ten_tgia = $song['ten_tgia'];


}

?>
    </header>
    <main class="container mt-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
       
                <div class="row mb-5">
                    <div class="col-sm-4">
                        <img src="./images/songs/<?php echo $hinhthanh; ?>.jpg" class="img-fluid" alt="...">
                        <img src="./images/songs/<?php echo $hinhthanh; ?>.jpg" class="img-fluid" alt="...">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="card-title mb-2">
                            <a href="" class="text-decoration-none"><?php echo $tieude?></a>
                            <a href="" class="text-decoration-none"><?php echo $tieude?></a>
                        </h5>
                        <p class="card-text"><span class=" fw-bold">Bài hát: </span><?php echo $tenbhat?></p>
                        <p class="card-text"><span class=" fw-bold">Thể loại: </span><?php echo $ten_tloai ?></p>
                        <p class="card-text"><span class=" fw-bold">Tóm tắt: </span><?php echo $tomtat?></p>
                        <p class="card-text"><span class=" fw-bold">Nội dung: </span><?php echo $noidung?></p>
                        <p class="card-text"><span class=" fw-bold">Tác giả: </span><?php echo $ten_tgia?></p>
                        <p class="card-text"><span class=" fw-bold">Bài hát: </span><?php echo $tenbhat?></p>
                        <p class="card-text"><span class=" fw-bold">Thể loại: </span><?php echo $ten_tloai ?></p>
                        <p class="card-text"><span class=" fw-bold">Tóm tắt: </span><?php echo $tomtat?></p>
                        <p class="card-text"><span class=" fw-bold">Nội dung: </span><?php echo $noidung?></p>
                        <p class="card-text"><span class=" fw-bold">Tác giả: </span><?php echo $ten_tgia?></p>

                    </div>          
                </div>
                </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>