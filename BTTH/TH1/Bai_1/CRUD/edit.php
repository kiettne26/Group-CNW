<?php
// sửa sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_product'])) {
    $id = intval($_POST['id']);
    $name = htmlspecialchars(trim($_POST['name']));
    $price = htmlspecialchars(trim($_POST['price']));
    $picture = $_FILES['picture'];

    if (isset($_SESSION['products'][$id]) && $name && $price > 0) {
        $product = $_SESSION['products'][$id];
        if ($picture['error'] === UPLOAD_ERR_OK) {
            $upload_dir = 'uploads/';
            $file_name = time() . '-' . basename($picture['name']);
            $file_path = $upload_dir . $file_name;

            if (move_uploaded_file($picture['tmp_name'], $file_path)) {
                if (!empty($product['picture']) && file_exists($product['picture'])) {
                    unlink($product['picture']);
                }
                $product['picture'] = $file_path;
            }
        }
        $product['name'] = $name;
        $product['price'] = $price;
        $_SESSION['products'][$id] = $product;
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>