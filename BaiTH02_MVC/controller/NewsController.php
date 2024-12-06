<?php  
require_once './models/News.php';

class NewsController {
    private $newsModel;

    // Constructor khởi tạo model News
    public function __construct() {
        $this->newsModel = new News();
    }

    // Phương thức hiển thị danh sách bài viết
    public function index() {
        $news = $this->newsModel->getAllNews();
        if (!$news) {
            $news = []; // Đảm bảo biến $news luôn là mảng
        }
        include "views/home/index.php";
    }

    // Phương thức hiển thị chi tiết bài viết
    public function detail($id) {
        $newsItem = $this->newsModel->getNewsById($id);
        if (!$newsItem) {
            // Xử lý khi không tìm thấy bài viết
            echo "Bài viết không tồn tại.";
            return;
        }
        include "views/news/detail.php";
    }
    // Phương thức tìm kiếm bài viết theo nội dung
    public function searchByContent($content) {
        $newsItems = $this->newsModel->searchNewsByContent($content);
        if (!$newsItems) {
            // Xử lý khi không tìm thấy bài viết
            echo "Không tìm thấy bài viết với nội dung: $content";
            return;
        }
        // Nếu tìm thấy, hiển thị chi tiết bài viết
        include "views/news/search_resutl.php"; // File để hiển thị kết quả tìm kiếm
    }
    
    
}




   

?>
