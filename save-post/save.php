<?php 

$postTitle = $_POST['post_title'];
$postBody = $_POST['post_body'];

saveData($postTitle,$postBody, 'primaryDb');
saveData($postTitle,$postBody, 'serviceBusDb');

function saveData ($postTitle , $postBody , $connection){
  if($connection == 'primaryDb'){
    require_once "connections/connection.php";
  }else{
    require_once "connections/serviceBusConnection.php";
  }
  $sql = "INSERT INTO posts (post_title, post_body)
  VALUES ('$postTitle', '$postBody')";
  if ($conn->query($sql) === TRUE) {
    echo 'Data Saved';
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>