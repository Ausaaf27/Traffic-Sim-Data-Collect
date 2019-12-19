<?php 
  class Vehicles {
    // DB stuff
    private $conn;
    private $table = 'vehicles';
    // Post Properties
    public $VehicleID;
    public $LocationX;
    public $LocationY;
    public $LocationZ;
    public $CTime;
    public $CurrentSpeed;
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
          $query = 'INSERT INTO ' . $this->table . ' SET VehicleID = :VehicleID, LocationX = :LocationX, LocationY = :LocationY, CurrentSpeed = :CurrentSpeed, CTime = :CTime, LocationZ=:LocationZ, session=:session';
          // Prepare statement
          $stmt = $this->conn->prepare($query);
          // Clean data
          $this->VehicleID = htmlspecialchars(strip_tags($this->VehicleID));
          $this->LocationX= (float)htmlspecialchars(strip_tags($this->LocationX));
          $this->LocationY =(float) htmlspecialchars(strip_tags($this->LocationY));
          $this->LocationZ =(float) htmlspecialchars(strip_tags($this->LocationZ));
          $this->session = htmlspecialchars(strip_tags($this->session));


          $this->CurrentSpeed = (float)htmlspecialchars(strip_tags($this->CurrentSpeed));
          $this->CTime = (float) htmlspecialchars(strip_tags($this->CTime));
          // Bind data
          $stmt->bindParam(':VehicleID', $this->VehicleID);
          $stmt->bindParam(':LocationX', $this->LocationX);
          $stmt->bindParam(':LocationY', $this->LocationY);
          $stmt->bindParam(':CurrentSpeed', $this->CurrentSpeed);
          $stmt->bindParam(':CTime', $this->CTime);
          $stmt->bindParam(':LocationZ', $this->LocationZ);
          $stmt->bindParam(':session', $this->session);

          // Execute query

          if($stmt->execute()) {
            return true;
      }
      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
      return false;
    }

  }