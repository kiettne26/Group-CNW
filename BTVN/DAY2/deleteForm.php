<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap.min.css">
    <title>Xóa sản phẩm</title>
</head>
<body>
    <div class="container mt-5" style="border: solid 2px red;">
        <h1 class="text-center text-danger my-3" >Bạn có muốn xóa sản phẩm ?</h1>
        <form action="deleteProcess.php" method="post">
            <input type="hidden" name="index" value="<?= $_GET['index']?>">
            <div class="btns text-center mb-5">
                <input type= "submit" class="btn btn-success mx-3" name = "delete" value="Có">
                <input type= "submit" class="btn btn-danger mx-3" name="delete" value="Không">
            </div>
        </form>
    </div>
</body>
</html>