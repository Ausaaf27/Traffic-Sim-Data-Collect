<?php 
  class Collisions {
    // DB stuff
    private $conn;
    private $table = 'collisions';
    // Post Properties
    public $Id;
    public $timestopped;
    public $pvId;
    public $svId;
    public $LocationX;
    public $LocationY;
    public $LocationZ;
    public $session;
 
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
          $query = 'INSERT INTO ' . $this->table . ' SET LocationZ = :LocationZ, LocationY = :LocationY,LocationX=:LocationX, pvId = :pvId, svId = :svId, session=:session';
          // Prepare statement
          $stmt = $this->conn->prepare($query);
          // Clean data
          $this->session= htmlspecialchars(strip_tags($this->session));

          $this->LocationX=(float) htmlspecialchars(strip_tags($this->LocationX));
          $this->LocationY= (float)htmlspecialchars(strip_tags($this->LocationY));
          $this->pvId = htmlspecialchars(strip_tags($this->pvId));
          $this->svId = htmlspecialchars(strip_tags($this->svId));
          $this->LocationZ = (float)htmlspecialchars(strip_tags($this->LocationZ));
          
          // Bind data
          $stmt->bindParam(':session', $this->session);

          $stmt->bindParam(':LocationY', $this->LocationY);
          $stmt->bindParam(':LocationX', $this->LocationX);
          $stmt->bindParam(':svId', $this->svId);
          $stmt->bindParam(':pvId', $this->pvId);
          $stmt->bindParam(':LocationZ', $this->LocationZ);
          // Execute query
          if($stmt->execute()) {
            return true;
      }
      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
      return false;
    }

   
    public function update() {
      // Create query
      $query = 'UPDATE ' . $this->table . '
                            SET timestopped = :timestopped
                            WHERE pvId = :pvId';
      // Prepare statement
      $stmt = $this->conn->prepare($query);
      // Clean data
      $this->timestopped =(float) htmlspecialchars(strip_tags($this->timestopped));
      $this->pvId = htmlspecialchars(strip_tags($this->pvId));
     
      $stmt->bindParam(':pvId', $this->pvId);
      $stmt->bindParam(':timestopped', $this->timestopped);
     
      // Execute query
      if($stmt->execute()) {
        return true;
      }
      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
      return false;
}
   
  }