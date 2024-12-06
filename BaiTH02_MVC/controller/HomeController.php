<?php
require_once './models/News.php';

class HomeController {
    private $newsModel;

    // Constructor để khởi tạo model News
    public function __construct() {
        $this->newsModel = new News();
    }

    // Hiển thị trang chủ với danh sách bài viết
    public function index() {
        try {
            $news = $this->newsModel->getAllNews(); // Lấy tất cả bài viết
            if (!$news) {
                $news = []; // Đảm bảo $news luôn là mảng nếu không có bài viết
            }
            include "views/home/index.php"; // Hiển thị view
        } catch (Exception $e) {
            echo "Lỗi khi tải trang chủ: " . $e->getMessage();
        }
    }

    // Hiển thị chi tiết bài viết
    public function detail($id) {
        try {
            // Kiểm tra ID hợp lệ
            if (!is_numeric($id) || intval($id) <= 0) {
                echo "ID bài viết không hợp lệ.";
                return;
            }

            $newsItem = $this->newsModel->getNewsById($id); // Lấy bài viết theo ID
            if (!$newsItem) {
                echo "Bài viết không tồn tại.";
                return;
            }

            include "views/home/detail.php"; // Hiển thị view chi tiết bài viết
        } catch (Exception $e) {
            echo "Lỗi khi hiển thị bài viết: " . $e->getMessage();
        }
    }

    
    // Tìm kiếm bài viết theo từ khóa
    public function search() {
        try {
            $news = []; // Mặc định danh sách bài viết rỗng

            if (isset($_GET['keyword']) && !empty(trim($_GET['keyword']))) {
                $keyword = htmlspecialchars(trim($_GET['keyword'])); // Lọc dữ liệu từ người dùng
               
            } else {
                echo "Vui lòng nhập từ khóa để tìm kiếm.";
            }

            include "views/home/search.php"; // Hiển thị view tìm kiếm
        } catch (Exception $e) {
            echo "Lỗi khi tìm kiếm bài viết: " . $e->getMessage();
        }
    }
}
?>
