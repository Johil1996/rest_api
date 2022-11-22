<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/data_table_playlist_video_update.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Post($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
        $post->id = $id;
        $post->site_name = $site_name;
        $post->video = $video;
        $post->video_name = $video_name;

        $post->ET_limit = $ET_limit;
        $post->TT_limit = $TT_limit;
        $post->TTwo_limit = $TTwo_limit;
        $post->TF_limit = $TF_limit;
        $post->FS_limit = $FS_limit;


  // Update post
  if($post->update()) {
    echo json_encode(
      array('message' => 'Post Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Updated')
    );
  }

