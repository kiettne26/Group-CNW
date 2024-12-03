<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách hoa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Danh sách các loại hoa</h1>
        <div class="row">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "hoa_mvc";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Kết nối thất bại: " . $conn->connect_error);
            }

            $sql = "SELECT tenhoa, mota, hinhanh FROM hoa";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                        <img src="http://localhost/BTTH/TH1/Bai_4/Bai_1/images/<?php echo htmlspecialchars($row['hinhanh']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['tenhoa']); ?>">
                        <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['tenhoa']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($row['mota']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p class='text-center'>Không có dữ liệu.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-wW9pN2Fux2i1nbDRH+2RgCeBh2+Xq0cEpcz/sJo4EBpJbMLVJA4Eo7xry3kPHcf1" crossorigin="anonymous"></script>
</body>
</html>
