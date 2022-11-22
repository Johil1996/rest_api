<?php 
  class Post {
    // DB stuff
    private $conn;
    private $table = 'site_on_off';

    // Post Properties
    public $id;
    public $site_name;
    public $title;
    public $time_off;
    public $time_status_end;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Update Post
    public function update() {
          // Create query
          $query = 'UPDATE ' . $this->table . '
                                SET title = :title, time_off = :time_off, time_status_end = :time_status_end, site_name = :site_name
                                WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->title = htmlspecialchars(strip_tags($this->title));
          $this->time_off = htmlspecialchars(strip_tags($this->time_off));
          $this->time_status_end = htmlspecialchars(strip_tags($this->time_status_end));
          $this->site_name = htmlspecialchars(strip_tags($this->site_name));
          $this->id = htmlspecialchars(strip_tags($this->id));

          // Bind data
          $stmt->bindParam(':title', $this->title);
          $stmt->bindParam(':time_off', $this->time_off);
          $stmt->bindParam(':time_status_end', $this->time_status_end);
          $stmt->bindParam(':site_name', $this->site_name);
          $stmt->bindParam(':id', $this->id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

    
  }