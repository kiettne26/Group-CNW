<?php
include("./configs/DBConnection1.php");
require_once 'models/Article.php';

class ArticleService {
    public function getAllArticles() {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();  
        if ($conn === null) {
            return []; 
        }  
        $sql = "SELECT 
                    baiviet.ma_bviet,
                    baiviet.tieude,
                    baiviet.tenbhat, 
                    baiviet.tomtat, 
                    baiviet.noidung,
                    baiviet.hinhthanh,
                    theloai.ten_tloai,
                    tacgia.ten_tgia,
                    baiviet.ma_tloai
                FROM baiviet
                INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
                INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $articles = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
            $article = new Article(
                $row['ma_bviet'], 
                $row['tieude'], 
                $row['tenbhat'], 
                $row['tomtat'], 
                $row['noidung'], 
                $row['hinhthanh'], 
                $row['ten_tloai'], 
                $row['ten_tgia'],
                $row['ma_tloai']
            );
            array_push($articles, $article); 
        }

        return $articles;
    }

    public function addNewArticle($tieude, $tenbhat, $tomtat, $noidung, $hinhthanh, $ma_tloai, $ma_tgia) {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        
        if ($conn === null) {
            return false;
        }
        $sqlMaxId = "SELECT MAX(ma_bviet) as max_id FROM baiviet";
        $stmtMaxId = $conn->prepare($sqlMaxId);
        $stmtMaxId->execute();
        $maxIdRow = $stmtMaxId->fetch(PDO::FETCH_ASSOC);
        $newMaBviet = $maxIdRow['max_id'] + 1;
        $sql = "INSERT INTO baiviet (ma_bviet,tieude, tenbhat, tomtat, noidung, hinhthanh, ma_tloai, ma_tgia) 
                VALUES (:ma_bviet, :tieude, :tenbhat, :tomtat, :noidung, :hinhthanh, :ma_tloai, :ma_tgia)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':ma_bviet', $newMaBviet);
        $stmt->bindParam(':tieude', $tieude);
        $stmt->bindParam(':tenbhat', $tenbhat);
        $stmt->bindParam(':tomtat', $tomtat);
        $stmt->bindParam(':noidung', $noidung);
        $stmt->bindParam(':hinhthanh', $hinhthanh);
        $stmt->bindParam(':ma_tloai', $ma_tloai);
        $stmt->bindParam(':ma_tgia', $ma_tgia);
        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }

    public function getAllAuthors() {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();  
        if ($conn === null) {
            return []; 
        }

        $sql_authors = "SELECT ma_tgia, ten_tgia FROM tacgia";
        $stmt_authors = $conn->prepare($sql_authors);
        $stmt_authors->execute();
        $authors = $stmt_authors->fetchAll(PDO::FETCH_ASSOC);

        return $authors;
    }
    public function getAllAuthorsId($id) {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();  
        if ($conn === null) {
            return []; 
        }

        $sql_authors = "SELECT* FROM tacgia where ma_tgia = :id";
        $stmt_authors = $conn->prepare($sql_authors);
        $stmt_authors->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt_authors->execute();
        $authorsId = $stmt_authors->fetchAll(PDO::FETCH_ASSOC);

        return $authorsId;
    }
    public function getAllCategoriesId($id) {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();  
        if ($conn === null) {
            return []; 
        }

        $sql_categories = "SELECT ma_tloai, ten_tloai FROM theloai where ma_tloai = :id";
        $stmt_categories = $conn->prepare($sql_categories);
        $stmt_categories->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt_categories->execute();
        $categoriesId = $stmt_categories->fetchAll(PDO::FETCH_ASSOC);

        return $categoriesId; 
    }

    public function getAllCategories() {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();  
        if ($conn === null) {
            return []; 
        }

        $sql_categories = "SELECT ma_tloai, ten_tloai FROM theloai";
        $stmt_categories = $conn->prepare($sql_categories);
        $stmt_categories->execute();
        $categories = $stmt_categories->fetchAll(PDO::FETCH_ASSOC);

        return $categories; 
    }

    public function deleteArticle($id){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $stmt = $conn->prepare("DELETE FROM baiviet WHERE ma_bviet = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();                       
    }

    public function getArticlebyId($id) {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();  
        if ($conn === null) {
            return []; 
        }
        $sql_articles = "SELECT * FROM baiviet Where ma_bviet=:id";
        $stmt_articles = $conn->prepare($sql_articles);
        $stmt_articles->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt_articles->execute();
        $articlesbyId = $stmt_articles->fetch(PDO::FETCH_ASSOC);        
        return $articlesbyId;
    }

    public function updateArticle($id, $tieude, $tenbhat, $tomtat, $noidung, $hinhthanh, $ma_tloai, $ma_tgia) {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
    
        if ($conn === null) {
            return false;
        }
    
        $sql = "UPDATE baiviet SET tieude = :tieude, tenbhat = :tenbhat, tomtat = :tomtat, noidung = :noidung, hinhthanh = :hinhthanh, ma_tloai = :ma_tloai, ma_tgia = :ma_tgia WHERE ma_bviet = :id";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':tieude', $tieude);
        $stmt->bindParam(':tenbhat', $tenbhat);
        $stmt->bindParam(':tomtat', $tomtat);
        $stmt->bindParam(':noidung', $noidung);
        $stmt->bindParam(':hinhthanh', $hinhthanh);
        $stmt->bindParam(':ma_tloai', $ma_tloai, PDO::PARAM_INT);
        $stmt->bindParam(':ma_tgia', $ma_tgia, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
    

    


}
