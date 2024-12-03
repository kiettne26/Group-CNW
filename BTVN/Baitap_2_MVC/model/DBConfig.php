<?php
    class Database{
        private $hostname = 'localhost';
        private $username = 'root';
        private $pass = '';
        private $dbname = 'quanlythanhvien_mvc';

        private $conn = NULL;
        private $result = NULL;

        public function connect() {
            $this->conn = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);
            if(!$this->conn){
                echo "kết nối thất bại";
                exit();
            }
            else{
                mysqli_set_charset($this->conn, 'utf8');
            }
            return $this->conn;
        }

        // thực thi câu lệnh truy vấn
        public function execute($sql) {
            $this->result = $this->conn->query($sql);
            return $this->result;
        }

        // lấy dữ liệu
        public function getData() {
            if($this->result){
                $data = mysqli_fetch_array($this->result);
            }
            else {
                $data = 0;
            }
            return $data;
        }

        //lấy toàn bộ dữ liệu 
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

        // phương thức thêm dữ liệu
        public function InsertData($hoten, $namsinh,$quequan){
            $sql = "INSERT INTO thanhvien(id, hoten, namsinh, quequan)VALUES(null,'$hoten','$namsinh','$quequan')";
            return $this->execute($sql);
        }
        // lấy dữ liệu theo ID: (bổ xung cho chức năng sửa)
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
        // phương thức sửa dữ liệu
        public function UpdateData($id, $hoten, $namsinh,$quequan){
            $sql = "UPDATE thanhvien SET hoten = '$hoten', namsinh = '$namsinh', quequan = '$quequan' WHERE id ='$id'";
            return $this->execute($sql);
        }

        //phương thức xóa 
        public function Delete($id, $table){
            $sql = "DELETE FROM $table WHERE id = '$id'";
            return $this->execute($sql);
        }
        
        //phương thức tìm kiếm
        public function SearchData($table, $key){
            $sql = "SELECT * FROM $table WHERE hoten REGEXP '$key' ORDER BY id DESC";
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
    }
?>