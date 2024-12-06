<?php
class Database {
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'quanlythanhvien_mvc';

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

    // Lấy tất cả dữ liệu
    public function getAllData($table) {
        $sql = "SELECT * FROM $table";
        $this->execute($sql);
        return $this->stmt ? $this->stmt->fetchAll(PDO::FETCH_ASSOC) : [];
    }

    // Đếm số bản ghi
    public function num_rows() {
        return $this->stmt ? $this->stmt->rowCount() : 0;
    }

    // Thêm dữ liệu
    public function InsertData($hoten, $namsinh, $quequan) {
        $sql = "INSERT INTO thanhvien (hoten, namsinh, quequan) VALUES (:hoten, :namsinh, :quequan)";
        return $this->execute($sql, ['hoten' => $hoten, 'namsinh' => $namsinh, 'quequan' => $quequan]);
    }

    // Lấy dữ liệu theo ID
    public function getDataID($table, $id) {
        $sql = "SELECT * FROM $table WHERE id = :id";
        $this->execute($sql, ['id' => $id]);
        return $this->getData();
    }

    // Sửa dữ liệu
    public function UpdateData($id, $hoten, $namsinh, $quequan) {
        $sql = "UPDATE thanhvien SET hoten = :hoten, namsinh = :namsinh, quequan = :quequan WHERE id = :id";
        return $this->execute($sql, ['id' => $id, 'hoten' => $hoten, 'namsinh' => $namsinh, 'quequan' => $quequan]);
    }

    // Xóa dữ liệu
    public function Delete($id, $table) {
        $sql = "DELETE FROM $table WHERE id = :id";
        return $this->execute($sql, ['id' => $id]);
    }

    // Tìm kiếm dữ liệu
    public function SearchData($table, $key) {
        $sql = "SELECT * FROM $table WHERE hoten LIKE :key ORDER BY id DESC";
        $this->execute($sql, ['key' => "%$key%"]);
        return $this->stmt ? $this->stmt->fetchAll(PDO::FETCH_ASSOC) : [];
    }
}
?>
