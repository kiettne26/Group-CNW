<?php  
require 'products.php';
    session_start();
    if(isset($_SESSION['products']))
    $products = $_SESSION['products'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap.min.css">
    <title>Sửa sản phẩm</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center text-danger mt-3">Sửa sản phẩm </h1>
        <form action="editProcess.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="index" value ="<?= $_GET['index']?>" id="">
            <div class="form-group">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control my-2" name="Name" value="<?= $products[$_GET['index']]['name']?>">
            </div>
            <div class="form-group" >
                <label class="form-label">Giá</label>
                <input type="text" class="form-control my-2" name="Price" value="<?= $products[$_GET['index']]['price']?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Ảnh sản phẩm</label>
                <input type="file" class="form-control"  name="image" >
            </div>
            <img src= "<?= $products[$_GET['index']]['image']?>" alt="" width = "800px">
            <br>
            <input class="btn btn-success my-2" type="submit" name="method" value="Sửa sản phẩm">
        </form>
    </div>
</body>

</html>