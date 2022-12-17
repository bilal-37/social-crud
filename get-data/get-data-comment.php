<?php 
$postId = $_GET['post_id'];
getComments($postId);

function getComments($postId){
    require_once "connections/connection.php";
    $sqlcomments = "SELECT * FROM comments WHERE post_id='$postId'";
    $result = $conn->query($sqlcomments);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - comment: " . $row["comment"]."<br>";
    }
    } else {
    echo "0 results";
    }
}

?>

