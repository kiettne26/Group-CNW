<?php
class Database {
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'tintuc';

    private $conn = NULL;
    private $stmt = NULL;

    // Kết nối cơ sở dữ liệu
    public function connect() {
        try {
            $this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbname;charset=utf8", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Kết nối thất bại: " . $e->getMessage());
        }
        return $this->conn;
    }
    // Thực thi câu lệnh truy vấn
    public function execute($sql, $params = []) {
        $this->stmt = $this->conn->prepare($sql);
        return $this->stmt->execute($params);
    }

    // Lấy một dòng dữ liệu
    public function getData() {
        return $this->stmt ? $this->stmt->fetch(PDO::FETCH_ASSOC) : null;
    }
}
?>
