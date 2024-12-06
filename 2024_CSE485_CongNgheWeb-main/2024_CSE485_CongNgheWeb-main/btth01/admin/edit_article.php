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
    $article_id = isset($_GET['ma_bviet']) ? intval($_GET['ma_bviet']) : 0;
    global $pdo;
    //lấy dữ liệu tác giả
       
    function getArticleById( $article_id) {
        global $pdo;
        $sql_article = "SELECT * FROM baiviet WHERE ma_bviet = :article_id";
        $stmt_article = $pdo->prepare($sql_article);
        $stmt_article->bindParam(':article_id', $article_id);
        $stmt_article->execute();
        return $stmt_article->fetch(PDO::FETCH_ASSOC);
    }
    $article_data =  getArticleById ($article_id) ;
    

    function getAuthors() {
        global $pdo;   
        $sql_authors = "SELECT ma_tgia, ten_tgia FROM tacgia";
        $stmt_authors = $pdo->prepare($sql_authors);
        $stmt_authors->execute();
        return $stmt_authors->fetchAll(PDO::FETCH_ASSOC);
    }
   
    $authors = getAuthors();
    
    function getCategories() {
        global $pdo;
        $sql_categorys = "SELECT ma_tloai, ten_tloai FROM theloai";
        $stmt_categorys = $pdo->prepare($sql_categorys);
        $stmt_categorys->execute();
        return $stmt_categorys->fetchAll(PDO::FETCH_ASSOC);
    }
    $categorys = getCategories();


     if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $title = $_POST['txtTitleName'];   
     $article = $_POST['txtArticleName'];
     $summary = $_POST['txtSummaryName'];
     $content = $_POST['txtContentName'];  
     $author_id = $_POST['author_id'];
     $category_id = $_POST['category_id'];
     $txtImage_id = $_POST['txtImage_id'];


     $sql_update = "UPDATE baiviet SET tieude = :title, tenbhat = :article, tomtat = :summary, noidung = :content, 
                   ma_tgia = :author_id, ma_tloai = :category_id, hinhthanh = :txtImage_id 
                   WHERE ma_bviet = :article_id";
 
 
     
     $stmt_update = $pdo->prepare($sql_update);
    
     $stmt_update->bindParam(':title', $title);
     $stmt_update->bindParam(':article', $article);
     $stmt_update->bindParam(':summary', $summary);
     $stmt_update->bindParam(':content', $content);
     $stmt_update->bindParam(':author_id', $author_id);
     $stmt_update->bindParam(':category_id', $category_id);
     $stmt_update->bindParam(':txtImage_id', $txtImage_id);
     $stmt_update->bindParam(':article_id', $article_id);
 
     if($stmt_update->execute()){  

        echo '<script>alert("Sửa bài viết thành công!"); window.location.href = "author.php";</script>';

     exit();

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
                        <input type="text" class="form-control" name="txtTitleName" value="<?php echo htmlspecialchars($article_data['tieude'])?>" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblArticleName">Tên bài hát </span>
                        <input type="text" class="form-control" name="txtArticleName" value="<?php echo htmlspecialchars($article_data['tenbhat'])?>" >
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblSummaryName"> Tóm tắt </span>
                        <input type="text" class="form-control" name="txtSummaryName" value="<?php echo htmlspecialchars($article_data['tomtat'])?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblSummaryName"> Nội dung </span>
                        <input type="text" class="form-control" name="txtContentName" value="<?php echo htmlspecialchars($article_data['noidung'])?>" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblImage">Hình ảnh</span>
                        <input type="text" class="form-control" name="txtImage_id" value="<?php echo htmlspecialchars($article_data['hinhthanh'])?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tác giả</span>
                        <select class="form-control" name="author_id" required>
                            <option value="">Chọn tác giả</option>
                            <?php foreach ($authors as $author): ?>
                                <option value="<?php echo $author['ma_tgia']; ?>" 
                                    <?php echo ($author['ma_tgia'] == $article_data['ma_tgia']) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($author['ten_tgia']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Thể loại</span>
                        <select class="form-control" name="category_id" required>
                            <option value="">Chọn thể loại</option>
                            <?php foreach ($categorys as $category): ?>
                                <option value="<?php echo $category['ma_tloai']; ?>" 
                                    <?php echo ($category['ma_tloai'] == $article_data['ma_tloai']) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($category['ten_tloai']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="Sửa" class="btn btn-success">
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