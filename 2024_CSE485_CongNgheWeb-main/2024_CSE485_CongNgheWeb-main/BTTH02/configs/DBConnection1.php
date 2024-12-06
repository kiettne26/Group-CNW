<?php

class DBConnection {
    private $conn = null;
    private $host = '127.0.0.1';
    private $db = 'btth01_cse485';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';
    private $port = '3307';

    public function __construct() {
        $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->db;charset=$this->charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->conn = new PDO($dsn, $this->user, $this->pass, $options);
            
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function getConnection() {
        return $this->conn;
    }
}

?>
