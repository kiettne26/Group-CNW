<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
<?php
    // Kết nối với cơ sở dữ liệu
    include '../database/db.php';

    // Lấy ID thể loại từ URL
    if (isset($_GET['id'])) {
        $catId = $_GET['id'];
        echo $catId;
        

        // Truy vấn thông tin thể loại dựa trên ID
        $sql = "SELECT ma_tloai, ten_tloai FROM theloai WHERE ma_tloai = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $catId); // 'i' nghĩa là kiểu số nguyên
        $stmt->execute();
        $result = $stmt->get_result();

        // Kiểm tra nếu thể loại tồn tại
        if ($result->num_rows > 0) {
            // Lấy dữ liệu thể loại
            $row = $result->fetch_assoc();
            $catId = $row['ma_tloai'];
            $catName = $row['ten_tloai'];
        } else {
            echo "<div class='alert alert-danger text-center'>Không tìm thấy thể loại!</div>";
            exit;
        }
    } else {
        echo "<div class='alert alert-danger text-center'>Không có ID thể loại!</div>";
        exit;
    }

    // Xử lý khi người dùng nhấn nút "Xóa"
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['delete'])) {
            $catIdToDelete = $_POST['txtCatId'];

            // Xóa thể loại
            $sql_delete = "DELETE FROM theloai WHERE ma_tloai = ?";
            $stmt = $conn->prepare($sql_delete);
            $stmt->bind_param("i", $catIdToDelete);
            if ($stmt->execute()) {
                
                // Sau khi xóa thành công, quay về trang category.php
                header("Location: category.php?status=deleted");
                // Đảm bảo rằng quá trình dừng sau khi chuyển hướng
                exit();
            } else {
                echo "<div class='alert alert-danger text-center'>Lỗi khi xóa thể loại: " . $stmt->error . "</div>";
            }

            $stmt->close();
        }
    }
?>

    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3"> <a class="navbar-brand" href="#">Administration</a></div>
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
                        <a class="nav-link active fw-bold" href="category.php">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="author.php">Tác giả</a>
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
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Xoá thể loại</h3>
                <form action="" method="post">
                <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Mã thể loại</span>
                        <input type="text" class="form-control" name="txtCatId" readonly value="<?php echo $catId; ?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên thể loại</span>
                        <input type="text" class="form-control" name="txtCatName" readonly value = "<?php echo $catName; ?>">
                    </div>

                    <div class="form-group  float-end ">
                        <button type="submit" class="btn btn-danger" name="delete">Xoá</button> 
                        <a href="category.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>