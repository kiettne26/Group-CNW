<?php
    class Database{
        private $hostname = 'localhost';
        private $username = 'root';
        private $pass = '';
        private $dbname = 'hoa_mvc';
        
        private $conn = NULL;
        private $result = NULL;
         
        public function connect(){
            $this->conn = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);
            if(!$this->conn){
                echo "kết nối thất bại";
                exit();
            }
            else {
                mysqli_set_charset($this->conn, 'utf8');
            }
            return $this->conn;
        }

        // thực thi câu lệnh truy vấn
        public function execute($sql){
            $this->result = $this->conn->query($sql);
            return $this->result;
        }

        // lấy dữ liệu
        public function getData(){
            if($this->result){
                $data = mysqli_fetch_array($this->result);
            }
            else {
                $data = 0;
            }
            return $data;
        }

        // lấy toàn bộ dữ liệu
        public function getAllData($table){
            $sql = "SELECT * FROM $table";
            $this->execute($sql);
            if($this->num_rows()==0){
                $data = 0;
            }
            else {
                while($datas = $this->getData()){
                    $data[] = $datas;
                }
            }
            return $data;
        }
        
        // đếm số bản ghi 
        public function num_rows(){
            if($this->result){
                $num = mysqli_num_rows($this->result);
            }
            else {
                $num = 0;
            }
            return $num;
        }

        // thêm dữ liệu
        public function InsertData($tenhoa, $mota,$hinhanh){
            $sql = "INSERT INTO hoa(id, tenhoa, mota, hinhanh)VALUES(null,'$tenhoa','$mota','$hinhanh')";
            return $this->execute($sql);
        }

        // sửa dữ liệu
        public function UpdateData($id, $tenhoa, $mota,$hinhanh){
            $sql = "UPDATE hoa SET tenhoa = '$tenhoa', mota = '$mota', hinhanh = '$hinhanh' WHERE id ='$id'";
            return $this->execute($sql);
        } 
        public function getDataID($table, $id) {
            $sql = "SELECT * FROM $table WHERE id = '$id'";
            $this->execute($sql);
            if($this->num_rows()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else {
                $data = 0;
            }
            return $data;
        }

        // xóa dữ liệu
        public function Delete($id, $table){
            $sql = "DELETE FROM $table WHERE id = '$id'";
            return $this->execute($sql);
        }
    }
?>