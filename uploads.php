<?php
$username = $_COOKIE['id'];
if($username != "Shamanth") {
    die('');
}
require_once "signup.php";
$sql = "SELECT * FROM posts";
$query = mysqli_query($link, $sql);
while($row = mysqli_fetch_assoc($query)) {
    if($row['username'] > 1) {
        echo "fal";
    } else {
        echo "true";
    }
}
?>
