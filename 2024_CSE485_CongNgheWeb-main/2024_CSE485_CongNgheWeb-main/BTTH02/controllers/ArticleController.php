<?php
require_once('./services/ArticleService.php');

class ArticleController {
    private $articleService;

    public function __construct() {
        $this->articleService = new ArticleService();
    }

    public function list() {
        
        $articles = $this->articleService->getAllArticles();
         
        include('views/article/list_article.php');
    }

    public function viewsAdd(){      
        $authors= $this->articleService->getAllAuthors();
        $categories= $this->articleService->getAllCategories();
        
        include('views/article/add_article.php');
        
    }
    public function detail_amin(){
        $id=$_GET['id'];
        $detail = $this->articleService->getArticlebyId($id);
        include('views/article/detail_admin.php');
    }
    public function addArticle() {       
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tieude = $_POST['txtTitle'];
            $tenbhat = $_POST['txtArticleName'];
            $tomtat = $_POST['txtSummaryName'];
            $noidung = $_POST['txtContentName'];
            $hinhthanh = $_POST['txtImage_id'];
            $ma_tloai = $_POST['category_id'];
            $ma_tgia = $_POST['author_id'];
    
            
            if ($this->articleService->addNewArticle($tieude, $tenbhat, $tomtat, $noidung, $hinhthanh, $ma_tloai, $ma_tgia)) {
              
                echo "<script>
                alert('Thêm thành công');
                window.location.href = './index.php?controller=Article&action=list';
                </script>";
                exit;
            } else {
               
                $errorMessage = "Có lỗi xảy ra khi thêm bài viết.";
            }
        }      
    }
    public function editArticle() { 
            $id = $_GET['id'] ?? ''; 
            
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tieude = $_POST['txtTitleName'];
            $tenbhat = $_POST['txtArticleName'];
            $tomtat = $_POST['txtSummaryName'];
            $noidung = $_POST['txtContentName'];
            $hinhthanh = $_POST['txtImage_id'];
            $ma_tloai = $_POST['category_id'];
            $ma_tgia = $_POST['author_id'];
        
            
            if ($this->articleService->updateArticle($id, $tieude, $tenbhat, $tomtat, $noidung, $hinhthanh, $ma_tloai, $ma_tgia)) {
                
                echo "<script>
                alert('Sửa thành công');
                window.location.href = './index.php?controller=Article&action=list';
                </script>";
                exit;
            } else {
                
                $errorMessage = "Có lỗi xảy ra khi cập nhật bài viết.";
            }
        }
            
    }

    public function viewsEdit(){
        
        $id = $_GET['id'] ?? '';       
        $authors= $this->articleService->getAllAuthors();
        $categories= $this->articleService->getAllCategories();
        $articlesbyId = $this->articleService->getArticlebyId($id);
        $ida=$articlesbyId['ma_tgia'];
        $idb=$articlesbyId['ma_tloai'];
        $AuthorsId = $this->articleService->getAllAuthorsId($ida);
        $categoriesId = $this->articleService->getAllCategoriesId($idb);
 
        echo $ida;
        include('views/article/edit_article.php');
        
    }
    
    public function delete(){
        $id = $_GET['id'] ?? '';
    
        if (!$this->articleService->deleteArticle($id)) {
         
            echo "<script>
                    alert('Xoá thành công');
                    window.location.href = './index.php?controller=Article&action=list';
                  </script>";
        } else {
        
            echo "<script>
                    alert('Xoá thất bại');
                    window.location.href = './index.php?controller=Article&action=list';
                  </script>";
        }
    }


    
    
}