<?php
require_once APP_ROOT . '/app/services/CaService.php';
class CaController{
    public function add(){
        include_once APP_ROOT .'/app/view/ca/add.php';
    }
    public function store(){
        $Name = $_POST['Name'];
        $Description = $_POST['Description'];
        $Image = $_POST['Image'];
        $ca = new Ca(null, $Name, $Description,$Image);

        $caService = new CaService();
        $caService->addCa($ca);
        header('Location: ?controller=home');
    }

    public function edit($ID){
        if(isset($ID)){
            $caService = new CaService();
            $ca = $caService->getCaById($ID);

            include APP_ROOT . '/app/view/ca/edit.php';
        }else{
            echo'Id is null';
        }
    }

    public function update($ID){
        $Name = $_POST['Name'];
        $Description = $_POST['Description'];
        $Image = $_POST['Image'];
        $ca_new = new Ca($ID,$Name, $Description,$Image);

        $caService = new CaService();
        $caService->updateCa($ca_new);
        header('Location: ?controller=home');
    }

    public function show_delete($ID){
        if(isset($ID)){
            $caService = new CaService();
            $ca = $caService->getCaById($ID);
            include APP_ROOT."/app/view/ca/delete.php";
        }
    }

    public function delete($ID){
        $caService = new CaService();
        $caService->deleteCa($ID);
        header('Location: index.php?controller=home');
    }

}