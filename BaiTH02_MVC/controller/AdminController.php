<?php
$newsModel = new News();
$thanhcong = array();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = ''; 
}

switch ($action) {
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
