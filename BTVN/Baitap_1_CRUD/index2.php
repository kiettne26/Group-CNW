<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TLU</title>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<?php
session_start();
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ['name' => 'Sản phẩm 1', 'price' => 1000],
        ['name' => 'Sản phẩm 2', 'price' => 2000],
        ['name' => 'Sản phẩm 3', 'price' => 3000],
    ];
}

// Thêm sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $price = intval($_POST['price']);
    if ($name && $price > 0) {
        $_SESSION['products'][] = ['name' => $name, 'price' => $price];
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Xóa sản phẩm
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    if (isset($_SESSION['products'][$delete_id])) {
        unset($_SESSION['products'][$delete_id]);
        $_SESSION['products'] = array_values($_SESSION['products']); // Sắp xếp lại chỉ số
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Sửa sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_product'])) {
    $id = intval($_POST['id']);
    $name = htmlspecialchars(trim($_POST['name']));
    $price = intval($_POST['price']);
    if (isset($_SESSION['products'][$id]) && $name && $price > 0) {
        $_SESSION['products'][$id] = ['name' => $name, 'price' => $price];
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>
<body>
    <?php include './template/Header.php'; ?>
    <main>
        <div class="container mt-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal" style="color: white;">Thêm mới</button>
            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th class="tablehead">Sản phẩm</th>
                        <th class="tablehead">Giá thành</th>
                        <th class="tablehead">Sửa</th>
                        <th class="tablehead">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['products'] as $id => $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['name']) ?></td>
                            <td><?= number_format($product['price']) ?> VND</td>
                            <td>
                                <a data-bs-toggle="modal" data-bs-target="#editModal<?= $id ?>" class="icon">
                                    <i class="fa-solid fa-pen" style="color: blue;"></i>
                                </a>
                            </td>
                            <td>
                                <a href="?delete_id=<?= $id ?>" class="icon" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                    <i class="fa-solid fa-trash" style="color: red;"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- Modal Sửa sản phẩm -->
                        <div class="modal fade" id="editModal<?= $id ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $id ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel<?= $id ?>">Sửa sản phẩm</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?= $id ?>">
                                            <div class="mb-3">
                                                <label class="form-label">Tên sản phẩm</label>
                                                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($product['name']) ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Giá thành</label>
                                                <input type="number" name="price" class="form-control" value="<?= htmlspecialchars($product['price']) ?>" required>
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
    </main>
    <?php include './template/Footer.php'; ?>

    <!-- Modal Thêm mới sản phẩm -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Thêm sản phẩm mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giá thành</label>
                            <input type="number" name="price" class="form-control" required>
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

    <script src="./bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
