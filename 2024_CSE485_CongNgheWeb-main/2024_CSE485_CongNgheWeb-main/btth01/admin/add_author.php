<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
<?php
include '../database/db.php'; // Kết nối CSDL

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ten_tgia = $_POST['ten_tgia'];

    // Lấy ID lớn nhất hiện có từ bảng theloai
    $sql_max_id = "SELECT MAX(ma_tgia) AS max_id FROM tacgia";
    $result = $conn->query($sql_max_id);

    // Kiểm tra nếu truy vấn thành công
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $new_id = $row['max_id'] + 1; // Tăng ID lên 1
    } else {
        $new_id = 1; // Nếu bảng trống, bắt đầu với ID là 1
    }

    // Thêm thể loại mới với ID đã tăng
    $sql_add = "INSERT INTO tacgia (ma_tgia, ten_tgia) VALUES (?, ?)";

    // Chuẩn bị câu truy vấn
    if ($stmt = $conn->prepare($sql_add)) {
        // Gán giá trị cho các tham số và thực hiện truy vấn
        $stmt->bind_param("is", $new_id, $ten_tgia); // "is" là định dạng (int, string)

        if ($stmt->execute()) {
            // Chuyển hướng về trang category.php sau khi thêm thành công
            echo '<script>alert("Thêm tác giả thành công!"); window.location.href = "author.php";</script>';
            exit();
        } else {
            echo "Lỗi khi thêm tác giả: " . $stmt->error;
        }

        // Đóng câu lệnh chuẩn bị
        $stmt->close();
    } else {
        echo "Lỗi khi chuẩn bị truy vấn: " . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
}
?>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="category.php">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="author.php">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="article.php">Bài viết</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

    </header>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới Tác giả</h3>
                <form action="add_author.php" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên Tác giả</span>
                        <input type="text" class="form-control" name="ten_tgia" >
                    </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="author.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>