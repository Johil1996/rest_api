<?php 

  class Post {

   // DB stuff
   private $conn;
   private $table = 'reference';

   // Post Properties
   public $id;
   public $site_name;
   public $video;
   public $video_name;
   public $duration;
   public $category;
   public $video_status;
   public $video_spots_no_yes;
   public $videojojo_id;

   public $count;
   public $jojo;
   public $name;

   public $ETspots;
   public $TTspots;
   public $TTwospots;
   public $TFspots;
   public $FSspots;

   public $ET_limit;
   public $TT_limit;
   public $TTwo_limit;
   public $TF_limit;
   public $FS_limit;

   public $g_date;
   public $gg;

   public $date_published;
   public $days_appearance;

   public $play_start;
   public $end_start;

   public $prices;
   public $total_price;

   public $total_spots;
   public $total_frequency;
   public $total_spots_per_day;

   public $total_spots_per_site;
   public $total_frequency_per_site;
   public $total_spots_per_site_per_day;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT c.site_name as site_name,

  p.id,
  p.site_name,
  p.video,
  p.video_name,
  p.duration,
  p.category,
  p.video_status,
  p.video_spots_no_yes,
  p.videojojo_id,

  p.count,
  p.jojo,
  p.name,

  p.ETspots,
  p.TTspots,
  p.TTwospots,
  p.TFspots,
  p.FSspots,

  p.ET_limit,
  p.TT_limit,
  p.TTwo_limit,
  p.TF_limit,
  p.FS_limit,

  p.g_date,
  p.gg,

  p.date_published,
  p.days_appearance,

  p.play_start,
  p.end_start,

  p.prices,
  p.total_price,

  p.total_spots,
  p.total_frequency,
  p.total_spots_per_day,

  p.total_spots_per_site,
  p.total_frequency_per_site,
  p.total_spots_per_site_per_day

                                FROM ' . $this->table . ' p LEFT JOIN playlist_video c ON p.videojojo_id = c.id ORDER BY p.days_appearance DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }


  }

?>