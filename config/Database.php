<?php 
  class Database {
    // DB Params
    private $host = 'dcm.uhcl.edu';//'dcm.uhcl.edu';
    private $db_name = 'capf19g1';
    private $username = 'capf19g1';//capf19g1;
    private $password = '5908691';
    private $conn;
    // DB Connect
    public function connect() {
      $this->conn = null;
      try { 
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }
      return $this->conn;
    }
  }
