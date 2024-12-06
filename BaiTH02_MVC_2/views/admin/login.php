<?php
// Bắt đầu session
session_start();

// Kiểm tra nếu người dùng đã gửi thông tin đăng nhập
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Giả lập tài khoản hợp lệ (thay thế bằng kiểm tra từ cơ sở dữ liệu)
    $valid_user = 'admin';
    $valid_pass = '123456';

    // Kiểm tra thông tin đăng nhập
    if ($username === $valid_user && $password === $valid_pass) {
        // Lưu thông tin đăng nhập vào session
        $_SESSION['username'] = $username;

        // Chuyển hướng sang dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // Thông báo lỗi nếu sai tài khoản/mật khẩu
        $error = "Sai tài khoản hoặc mật khẩu.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <section class="bg-light py-3 py-md-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <div class="mb-4 text-center">
                    <h4>Đăng nhập</h4>
                </div>
                <div class="card border rounded-4 shadow-sm">
                    <div class="card-body p-4">
                        <form method="POST" action="login.php">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Nhập username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Nhập password" required>
                            </div>
                            <!-- Hiển thị lỗi nếu có -->
                            <?php if (isset($error)): ?>
                                <p class="text-danger"><?= htmlspecialchars($error) ?></p>
                            <?php endif; ?>
                            <div class="d-grid">
                                <button class="btn btn-primary" type="submit">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a href="#" class="text-decoration-none text-secondary me-3">Tạo tài khoản mới</a>
                    <a href="#" class="text-decoration-none text-secondary">Quên mật khẩu</a>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
