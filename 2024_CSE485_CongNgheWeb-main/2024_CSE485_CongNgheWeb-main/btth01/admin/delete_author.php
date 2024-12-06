<?php
include '../database/db.php';
$id = $_GET['id'] ?? '';
global $conn;
try {
    // echo $id;
    $stmt = $conn->prepare("DELETE FROM tacgia WHERE ma_tgia = $id");
    $stmt->execute();
    echo '<script>alert("Xóa tác giả thành công!"); window.location.href = "author.php";</script>';
} catch (PDOException $e) {
    echo $e->getMessage();
    echo '<script>alert("Xóa tác giả không thành công!"); window.location.href = "author.php";</script>';
}
?>