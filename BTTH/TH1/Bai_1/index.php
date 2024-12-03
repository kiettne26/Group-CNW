<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>
<?php
session_start();
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ['name' => 'Hoa mai', 'price' => 1000, 'picture' => './uploads/mai.jpg'],
        ['name' => 'hoa tường vi', 'price' => 2000, 'picture' => './uploads/tuongvy.jpg'],
        ['name' => 'hoa hải đường', 'price' => 3000, 'picture' => './uploads/haiduong.jpg'],
    ];
}
include './CRUD/create.php';
include './CRUD/delete.php';
include './CRUD/edit.php';
?>
<body>
<?php
    include './template/Header.php';
?>
<div class="container mt-3">
    <h1 style="text-align: center;">Quản lý Hoa</h1>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Thêm mới</button>
    <table class="table table-hover mt-3">
        <thead>
        <tr>
            <th>Tên hoa</th>
            <th>Mô tả</th>
            <th>Ảnh</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($_SESSION['products'] as $id => $product): ?>
            <tr>
                <td><?= htmlspecialchars($product['name']) ?></td>
                <td><?= htmlspecialchars($product['price']) ?></td>
                <td>
                    <?php if (!empty($product['picture'])): ?>
                        <img src="<?= htmlspecialchars($product['picture']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" style="width: 50px; height: 50px; object-fit: cover;">
                    <?php else: ?>
                        Không có ảnh
                    <?php endif; ?>
                </td>
                <td>
                    <a data-bs-toggle="modal" data-bs-target="#editModal<?= $id ?>" class="icon">
                        <i class="fa-solid fa-pen" style="color: blue;"></i>
                    </a>
                </td>
                <td>
                    <a href="?delete_id=<?= $id ?>" class="icon" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                        <i class="me-2 fa-solid fa-trash" style="color: blue;"></i>
                    </a>
                </td>
            </tr>
            <!-- Sửa sản phẩm -->
            <div class="modal fade" id="editModal<?= $id ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $id ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title">Sửa sản phẩm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <div class="mb-3">
                                    <label class="form-label">Tên sản phẩm</label>
                                    <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($product['name']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Mô tả</label>
                                    <input type="text" name="price" class="form-control" value="<?= htmlspecialchars($product['price']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ảnh</label>
                                    <input type="file" name="picture" class="form-control" accept="image/*">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="update_product" class="btn btn-primary">Lưu thay đổi</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!--Thêm mới sản phẩm -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Tên hoa</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mô tả</label>
                        <input type="text" name="price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Chọn ảnh</label>
                        <input type="file" name="picture" class="form-control" accept="image/*" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_product" class="btn btn-success">Thêm mới</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    include './template/Footer.php';
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
