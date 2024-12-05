<?php
require_once './models/User.php';

$newsModel = new News();
$thanhcong = array();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = ''; 
}

switch ($action) {
    // thêm
    case 'add': {
        if (isset($_POST['add'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];

            // Xử lý upload hình ảnh
            if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
                $image = $_FILES['image']['name'];
                $target_dir = "images/";
                $target_file = $target_dir . basename($image);
                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
            } else {
                $image = NULL; // Nếu không upload file
            }

            $category_id = NULL; // Mặc định NULL nếu không có danh mục

            // Thêm tin tức vào DB
            if ($newsModel->addNews($title, $content, $image, $category_id)) {
                $thanhcong[] = 'add_success';
            }
        }
        require_once('./views/admin/news/add.php');
        break;
    }

    // sửa
    case 'edit': {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = intval($_GET['id']); // Chuyển đổi sang kiểu số nguyên để đảm bảo an toàn
            $dataID = $newsModel->getNewsById($id);
            if (!$dataID) {
                header('location: index.php?controller=news&action=dashboard');
                exit();
            }
    
            if (isset($_POST['edit'])) {
                $title = trim($_POST['title']);
                $content = trim($_POST['content']);
    
                $image = $dataID['image']; // Mặc định giữ ảnh cũ
                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                    if (in_array($_FILES['image']['type'], $allowedTypes)) {
                        $target_dir = "images/";
                        $target_file = $target_dir . basename($_FILES['image']['name']);
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                            $image = $_FILES['image']['name'];
                        } else {
                            $thanhcong[] = 'Không thể tải ảnh lên';
                        }
                    } else {
                        $thanhcong[] = 'Chỉ cho phép tải lên các tệp JPEG, PNG, GIF';
                    }
                }
    
                $category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : $dataID['category_id'];
    
                // Cập nhật dữ liệu
                if ($newsModel->updateNews($id, $title, $content, $image, $category_id)) {
                    header('location: index.php?controller=news&action=dashboard');
                    exit();
                } else {
                    $thanhcong[] = 'Cập nhật thất bại';
                }
            }
    
            require_once('./views/admin/news/edit.php');
        } else {
            header('location: index.php?controller=news&action=dashboard');
        }
        break;
    }
    // xóa 
    case 'delete': {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = intval($_GET['id']); // chuyển ID sang số nguyên
    
            $dataID = $newsModel->getNewsById($id);
            if (!$dataID) {
                $thanhcong[] = 'Bài viết không tồn tại hoặc đã bị xóa';
                header('location: index.php?controller=news&action=dashboard');
                exit();
            }
            if ($newsModel->deleteNews($id)) {
                // xóa tệp ảnh
                if (!empty($dataID['image']) && file_exists("images/" . $dataID['image'])) {
                    unlink("images/" . $dataID['image']);
                }
                $thanhcong[] = 'Xóa bài viết thành công';
                header('location: index.php?controller=news&action=dashboard');
                exit();
            } else {
                $thanhcong[] = 'Xóa bài viết thất bại';
                header('location: index.php?controller=news&action=dashboard');
                exit();
            }
        } else {
            $thanhcong[] = 'ID không hợp lệ';
            header('location: index.php?controller=news&action=dashboard');
            exit();
        }
        break;
    }
    // đăng nhập
    case 'login': {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $userModel = new User();
            $user = $userModel->login($username, $password);
    
            if ($user) {
                // Đăng nhập thành công
                $_SESSION['user'] = $user;
                header('Location: index.php?controller=news&action=dashboard');
                exit;
            } else {
                $error = "Sai tên đăng nhập hoặc mật khẩu.";
            }
        }
        require_once './views/admin/login.php';
        break;
    }
    
    
    
    case 'dashboard': {
        $data = $newsModel->getAllNews();
        require_once('./views/admin/news/dashboard.php');
        break;
    }
    default: {
        $data = $newsModel->getAllNews();
        require_once('./views/admin/news/dashboard.php');
        break;
    }
}

?>
