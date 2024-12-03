<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm thành viên</title>
</head>
<body>
    <div class="content">
        <div class="dangkythanhvien">
            <a href="index.php?controller=thanh-vien&action=list.php" class="list">Danh sách</a>
            <h3 class="">Thêm mới thành viên</h3>
            <form method="POST">
                <table class="">
                    <tr>
                        <td>tên thành viên</td>
                        <td><input type="text" name="hoten" placeholder="Tên thành viên"></td>
                    </tr>
                    <tr>
                        <td>Năm sinh :</td>
                        <td><input type="text" name="namsinh" placeholder="Năm sinh"></td>
                    </tr>
                    <tr>
                        <td>Quê quán :</td>
                        <td><input type="text" name="quequan" placeholder="Quê quán"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td> <input type="submit" name="add_user" value="Thêm mới"></td>
                    </tr>
                </table>
            </form>

            <?php
                if(isset($thanhcong) && in_array('add_success', $thanhcong)){
                    echo "<p style='color: green; text-align:center'>Thêm mới thành công</p>";
                }
            ?>
        </div>
    </div>
</body>
</html>