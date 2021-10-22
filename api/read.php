<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: Application/json');

 //include the initialize
 include_once('../core/initialize.php');

  //instantiate post
  $post = new Post($db);

  //read post
  $result = $post->read();

  //get the row count
  $num = $result->rowCount();

  if($num > 0)
  {
    $post_arr = array();
    $post_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
      //extract the array elements as variables
      extract($row);
      //assign these variables to the post item array
      $post_item = array(
          'id' => $id,
          'title' => $title,
          'body' => html_entity_decode($body),
          'author' => $author,
          'category_id' => $category_id,
          'category_name' => $category_name
      );
      //push the post item into the post_arr['data']
      array_push($post_arr['data'],$post_item);
    }
    //convert to json and output
    echo json_encode($post_arr);
  }else{
    echo json_encode(array('message' => 'NO Post Found'));
  }


  
?>