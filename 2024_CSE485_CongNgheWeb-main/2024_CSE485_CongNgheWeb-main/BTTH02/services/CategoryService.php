<?php
include_once("./configs/DBConnection.php");
include_once("./models/Category.php");

class CategoryService{
    // Hiển thị danh sách Category
    public function getAllCategories(){
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // Xử lý kết quả
        $sql = "SELECT * FROM theloai";
        $stmt = $conn->query($sql);

        
        // Mảng (danh sách) các đối tượng Category Model
        $categories = [];
        if ($stmt->num_rows > 0) {
            while ($row = $stmt->fetch_assoc()) {
                $category = new Category($row['ma_tloai'], $row['ten_tloai']);
                array_push($categories, $category);
            }
        }
        return $categories;
    }

    public function addCategories( $ten_tloai){
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

       // Lấy ID lớn nhất hiện có từ bảng theloai
       $sql_max_id = "SELECT MAX(ma_tloai) AS max_id FROM theloai";
       $result = $conn->query($sql_max_id);

       if($result && $result->num_rows > 0){
        $row = $result->fetch_assoc();
        $new_id = $row['max_id'] + 1;
       } else {
        $new_id = 1;
       }

       // Thêm mới
       $sql_add = "INSERT INTO theloai (ma_tloai, ten_tloai) VALUES (?, ?)";
       if ($stmt = $conn->prepare($sql_add)) {
        $stmt->bind_param("is", $new_id, $ten_tloai);
        return $stmt->execute();
        }   
        return false;
    }

       // Hàm xoá
    public function deleteCatories($ma_tloai){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        // truy vấn
        $sql_delete = "DELETE FROM theloai WHERE ma_tloai = ?";
        $stmt = $conn->prepare($sql_delete);
        $stmt->bind_param("i", $ma_tloai);
        $stmt->execute();
    }

    public function getCategoryById(){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // Truy vấn thông tin thể loại dựa trên ID
        $sql = "SELECT ma_tloai, ten_tloai FROM theloai WHERE ma_tloai = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $ma_tloai); // 'i' nghĩa là kiểu số nguyên
        $stmt->execute();

        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return new Category($row['ma_tloai'], $row['ten_tloai']);
        }
            return null;
    }

    public function editCategory($ten_tloai, $ma_tloai){
        // Khởi tạo kết nối đến cơ sở dữ liệu
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
    
        // Câu truy vấn SQL để cập nhật thể loại
        $sql_edit = "UPDATE theloai SET ten_tloai = ? WHERE ma_tloai = ?";
        $stmt = $conn->prepare($sql_edit);
        $stmt->bind_param("si", $ten_tloai, $ma_tloai);
        
        if($stmt->execute()){
            return true;
        }
    }
}
?>