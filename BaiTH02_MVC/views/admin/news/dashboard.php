    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <div class="container mt-5">
        <h1 class="text-center">Quản lý tin tức</h1>
        <div class="mb-3 text-end">
            <a href="index.php?controller=news&action=add" class="btn btn-success">
                <i class="fa-solid fa-plus"></i> Thêm mới
            </a>
        </div>
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)): ?>
                    <?php foreach ($data as $value): ?>
                    <tr>
                        <td><?= htmlspecialchars($value['title']) ?></td>
                        <td><?= htmlspecialchars($value['content']) ?></td>
                        <td>
                            <img src="images/<?= htmlspecialchars($value['image']) ?>" alt="<?= htmlspecialchars($value['title']) ?>" style="width: 100px;">
                        </td>
                        <td>
                            <a href="index.php?controller=news&action=edit&id=<?= htmlspecialchars($value['id']) ?>" class="btn btn-warning btn-sm">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" 
                            href="index.php?controller=news&action=delete&id=<?= htmlspecialchars($value['id']) ?>" 
                            class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Không có dữ liệu.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
