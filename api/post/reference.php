<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/database.php';
  include_once '../../models/data_table_reference.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Post($db);

  // Blog post query
  $result = $post->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    // Post array
    $posts_arr = array();
    // $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'id' => $id,
        'site_name' => $site_name,
        'video' => html_entity_decode($video),
        'video_name' => $video_name,
        'duration' => $duration,
        'category' => $category,
        'video_status' => $video_status,
        'video_spots_no_yes' => $video_spots_no_yes,
        'videojojo_id' => $videojojo_id,

        'count' => $count,
        'jojo' => $jojo,
        'name' => $name,

        'ETspots' => $ETspots,
        'TTspots' => $TTspots,
        'TTwospots' => $TTwospots,
        'TFspots' => $TFspots,
        'FSspots' => $FSspots,

        'ET_limit' => $ET_limit,
        'TT_limit' => $TT_limit,
        'TTwo_limit' => $TTwo_limit,
        'TF_limit' => $TF_limit,
        'FS_limit' => $FS_limit,

        'g_date' => $g_date,
        'gg' => $gg,

        'date_published' => $date_published,
        'days_appearance' => $days_appearance,

        'play_start' => $play_start,
        'end_start' => $end_start,

        'prices' => $prices,
        'total_price' => $total_price,

        'total_spots' => $total_spots,
        'total_frequency' => $total_frequency,
        'total_spots_per_day' => $total_spots_per_day,

        'total_spots_per_site' => $total_spots_per_site,
        'total_frequency_per_site' => $total_frequency_per_site,
        'total_spots_per_site_per_day' => $total_spots_per_site_per_day

      );

      // Push to "data"
      array_push($posts_arr, $post_item);
      // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($posts_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Posts Found')
    );


  }

?>