<?php
    class DBConnection{
        private $host;
        private $user;
        private $pass;
        private $dbname;
        private $conn;

        public function __construct(){
            $this->host = DB_HOST;
            $this->user = DB_USER;
            $this->pass = DB_PASS;
            $this->dbname = DB_NAME;

            try{
                //tạo chuỗi kết nối
                //sqlStr = 'mysql:host=localhost;dbname=hms';
                $sqlStr = "mysql:host=$this->host;dbname=$this->dbname";
                //echo $sqlStr.'  ';
                //tạo đối tượng pdo 
                $this->conn = new PDO($sqlStr, $this->user, $this->pass);
            }catch(PDOException $e){
                $this->conn = null;
            }
        }

        public function getConnection(){
            return $this->conn;
        }
    }