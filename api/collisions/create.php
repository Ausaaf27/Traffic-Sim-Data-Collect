<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
  include_once '../../config/Database.php';
  include_once '../../models/Collisions.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  // Instantiate blog post object
  $post = new Collisions($db);
  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));
  $post->session =$data->session;
  $post->LocationX = $data->LocationX;
  $post->LocationY = $data->LocationY;
  $post->pvId = $data->pvId;
  $post->svId = $data->svId;
  $post->LocationZ = $data->LocationZ;

  // Create post
  if($post->create()) {
    echo json_encode(
      array('message' => 'Post Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Created')
    );
  }