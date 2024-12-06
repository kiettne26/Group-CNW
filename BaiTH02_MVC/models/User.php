<?php
require_once 'database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }
    // Kiểm tra đăng nhập
    public function login($username, $password) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Kiểm tra password
        if ($user && password_verify($password, $user['password'])) {
            return $user; // Đăng nhập thành công
        }
        return false; // Sai thông tin đăng nhập
    }
}
?>
