<?php 

  class Post {

   // DB stuff
   private $conn;
   private $table = 'playlist_video';

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

   // new //
   public $campaign_duration;
   public $spots;
   public $active;
   public $inactive;   
   public $number_of_sites;
   public $date_time;

   public $monday;
   public $tuesday;
   public $wednesday;
   public $thursday;
   public $friday;
   public $saturday;
   public $sunday;

   public $AA;
   public $BB;
   public $CC;
   public $EE;
   public $DD;

   public $eigth_to_ten;
   public $ten_to_twelve;
   public $twelve_to_two;
   public $two_to_four;
   public $four_to_six;

   public $count;
   public $jojo;
   public $name;

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


  p.campaign_duration,
  p.spots,
  p.active,
  p.inactive,   
  p.number_of_sites,
  p.date_time,

  p.monday,
  p.tuesday,
  p.wednesday,
  p.thursday,
  p.friday,
  p.saturday,
  p.sunday,

  p.AA,
  p.BB,
  p.CC,
  p.EE,
  p.DD,

  p.eigth_to_ten,
  p.ten_to_twelve,
  p.twelve_to_two,
  p.two_to_four,
  p.four_to_six,


  p.count,
  p.jojo,
  p.name,

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

                                FROM ' . $this->table . ' p LEFT JOIN reference c ON p.videojojo_id = c.id ORDER BY p.days_appearance DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }


  }

?>