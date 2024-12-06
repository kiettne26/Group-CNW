<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Tin tức</title>
</head>
<body>
    
</body>
</html>

<?php
include "./models/Database.php";
include "./models/News.php";
$db = new Database;
$db->connect(); // Kết nối cơ sở dữ liệu

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
} else {
    require_once('./views/home/index.php');
    $controller = ''; 
}
switch ($controller) {
    case 'news': {
        require_once('./controller/AdminController.php');
        break;
    }
}
?>
