<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TLU</title>
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<?php
session_start();
// Khởi tạo mảng sản phẩm nếu chưa có
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ['name' => 'Sản phẩm 1', 'price' => 1000],
        ['name' => 'Sản phẩm 2', 'price' => 2000],
        ['name' => 'Sản phẩm 3', 'price' => 3000],
    ];
}
// Thêm sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $_SESSION['products'][] = ['name' => $name, 'price' => $price];
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
// Xóa sản phẩm
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    unset($_SESSION['products'][$delete_id]);
    $_SESSION['products'] = array_values($_SESSION['products']); // sắp xếp lại chỉ số
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
// Sửa sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_product'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $_SESSION['products'][$id] = ['name' => $name, 'price' => $price];
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>
<body>
    <?php
    include '../template/Header.php'; 
    ?>
    <main>
    <div class="container">
        <form method="POST" class="mb-4">
            <input type="text" name="name" placeholder="Tên sản phẩm" required>
            <input type="number" name="price" placeholder="Giá thành" required>
            <button type="submit" name="add_product" class="btn btn-success">Thêm mới</button>
        </form>
    </div>
    </main>
    <?php
        include '../template/Footer.php';
    ?>
</body>
</html>
