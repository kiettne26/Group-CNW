<?php 
// Thêm sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $price = htmlspecialchars(trim($_POST['price']));
    $picture = $_FILES['picture'];

    if ($name && $price > 0 && $picture['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $file_name = time() . '-' . basename($picture['name']);
        $file_path = $upload_dir . $file_name;

        if (move_uploaded_file($picture['tmp_name'], $file_path)) {
            $_SESSION['products'][] = [
                'name' => $name,
                'price' => $price,
                'picture' => $file_path
            ];
        }
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>