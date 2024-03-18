<?php
require_once "signup.php";
$username = $_COOKIE['id'];
$val = $_POST['uri'];
if(isset($_POST['uri']) && $val == "c4c6995edca5c600") {
$sql = "SELECT * FROM users WHERE username='$username'";
$res = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($res);
echo $row['status'];
}
?>