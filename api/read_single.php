<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: Application/json');

//include the initialize
include_once('../core/initialize.php');


  //instantiate post
  $post = new Post($db);

  //check if id isset
  $post->id = isset($_GET['id'])? $_GET['id'] : die() ;

  //read single post
  $post->read_single();

  //
  $post_arr = array(
  'id' => $post->id,
  'title' => $post->title,
  'body' =>html_entity_decode($post->body),
  'author' => $post->author,
  'category_id' => $post->category_id,
  'category_name' => $post->category_name,
  'created_at' => $post->created_at
  );

  print_r(json_encode($post_arr));
?>