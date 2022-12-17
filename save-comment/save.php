<?php 

$postId = $_POST['post_id'];
$comment = $_POST['comment'];

saveData($postId,$comment, 'primaryDb');
saveData($postId,$comment, 'serviceBusDb');

function saveData ($postId , $comment , $connection){
  if($connection == 'primaryDb'){
    require_once "connections/connection.php";
  }else{
    require_once "connections/serviceBusConnection.php";
  }
  $sql = "INSERT INTO comments (post_id, comment)
  VALUES ('$postId', '$comment')";
  if ($conn->query($sql) === TRUE) {
    echo 'Data Saved';
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>