4<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: Application/json');
 header('Access-Control-Allow-Methods: PUT');
 

 //include the initialize
 include_once('../core/initialize.php');

  //instantiate post
  $post = new Post($db);

  //get the content
  $data = json_decode(file_get_contents('php://input'));

  $post->title = $data->title;
  $post->body = $data->body;
  $post->author = $data->author;
  $post->category_id = $data->category_id;
  $post->id = $data->id;

  if($post->update()){
      echo json_encode(
          array(
              'Message' => 'post updated'
          )
          );
  }else{
    echo json_encode(
        array(
            'Message' => 'post not updated'
        )
        );
  }
?>