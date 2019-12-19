<?php 
  class Intersections {
    // DB stuff
    private $conn;
    private $table = 'intersection';
    // Post Properties
    public $ID;
    public $LocationX;
    public $LocationY;
    public $LocationZ;
    public $maxspeed;
    public $numofvehiclespassed;
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
          $query = 'Replace INTO ' . $this->table . ' SET ID = :ID, LocationX = :LocationX, LocationY = :LocationY, LocationZ = :LocationZ, maxspeed = :maxspeed, numofvehiclespassed =:numofvehiclespassed, session=:session ';
          // Prepare statement
          $stmt = $this->conn->prepare($query);
          // Clean data
          $this->ID = htmlspecialchars(strip_tags($this->ID));
          $this->session = htmlspecialchars(strip_tags($this->session));
          $this->LocationX = (float)htmlspecialchars(strip_tags($this->LocationX));
          $this->LocationY = (float)htmlspecialchars(strip_tags($this->LocationY));
          $this->LocaitonZ =(float) htmlspecialchars(strip_tags($this->LocationZ));
          $this->maxspeed=(float) htmlspecialchars(strip_tags($this->maxspeed));
          $this->numofvehiclespassed = (int)htmlspecialchars(strip_tags($this->numofvehiclespassed));
          // Bind data
          $stmt->bindParam(':ID', $this->ID);
          $stmt->bindParam(':session', $this->session);

          $stmt->bindParam(':LocationX', $this->LocationX);
          $stmt->bindParam(':LocationY', $this->LocationY);
          $stmt->bindParam(':LocationZ', $this->LocationZ);
          $stmt->bindParam(':maxspeed', $this->maxspeed);
          $stmt->bindParam(':numofvehiclespassed', $this->numofvehiclespassed);
          // Execute query
          if($stmt->execute()) {
            return true;
      }
      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
      return false;
    }
   
  }