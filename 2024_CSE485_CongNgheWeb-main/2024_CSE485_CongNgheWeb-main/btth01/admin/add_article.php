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
                        <a class="nav-link " href="author.php">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="article.php">Bài viết</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
<?php
include '../database/db1.php';
     // Dữ liệu cần thêm từ form (POST method)
     global $pdo;

    //lấy dữ liệu tác giả
     $sql_authors = "SELECT ma_tgia, ten_tgia FROM tacgia";
     $stmt_authors = $pdo->prepare($sql_authors);
     $stmt_authors->execute();
     $authors = $stmt_authors->fetchAll(PDO::FETCH_ASSOC);
     //lấy dữ liệu thể loại
     $sql_categorys = "SELECT ma_tloai, ten_tloai FROM theloai";
     $stmt_categorys = $pdo->prepare($sql_categorys);
     $stmt_categorys->execute();
     $categorys = $stmt_categorys->fetchAll(PDO::FETCH_ASSOC);



     //thêm dữ liêuj
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $title = $_POST['txtTitleName'];   
     $article = $_POST['txtArticleName'];
     $summary = $_POST['txtSummaryName'];
     $content = $_POST['txtContentName'];  // Nếu có trường nội dung trong form
     $author_id = $_POST['author_id'];
     $category_id = $_POST['category_id'];
     $txtImage_id = $_POST['txtImage_id'];

     $sql_count = "SELECT MAX(ma_bviet) as total FROM baiviet";
     $stmt_count = $pdo->prepare($sql_count);
     $stmt_count->execute();
     $result = $stmt_count->fetch(PDO::FETCH_ASSOC);
 
     // Tạo mã bài viết mới bằng tổng số bài viết + 1
     $articleCode = $result['total'] + 1;
   
 
     // Chuẩn bị câu lệnh SQL với prepared statement
     $sql = "INSERT INTO baiviet (ma_bviet,tieude, tenbhat, tomtat, noidung,ma_tgia,ma_tloai,hinhthanh) 
             VALUES (:txtArticleCode,:title, :article, :summary, :content,:author_id,:category_id,:txtImage_id)";
 
     // Chuẩn bị câu lệnh PDO
     $stmt = $pdo->prepare($sql);
 
     // Gán giá trị cho các placeholder
     $stmt->bindParam(':txtArticleCode', $articleCode);
     $stmt->bindParam(':title', $title);
     $stmt->bindParam(':article', $article);
     $stmt->bindParam(':summary', $summary);
     $stmt->bindParam(':content', $content);
     $stmt->bindParam(':author_id', $author_id);
     $stmt->bindParam(':category_id', $category_id);
     $stmt->bindParam(':txtImage_id', $txtImage_id);
 
     // Chuyển hướng với trạng thái thành công
     
     // Thực thi câu lệnh SQL
     if($stmt->execute()){
        echo '<script>alert("Thêm bài viết thành công!"); window.location.href = "author.php";</script>';
     exit();
     // Dừng thực thi PHP sau khi chuyển hướng

     }; 
    }     
     ?>
    </header>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới bài viết</h3>
                <form action="" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblTitleName">Tên tiêu đề </span>
                        <input type="text" class="form-control" name="txtTitleName" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblArticleName">Tên bài hát </span>
                        <input type="text" class="form-control" name="txtArticleName" >
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblSummaryName"> Tóm tắt </span>
                        <input type="text" class="form-control" name="txtSummaryName" >
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblSummaryName"> Nội dung </span>
                        <input type="text" class="form-control" name="txtContentName" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblImage">Hình ảnh</span>
                        <input type="text" class="form-control" name="txtImage_id" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tác giả</span>
                        <select class="form-control" name="author_id" required>
                            <option value="">Chọn tác giả</option>
                            <?php foreach ($authors as $author): ?>
                                <option value="<?php echo $author['ma_tgia']; ?>"><?php echo htmlspecialchars($author['ten_tgia']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Thể loại</span>
                        <select class="form-control" name="category_id" required>
                            <option value="">Chọn thể loại</option>
                            <?php foreach ($categorys as $category): ?>
                                <option value="<?php echo $category['ma_tloai']; ?>"><?php echo htmlspecialchars($category['ten_tloai']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="article.php" class="btn btn-warning ">Quay lại</a>
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