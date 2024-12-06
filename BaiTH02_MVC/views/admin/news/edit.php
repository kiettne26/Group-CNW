<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa tin tức</title>
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
    </style>
</head>
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card px-4 py-4">
            <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <h3 class="text-center">Sửa tin tức</h3>

                    <!-- Form chỉnh sửa -->
                    <div class="form-group">
                        <input name="title" class="form-control" type="text" placeholder="Tiêu đề bài viết" value="<?= htmlspecialchars($dataID['title']) ?>" required>
                    </div>

                    <div class="form-group">
                        <textarea name="content" class="form-control" rows="4" placeholder="Nội dung bài viết" required><?= htmlspecialchars($dataID['content']) ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Ảnh hiện tại:</label>
                        <div>
                            <img src="images/<?= htmlspecialchars($dataID['image']) ?>" alt="Current Image" style="max-width: 100%; height: auto;">
                        </div>
                        <input name="image" class="form-control mt-2" type="file">
                    </div>

                    <button class="btn btn-primary btn-block confirm-button mt-3" type="submit" name="edit">Sửa đổi</button>
                </div>
            </form>

            <?php
            if (isset($thanhcong)) {
                foreach ($thanhcong as $message) {
                    echo "<p style='text-align:center'>" . htmlspecialchars($message) . "</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
