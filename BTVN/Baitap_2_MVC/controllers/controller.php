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
                $tenhoa = $_POST['tenhoa'];
                $mota = $_POST['mota'];
                $hinhanh = $_POST['hinhanh'];

                if ($db->InsertData($tenhoa,$mota,$hinhanh)){
                    $thanhcong[] = 'add_success';
                }
            }
            require_once('view/articles/add.php');
            break;
        }

        case 'edit':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $tblTable = "hoa";
                $dataID = $db->getDataID($tblTable, $id);
            
                if(isset($_POST['edit'])){
                    // lấy dữ liệu từ view
                    $tenhoa = $_POST['tenhoa'];
                    $mota = $_POST['mota'];
                    if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == 0) {
                        $target_dir = "images/";
                        $target_file = $target_dir . basename($_FILES['hinhanh']['name']);
                        move_uploaded_file($_FILES['hinhanh']['tmp_name'], $target_file);
                        $hinhanh = $_FILES['hinhanh']['name'];
                    } else {
                        $hinhanh = $dataID['hinhanh'];
                    }

                    // truyền dữ liệu sang model
                    if($db->UpdateData($id, $tenhoa, $mota, $hinhanh)){
                        header('location: index.php?controller=hoa&action=list');
                    }
                }
              
            }
            require_once('./view/articles/edit.php');
            break;
        }

        case 'delete':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $tblTable = "hoa";
                if($db->Delete($id , $tblTable)){
                    header('location: index.php?controller=hoa&action=list.php');
                }
                else{
                    header('location: index.php?controller=hoa&action=list.php');
                }
            }
        }

        case 'list':{
            $tblTable = "hoa";
            $data = $db->getAllData($tblTable);
            require_once('./view/articles/list.php');
            break;
        }

        default:{
            $tblTable = "hoa";
            $data = $db->getAllData($tblTable);
            require_once('./view/articles/list.php');
            break;
        }
    }
?>