<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #FFEBEE;
        }
        .card {
            width: 500px;
            background-color: #fff;
            border: none;
            border-radius: 12px;
            margin-top: 20px;
        }
        .form-control {
            margin-top: 10px;
            height: 48px;
            border-radius: 10px;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #039BE5;
        }
        .confirm-button {
            height: 50px;
            border-radius: 10px;
        }
        .button-group {
            display: flex;
            justify-content: space-between;
        }
        .button-group a,
        .button-group button {
            width: 48%;
        }
    </style>
</head>
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card px-4 py-4">
            <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <h3 class="text-center">Thêm tin tức hoa quả</h3>

                    <div class="form-group">
                        <input name="title" class="form-control" type="text" placeholder="Tiêu đề " required>
                    </div>

                    <div class="form-group">
                        <textarea name="content" class="form-control" rows="4" placeholder="Nội dung" required></textarea>
                    </div>

                    <div class="form-group">
                        <input name="image" class="form-control" type="file" required>
                    </div>

                    <!-- Nút Hủy bên phải và Nút Thêm mới bên trái -->
                    <div class="d-flex justify-content-between mt-3">
                        <button class="btn btn-primary confirm-button" type="submit" name="add">Thêm mới</button>
                        <a href="index.php?controller=news&action=dashboard" class="btn btn-primary confirm-button ms-auto">Hủy</a>
                    </div>
                </div>
            </form>

            <?php
            if (isset($thanhcong) && in_array('add_success', $thanhcong)) {
                echo "<p style='color: green; text-align:center'>Thêm mới thành công</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
