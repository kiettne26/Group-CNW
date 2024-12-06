<?php
class DBConnection{
    private $conn=null;

    public function __construct(){
         // B1. Kết nối DB Server
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "BTTH01_CSE485";
        $port = 3307;

        $this->conn = new mysqli($servername, $username, $password, $dbname, $port);

        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }
    }

    public function getConnection(){
        return $this->conn;
    }
}
?>