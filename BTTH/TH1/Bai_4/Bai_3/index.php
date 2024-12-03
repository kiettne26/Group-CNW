<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php
    // Đường dẫn tới file CSV
    $filename = "students.csv";

    // Mảng chứa dữ liệu sinh viên 
    $sinhvien = [];

    // Mở file CSV
    if (($handle = fopen($filename  , "r")) !== FALSE) {
        // Đọc dòng tiêu đề (headers)
        $headers = array_map('trim', fgetcsv($handle, 1000, ","));
        $headers[0] = preg_replace('/^\xEF\xBB\xBF/', '', $headers[0]); // bổ xung thêm sử lí BOM ở cột 1 
 
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if (array_filter($data)) {
                $sinhvien[] = array_combine($headers, $data);             // Bỏ qua các dòng rỗng
            }
        }
        fclose($handle);
    }
    ?>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách sinh viên</h1>
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>City</th>
                    <th>Email</th>
                    <th>Course</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Hiển thị từng sinh viên
                    foreach ($sinhvien as $sv) {
                    echo "<tr>"; 
                        if (array_key_exists('username', $sv)) {
                            echo "<td>{$sv['username']}</td>";
                        } else {
                            echo "<td>Không có dữ liệu</td>";
                        }
                            echo "<td>{$sv['password']}</td>";
                            echo "<td>{$sv['lastname']}</td>";
                            echo "<td>{$sv['firstname']}</td>";
                            echo "<td>{$sv['city']}</td>";
                            echo "<td>{$sv['email']}</td>";
                            echo "<td>{$sv['course1']}</td>";
                            echo "</tr>"; 
    }
    ?>
</tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
