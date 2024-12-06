<?php
require_once('../app/config/config.php');
require_once APP_ROOT.'/app/libs/DBConnection.php';
require_once APP_ROOT.'/app/controllers/HomeController.php';
require_once APP_ROOT.'/app/controllers/CaController.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] :'home';
$action = isset($_GET['action']) ? $_GET['action'] :'home';
$id = isset($_GET['id']) ? $_GET['id'] :null;

$homeController = new HomeController();
$caController = new CaController();

/*if($controller == 'home'){
    require_once APP_ROOT.'/app/controllers/HomeController.php';
    $homeController = new HomeController();
    $homeController->index();

}else if($controller == 'patient'){
    require_once APP_ROOT.'/app/controllers/PatientController.php';
    $patientController = new PatientController();
    $patientController->index();
}else {
    echo'Nothing';
}*/
if($controller == "home"){ $homeController->index();}
else if (isset($_POST['btn_create'])){$caController->store();}
else if ($controller == 'addCa'){$caController->add();}
else if (isset($_POST['btn_update'])){$caController->update($id);}
else if ($controller == 'editCa'){$caController->edit($id);}
else if($controller == 'deleteCa'){
    $caController->show_delete($id);
    if(isset($_POST['btn_delete'])){
        $caController->delete($id);
    }
}