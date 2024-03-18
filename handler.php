<?php
$username = $_COOKIE['id'];
require_once "signup.php";
if(isset($_POST['image'])) {
$id = $_POST['image'];
$id = str_replace("<", "&lt;", $id);
$id = str_replace(">", "&gt;", $id);
$id = mysqli_real_escape_string($link, $id);
$query = "SELECT * FROM likes WHERE image='$id' AND action='like'";
$exe = mysqli_query($link, $query);
if(mysqli_num_rows($exe) > 1) {
    echo mysqli_num_rows($exe)." likes";
} elseif(mysqli_num_rows($exe) > 0 && mysqli_num_rows($exe) < 2) {
echo mysqli_num_rows($exe)." like";
} else {
}
}
?>