<?php
require_once APP_ROOT.'/app/models/Ca.php'; 

class CaService {
    public function getAllCas(){
        $cas = []; // khởi tạo mảng rỗng
        $dbConnection = new DBConnection(); 

        if($dbConnection != null){
            //echo 'dbConnection NOT null';
            $conn = $dbConnection->getConnection();
            
            if($conn != null){
                $sql = "SELECT * FROM qlca";
                $stmt = $conn->query($sql); //thực thi câu lệnh sql

                while($row = $stmt->fetch()){
                    $ca = new Ca($row['ID'], $row['Name'], $row['Description'],$row['Image']);
                    $cas[] = $ca; //thêm vào mảng 
                }

                return $cas;
            }
        }
    }
    public function addCa(Ca $ca){
        $dbConnection = new DBConnection();
        if( $dbConnection != null){
            $conn = $dbConnection->getConnection();
            if( $conn != null ){
                $Name = $ca->getName();
                $Description = $ca->getDescription();
                $Image = $ca->getImage();
                $sql = "INSERT INTO qlca(Name,Description,Image) VALUES ('$Name','$Description','$Image')";
                $conn->exec($sql);
            }
        }
    }
    public function getCaById($ID){
        $dbConnection = new DBConnection();
        if( $dbConnection != null ){
            $conn = $dbConnection->getConnection();
            if($conn != null){
                $sql = "SELECT * FROM qlca WHERE ID ='$ID'";
                $stmt = $conn->query($sql);
                if($stmt->rowCount() >0){
                    $row = $stmt->fetch();
                    $ca = new Ca($row['ID'], $row['Name'], $row['Description'],$row['Image']);
                    return $ca;
                }
            }
        }
    }
    public function updateCa(Ca $ca){
        $dbConnection = new DBConnection();
        if( $dbConnection != null){
            $conn = $dbConnection->getConnection();
            if( $conn != null ){
                $ID =  $ca->getID();
                $Name = $ca->getName();
                $Description = $ca->getDescription();
                $Image = $ca->getImage();
                $sql = "UPDATE qlca SET Name ='$Name', Description ='$Description', Image = '$Image' WHERE ID ='$ID'";
                $conn->exec($sql);
            }
        }
    }

    public function deleteCa($ID){
        $dbConnection = new DBConnection();

        if($dbConnection != null){
            $conn = $dbConnection->getConnection();
            if($conn != null){
                $sql = "DELETE FROM qlca WHERE ID = '$ID'";
                $conn->exec($sql);
            }
        }
    }
}