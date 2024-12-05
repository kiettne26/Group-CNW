<?php
require_once 'database.php';

class News {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }
    // Thêm bài viết mới
    public function addNews($title, $content, $image, $category_id) {
        $sql = "INSERT INTO news (title, content, image, category_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->connect()->prepare($sql);
        return $stmt->execute([$title, $content, $image, $category_id]);
    }
    // Lấy tất cả bài viết
    public function getAllNews() {
        $sql = "SELECT * FROM news";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->execute(); // Thực thi câu lệnh SQL
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Lấy tất cả dữ liệu
    }

    // // Lấy bài viết theo ID
    // public function getNewsById($id) {
    //     $stmt = $this->db->prepare("SELECT news.*, categories.name as category_name 
    //                                 FROM news 
    //                                 LEFT JOIN categories ON news.category_id = categories.id 
    //                                 WHERE news.id = ?");
    //     $stmt->execute([$id]);
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }

    

    // // Cập nhật bài viết
    // public function updateNews($id, $title, $content, $image, $category_id) {
    //     $stmt = $this->db->prepare("UPDATE news 
    //                                 SET title = ?, content = ?, image = ?, category_id = ? 
    //                                 WHERE id = ?");
    //     return $stmt->execute([$title, $content, $image, $category_id, $id]);
    // }

    // // Xóa bài viết
    // public function deleteNews($id) {
    //     $stmt = $this->db->prepare("DELETE FROM news WHERE id = ?");
    //     return $stmt->execute([$id]);
    // }
}
?>
