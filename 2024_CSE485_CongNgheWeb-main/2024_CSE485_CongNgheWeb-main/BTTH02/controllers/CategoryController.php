<?php
include_once("./services/CategoryService.php");
class CategoryController{
    // Hàm xử lý hành động index
    private $categoryS;

    public function __construct(){
        $this->categoryS = new CategoryService();
    }

    public function add() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ten_tloai'])) {
            $ten_tloai = $_POST['ten_tloai'];
            
            // Gọi service để thêm mới thể loại
            $isAdded = $this->categoryS->addCategories($ten_tloai);

            // Kiểm tra nếu thêm thành công, hiển thị trang danh sách hoặc thông báo
            if ($isAdded) {
                // Điều hướng về danh sách thể loại hoặc hiển thị thông báo thành công
                echo '<script>alert("Thêm thể loại thành công!"); window.location.href = "./index.php?controller=category&action=list";</script>';
                exit();
            } else {
                echo "Thêm thể loại thất bại!";
            }
        }
        
    }
    // Phương thức xoá tác giả
    public function delete() {
        if (isset($_GET['id'])) {
            $ma_tloai = $_GET['id'];
    
            // Gọi đến phương thức delete trong service (sử dụng đối tượng categoryS có sẵn)
            $this->categoryS->deleteCatories($ma_tloai);
    
            // Sau khi xóa, chuyển hướng lại trang danh sách
            echo '<script>alert("Xoá bài viết thành công!"); window.location.href = "./index.php?controller=category&action=list";</script>';
            exit();
        } else {
            // Nếu không có id trong yêu cầu, xử lý lỗi
            echo "Không tìm thấy ID để xóa";
        }
    }

    // public function getById(){
    
    //     return $this->categoryS->getCategoryById();
    // }


    public function saveEditCategory() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ten_tloai'])) {
            $ma_tloai = $_POST['id'];  // Lấy mã thể loại từ URL (GET)
            $ten_tloai = $_POST['ten_tloai'];  // Lấy tên thể loại từ form (POST)

            // Gọi phương thức để cập nhật thông tin thể loại và lưu kết quả vào biến $isEdited
            $isEdited = $this->categoryS->editCategory($ten_tloai, $ma_tloai);
        
            // Kiểm tra xem việc chỉnh sửa có thành công không
            if ($isEdited) {
            // Nếu thành công, điều hướng về trang danh sách thể loại
                echo '<script>alert("Sửa thể loại thành công!"); window.location.href = "./index.php?controller=category&action=list";</script>';
                exit();
            } else {
            // Nếu thất bại, hiển thị thông báo lỗi
                echo '<script>alert("Sửa thể loại thất bại!"); window.location.href = "./index.php?controller=category&action=list";</script>';
            }
        }
    }
    

    public function list(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $categories = $this->categoryS->getAllCategories();

        // Nhiệm vụ 2: Tương tác với View
        
        include_once("views/category/list_category.php");
       
    }
    public function viewsAdd(){
       
        include_once("views/category/add_category.php");
    }
    public function viewsDel(){
        $category_id = intval($_GET['id']);
        $category_name = isset($_GET['name']) ? $_GET['name'] : '';
        $category_name = urldecode($category_name);
        include_once("views/category/delete_category.php");
    }

    public function viewsEdit(){
        $category_id = intval($_GET['id']);
        $category_name = isset($_GET['name']) ? $_GET['name'] : '';
        $category_name = urldecode($category_name);
        include_once("views/category/edit_category.php");
    }
}
?>