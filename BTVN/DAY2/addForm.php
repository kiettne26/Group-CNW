<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap.min.css">
    <title>Thêm sản phẩm</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center text-danger mt-3">Thêm sản phẩm mới</h1>
        <form action="addProcess.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control my-2" name="Name">
            </div>
            <div class="form-group" >
                <label class="form-label">Giá</label>
                <input type="text" class="form-control my-2" name="Price">
            </div>
            <div class="mb-3">
                <label class="form-label">Ảnh sản phẩm</label>
                <input type="file" class="form-control"  name="image" required>
            </div>
            <input class="btn btn-success my-2" type="submit" name="method" value="Thêm sản phẩm">
        </form>
    </div>
</body>

</html>