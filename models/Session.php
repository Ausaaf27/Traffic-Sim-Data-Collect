<?php 
  class Session {
    // DB stuff
    private $conn;
    private $table = 'session';
    // Post Properties
    public $name;
   
 
    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }
    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT * from ' . $this->table;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);
      // Execute query
      $stmt->execute();
      return $stmt;
    }
      public function create() {
          // Create query
          $query = 'REPLACE INTO ' . $this->table . ' SET name = :name';
          // Prepare statement
          $stmt = $this->conn->prepare($query);
          // Clean data
          $this->name = htmlspecialchars(strip_tags($this->name));
        
          
          // Bind data
          $stmt->bindParam(':name', $this->name);
          
          // Execute query
          if($stmt->execute()) {
            return true;
      }
      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
      return false;
    }
   
  }