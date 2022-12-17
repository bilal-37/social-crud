<?php 

$postId = $_GET['post_id'];
getPost($postId);

function getPost($postId){
    require_once "connections/connection.php";
    $sqlPost = "SELECT * FROM posts WHERE id='$postId'";
    $result = $conn->query($sqlPost);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - post Title: " . $row["post_title"]. " - Post Body " . $row["post_body"];
    }
    } else {
    echo "0 results";
    }
}

?>