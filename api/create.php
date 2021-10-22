4<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: Application/json');
 header('Access-Control-Allow-Methods: POST');
 /*header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,
 Access-Control-Allow-Methods,Authorization,X-Requested-Width');*/

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

  if($post->create_post()){
      echo json_encode(
          array(
              'Message' => 'post created'
          )
          );
  }else{
    echo json_encode(
        array(
            'Message' => 'post not create'
        )
        );
  }
?>