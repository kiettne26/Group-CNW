<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý thành viên</title>
    <link rel="stylesheet" href="./style.css" class="">
</head>
<body>
    
</body>
</html>

<?php
    include "model/DBConfig.php";
    $db = new Database;
    $db-> connect();

    if(isset($_GET['controller'])){
        $controller = $_GET['controller'];
    }
    else {
        $controller = '';
    }

    switch($controller){
        case 'thanh-vien':{
            require_once('controller/index.php');
        }
    }
?>