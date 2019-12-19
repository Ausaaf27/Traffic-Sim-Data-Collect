<?php 
  class NextPointTime {
    // DB stuff
    private $conn;
    private $table = 'nextpointtime';
    // Post Properties
    public $CIntersectionID;
   public $NIntersectionID;
   public $TTreach;
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
          $query = 'REPLACE INTO ' . $this->table . ' SET CIntersectionID = :CIntersectionID, NIntersectionID =:NIntersectionID ,TTreach =:TTreach,session=:session ';
          // Prepare statement
          $stmt = $this->conn->prepare($query);
          // Clean data
          $this->CIntersectionID = htmlspecialchars(strip_tags($this->CIntersectionID));
          $this->NIntersectionID = htmlspecialchars(strip_tags($this->NIntersectionID));
          $this->TTreach = (float) htmlspecialchars(strip_tags($this->TTreach));
          $this->session = htmlspecialchars(strip_tags($this->session));

          
          // Bind data
          $stmt->bindParam(':CIntersectionID', $this->CIntersectionID);
          $stmt->bindParam(':NIntersectionID', $this->NIntersectionID);
          $stmt->bindParam(':TTreach', $this->TTreach);
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