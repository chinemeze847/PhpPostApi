4<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: Application/json');
 header('Access-Control-Allow-Methods: DELETE');
 

 //include the initialize
 include_once('../core/initialize.php');

  //instantiate post
  $post = new Post($db);

  //get the content
  $post->id = isset($_GET['id'])? $_GET['id'] : die() ;

  if($post->delete()){
      echo json_encode(
          array(
              'Message' => 'post deleted'
          )
          );
  }else{
    echo json_encode(
        array(
            'Message' => 'post not deleted'
        )
        );
  }
?>