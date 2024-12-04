<?php
require 'products.php';
session_start();
if(isset($_SESSION['products']))
    $products = $_SESSION['products'];
if($_POST['delete']=='Có')
unset($products[$_POST['index']]);
$_SESSION['products'] = $products;
header('Location: index.php');  
?>