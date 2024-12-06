<?php
include_once("./services/AuthorService.php");

class AuthorController{
    private $authorService;

    public function __construct(){
        $this->authorService = new AuthorService();
    }

    public function add(){
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['ten_tgia'])){
            $ten_tgia = $_POST['ten_tgia'];

            // Gọi service để thêm mới
            $isAdded = $this->authorService->addAuthor($ten_tgia);

            // Kiểm tra nếu thêm thành công, hiển thị trang danh sách hoặc thông báo
            if ($isAdded) {
                // Điều hướng về danh sách thể loại hoặc hiển thị thông báo thành công
                echo '<script>alert("Thêm tác giả thành công!"); window.location.href = "./index.php?controller=author&action=list";</script>';
                exit();
            } else {
                echo "Thêm tác giả thất bại!";
            }
        }
    }

    public function delete(){
        if (isset($_GET['id'])) {
            $ma_tgia = $_GET['id'];
            // Gọi đến phương thức delete trong service 
            $this->authorService->deleteAuthor($ma_tgia);
            echo '<script>alert("Xoá tác giả thành công!"); window.location.href = "./index.php?controller=author&action=list";</script>';
            exit();
    }
}

    public function edit(){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ten_tgia'])) {
            $ma_tgia = $_POST['id'];  // Lấy mã thể loại từ URL (GET)
            $ten_tgia = $_POST['ten_tgia'];  // Lấy tên thể loại từ form (POST)

            // Gọi phương thức để cập nhật thông tin thể loại và lưu kết quả vào biến $isEdited
            $isEdited = $this->authorService->editAuthor($ten_tgia, $ma_tgia);
        
            // Kiểm tra xem việc chỉnh sửa có thành công không
            if ($isEdited) {
            // Nếu thành công, điều hướng về trang danh sách thể loại
                echo '<script>alert("Sửa tác giả thành công!"); window.location.href = "./index.php?controller=author&action=list";</script>';
                exit();
            } else {
            // Nếu thất bại, hiển thị thông báo lỗi
                echo '<script>alert("Sửa tác giả thất bại!"); window.location.href = "./index.php?controller=author&action=list";</script>';
            }
        }
    }

    public function list(){
        $authors = $this->authorService->getAllAuthor();
        include("views/author/index_author.php");
    }

    public function viewsAdd(){
       
        include_once("views/author/add_author.php");
    }

    public function viewsEdit(){
        $author_id = intval($_GET['id']);
        $author_name = isset($_GET['name']) ? $_GET['name'] : '';
        $author_name = urldecode($author_name);
        include_once("views/author/edit_author.php");
    }
}
?>
