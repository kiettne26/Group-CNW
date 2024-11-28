<?php 
// xóa sản phẩm
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    if (isset($_SESSION['products'][$delete_id])) {
        $product = $_SESSION['products'][$delete_id];
        if (!empty($product['picture']) && file_exists($product['picture'])) {
            unlink($product['picture']);
        }
        unset($_SESSION['products'][$delete_id]);
        $_SESSION['products'] = array_values($_SESSION['products']);
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>