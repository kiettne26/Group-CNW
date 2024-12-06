<?php
include '../database/db1.php';

// Kiểm tra xem ma_bviet có được gửi qua URL hay không
if (isset($_GET['ma_bviet'])) {
    $article_id = intval($_GET['ma_bviet']); // Chuyển đổi ma_bviet sang kiểu số nguyên

    // Câu lệnh SQL để xóa bài viết
    $sql_delete = "DELETE FROM baiviet WHERE ma_bviet = :article_id";
    $stmt_delete = $pdo->prepare($sql_delete);
    $stmt_delete->bindParam(':article_id', $article_id);

    // Thực thi câu lệnh xóa
    if ($stmt_delete->execute()) {
        // Chuyển hướng sau khi xóa thành công
        echo '<script>alert("Xoá bài viết thành công!"); window.location.href = "author.php";</script>';
        exit();
    } else {
        echo "Có lỗi xảy ra khi xóa bài viết.";
    }
} else {
    // Nếu không có ma_bviet trong URL, chuyển hướng về trang bài viết
    header("Location: article.php");
    exit();
}
?>
