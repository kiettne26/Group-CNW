<?php
require 'products.php';
session_start();
if(isset($_SESSION['products']))
$products = $_SESSION['products'];
$target_dir = "img/";//Đây là thư mục đích trên server, nơi file tải lên sẽ được lưu trữ.
        $target_file = $target_dir . basename($_FILES["image"]["name"]);// đường dẫn tới file
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $products[] = ['name' => $_POST['Name'],
                       'price' => $_POST['Price'],
                       'image' => $target_file
                     ];
        $_SESSION['products'] = $products;
        print_r($_SESSION['products']);
        header('Location: index.php')
?>