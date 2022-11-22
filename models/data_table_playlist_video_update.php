<?php 
  class Post {
    // DB stuff
    private $conn;
    private $table = 'playlist_video'         

    // Post Properties
    public $id;
    public $site_name;
    public $video;
    public $video_name;


    public $ET_limit;
    public $TT_limit;
    public $TTwo_limit;
    public $TF_limit;  
    public $FS_limit;


    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Update Post
    public function update() {
          // Create query
          $query = 'UPDATE ' . $this->table . '
                                SET site_name = :site_name, 
                                    video = :video, 
                                    video_name = :video_name, 

                                    ET_limit = :ET_limit,
                                    TT_limit = :TT_limit,
                                    TTwo_limit = :TTwo_limit,
                                    TF_limit = :TF_limit,
                                    FS_limit = :FS_limit
                                                                                    
                                WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->site_name = htmlspecialchars(strip_tags($this->site_name));
          $this->video = htmlspecialchars(strip_tags($this->video));
          $this->video_name = htmlspecialchars(strip_tags($this->video_name));

          $this->ET_limit = htmlspecialchars(strip_tags($this->ET_limit));
          $this->TT_limit = htmlspecialchars(strip_tags($this->TT_limit));
          $this->TTwo_limit = htmlspecialchars(strip_tags($this->TTwo_limit));
          $this->TF_limit = htmlspecialchars(strip_tags($this->TF_limit));
          $this->FS_limit = htmlspecialchars(strip_tags($this->FS_limit));

          $this->id = htmlspecialchars(strip_tags($this->id));

          // Bind data
          $stmt->bindParam(':site_name', $this->site_name);
          $stmt->bindParam(':video', $this->video);
          $stmt->bindParam(':video_name', $this->video_name);

          $stmt->bindParam(':ET_limit', $this->ET_limit);
          $stmt->bindParam(':TT_limit', $this->TT_limit);
          $stmt->bindParam(':TTwo_limit', $this->TTwo_limit);
          $stmt->bindParam(':TF_limit', $this->TF_limit);
          $stmt->bindParam(':FS_limit', $this->FS_limit);

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