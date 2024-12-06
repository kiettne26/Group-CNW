<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thành viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="content">
        <div class="dangkythanhvien">
            <a href="index.php?controller=thanh-vien&action=list.php" class="list">Danh sách</a>
            <h3 class="">Cập nhật mới thành viên</h3>
            <form method="POST">
                <table class="">
                    <tr>
                        <td>tên thành viên:</td>
                        <td><input type="text" name="hoten" value="<?php echo $dataID['hoten']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Năm sinh :</td>
                        <td><input type="text" name="namsinh" value="<?php echo $dataID['namsinh']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Quê quán :</td>
                        <td><input type="text" name="quequan" value="<?php echo $dataID['quequan']; ?>"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td> <input type="submit" class="btn btn-success" name="update_user" value="Cập nhật"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>