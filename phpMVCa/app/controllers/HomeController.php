<?php
require_once APP_ROOT.'/app/services/CaService.php';
class HomeController{
    public function index(){
        $caService = new CaService();
        $cas = $caService->getAllCas();
        /*
        echo "<pre>";
        print_r($patients);
        echo"<pre>";
        */
        
        //day dl len giao dien
        include APP_ROOT.'/app/view/home/index.php';
    }
}