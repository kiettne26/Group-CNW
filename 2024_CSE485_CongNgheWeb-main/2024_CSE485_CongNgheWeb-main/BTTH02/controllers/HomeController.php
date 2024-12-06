<?php

require_once('./services/ArticleService.php');

class HomeController {
    private $articleService;

    public function __construct() {
        $this->articleService = new ArticleService();
    }

    public function index() {
        
        $articles = $this->articleService->getAllArticles();
         
        include('views/home/index.php');
    }
    public function detail(){
        $id=$_GET['id'];
        $detail = $this->articleService->getArticlebyId($id);
        include('views/home/detail.php');
    }
}
