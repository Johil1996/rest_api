<?php 

  class Post {

   // DB stuff
   private $conn;
   private $table = 'site_on_off';

   // Post Properties
   public $id;
   public $video;
   public $video_name;
   public $video_status;

   public $duration;
   public $site_name;
   public $date_time;
   public $count;
   public $category;
   public $views;
   public $date_published;
   public $name;
   public $end_start;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

      // Create Post
    public function create() {
      
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET id = :id, 
                                                         site_name = :site_name, 
                                                         time_on = :time_on, 
                                                         time_off = :time_off,
                                                         time_status = :time_status,
                                                         time_status_end = :time_status_end ';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->id = htmlspecialchars(strip_tags($this->id));
          $this->site_name = htmlspecialchars(strip_tags($this->site_name));
          $this->time_on = htmlspecialchars(strip_tags($this->time_on));
          $this->time_off = htmlspecialchars(strip_tags($this->time_off));
          $this->time_status = htmlspecialchars(strip_tags($this->time_status));
          $this->time_status_end = htmlspecialchars(strip_tags($this->time_status_end));


          // Bind data
          $stmt->bindParam(':id', $this->id);
          $stmt->bindParam(':site_name', $this->site_name);
          $stmt->bindParam(':time_on', $this->time_on);
          $stmt->bindParam(':time_off', $this->time_off);
          $stmt->bindParam(':time_status', $this->time_status);
          $stmt->bindParam(':time_status_end', $this->time_status_end);

          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }


  }

  ?>


