<?php
require_once 'database.php';

class Category {
    private $db;

    // Constructor để khởi tạo kết nối cơ sở dữ liệu
    public function __construct() {
        $database = new Database();
        $this->db = $database->connect(); // Kết nối cơ sở dữ liệu
    }

    // Lấy tất cả danh mục
    public function getAllCategories() {
        $stmt = $this->db->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy danh mục theo ID
    public function getCategoryById($id) {
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm danh mục mới
    public function addCategory($name) {
        $stmt = $this->db->prepare("INSERT INTO categories (name) VALUES (?)");
        return $stmt->execute([$name]);
    }

    // Cập nhật danh mục
    public function updateCategory($id, $name) {
        $stmt = $this->db->prepare("UPDATE categories SET name = ? WHERE id = ?");
        return $stmt->execute([$name, $id]);
    }

    // Xóa danh mục
    public function deleteCategory($id) {
        $stmt = $this->db->prepare("DELETE FROM categories WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
