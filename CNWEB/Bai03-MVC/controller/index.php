<?php 
    
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    else {
        $action = '';
    }
    $thanhcong = array();
    switch($action){
        case 'add':{
            if(isset($_POST['add'])){
                $hoten = $_POST['hoten'];
                $namsinh = $_POST['namsinh'];
                $quequan = $_POST['quequan'];

                if ($db->InsertData($hoten,$namsinh,$quequan)){
                    $thanhcong[] = 'add_success';
                }
            }

            require_once('view/add.php');
            break;
        }

        case 'edit':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $tblTable = "thanhvien";
                $dataID = $db->getDataID($tblTable, $id);

                if(isset($_POST['update'])){
                    // lấy dữ liệu từ view
                    $hoten = $_POST['hoten'];
                    $namsinh = $_POST['namsinh'];
                    $quequan = $_POST['quequan'];
                    // truyền dữ liệu sang model
                    if($db->UpdateData($id, $hoten, $namsinh, $quequan)){
                        header('location: index.php?controller=list.php');
                    }

                }

            }
            require_once('view/edit.php');
            break;
        }

        case 'delete':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $tblTable = "thanhvien";
                if($db->Delete($id , $tblTable)){
                    header('location: index.php?controller=list.php');
                }
                else{
                    header('location: index.php?controller=list.php');
                }
            }
            // require_once('view/delete.php');
            break;
        }

        case 'list':{
            $tblTable = "thanhvien";
            $data = $db->getAllData($tblTable);
            require_once('./view/list.php');
            break;
        }

        case 'tim-kiem':{
            if(isset($_GET['tukhoa'])){
                $key = $_GET['tukhoa'];
                $tblTable = "thanhvien";
                //lấy dữ liệu từ Model : file DBConfig.php
                $data_Search = $db->SearchData($tblTable, $key);

            }
            require_once('./view/search.php');
            break;
        }

        default:{
            $tblTable = "thanhvien";
            $data = $db->getAllData($tblTable);
            require_once('view/list.php');
            break;
        }
    }
?>