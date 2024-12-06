
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>
<header>
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
                        <a class="nav-link" aria-current="page" href="./index.php?controller=Admini&action=index">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./index.php?controller=category&action=list">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?controller=author&action=list">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="">Bài viết</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container-fluid mt-3">
        <h3 class="text-center text-uppercase mb-3 text-primary">Danh sách bài viết</h3>
        <a href="./index.php?controller=Article&action=viewsAdd" class="btn btn-success" style="margin-bottom: 20px;">Thêm mới</a>        
        <div class="row">
        <?php foreach ($articles as $article): ?>
            <?php $id =$article->getIdBaiviet();?>
        <div class="col-sm-3">
            <div class="card mb-2" style="width: 100%;">
                <img src="./assets/images/songs/<?php echo $article->getHinhthanh(); ?>.jpg" class="card-img-top" alt="<?php echo $article->getTieude(); ?>">
                <div class="card-body">
                <h5 class="card-title text-center">
                        <a href="./index.php?controller=Article&action=detail_amin&id=<?php  echo $article->getIdBaiviet(); ?>" class="text-decoration-none"><?php echo $article->getTenbhat(); ?></a>
                    </h5>
                    <div class="d-flex justify-content-center">
                    <a href="./index.php?controller=Article&action=viewsEdit&id=<?php echo $article->getIdBaiviet(); ?>" class="btn btn-primary btn-sm me-2">Sửa</a>
                    
                    <a href="./index.php?controller=Article&action=delete&id=<?php echo $article->getIdBaiviet(); ?>" class="btn btn-danger btn-sm">Xóa</a>
                </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
